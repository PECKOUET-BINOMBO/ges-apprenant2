<?php

namespace App\Controllers;

use function App\Controllers\render_view;
use function App\Controllers\redirect_to_route;
use function App\Controllers\save_photo;

require_once __DIR__ . '/../controllers/controller.php';
require_once __DIR__ . '/../models/model.php';

$model = include __DIR__ . '/../models/model.php';

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

function store_apprenant(): void {
    global $model, $validator;

    $data = $model['json_to_array'](__DIR__ . '/../data/data.json');
    $apprenants = $data['apprenants'] ?? [];
    
    // Convertir la date au format JJ/MM/AAAA pour la validation
    $date_naissance = $_POST['date_naissance'] ?? '';
    $date_formatted = '';
    
    if (!empty($date_naissance)) {
        $date_obj = new \DateTime($date_naissance);
        $date_formatted = $date_obj->format('d/m/Y');
    }
    
    // Restructurer les entrées pour correspondre à la structure attendue par le validateur
    $inputs = [
        'nom' => $_POST['nom'] ?? '',
        'prenom' => $_POST['prenom'] ?? '',
        'naissance' => [
            'date' => $date_formatted,
            'lieu' => $_POST['lieu_naissance'] ?? ''
        ],
        'adresse' => $_POST['adresse'] ?? '',
        'telephone' => $_POST['telephone'] ?? '',
        'email' => $_POST['email'] ?? '',
        'photo' => isset($_FILES['photo']) ? $_FILES['photo'] : null,
        'referentiel_id' => (int)($_POST['referentiel_id'] ?? 0),
        'promotion_id' => $model['get_promotion_active'](),
        'tuteur' => [
            'nom' => $_POST['nom_tuteur'] ?? '',
            'lien' => $_POST['lien_parente'] ?? '',
            'adresse' => $_POST['adresse_tuteur'] ?? '',
            'telephone' => $_POST['telephone_tuteur'] ?? ''
        ]
    ];

    // Valider les données
    $errors = $validator['validate_apprenant']($inputs, $apprenants);
    
    // Mapper les erreurs aux champs du formulaire
    $mappedErrors = [];
    if (isset($errors['nom'])) $mappedErrors['nom'] = $errors['nom'];
    if (isset($errors['prenom'])) $mappedErrors['prenom'] = $errors['prenom'];
    if (isset($errors['date_naissance'])) $mappedErrors['date_naissance'] = $errors['date_naissance'];
    if (isset($errors['lieu_naissance'])) $mappedErrors['lieu_naissance'] = $errors['lieu_naissance'];
    if (isset($errors['adresse'])) $mappedErrors['adresse'] = $errors['adresse'];
    if (isset($errors['email'])) $mappedErrors['email'] = $errors['email'];
    if (isset($errors['telephone'])) $mappedErrors['telephone'] = $errors['telephone'];
    if (isset($errors['photo'])) $mappedErrors['photo'] = $errors['photo'];
    if (isset($errors['referentiel_id'])) $mappedErrors['referentiel_id'] = $errors['referentiel_id'];
    if (isset($errors['nom_tuteur'])) $mappedErrors['nom_tuteur'] = $errors['nom_tuteur'];
    if (isset($errors['lien_parente'])) $mappedErrors['lien_parente'] = $errors['lien_parente'];
    if (isset($errors['adresse_tuteur'])) $mappedErrors['adresse_tuteur'] = $errors['adresse_tuteur'];
    if (isset($errors['telephone_tuteur'])) $mappedErrors['telephone_tuteur'] = $errors['telephone_tuteur'];

    // S'il y a des erreurs, les stocker en session et rediriger
    if (!empty($errors)) {
        $_SESSION['errors'] = $mappedErrors;
        $_SESSION['old'] = $_POST; // Conserver les valeurs originales
        redirect_to_route('?route=apprenants&add_apprenant=true');
        return;
    }

    // Vérifier si un fichier a bien été uploadé
    if (!isset($_FILES['photo']) || $_FILES['photo']['error'] !== UPLOAD_ERR_OK) {
        $mappedErrors['photo'] = "apprenant.photo.required";
        $_SESSION['errors'] = $mappedErrors;
        $_SESSION['old'] = $_POST;
        redirect_to_route('?route=apprenants&add_apprenant=true');
        return;
    }

    // Traiter l'upload de photo
    $photoName = save_photo($_FILES['photo']);
    if (!$photoName) {
        $mappedErrors['photo'] = "Impossible d'uploader l'image.";
        $_SESSION['errors'] = $mappedErrors;
        $_SESSION['old'] = $_POST;
        redirect_to_route('?route=apprenants&add_apprenant=true');
        return;
    }

    // Créer le nouvel apprenant avec la structure correcte
    $newId = count($apprenants) + 1;
    $apprenant = [
        'id' => $newId,
        'matricule' => generate_matricule($inputs['nom'], $inputs['prenom']),
        'nom' => $inputs['nom'],
        'prenom' => $inputs['prenom'],
        'naissance' => $inputs['naissance'],
        'adresse' => $inputs['adresse'],
        'telephone' => $inputs['telephone'],
        'email' => $inputs['email'],
        'photo' => $photoName,
        'referentiel_id' => $inputs['referentiel_id'],
        'promotion_id' => $inputs['promotion_id'],
        'tuteur' => $inputs['tuteur']
    ];

    // Ajouter l'apprenant à la liste et sauvegarder
    $data['apprenants'][] = $apprenant;
    $model['array_to_json'](__DIR__ . '/../data/data.json', $data);
    redirect_to_route('?route=apprenants&success=true&message=apprenant.ajout.success');
    
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
