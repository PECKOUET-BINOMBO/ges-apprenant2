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
$session = include __DIR__ . '/../services/session.service.php';

/**
 * Fonction pour gérer la pagination
 */
function paginate(array $items, int $page, int $perPage): array
{
    $totalItems = count($items);
    $totalPages = ceil($totalItems / $perPage);

    $currentPage = max(1, min($page, $totalPages));
    $startIndex = ($currentPage - 1) * $perPage;
    $paginatedItems = array_slice($items, $startIndex, $perPage);

    return [
        'items' => $paginatedItems,
        'pagination' => [
            'current' => $currentPage,
            'total' => $totalPages,
            'totalItems' => $totalItems,
            'perPage' => $perPage,
        ],
    ];
}

/**
 * Fonction principale pour afficher les promotions
 */
function index_promotions(array $errors = []): void
{
    global $model;
    global $session;

    $showForm = isset($_GET['show_form']) && $_GET['show_form'] === '1';


    $session['start_session']();

    if (isset($_GET['vue'])) {
        $session['set']('vue', $_GET['vue']);
    }

    $vue = $session['get']('vue') ?? 'grille';
    $search = $_GET['search'] ?? '';
    $filter = $_GET['filter'] ?? 'all';
    $ref_filter = $_GET['ref_filter'] ?? 'all';
    $page = isset($_GET['page']) ? max(1, intval($_GET['page'])) : 1;
    $perPage = 4; // Nombre d'éléments par page

    $promotions = $model['get_promotions']();

    // Trier les promotions par date de début (ordre décroissant)
    usort($promotions, function ($a, $b) {
        return strtotime($b['date_debut']) - strtotime($a['date_debut']);
    });

    $promotion_active_id = $model['get_promotion_active'](); // ID de la promotion active

    // Séparer la promotion active des autres promotions
    $promotion_active = null;
    $promotions = array_filter($promotions, function ($promo) use ($promotion_active_id, &$promotion_active) {
        if ($promo['id'] == $promotion_active_id) {
            $promotion_active = $promo;
            return false; // Exclure la promotion active des autres promotions
        }
        return true;
    });

    // Filtrer les promotions selon la recherche
    if (!empty($search)) {
        $promotions = array_filter($promotions, function ($promo) use ($search) {
            return stripos($promo['nom'], $search) !== false;
        });
    }

    // Filtrer par statut (actif/inactif)
    if ($filter !== 'all') {
        $promotions = array_filter($promotions, function ($promo) use ($filter, $promotion_active) {
            if ($filter === 'active') {
                return $promo['id'] == $promotion_active['id'];
            } else {
                return $promo['id'] != $promotion_active['id'];
            }
        });
    }

    // Filtrer par référentiel
    if ($ref_filter !== 'all') {
        $promotions = array_filter($promotions, function ($promo) use ($ref_filter) {
            return !empty($promo['referentiels']) && in_array((int)$ref_filter, $promo['referentiels']);
        });
    }

    // Appeler la fonction de pagination
    $paginationData = paginate($promotions, $page, $perPage);

    // Ajouter la promotion active en tête de liste, sauf si le filtre "inactive" est sélectionné
    if ($promotion_active && $filter !== 'inactive') {
        array_unshift($paginationData['items'], $promotion_active);
    }

    // Calculer les statistiques
    $stats = [
        'total_apprenants' => count(array_filter($model['get_apprenants'](), function ($apprenant) use ($promotion_active) {
            return isset($apprenant['promotion_id']) && $promotion_active && $apprenant['promotion_id'] == $promotion_active['id'];
        })),
        'total_referentiels' => $promotion_active ? count($promotion_active['referentiels']) : 0, // Correction ici
        'promotion_active' => $promotion_active ? 1 : 0,
        'total_promotions' => count($promotions),
    ];

    $session['set']('promotion_active', $promotion_active);

    render_view('promotions/index', [
        'title' => 'Promotions',
        'promotions' => $paginationData['items'],
        'promotion_active' => $promotion_active,
        'apprenants' => $model['get_apprenants'](),
        'referentiels' => $model['get_referentiels'](),
        'errors' => $errors,
        'vue' => $vue,
        'search' => $search,
        'filter' => $filter,
        'ref_filter' => $ref_filter,
        'pagination' => $paginationData['pagination'],
        'stats' => $stats,
        'post_data' => $_POST,
        'showForm' => $showForm,
    ]);
}

