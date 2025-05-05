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

function index_apprenants(): void
{
    global $model;

    $promotion_id = $model['get_promotion_active']();
    $apprenants = $model['get_apprenants']() ?? [];
    $apprenants = array_filter($apprenants, fn($a) => $a['promotion_id'] === $promotion_id);
    $referentiels = $model['get_referentiels']();

    // Appliquer les filtres de recherche
    if (!empty($_GET['search']) || !empty($_GET['referentiel']) || !empty($_GET['statut'])) {
        $search = $_GET['search'] ?? '';
        $referentiel_id = !empty($_GET['referentiel']) ? (int)$_GET['referentiel'] : null;
        $statut = $_GET['statut'] ?? '';

        $apprenants = array_filter($apprenants, function($apprenant) use ($search, $referentiel_id, $statut) {
            $match = true;

            // Filtrer par matricule
            if (!empty($search)) {
                $matricule_match = stripos($apprenant['matricule'], $search) !== false;
                $match = $match && $matricule_match;
            }

            // Filtrer par référentiel
            if ($referentiel_id !== null) {
                $referentiel_match = $apprenant['referentiel_id'] === $referentiel_id;
                $match = $match && $referentiel_match;
            }

            // Filtrer par statut (actif/inactif)
            if (!empty($statut)) {
                // Si un champ statut existe dans l'apprenant
                $statut_match = isset($apprenant['statut']) && $apprenant['statut'] === $statut;
                $match = $match && $statut_match;
            }

            return $match;
        });
    }

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



function show_apprenant_details(): void
{
    global $model;

    $id = $_GET['id'] ?? null;

    if (!$id || !is_numeric($id)) {
        redirect_to_route('?route=apprenants');
        return;
    }

    $apprenant = $model['find_apprenant_by_id']((int)$id);

    if (!$apprenant) {
        render_view('pages/erreur', ['message' => 'Apprenant introuvable']);
        return;
    }

    // Calculer les statistiques dynamiques
    $historique = $apprenant['historique_presences'] ?? [];
    $apprenant['presences'] = count(array_filter($historique, fn($h) => $h['statut'] === 'Présent'));
    $apprenant['retards'] = count(array_filter($historique, fn($h) => $h['statut'] === 'Retard'));
    $apprenant['absences'] = count(array_filter($historique, fn($h) => $h['statut'] === 'Absent'));

    render_view('apprenants/details', ['apprenant' => $apprenant]);
}




