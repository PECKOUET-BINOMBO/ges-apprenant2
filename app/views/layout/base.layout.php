<?php
namespace App\Views;
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title><?= isset($title) ? htmlspecialchars($title) . ' - ' : '' ?>ODC - Gestion Apprenants</title>

    <link rel="stylesheet" href="/assets/css/style.css">
</head>
<body>
<div class="layout">
    <!-- Sidebar -->
    <aside class="sidebar">
        <div class="logo">
            <img src="/assets/images/logo.png" alt="Logo Sonatel Academy">
        </div>
        <div class="promo">
            <p>Promotion - <?= htmlspecialchars($promotion_active_year ?? 'Aucune promotion active') ?></p>
        </div>

        <nav>
            <ul>
                <li class="li-sidebar"><a href="?route=dashboard" class="<?= $current_route === 'dashboard' ? 'active' : '' ?>"><i class="fa-solid fa-house"></i>Tableau de bord</a></li>
                <li class="li-sidebar"><a href="?route=promotions" class="<?= $current_route === 'promotions' ? 'active' : '' ?>"><i class="fa-regular fa-folder"></i> Promotions</a></li>
                <li class="li-sidebar"><a href="?route=referentiels" class="<?= $current_route === 'referentiels' ? 'active' : '' ?>"><i class="fa-solid fa-book"></i> Référentiels</a></li>
                <li class="li-sidebar"><a href="?route=apprenants" class="<?= $current_route === 'apprenants' ? 'active' : '' ?>"><i class="fa-solid fa-user-group"></i> Apprenants</a></li>
                <li class="li-sidebar"><a href="#" class=""><i class="fa-solid fa-folder-minus"></i> Gestion des présences</a></li>
                
            </ul>
        </nav>
        <div class="footer-sidebar">
            <ul>
            <li class="li-sidebar"><a href="?route=logout"><i class="fa-solid fa-arrow-right-from-bracket"></i> Déconnexion</a></li>
            </ul>
        </div>
    </aside>

    <!-- Contenu principal -->
    <div class="main-content">
        <!-- Topbar -->
        <header class="topbar">
            <div class="topbar-left">
                <div class="search-bar">
                    <button type="submit"><i class="fas fa-search"></i></button>
                    <input type="text" placeholder="Rechercher...">
                    </div>
                </div>
            <div class="topbar-right">
                <i class="fas fa-bell"></i>
                <div class="user-info">
                    <span class="user-email"><?= htmlspecialchars($prenom .' '. $nom ?? '') ?></span>
                    <span class="user-role"><?= htmlspecialchars($role ?? '') ?></span>
                </div>
                <div class="user-avatar">
                    <p><?= strtoupper(substr($prenom ?? '', 0, 1)) ?></p>
                    <p><?= strtoupper(substr($nom ?? '', 0, 1)) ?></p>
                </div>
            </div>
        </header>

        <!-- Vue spécifique -->
        <main class="page-content">
            <?php require_once $view_path; ?>
        </main>
    </div>
</div>



</body>
</html>