function store_promotion(): void
{
    global $model, $validator;

    $data = $model['json_to_array'](__DIR__ . '/../data/data.json');
    $promotions = $data['promotions'] ?? [];

    $inputs = [
        'nom' => $_POST['nom'] ?? '',
        'date_debut' => $_POST['date_debut'] ?? '',
        'date_fin' => $_POST['date_fin'] ?? '',
        'referentiels' => $_POST['referentiels'] ?? [],
        'photo' => $_FILES['photo'] ?? []
    ];

    $errors = $validator['validate_promotion']($inputs, $promotions);

    if (!empty($errors)) {
        index_promotions($errors);
        return;
    }

    $photoName = save_photo($inputs['photo']);
    if (!$photoName) {
        $errors['photo'] = "Impossible d'uploader l'image.";
        $errors['photo.size'] = 'La photo ne doit pas dépasser 2 Mo.';
        $errors['photo.type'] = 'Le fichier doit être une image valide (jpg, jpeg, png).';
        index_promotions($errors);
        return;
    }

    $newId = count($promotions) + 1;
    $promotions[] = [
        'id' => $newId,
        'nom' => $inputs['nom'],
        'date_debut' => $inputs['date_debut'],
        'date_fin' => $inputs['date_fin'],
        'image' => $photoName,
        'referentiels' => $inputs['referentiels']
    ];

    $data['promotions'] = $promotions;
    $model['array_to_json'](__DIR__ . '/../data/data.json', $data);

    redirect_to_route('?route=promotions&success=1');
}

function activer_promotion(): void
{
    global $model;
    global $session;

    

    $id = isset($_GET['id']) ? intval($_GET['id']) : null;

    if ($id !== null) {
        $data = $model['json_to_array'](__DIR__ . '/../data/data.json');

        foreach ($data['promotions'] as &$promo) {
            if ($promo['id'] === $id) {
                $promo['statut'] = 'actif'; // Activer la promotion sélectionnée
                $data['promotion_active'] = $id; // Mettre à jour la promotion active
                $session['set']('promotion_active', $promo);
            } else {
                $promo['statut'] = 'inactif'; // Désactiver les autres promotions
            }
        }

        $model['array_to_json'](__DIR__ . '/../data/data.json', $data);
    }

    redirect_to_route('?route=promotions');
}

function desactiver_promotion(): void
{
    global $model;
    global $session;

    $id = isset($_GET['id']) ? intval($_GET['id']) : null;

    if ($id !== null) {
        $data = $model['json_to_array'](__DIR__ . '/../data/data.json');

        // Désactiver la promotion sélectionnée
        foreach ($data['promotions'] as &$promo) {
            if ($promo['id'] === $id) {
                $promo['statut'] = 'inactif';
            }
        }

        // Trouver la promotion avec l'année la plus grande
        $nextActivePromo = null;
        foreach ($data['promotions'] as $promo) {
            if ($promo['statut'] === 'inactif') {
                $promoYear = (int)substr($promo['date_debut'], 0, 4); // Extraire l'année de la date de début
                if ($nextActivePromo === null || $promoYear > $nextActivePromo['year']) {
                    $nextActivePromo = [
                        'id' => $promo['id'],
                        'year' => $promoYear
                    ];
                }
            }
        }

        // Activer la promotion avec l'année la plus grande
        if ($nextActivePromo !== null) {
            foreach ($data['promotions'] as &$promo) {
                if ($promo['id'] === $nextActivePromo['id']) {
                    $promo['statut'] = 'actif';
                    $data['promotion_active'] = $promo['id'];
                    $session['set']('promotion_active', $promo);
                }
            }
        } else {
            // Si aucune promotion n'est disponible, supprimer la promotion active
            $data['promotion_active'] = null;
        }

        $model['array_to_json'](__DIR__ . '/../data/data.json', $data);
    }

    redirect_to_route('?route=promotions');
}

function validate_promotion($inputs)
{
    $errors = [];

    // Nom de la promotion
    if (empty($inputs['nom'])) {
        $errors['nom'] = "Le nom de la promotion est requis.";
    }

    // Dates
    if (empty($inputs['date_debut'])) {
        $errors['date_debut'] = "La date de début est requise.";
    }
    if (empty($inputs['date_fin'])) {
        $errors['date_fin'] = "La date de fin est requise.";
    } elseif (strtotime($inputs['date_debut']) > strtotime($inputs['date_fin'])) {
        $errors['date_fin'] = "La date de fin doit être postérieure à la date de début.";
    }

    // Photo
    if (!empty($inputs['photo']['name']) && !in_array(pathinfo($inputs['photo']['name'], PATHINFO_EXTENSION), ['jpg', 'jpeg', 'png'])) {
        $errors['photo'] = "Le fichier doit être une image valide (jpg, jpeg, png).";
    }

    // Référentiels
    if (empty($inputs['referentiels'])) {
        $errors['referentiels'] = "Au moins un référentiel doit être sélectionné.";
    }

    return $errors;
}

function getPaginatedPromotions(array $promotions, int $page, int $perPage): array
{
    $totalItems = count($promotions);
    $totalPages = ceil($totalItems / $perPage);

    $currentPage = max(1, min($page, $totalPages));
    $startIndex = ($currentPage - 1) * $perPage;
    $paginatedPromotions = array_slice($promotions, $startIndex, $perPage);

    return [
        'promotions' => $paginatedPromotions,
        'pagination' => [
            'current' => $currentPage,
            'total' => $totalPages,
            'totalItems' => $totalItems,
            'perPage' => $perPage,
        ],
    ];
}
