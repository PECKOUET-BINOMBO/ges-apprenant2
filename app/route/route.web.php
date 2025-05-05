<?php

namespace App\Routes;

require_once __DIR__ . '/../controllers/auth.controller.php';
require_once __DIR__ . '/../controllers/error.controller.php';
require_once __DIR__ . '/../controllers/controller.php';
require_once __DIR__ . '/../controllers/promotion.controller.php';
require_once __DIR__ . '/../controllers/referentiels.controller.php';
require_once __DIR__ . '/../controllers/apprenants.controller.php';
require_once __DIR__ . '/../controllers/dashboard.controller.php';

use function App\Controllers\show_login;
use function App\Controllers\handle_login;
use function App\Controllers\error_404;
use function App\Controllers\index_promotions;
use function App\Controllers\store_promotion;
use function App\Controllers\activer_promotion;
use function App\Controllers\desactiver_promotion;
use function App\Controllers\index_referentiels;
use function App\Controllers\ajouter_referentiel_a_promotion;
use function App\Controllers\supprimer_referentiel_de_promotion;
use function App\Controllers\store_referentiel;
use function App\Controllers\index_apprenants;
use function App\Controllers\store_apprenant;
use function App\Controllers\show_apprenant_details;
use function App\Controllers\index_dashboard;
use function App\Controllers\logout;
use function App\Controllers\show_forgot;
use function App\Controllers\handle_forgot;
use function App\Controllers\handle_reset;

$session = include __DIR__ . '/../services/session.service.php';

function load_router(): void
{
    global $session;

    $route = $_GET['route'] ?? 'dashboard';

    switch ($route) {
        case 'login':
            show_login();
            break;

        case 'login_post':
            handle_login();
            break;

        case 'dashboard':
            index_dashboard();
            break;

        case 'promotions':
            index_promotions();
            break;

        case 'promotion_store':
            store_promotion();
            break;

        case 'activate_promotion':
            activer_promotion();
            break;

        case 'desactiver_promotion':
            desactiver_promotion();
            break;

        case 'referentiels':
            index_referentiels();
            break;

        case 'store_referentiel':
            store_referentiel();
            break;

        case 'ajouter_referentiel_a_promotion':
            ajouter_referentiel_a_promotion();
            break;

        case 'supprimer_referentiel_de_promotion':
            supprimer_referentiel_de_promotion();
            break;

        case 'apprenants':
            index_apprenants();
            break;

        case 'apprenant_details': // Route pour afficher les détails d'un apprenant
            show_apprenant_details();
            break;

        case 'forgot':
            show_forgot();
            break;

        case 'forgot_post':
            handle_forgot();
            break;

        case 'reset_post':
            handle_reset();
            break;

        case 'logout':
            logout();
            break;

        default:
            error_404();
    }
}