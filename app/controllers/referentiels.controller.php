<?php
namespace App\Controllers;

use function App\Controllers\render_view;
use function App\Controllers\redirect_to_route;
use function App\Controllers\save_photo;

require_once __DIR__ . '/../controllers/controller.php';
require_once __DIR__ . '/../models/model.php';

$model = include __DIR__ . '/../models/model.php';

function index_referentiels(): void {
    global $model;

    $referentiels = $model['get_referentiels']();
    $promotions = $model['get_promotions']();
    $promotion_active_id = $model['get_promotion_active']();
    
    // Récupération du terme de recherche
    $searchTerm = isset($_GET['search']) ? strtolower($_GET['search']) : '';

    // Trouver la promotion active
    $promotion_active = array_filter($promotions, function ($promo) use ($promotion_active_id) {
        return $promo['id'] === $promotion_active_id;
    });
    $promotion_active = reset($promotion_active); // Récupérer le premier élément

    // Filtrer les référentiels associés à la promotion active
    $referentielsEnCours = [];
    if (!empty($promotion_active['referentiels'])) {
        $referentielsEnCours = array_filter($referentiels, function ($ref) use ($promotion_active, $searchTerm) {
            $matchSearch = $searchTerm === '' || 
                         strpos(strtolower($ref['nom']), $searchTerm) !== false || 
                         strpos(strtolower($ref['description']), $searchTerm) !== false;
            
            return in_array($ref['id'], $promotion_active['referentiels']) && $matchSearch;
        });
    }
    
    // Filtrer tous les référentiels selon le terme de recherche
    $tousReferentielsFiltres = array_filter($referentiels, function ($ref) use ($searchTerm) {
        return $searchTerm === '' || 
               strpos(strtolower($ref['nom']), $searchTerm) !== false || 
               strpos(strtolower($ref['description']), $searchTerm) !== false;
    });

    // Rendre la vue avec les données
    render_view('referentiels/index', [
        'title' => 'Référentiels',
        'referentielsEnCours' => array_values($referentielsEnCours),
        'tousLesReferentiels' => array_values($tousReferentielsFiltres),
        'promotion_active' => $promotion_active,
        'searchTerm' => $searchTerm
    ]);
}

function ajouter_referentiel_a_promotion(): void {
    global $model;

    $data = $model['json_to_array'](__DIR__ . '/../data/data.json');
    $idReferentiel = intval($_POST['referentiel_id'] ?? 0);
    $idPromo = $data['promotion_active'] ?? null;

    if ($idReferentiel && $idPromo) {
        // Vérifier que la promotion active est valide (date de fin non dépassée)
        $promoActive = null;
        foreach ($data['promotions'] as $promo) {
            if ($promo['id'] === $idPromo) {
                $promoActive = $promo;
                break;
            }
        }

        // Vérifier si la date de fin n'est pas dépassée
        if (!$promoActive || strtotime($promoActive['date_fin']) < time()) {
            redirect_to_route('?route=referentiels&success=false&message=date_expired');
            return;
        }

        // Vérifiez si le référentiel existe
        $referentielExiste = false;
        foreach ($data['referentiels'] as &$ref) {
            if ($ref['id'] === $idReferentiel) {
                $referentielExiste = true;

                // Ajoutez la promotion active au référentiel
                if (!isset($ref['promotions'])) {
                    $ref['promotions'] = [];
                }
                
                if (!in_array($idPromo, $ref['promotions'])) {
                    $ref['promotions'][] = $idPromo;
                }
            }
        }

        if (!$referentielExiste) {
            redirect_to_route('?route=referentiels&success=false');
            return;
        }

        // Ajoutez le référentiel à la promotion active
        foreach ($data['promotions'] as &$promo) {
            if ($promo['id'] === $idPromo) {
                if (!isset($promo['referentiels'])) {
                    $promo['referentiels'] = [];
                }
                
                if (!in_array($idReferentiel, $promo['referentiels'])) {
                    $promo['referentiels'][] = $idReferentiel;
                }
            }
        }

        $model['array_to_json'](__DIR__ . '/../data/data.json', $data);

        // Redirection avec succès
        redirect_to_route('?route=referentiels&success=true');
        return;
    }

    // Redirection avec échec
    redirect_to_route('?route=referentiels&success=false');
}

