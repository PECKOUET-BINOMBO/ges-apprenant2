<?php
// namespace App\Controllers;
// use function App\Controllers\render_view;
// use function App\Controllers\redirect_to_route;
// use function App\Controllers\save_photo;

// require_once __DIR__ . '/../controllers/controller.php';
// require_once __DIR__ . '/../models/model.php';

// $model = include __DIR__ . '/../models/model.php';

// function index_apprenants(): void
// {
//     global $model;

//     $promotion_id = $model['get_promotion_active']();
//     $apprenants = array_filter($model['get_apprenants'](), fn($a) => $a['promotion_id'] === $promotion_id);
//     $referentiels = $model['get_referentiels']();

//     // Récupérer les erreurs et les anciennes valeurs de la session
//     $errors = $_SESSION['errors'] ?? [];
//     $old = $_SESSION['old'] ?? [];

//     // Nettoyer les sessions après les avoir récupérées
//     unset($_SESSION['errors']);
//     unset($_SESSION['old']);

//     render_view('apprenants/index', [
//         'title' => 'Apprenants',
//         'apprenants' => $apprenants,
//         'referentiels' => $referentiels,
//         'errors' => $errors,
//         'old' => $old
//     ]);
// }
namespace App\Controllers;

use function App\Controllers\render_view;
use function App\Controllers\redirect_to_route;
use function App\Controllers\save_photo;

require_once __DIR__ . '/../controllers/controller.php';
require_once __DIR__ . '/../models/model.php';
require_once __DIR__ . '/../services/validator.service.php';

$model = include __DIR__ . '/../models/model.php';
$validator = include __DIR__ . '/../services/validator.service.php';

$afficher_formulaire = false;
$liste_a_afficher = 'retenus';

if (isset($_GET['action']) && $_GET['action'] === 'ajouter') {
    $afficher_formulaire = true;
} elseif (isset($_GET['action']) && $_GET['action'] === 'annuler') {
    $afficher_formulaire = false;
}

if (isset($_GET['liste']) && in_array($_GET['liste'], ['retenus', 'attente'])) {
    $liste_a_afficher = $_GET['liste'];
}

function index_apprenants(): void
{
    global $model;

    $promotion_id = $model['get_promotion_active']();
    $apprenants = array_filter($model['get_apprenants'](), fn($a) => $a['promotion_id'] === $promotion_id);
    $referentiels = $model['get_referentiels']();

    // Récupérer les erreurs et les anciennes valeurs de la session
    $errors = $_SESSION['errors'] ?? [];
    $old = $_SESSION['old'] ?? [];

    // Nettoyer les sessions après les avoir récupérées
    unset($_SESSION['errors']);
    unset($_SESSION['old']);

    render_view('apprenants/index', [
        'title' => 'Apprenants',
        'apprenants' => $apprenants,
        'referentiels' => $referentiels,
        'errors' => $errors,
        'old' => $old
    ]);
}


function generer_matricule($apprenants): string
{
    $annee_courante = date('y'); // 2 derniers chiffres de l'année
    
    // Trouver le plus grand ID existant
    $max_id = 0;
    foreach ($apprenants as $apprenant) {
        $id = (int)substr($apprenant['matricule'], 2);
        if ($id > $max_id) {
            $max_id = $id;
        }
    }
    
    // Nouvel ID = max + 1, formaté sur 4 chiffres
    $nouvel_id = $max_id + 1;
    return $annee_courante . str_pad($nouvel_id, 4, '0', STR_PAD_LEFT);
}

function store_apprenant(): void {
    global $model, $validator;

    // Récupérer les données du formulaire
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

    // Stocker les anciennes valeurs pour les réafficher en cas d'erreur
    $_SESSION['old'] = $inputs; 

    // Récupérer les données existantes
    $data = $model['json_to_array'](__DIR__ . '/../data/data.json');
    $apprenants = $data['apprenants'] ?? [];
    
    // Valider les données
    $errors = $validator['validate_apprenant']($inputs, $apprenants);
    
    if (!empty($errors)) {
        $_SESSION['errors'] = $errors;
        redirect_to_route('?route=apprenants&add_apprenant=true');
        return;
    }
    
    // Gérer l'upload de photo
    $photoName = save_photo($inputs['photo']);
    if (!$photoName) {
        $_SESSION['errors']['photo'] = "Erreur lors de l'upload de la photo.";
        redirect_to_route('?route=apprenants&add_apprenant=true');
        return;
    }

    // Générer un matricule
    $matricule = generer_matricule($apprenants);
    
    // Récupérer l'ID de la promotion active
    $promotion_id = $model['get_promotion_active']();
    
    // Créer le nouvel apprenant
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
    
    // Ajouter le nouvel apprenant aux données existantes
    $apprenants[] = $nouvel_apprenant;
    $data['apprenants'] = $apprenants;
    
    // Enregistrer les données
    $model['array_to_json'](__DIR__ . '/../data/data.json', $data);
    
    // Rediriger avec un message de succès
    redirect_to_route('?route=apprenants&success=true&message=apprenant.ajout.success');
}

function show_apprenant_details(): void
{
    global $model;

    $id = $_GET['id'] ?? null;

    // if (!$id) {
    //     redirect_to_route('?route=apprenants');
    //     return;
    // }

    // $apprenants = $model['get_apprenants']();
    // $apprenant = null;

    // foreach ($apprenants as $a) {
    //     if ($a['id'] == $id) {
    //         $apprenant = $a;
    //         break;
    //     }
    // }

    // if (!$apprenant) {
    //     redirect_to_route('?route=apprenants');
    //     return;
    // }

    // $referentiels = $model['get_referentiels']();
    // $referentiel_nom = '';
    // foreach ($referentiels as $ref) {
    //     if ($ref['id'] === $apprenant['referentiel_id']) {
    //         $referentiel_nom = $ref['nom'];
    //         break;
    //     }
    // }

    // render_view('apprenants/details', [
    //     'apprenant' => $apprenant,
    //     'referentiel' => $referentiel_nom
    // ]);
    render_view('apprenants/details');
}


