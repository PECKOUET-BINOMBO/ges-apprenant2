<?php
namespace App\Controllers;


function render_view(string $view, array $data = []): void {
    $view_path = __DIR__ . '/../views/' . $view . '.php';

    // Récupérer la route actuelle
    $current_route = $_GET['route'] ?? 'login';
    
    // Injecter le chemin de la vue et la route actuelle dans les données
    $data['view_path'] = $view_path;
    $data['current_route'] = $current_route;

    // Vérifier si la vue est une page d'authentification
    if (str_starts_with($view, 'auth/')) {
        extract($data);
        ob_start();
        require_once $view_path;
        echo ob_get_clean();
        return;
    }

    // Sinon, charger l'utilisateur connecté pour le layout
    $session = include __DIR__ . '/../services/session.service.php';
    $session['start_session']();
    $user = $session['get']('user');
    
    // Stocker la route actuelle dans la session si nécessaire
    $session['set']('current_route', $current_route);

    $data['nom'] = $user['nom'] ?? '';
    $data['prenom'] = $user['prenom'] ?? '';
    $data['email'] = $user['email'] ?? '';
    $data['role'] = $user['role'] ?? '';

    // Récupérer la promotion active et calculer l'année
    $promotion_active = $session['get']('promotion_active');
    $data['promotion_active_year'] = isset($promotion_active['date_debut']) 
        ? date('Y', strtotime($promotion_active['date_debut'])) 
        : 'En cours';

    extract($data);
    ob_start();
    require_once __DIR__ . '/../views/layout/base.layout.php';
    echo ob_get_clean();
}

function redirect_to_route(string $route): void {
    header("Location: $route");
    exit;
}


function save_photo(array $photo): ?string {
    if ($photo['error'] === UPLOAD_ERR_OK) {
        // Génère un nom unique
        $ext  = pathinfo($photo['name'], PATHINFO_EXTENSION);
        $name = uniqid('promo_') . '.' . $ext;

        // Chemin absolu vers public/assets/uploads
        $uploadDir   = __DIR__ . '/../../public/assets/uploads';
        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0755, true);
        }

        $destination = $uploadDir . '/' . $name;
        if (move_uploaded_file($photo['tmp_name'], $destination)) {
            return $name;
        }
    }
    return null;
}

//fonction avec les première lettre des noms et prenoms plus nombre aléatoire pour le matricule
function generate_matricule(string $nom, string $prenom): string {
    $initials = strtoupper(substr($nom, 0, 1) . substr($prenom, 0, 1));
    $random_number = rand(1000, 9999);
    return $initials . $random_number;
}

function generate_password(): string {
    return bin2hex(random_bytes(4)); // 8 caractères aléatoires
}