function supprimer_referentiel_de_promotion(): void {
    global $model;

    $data = $model['json_to_array'](__DIR__ . '/../data/data.json');
    $idReferentiel = intval($_POST['referentiel_id'] ?? 0);
    $idPromo = $data['promotion_active'] ?? null;

    if ($idReferentiel && $idPromo) {
        // Vérifier que la promotion active est valide (date de fin non dépassée)
        $promoActive = null;
        foreach ($data['promotions'] as $promo) {
            if ($promo['id'] === $idPromo) {
                $promoActive = $promo;
                break;
            }
        }

        // Vérifier si la date de fin n'est pas dépassée
        if (!$promoActive || strtotime($promoActive['date_fin']) < time()) {
            redirect_to_route('?route=referentiels&success=false&message=date_expired');
            return;
        }

        // Vérifier si le référentiel existe et s'il n'a pas d'apprenants
        $referentielExiste = false;
        $hasApprenants = false;

        foreach ($data['referentiels'] as &$ref) {
            if ($ref['id'] === $idReferentiel) {
                $referentielExiste = true;
                
                // Vérifier si le référentiel a des apprenants
                if (isset($ref['apprenants']) && count($ref['apprenants']) > 0) {
                    $hasApprenants = true;
                    break;
                }
                
                // Supprimer la promotion du référentiel
                if (isset($ref['promotions'])) {
                    $ref['promotions'] = array_values(array_filter($ref['promotions'], function($promoId) use ($idPromo) {
                        return $promoId !== $idPromo;
                    }));
                }
            }
        }

        if (!$referentielExiste) {
            redirect_to_route('?route=referentiels&success=false&message=not_found');
            return;
        }

        if ($hasApprenants) {
            redirect_to_route('?route=referentiels&success=false&message=has_apprenants');
            return;
        }

        // Supprimer le référentiel de la promotion active
        foreach ($data['promotions'] as &$promo) {
            if ($promo['id'] === $idPromo && isset($promo['referentiels'])) {
                $promo['referentiels'] = array_values(array_filter($promo['referentiels'], function($refId) use ($idReferentiel) {
                    return $refId !== $idReferentiel;
                }));
            }
        }

        $model['array_to_json'](__DIR__ . '/../data/data.json', $data);

        // Redirection avec succès
        redirect_to_route('?route=referentiels&success=true&message=desaffectation_ok');
        return;
    }

    // Redirection avec échec
    redirect_to_route('?route=referentiels&success=false');
}

function store_referentiel(): void {
    global $model;

    $data = $model['json_to_array'](__DIR__ . '/../data/data.json');
    $referentiels = $data['referentiels'] ?? [];
    
    $inputs = [
        'nom' => $_POST['nom'] ?? '',
        'description' => $_POST['description'] ?? '',
        'capacite' => intval($_POST['capacite'] ?? 0),
        'sessions' => intval($_POST['sessions'] ?? 1),
        'image' => $_FILES['image'] ?? []
    ];
    
    // Charger le service de validation
    $validator = include __DIR__ . '/../services/validator.service.php';
    
    // Valider les données
    $errors = $validator['validate_referentiel']($inputs, $referentiels);
    
    // S'il y a des erreurs, rediriger avec les erreurs
    if (!empty($errors)) {
        // Stocker les erreurs en session
        $_SESSION['errors'] = $errors;
        $_SESSION['old'] = $inputs;
        redirect_to_route('?route=referentiels&section=all&success=false');
        return;
    }

    $imageName = '';
    if (!empty($inputs['image']['name'])) {
        $imageName = save_photo($inputs['image']) ?? '';
    }

    $newId = 1;
    if (!empty($data['referentiels'])) {
        // Trouver le plus grand ID existant et ajouter 1
        $ids = array_map(function($ref) { return $ref['id']; }, $data['referentiels']);
        $newId = max($ids) + 1;
    }

    $data['referentiels'][] = [
        'id' => $newId,
        'nom' => $inputs['nom'],
        'description' => $inputs['description'],
        'capacite' => $inputs['capacite'],
        'image' => $imageName,
        'sessions' => $inputs['sessions'],
        'modules' => [],
        'apprenants' => [],
        'promotions' => []
    ];

    $model['array_to_json'](__DIR__ . '/../data/data.json', $data);
    redirect_to_route('?route=referentiels&section=all&success=true');
}