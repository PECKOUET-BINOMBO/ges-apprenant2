<?php
namespace App\Controllers;

require_once __DIR__ . '/controller.php';
require_once __DIR__ . '/../models/model.php';

use function App\Controllers\render_view;

$model = include __DIR__ . '/../models/model.php';

function index_dashboard(): void {
    global $model;

    $apprenants = $model['get_apprenants']();
    $referentiels = $model['get_referentiels']();

    $total_apprenants = count($apprenants);
    $total_referentiels = count($referentiels);
    $total_stagiaires = 0; // valeur par défaut ou à calculer selon logique
    $total_permanents = 0; // idem

    render_view('dashboard/index', [
        'title' => 'Tableau de bord',
        'total_apprenants' => $total_apprenants,
        'total_referentiels' => $total_referentiels,
        'total_stagiaires' => $total_stagiaires,
        'total_permanents' => $total_permanents
    ]);
}
