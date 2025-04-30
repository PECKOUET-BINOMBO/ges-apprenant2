<?php
namespace App\Controllers;

use function App\Controllers\render_view;
use function App\Controllers\redirect_to_route;
use function App\Controllers\save_photo;

require_once __DIR__ . '/../controllers/controller.php';
require_once __DIR__ . '/../models/model.php';
require_once __DIR__ . '/../services/validator.service.php';

$model = include __DIR__ . '/../models/model.php';
$validator = include __DIR__ . '/../services/validator.service.php';

// Gestion de l'affichage du formulaire
$afficher_formulaire = false;
if (isset($_GET['action'])) {
    if ($_GET['action'] === 'ajouter') {
        $afficher_formulaire = true;
    } elseif ($_GET['action'] === 'annuler') {
        $afficher_formulaire = false;
    }
}

// Gestion de la liste à afficher (retenus ou attente)
$liste_a_afficher = $_GET['liste'] ?? 'retenus';
if (!in_array($liste_a_afficher, ['retenus', 'attente'])) {
    $liste_a_afficher = 'retenus';
}

function index_apprenants(): void
{
    global $model;
    global $afficher_formulaire;
    global $liste_a_afficher;

    $promotion_id = $model['get_promotion_active']();
    $apprenants = array_filter($model['get_apprenants'](), fn($a) => $a['promotion_id'] === $promotion_id);
    $referentiels = $model['get_referentiels']();
    
    $errors = $_SESSION['errors'] ?? [];
    $old = $_SESSION['old'] ?? [];

    unset($_SESSION['errors']);
    unset($_SESSION['old']);

    render_view('apprenants/index', [
        'title' => 'Apprenants',
        'apprenants' => $apprenants,
        'referentiels' => $referentiels,
        'errors' => $errors,
        'old' => $old,
        'afficher_formulaire' => $afficher_formulaire,
        'liste_a_afficher' => $liste_a_afficher
    ]);
}

function generer_matricule($apprenants): string
{
    $annee_courante = date('y');
    $max_id = 0;
    
    foreach ($apprenants as $apprenant) {
        $id = (int)substr($apprenant['matricule'], 2);
        if ($id > $max_id) {
            $max_id = $id;
        }
    }

    $nouvel_id = $max_id + 1;
    return $annee_courante . str_pad($nouvel_id, 4, '0', STR_PAD_LEFT);
}

function store_apprenant(): void
{
    global $model, $validator;

    $inputs = [
        'nom' => $_POST['nom'] ?? '',
        'prenom' => $_POST['prenom'] ?? '',
        'date_naissance' => $_POST['date_naissance'] ?? '',
        'lieu_naissance' => $_POST['lieu_naissance'] ?? '',
        'adresse' => $_POST['adresse'] ?? '',
        'email' => $_POST['email'] ?? '',
        'telephone' => $_POST['telephone'] ?? '',
        'photo' => $_FILES['photo'] ?? [],
        'referentiel_id' => $_POST['referentiel_id'] ?? '',
        'nom_tuteur' => $_POST['nom_tuteur'] ?? '',
        'lien_parente' => $_POST['lien_parente'] ?? '',
        'adresse_tuteur' => $_POST['adresse_tuteur'] ?? '',
        'telephone_tuteur' => $_POST['telephone_tuteur'] ?? ''
    ];

    $_SESSION['old'] = $inputs;

    $data = $model['json_to_array'](__DIR__ . '/../data/data.json');
    $apprenants = $data['apprenants'] ?? [];

    $errors = $validator['validate_apprenant']($inputs, $apprenants);

    if (!empty($errors)) {
        $_SESSION['errors'] = $errors;
        redirect_to_route('?route=apprenants&action=ajouter');
        return;
    }

    $photoName = save_photo($inputs['photo']);
    if (!$photoName) {
        $_SESSION['errors']['photo'] = "Erreur lors de l'upload de la photo.";
        redirect_to_route('?route=apprenants&action=ajouter');
        return;
    }

    $matricule = generer_matricule($apprenants);
    $promotion_id = $model['get_promotion_active']();
    $newId = !empty($apprenants) ? max(array_column($apprenants, 'id')) + 1 : 1;

    $nouvel_apprenant = [
        'id' => $newId,
        'matricule' => $matricule,
        'nom' => $inputs['nom'],
        'prenom' => $inputs['prenom'],
        'naissance' => [
            'date' => $inputs['date_naissance'],
            'lieu' => $inputs['lieu_naissance']
        ],
        'adresse' => $inputs['adresse'],
        'email' => $inputs['email'],
        'telephone' => $inputs['telephone'],
        'photo' => $photoName,
        'referentiel_id' => (int)$inputs['referentiel_id'],
        'promotion_id' => $promotion_id,
        'statut' => 'retenu', // Par défaut, l'apprenant est retenu
        'tuteur' => [
            'nom' => $inputs['nom_tuteur'],
            'lien' => $inputs['lien_parente'],
            'adresse' => $inputs['adresse_tuteur'],
            'telephone' => $inputs['telephone_tuteur']
        ],
        'presences' => [],
        'retards' => [],
        'absences' => [],
        'historique_presences' => []
    ];

    $apprenants[] = $nouvel_apprenant;
    $data['apprenants'] = $apprenants;

    $model['array_to_json'](__DIR__ . '/../data/data.json', $data);

    redirect_to_route('?route=apprenants&success=true&message=Apprenant ajouté avec succès');
}

function show_apprenant_details(): void
{
    global $model;

    $id = $_GET['id'] ?? null;

    if (!$id) {
        redirect_to_route('?route=apprenants');
        return;
    }

    $apprenants = $model['get_apprenants']();
    $apprenant = null;

    foreach ($apprenants as $a) {
        if ($a['id'] == $id) {
            $apprenant = $a;
            break;
        }
    }

    if (!$apprenant) {
        redirect_to_route('?route=apprenants');
        return;
    }

    $referentiels = $model['get_referentiels']();
    $referentiel_nom = '';
    foreach ($referentiels as $ref) {
        if ($ref['id'] === $apprenant['referentiel_id']) {
            $referentiel_nom = $ref['nom'];
            break;
        }
    }

    render_view('apprenants/details', [
        'apprenant' => $apprenant,
        'referentiel' => $referentiel_nom
    ]);
}

function activer_apprenant(): void
{
    global $model;

    $id = $_GET['id'] ?? null;
    if (!$id) {
        redirect_to_route('?route=apprenants');
        return;
    }

    $data = $model['json_to_array'](__DIR__ . '/../data/data.json');
    foreach ($data['apprenants'] as &$apprenant) {
        if ($apprenant['id'] == $id) {
            $apprenant['statut'] = 'retenu';
            break;
        }
    }

    $model['array_to_json'](__DIR__ . '/../data/data.json', $data);
    redirect_to_route('?route=apprenants&liste=attente&success=true&message=Apprenant activé avec succès');
}

function desactiver_apprenant(): void
{
    global $model;

    $id = $_GET['id'] ?? null;
    if (!$id) {
        redirect_to_route('?route=apprenants');
        return;
    }

    $data = $model['json_to_array'](__DIR__ . '/../data/data.json');
    foreach ($data['apprenants'] as &$apprenant) {
        if ($apprenant['id'] == $id) {
            $apprenant['statut'] = 'attente';
            break;
        }
    }

    $model['array_to_json'](__DIR__ . '/../data/data.json', $data);
    redirect_to_route('?route=apprenants&liste=retenus&success=true&message=Apprenant désactivé avec succès');
}