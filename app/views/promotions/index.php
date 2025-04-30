
<!-- ------------------------------------------------------------STYLE CSS------------------------------------------------------------ -->
<style>
    .content {
        width: 100%;
    }

    /* Header Section */
    .topbar {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 20px;
    }

    .topbar h1 {
        color: #00AA8C;
        font-size: 1.8rem;
        margin-bottom: 5px;
    }

    .topbar p {
        color: #71767E;
        font-size: 0.9rem;
    }

    /* Button Styles */
    .btn-orange,
    .btn-search {
        background-color: #FF6F2C;
        color: white;
        border: none;
        border-radius: 4px;
        padding: 10px 15px;
        cursor: pointer;
        font-weight: 500;
        transition: background-color 0.3s;
    }

    .btn-orange:hover,
    .btn-search:hover {
        background-color: #e55a1a;
    }

    /* Stats Cards */
    .box-card {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
        gap: 20px;
        margin-bottom: 30px;
    }

    .card {
        background-color: #FF6F2C;
        border-radius: 10px;
        color: white;
        padding: 20px;
        position: relative;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .count-box h2 {
        font-size: 2rem;
        font-weight: bold;
        margin-bottom: 5px;
    }

    .count-box p {
        font-size: 0.9rem;
        opacity: 0.8;
    }

    .icon {
        font-size: 2rem;
        opacity: 0.8;
    }

    /* Search and Filter Section */
    .filtre-affichage {
        margin-bottom: 20px;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .search-form {
        display: flex;
        gap: 15px;
        align-items: center;
        flex: 1;
    }

    .search {
        position: relative;
        flex-grow: 1;
    }

    .search input {
        width: 100%;
        padding: 10px 15px 10px 40px;
        border: 1px solid #ddd;
        border-radius: 4px;
        font-size: 0.9rem;
    }

    .search i {
        position: absolute;
        left: 15px;
        top: 50%;
        transform: translateY(-50%);
        color: #71767E;
    }

    .filter select {
        padding: 10px 15px;
        border: 1px solid #ddd;
        border-radius: 4px;
        background-color: white;
        min-width: 120px;
    }

    /* View Toggle */
    .affichage {
        display: flex;
        justify-content: flex-end;
        margin-left: 20px;
    }

    .affichage2 {
        display: flex;
        justify-content: flex-end;
        margin-left: 20px;
        margin-bottom: 20px;
    }

    .view {
        display: flex;
        border: 1px solid #ddd;
        border-radius: 4px;
        overflow: hidden;
    }

    .view a {
        padding: 8px 15px;
        text-decoration: none;
        color: #333;
        background-color: #f5f5f5;
    }

    .view a.activeaffichage {
        background-color: #FF6F2C;
        color: white;
    }

    /* Grid View */
    .grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
        gap: 20px;
        margin-bottom: 30px;
    }

    .grid .card {
        background-color: white;
        color: #333;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        flex-direction: column;
        overflow: hidden;
    }

    .interrupteur {
        display: inline-block;
        padding: 10px;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        border-radius: 20px;
        position: relative;
    }

    .badge {
        padding: 5px 10px;
        border-radius: 15px;
        font-size: 0.8rem;
    }

    .badge-active {
        background-color: #E6F7F4;
        color: #00AA8C;
    }

    .btn-link {
        color: #FF6F2C;
        text-decoration: none;
        padding: 5px 10px;
        border-radius: 15px;
        background-color: #FEE4DA;
        font-size: 0.8rem;
    }

    .img-titre-date {
        padding: 0 0 15px;
        display: flex;
        align-items: center;
        width: 100%;
    }

    .img {
        text-align: center;
        width: 70px;
        height: 70px;
        border-radius: 50%;
        margin-right: 10px;
    }

    .img img {
        width: 100%;
        height: 100%;
        border-radius: 50%;
        object-fit: cover;
        border: 3px solid #f0f0f0;
        object-position: center;
    }

    .titre {
        margin-bottom: 15px;
    }

    .titre h3 {
        font-size: 1.1rem;
        margin-bottom: 5px;
        color: #333;
    }

    .titre p {
        font-size: 0.85rem;
        color: #71767E;
    }

    .count-apprenant {
        display: flex;
        align-items: center;
        margin-bottom: 15px;
        gap: 10px;
        width: 100%;
        padding: 15px;
        border-radius: 7px;
        background-color: #F7FBFC;
    }

    .count-apprenant i {
        color: #333;
    }

    .count-apprenant p {
        font-weight: bold;
    }

    .count-apprenant h4 {
        font-size: 0.9rem;
        font-weight: normal;
        color: #71767E;
    }

    .details {
        display: flex;
        justify-content: end;
        align-items: center;
        padding-top: 15px;
        width: 100%;
    }

    .hr {
        width: 100%;
        border-radius: 100px;
    }

    .details span {
        color: #00AA8C;
        font-size: 0.85rem;
        margin-right: 10px;
    }

    .details i {
        color: #00AA8C;
    }

    /* List View */
    .list-container {
        margin-bottom: 30px;
        overflow-x: auto;
    }

    table.list {
        width: 100%;
        border-collapse: collapse;
        background-color: white;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        border-radius: 10px;
        overflow: hidden;
    }

    table.list th,
    table.list td {
        padding: 15px 20px;
        text-align: left;
    }

    table.list th {
        background-color: #FF6F2C;
        color: white;
        font-weight: 500;
    }

    table.list tr {
        border-bottom: 1px solid #eee;
    }

    table.list tr:last-child {
        border-bottom: none;
    }

    table.list td img {
        width: 40px;
        height: 40px;
        border-radius: 50%;
        object-fit: cover;
    }

    .actions {
        position: relative;
        display: inline-block;
        padding: 0 10px;
        border-radius: 15px;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    }

    .action-icon {
        cursor: pointer;
        color: red;
    }

    .action-menu {
        position: absolute;
        right: 0;
        background-color: white;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.2);
        border-radius: 4px;
        padding: 5px 0;
        display: none;
        z-index: 10;
        min-width: 120px;
    }

    .actions:hover .action-menu {
        display: block;
    }

    .action-menu a {
        display: block;
        padding: 8px 15px;
        color: #333;
        text-decoration: none;
    }

    .action-menu a:hover {
        background-color: #f5f5f5;
    }

    /* Pagination */
    .box-pagination {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-top: 20px;
    }

    .number-pagination select {
        padding: 5px 10px;
        border: 1px solid #ddd;
        border-radius: 4px;
        margin-left: 5px;
    }

    .count-pagination {
        color: #71767E;
        font-size: 0.9rem;
    }

    .pagination {
        display: flex;
        gap: 5px;
    }

    .pagination a {
        display: flex;
        justify-content: center;
        align-items: center;
        width: 30px;
        height: 30px;
        border-radius: 4px;
        text-decoration: none;
        color: #333;
        background-color: #f5f5f5;
    }

    .pagination a.active-page {
        background-color: #FF6F2C;
        color: white;
    }


    .referentiels-selection {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 10px;
        margin-bottom: 20px;
    }

    .referentiel-item {
        display: flex;
        align-items: center;
        gap: 5px;
    }

    .form-buttons {
        display: flex;
        justify-content: flex-end;
        gap: 10px;
        margin-top: 20px;
    }

    .form-buttons button {
        padding: 10px 15px;
        border-radius: 4px;
        cursor: pointer;
    }

    .form-buttons button:first-child {
        background-color: #f5f5f5;
        border: 1px solid #ddd;
        color: #333;
    }

    /* Utility Classes */
    .hidden {
        display: none;
    }

    .success-message {
        background-color: #E6F7F4;
        color: #00AA8C;
        padding: 15px;
        border-radius: 4px;
        margin-bottom: 20px;
    }

    .error-box {
        background-color: #FEE4DA;
        color: #FF6F2C;
        padding: 15px;
        border-radius: 4px;
        margin-bottom: 20px;
    }

    .error-message {
        color: red;
        font-size: 0.9em;
        margin-top: 5px;
    }

    .error-box ul {
        margin-left: 20px;
    }

    .no-results {
        text-align: center;
        padding: 30px;
        color: #71767E;
    }

    /* Responsive Adjustments */
    @media (max-width: 768px) {
        .search-form {
            flex-direction: column;
            align-items: stretch;
        }

        .box-pagination {
            flex-direction: column;
            gap: 15px;
        }

        .referentiels-selection {
            grid-template-columns: 1fr;
        }
    }

    .form-panel {
        background-color: white;
        padding: 25px;
        border-radius: 10px;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        margin-bottom: 20px;
    }

    .form-panel h2 {
        margin-bottom: 20px;
        color: #333;
        font-size: 1.2rem;
    }

    .form-panel label {
        display: block;
        margin-bottom: 8px;
        font-weight: 500;
        color: #333;
    }

    .form-panel input[type="text"],
    .form-panel input[type="date"] {
        width: 100%;
        padding: 10px;
        margin-bottom: 15px;
        border: 1px solid #ddd;
        border-radius: 4px;
        font-size: 0.9rem;
    }

    .photo-upload {
        margin-bottom: 15px;
    }

    .upload-box {
        border: 1px dashed #ddd;
        padding: 15px;
        text-align: center;
        border-radius: 4px;
        margin-bottom: 5px;
        cursor: pointer;
    }

    .upload-label {
        display: block;
        cursor: pointer;
    }

    .upload-button {
        color: #FF6F2C;
        font-weight: 500;
        margin-bottom: 5px;
    }

    .upload-text {
        color: #71767E;
        font-size: 0.85rem;
    }

    .format-info {
        color: #71767E;
        font-size: 0.75rem;
    }

    .referentiel-search {
        position: relative;
        margin-bottom: 10px;
    }

    .referentiel-search i {
        position: absolute;
        left: 10px;
        top: 50%;
        transform: translateY(-50%);
        color: #71767E;
    }

    .referentiel-search input {
        width: 100%;
        padding: 10px 10px 10px 30px;
        border: 1px solid #ddd;
        border-radius: 4px;
        font-size: 0.9rem;
    }

    .referentiels-selection {
        max-height: 150px;
        overflow-y: auto;
        border: 1px solid #ddd;
        border-radius: 4px;
        padding: 10px;
        margin-bottom: 20px;
    }

    .referentiel-item {
        display: flex;
        align-items: center;
        gap: 8px;
        padding: 5px 0;
    }

    .form-buttons {
        display: flex;
        justify-content: flex-end;
        gap: 10px;
        margin-top: 20px;
    }

    .btn-cancel {
        background-color: #f5f5f5;
        border: 1px solid #ddd;
        color: #333;
        padding: 10px 15px;
        border-radius: 4px;
        cursor: pointer;
    }

    .btn-orange {
        background-color: #FF6F2C;
        color: white;
        border: none;
        border-radius: 4px;
        padding: 10px 15px;
        cursor: pointer;
        font-weight: 500;
        transition: background-color 0.3s;
    }

    .btn-orange:hover {
        background-color: #e55a1a;
    }

    .con {
        display: flex;
        align-items: center;
    }

    .box-interrupteur {
        width: 100%;
        display: flex;
        align-items: center;
        justify-content: end;
        margin-bottom: 20px;
    }

    .title-liste {
        display: flex;
        align-items: center;
        gap: 7px;

    }

    .title-liste p {
        font-size: 0.75rem;
        color: #e55a1a;
        background: #ff6f2c1c;
        padding: 5px 10px;
        border-radius: 20px;
    }

    .fa-circle {
        font-size: 0.4rem !important;
        margin-right: 5px;
    }

    .puce {
        display: flex;
        align-items: center;
        justify-content: center;
    }
</style>
<div class="layout">
    <div class="content">

        <!-- ------------------------------------------------------------AFFICHAGE GRILLE------------------------------------------------------------ -->
        <div id="gridView" class="<?= $vue === 'grille' ? '' : 'hidden' ?>">

            <!-- ------------------------------------------------------------TITRE ET BUTTON AJOUTER------------------------------------------------------------ -->

            <div class="topbar">

                <div>
                    <h1>Promotion</h1>
                    <p>Gérer les promotions de l'école</p>
                </div>

                <div>
                    <button type="button" id="show-form-button" class="btn-orange">+ Ajouter une promotion</button>
                </div>
            </div>

            <!-- ------------------------------------------------------------MESSAGE------------------------------------------------------------ -->

            <?php if (isset($_GET['success'])): ?>
                <div class="success-message">
                    <p>La promotion a été ajoutée avec succès.</p>
                </div>
            <?php endif; ?>

            <!-- ------------------------------------------------------------CARDS STATISTIQUES------------------------------------------------------------ -->

            <div class="box-card">
                <div class="card">
                    <div class="count-box">
                        <h2><?= $stats['total_apprenants'] ?></h2>
                        <p>Apprenants</p>
                    </div>
                    <div class="icon">
                        <i class="fa-solid fa-user-group"></i>
                    </div>
                </div>
                <div class="card">
                    <div class="count-box">
                        <h2><?= $stats['total_referentiels'] ?></h2>
                        <p>Référentiels</p>
                    </div>
                    <div class="icon">
                        <i class="fa-solid fa-book"></i>
                    </div>
                </div>
                <div class="card">
                    <div class="count-box">
                        <h2><?= $stats['promotion_active'] ?></h2>
                        <p>Promotions actives</p>
                    </div>
                    <div class="icon">
                        <i class="fa-solid fa-check"></i>
                    </div>
                </div>
                <div class="card">
                    <div class="count-box">
                        <h2><?= $stats['total_promotions'] ?></h2>
                        <p>Total promotions</p>
                    </div>
                    <div class="icon">
                        <i class="fa-regular fa-folder"></i>
                    </div>
                </div>
               
            </div>

            <!-- ------------------------------------------------------------FORMULAIRE D'AJOUT------------------------------------------------------------ -->
            <div id="form-container" class="form-panel" style="display: <?= ($showForm || !empty($errors)) ? 'block' : 'none' ?>;">

                <h2>Créer une nouvelle promotion</h2>
                <form action="?route=promotion_store" method="post" enctype="multipart/form-data">
                    <!-- Nom de la promotion -->
                    <div style="margin-bottom: 20px;">
                        <label style="display: block; margin-bottom: 8px; font-weight: 500;">Nom de la promotion</label>
                        <input type="text" name="nom" value="<?= htmlspecialchars($_POST['nom'] ?? '') ?>" style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 4px;" placeholder="Promotion 2025">
                        <?php if (!empty($errors['nom'])): ?>
                            <p class="error-message"><?= $errors['nom'] ?></p>
                        <?php endif; ?>
                    </div>

                    <!-- Dates -->
                    <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px; margin-bottom: 20px;">
                        <div>
                            <label style="display: block; margin-bottom: 8px; font-weight: 500;">Date de début</label>
                            <input type="text" name="date_debut" value="<?= htmlspecialchars($_POST['date_debut'] ?? '') ?>" style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 4px;" placeholder="24/04/2025">
                            <?php if (!empty($errors['date_debut'])): ?>
                                <p class="error-message"><?= $errors['date_debut'] ?></p>
                            <?php endif; ?>
                        </div>
                        <div>
                            <label style="display: block; margin-bottom: 8px; font-weight: 500;">Date de fin</label>
                            <input type="text" name="date_fin" value="<?= htmlspecialchars($_POST['date_fin'] ?? '') ?>" style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 4px;" placeholder="28/05/2025">
                            <?php if (!empty($errors['date_fin'])): ?>
                                <p class="error-message"><?= $errors['date_fin'] ?></p>
                            <?php endif; ?>
                        </div>
                    </div>

                    <!-- Photo -->
                    <div style="margin-bottom: 20px;">
                        <label style="display: block; margin-bottom: 8px; font-weight: 500;">Photo de la promotion</label>
                        <div style="display: flex;">
                            <div style="position: relative; width: 94px; height: 94px; border: 1px dashed #ccc; display: flex; flex-direction: column; justify-content: center; align-items: center; margin-right: 20px;">
                                <input type="file" name="photo" accept="image/png,image/jpeg" style="position: absolute; width: 100%; height: 100%; opacity: 0; cursor: pointer; z-index: 2;">
                                <button style="background-color: white; color: #F76707; border: none; font-weight: 500; pointer-events: none;">Ajouter</button>
                                <span style="color: #888; font-size: 12px; pointer-events: none;">ou glisser</span>
                            </div>
                            <div style="align-self: center; color: #888; font-size: 14px;">
                                Format JPG, PNG. Taille max 2MB
                            </div>
                        </div>
                        <?php if (!empty($errors['photo'])): ?>
                            <p class="error-message"><?= $errors['photo'] ?></p>
                        <?php endif; ?>
                        <?php if (!empty($errors['photo.type'])): ?>
                            <p class="error-message"><?= $errors['photo.type'] ?></p>
                        <?php endif; ?>
                        <?php if (!empty($errors['photo.size'])): ?>
                            <p class="error-message"><?= $errors['photo.size'] ?></p>
                        <?php endif; ?>
                    </div>

                    <!-- Référentiels -->
                    <div style="margin-bottom: 20px;">
                        <label style="display: block; margin-bottom: 8px; font-weight: 500;">Référentiels</label>
                        <div style="max-height: 150px; overflow-y: auto; border: 1px solid #ddd; border-radius: 4px; padding: 10px;">
                            <?php foreach ($referentiels as $ref): ?>
                                <div style="display: flex; align-items: center; gap: 8px; padding: 5px 0;">
                                    <input type="checkbox" id="ref-<?= $ref['id'] ?>" name="referentiels[]" value="<?= $ref['id'] ?>" <?= in_array($ref['id'], $_POST['referentiels'] ?? []) ? 'checked' : '' ?>>
                                    <label for="ref-<?= $ref['id'] ?>" style="cursor: pointer;"><?= htmlspecialchars($ref['nom']) ?></label>
                                </div>
                            <?php endforeach; ?>
                        </div>
                        <?php if (!empty($errors['referentiels'])): ?>
                            <p class="error-message"><?= $errors['referentiels'] ?></p>
                        <?php endif; ?>
                    </div>

                    <!-- Boutons -->
                    <div style="display: flex; justify-content: flex-end; gap: 10px; margin-top: 20px;">
                        <button type="button" id="hide-form-button" style="padding: 10px 15px; border-radius: 4px; background-color: #f5f5f5; border: 1px solid #ddd; color: #333; cursor: pointer;">Annuler</button>
                        <button type="submit" style="padding: 10px 15px; border-radius: 4px; background-color: #FF6F2C; color: white; border: none; cursor: pointer;">Créer la promotion</button>
                    </div>
                </form>
            </div>



            <!-- ------------------------------------------------------------BOX-FILTE-CARDS-GRILLE------------------------------------------------------------ -->
            <div class="box-filtre-cards-grille">
                <!-- ------------------------------------------------------------RECHERCHE ET FILTRE ET BUTTON GRILLE LISTE------------------------------------------------------------ -->

                <div class="filtre-affichage">
                    <form action="?route=promotions" method="GET" class="search-form">
                        <input type="hidden" name="route" value="promotions">
                        <input type="hidden" name="vue" value="<?= $vue ?>">

                        <div class="search">
                            <i class="fas fa-search"></i>
                            <input type="text" id="search" name="search" placeholder="Rechercher..." value="<?= htmlspecialchars($search) ?>">
                        </div>

                        <div class="filter">
                            <select id="filter" name="filter">
                                <option value="all" <?= $filter === 'all' ? 'selected' : '' ?>>Tous</option>
                                <option value="active" <?= $filter === 'active' ? 'selected' : '' ?>>Actif</option>
                                <option value="inactive" <?= $filter === 'inactive' ? 'selected' : '' ?>>Inactif</option>
                            </select>
                        </div>

                        <button type="submit" class="btn-search">Appliquer</button>
                    </form>

                    <!-- ------------------------------------------------------------BUTTON GRILLE LISTE------------------------------------------------------------ -->

                    <div class="affichage">
                        <div class="view">
                            <a href="?route=promotions&vue=grille" class="<?= $vue === 'grille' ? 'activeaffichage' : '' ?>">Grille</a>
                            <a href="?route=promotions&vue=liste" class="<?= $vue === 'liste' ? 'activeaffichage' : '' ?>">Liste</a>
                        </div>
                    </div>
                </div>


                <!-- ------------------------------------------------------------CARDS PROMOTIONS------------------------------------------------------------ -->
                <div class="grid">
                    <?php if (empty($promotions)): ?>
                        <div class="no-results">
                            <p>Aucune promotion trouvée</p>
                        </div>
                    <?php else: ?>
                        <?php foreach ($promotions as $promo): ?>
                            <div class="card">
                                <div class="box-interrupteur">
                                    <div class="interrupteur">
                                        <?php if ($promo['id'] == $promotion_active['id']): ?>
                                            <span class="badge badge-active">Active</span>
                                            <span style="margin-left: 6px; color: #FF6F2C;text-decoration: none;padding: 5px 10px;border-radius: 15px;background-color: #ff6f2c42;font-size: 0.8rem;"><i class="fa-solid fa-power-off"></i></span>
                                        <?php else: ?>
                                            <a href="?route=activate_promotion&id=<?= htmlspecialchars($promo['id']) ?>&vue=grille" class="btn-link">Inactive</a>
                                            <span style="margin-left: 6px; color: #2ECC40; text-decoration: none;padding: 5px 10px;border-radius: 15px;background-color: #2ecc4040;font-size: 0.8rem;"><i class="fa-solid fa-power-off"></i></span>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <div class="img-titre-date">
                                    <div class="img">
                                        <img src="<?= !empty($promo['image']) ? 'assets/uploads/' . htmlspecialchars($promo['image']) : 'assets/images/default-promo.jpg' ?>" alt="">
                                    </div>
                                    <div class="titre">
                                        <h3><?= htmlspecialchars($promo['nom']) ?></h3>
                                        <p><i class="fas fa-calendar"></i> <?= date('d/m/Y', strtotime($promo['date_debut'])) ?> - <?= date('d/m/Y', strtotime($promo['date_fin'])) ?></p>
                                    </div>
                                </div>
                                <div class="count-apprenant">
                                    <i class="fa-solid fa-user-group"></i>
                                    <p><?= count(array_filter($apprenants, function ($a) use ($promo) {
                                            return isset($a['promotion_id']) && $a['promotion_id'] == $promo['id'];
                                        })) ?></p>
                                    <h4>Apprenants</h4>
                                </div>
                                <hr class="hr">
                                <div class="details">
                                    <span>Voir détails</span>
                                    <i class="fa-solid fa-chevron-right"></i>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </div>
            </div>

        </div>




        <!-- ------------------------------------------------------------AFFICHAGE LISTE------------------------------------------------------------ -->
        <div id="listView" class="<?= $vue === 'liste' ? '' : 'hidden' ?>">

            <!-- ------------------------------------------------------------TITRE----------------------------------------------------------- -->

            <div class="topbar">
                <div class="title-liste">
                    <h1>Promotion</h1>
                    <p><span><?= $stats['total_apprenants'] ?></span> apprenants</p>
                </div>
            </div>

            <!-- ------------------------------------------------------------MESSAGES------------------------------------------------------------ -->

            <?php if (isset($_GET['success'])): ?>
                <div class="success-message">
                    <p>La promotion a été ajoutée avec succès.</p>
                </div>
            <?php endif; ?>

            <!-- ------------------------------------------------------------RECHERCHE FILTRE ET BUTTON D'AJOUT------------------------------------------------------------ -->

            <div class="filtre-affichage">
                <form action="?route=promotions" method="GET" class="search-form">
                    <input type="hidden" name="route" value="promotions">
                    <input type="hidden" name="vue" value="liste"> <!-- Vue définie sur "liste" -->

                    <!-- Recherche -->
                    <div class="search">
                        <i class="fas fa-search"></i>
                        <input type="text" id="search" name="search" placeholder="Rechercher..." value="<?= htmlspecialchars($search) ?>">
                    </div>

                    <!-- Filtre par référentiels -->
                    <div class="filter">
                        <select id="ref_filter" name="ref_filter">
                            <option value="all">Filtrer par référentiels</option>
                            <?php foreach ($referentiels as $ref): ?>
                                <option value="<?= htmlspecialchars($ref['id']) ?>" <?= isset($_GET['ref_filter']) && $_GET['ref_filter'] == $ref['id'] ? 'selected' : '' ?>><?= htmlspecialchars($ref['nom']) ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <!-- Filtre par statut -->
                    <div class="filter">
                        <select id="filter" name="filter">
                            <option value="all" <?= $filter === 'all' ? 'selected' : '' ?>>Filtrer par statut</option>
                            <option value="active" <?= $filter === 'active' ? 'selected' : '' ?>>Actif</option>
                            <option value="inactive" <?= $filter === 'inactive' ? 'selected' : '' ?>>Inactif</option>
                        </select>
                    </div>

                    <!-- Bouton de soumission -->
                    <button type="submit" class="btn-search">Appliquer</button>
                    <div>
                        <button type="button" id="btnAjoutListe" class="btn-orange">+ Ajouter une promotion</button>
                    </div>
                </form>
            </div>


            <!-- ------------------------------------------------------------CARDS STATISTIQUES------------------------------------------------------------ -->

            <div class="box-card">
                <div class="card">
                    <div class="count-box">
                        <h2><?= $stats['total_apprenants'] ?></h2>
                        <p>Apprenants</p>
                    </div>
                    <div class="icon">
                        <i class="fa-solid fa-user-group"></i>
                    </div>
                </div>
                <div class="card">
                    <div class="count-box">
                        <h2><?= $stats['total_referentiels'] ?></h2>
                        <p>Référentiels</p>
                    </div>
                    <div class="icon">
                        <i class="fa-solid fa-book"></i>
                    </div>
                </div>
                <div class="card">
                    <div class="count-box">
                        <h2><?= $stats['promotion_active'] ?></h2>
                        <p>Promotions actives</p>
                    </div>
                    <div class="icon">
                        <i class="fa-solid fa-check"></i>
                    </div>
                </div>
                <div class="card">
                    <div class="count-box">
                        <h2><?= $stats['total_promotions'] ?></h2>
                        <p>Total promotions</p>
                    </div>
                    <div class="icon">
                        <i class="fa-regular fa-folder"></i>
                    </div>
                </div>
            </div>


            <!-- ------------------------------------------------------------FORMULAIRE D'AJOUT------------------------------------------------------------ -->

            <div id="formAjoutListe" class="form-panel" style="display: <?= (!empty($errors)) ? 'block' : 'none' ?>;">

                <h2>Créer une nouvelle promotion</h2>
                <form action="?route=promotion_store" method="post" enctype="multipart/form-data">
                    <div style="margin-bottom: 20px;">
                        <label style="display: block; margin-bottom: 8px; font-weight: 500;">Nom de la promotion</label>
                        <input type="text" name="nom" value="<?= htmlspecialchars($_POST['nom'] ?? '') ?>" style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 4px;" placeholder="Promotion 2025">
                        <?php if (!empty($errors['nom'])): ?>
                            <p class="error-message"><?= $errors['nom'] ?></p>
                        <?php endif; ?>
                    </div>

                    <!-- Dates -->
                    <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px; margin-bottom: 20px;">
                        <div>
                            <label style="display: block; margin-bottom: 8px; font-weight: 500;">Date de début</label>
                            <input type="text" name="date_debut" value="<?= htmlspecialchars($_POST['date_debut'] ?? '') ?>" style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 4px;" placeholder="24/04/2025">
                            <?php if (!empty($errors['date_debut'])): ?>
                                <p class="error-message"><?= $errors['date_debut'] ?></p>
                            <?php endif; ?>
                        </div>
                        <div>
                            <label style="display: block; margin-bottom: 8px; font-weight: 500;">Date de fin</label>
                            <input type="text" name="date_fin" value="<?= htmlspecialchars($_POST['date_fin'] ?? '') ?>" style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 4px;" placeholder="30/04/2025">
                            <?php if (!empty($errors['date_fin'])): ?>
                                <p class="error-message"><?= $errors['date_fin'] ?></p>
                            <?php endif; ?>
                        </div>
                    </div>

                    <!-- Photo -->
                    <div style="margin-bottom: 20px;">
                        <label style="display: block; margin-bottom: 8px; font-weight: 500;">Photo de la promotion</label>
                        <div style="display: flex;">
                            <div style="position: relative; width: 94px; height: 94px; border: 1px dashed #ccc; display: flex; flex-direction: column; justify-content: center; align-items: center; margin-right: 20px;">
                                <input type="file" name="photo" accept="image/png,image/jpeg" style="position: absolute; width: 100%; height: 100%; opacity: 0; cursor: pointer; z-index: 2;">
                                <button style="background-color: white; color: #F76707; border: none; font-weight: 500; pointer-events: none;">Ajouter</button>
                                <span style="color: #888; font-size: 12px; pointer-events: none;">ou glisser</span>
                            </div>
                            <div style="align-self: center; color: #888; font-size: 14px;">
                                Format JPG, PNG. Taille max 2MB
                            </div>
                        </div>
                        <?php if (!empty($errors['photo'])): ?>
                            <p class="error-message"><?= $errors['photo'] ?></p>
                        <?php endif; ?>
                        <?php if (!empty($errors['photo.type'])): ?>
                            <p class="error-message"><?= $errors['photo.type'] ?></p>
                        <?php endif; ?>
                        <?php if (!empty($errors['photo.size'])): ?>
                            <p class="error-message"><?= $errors['photo.size'] ?></p>
                        <?php endif; ?>
                    </div>

                    <!-- Référentiels -->
                    <div style="margin-bottom: 20px;">
                        <label style="display: block; margin-bottom: 8px; font-weight: 500;">Référentiels</label>
                        <div style="max-height: 150px; overflow-y: auto; border: 1px solid #ddd; border-radius: 4px; padding: 10px;">
                            <?php foreach ($referentiels as $ref): ?>
                                <div style="display: flex; align-items: center; gap: 8px; padding: 5px 0;">
                                    <input type="checkbox" id="ref-<?= $ref['id'] ?>" name="referentiels[]" value="<?= $ref['id'] ?>" <?= in_array($ref['id'], $_POST['referentiels'] ?? []) ? 'checked' : '' ?>>
                                    <label for="ref-<?= $ref['id'] ?>" style="cursor: pointer;"><?= htmlspecialchars($ref['nom']) ?></label>
                                </div>
                            <?php endforeach; ?>
                        </div>
                        <?php if (!empty($errors['referentiels'])): ?>
                            <p class="error-message"><?= $errors['referentiels'] ?></p>
                        <?php endif; ?>
                    </div>

                    <!-- Boutons -->
                    <div style="display: flex; justify-content: flex-end; gap: 10px; margin-top: 20px;">
                        <button type="button" id="hideFormListe" style="padding: 10px 15px; border-radius: 4px; background-color: #f5f5f5; border: 1px solid #ddd; color: #333; cursor: pointer;">Annuler</button>
                        <button type="submit" style="padding: 10px 15px; border-radius: 4px; background-color: #FF6F2C; color: white; border: none; cursor: pointer;">Créer la promotion</button>
                    </div>
                </form>
            </div>


            <!-- ------------------------------------------------------------BOX-FILTE-CARDS-LISTE------------------------------------------------------------ -->

            <div class="box-filtre-cards-liste">
                <!-- ------------------------------------------------------------BUTTON GRILLE LISTE------------------------------------------------------------ -->

                <div class="affichage2">
                    <div class="view">
                        <a href="?route=promotions&vue=grille" class="<?= $vue === 'grille' ? 'activeaffichage' : '' ?>">Grille</a>
                        <a href="?route=promotions&vue=liste" class="<?= $vue === 'liste' ? 'activeaffichage' : '' ?>">Liste</a>
                    </div>
                </div>


                <!-- ------------------------------------------------------------LISTE PROMOTION------------------------------------------------------------ -->

                <div class="list-container">
                    <table class="list">
                        <thead>
                            <tr>
                                <th>Photo</th>
                                <th>Promotion</th>
                                <th>Date de début</th>
                                <th>Date de fin</th>
                                <th>Référentiels</th>
                                <th>Statut</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (empty($promotions)): ?>
                                <tr>
                                    <td colspan="7" class="no-results">Aucune promotion trouvée</td>
                                </tr>
                            <?php else: ?>
                                <?php foreach ($promotions as $promo): ?>
                                    <tr>
                                        <td>
                                            <img src="<?= !empty($promo['image']) ? 'assets/uploads/' . htmlspecialchars($promo['image']) : 'assets/images/default-promo.jpg' ?>" alt="">
                                        </td>
                                        <td><?= htmlspecialchars($promo['nom']) ?></td>
                                        <td><?= date('d/m/Y', strtotime($promo['date_debut'])) ?></td>
                                        <td><?= date('d/m/Y', strtotime($promo['date_fin'])) ?></td>
                                        <td>
                                            <?php
                                            $referentielsNoms = [];
                                            if (!empty($promo['referentiels'])) {
                                                foreach ($promo['referentiels'] as $refId) {
                                                    foreach ($referentiels as $ref) {
                                                        if ($ref['id'] == $refId) {
                                                            $referentielsNoms[] = $ref['nom'];
                                                            break;
                                                        }
                                                    }
                                                }
                                            }
                                            echo !empty($referentielsNoms) ? htmlspecialchars(implode(', ', $referentielsNoms)) : 'Aucun';
                                            ?>
                                        </td>
                                        <td>
                                            <?php if ($promo['id'] == $promotion_active['id']): ?>
                                                <span class="puce badge badge-active"><i class="fa-solid fa-circle"></i> Actif</span>
                                            <?php else: ?>
                                                <a href="?route=activate_promotion&id=<?= $promo['id'] ?>&vue=liste" class="btn-link puce"><i class="fa-solid fa-circle"></i> Inactif</a>
                                            <?php endif; ?>
                                        </td>
                                        <td>
                                            <div class="actions">
                                                <i class="fa-solid fa-ellipsis action-icon"></i>
                                                <div class="action-menu">
                                                    <a href="?route=edit_promotion&id=<?= $promo['id'] ?>">Modifier</a>
                                                    <a href="#">Supprimer</a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>


            </div>


        </div>

        <!-- ------------------------------------------------------------PAGINATION------------------------------------------------------------ -->
        <?php if ($pagination['total'] > 1): ?>
            <div class="box-pagination">
                <div class="number-pagination">
                    <span>page</span>
                    <form action="" method="GET">
                        <input type="hidden" name="route" value="promotions">
                        <input type="hidden" name="vue" value="<?= $vue ?>">
                        <input type="hidden" name="search" value="<?= htmlspecialchars($search) ?>">
                        <input type="hidden" name="filter" value="<?= $filter ?>">
                        <select name="page" id="page-select" onchange="this.form.submit()">
                            <?php for ($i = 1; $i <= $pagination['total']; $i++): ?>
                                <option value="<?= $i ?>" <?= $pagination['current'] == $i ? 'selected' : '' ?>><?= $i ?></option>
                            <?php endfor; ?>
                        </select>
                    </form>
                </div>
                <div class="count-pagination">
                    <span><?= ($pagination['current'] - 1) * $pagination['perPage'] + 1 ?> à <?= min($pagination['current'] * $pagination['perPage'], $pagination['totalItems']) ?> pour <?= $pagination['totalItems'] ?></span>
                </div>
                <div class="pagination">
                    <?php if ($pagination['current'] > 1): ?>
                        <a href="?route=promotions&vue=<?= $vue ?>&search=<?= urlencode($search) ?>&filter=<?= $filter ?>&page=<?= $pagination['current'] - 1 ?>"><i class="fa-solid fa-chevron-left"></i></a>
                    <?php endif; ?>

                    <?php
                    $start = max(1, $pagination['current'] - 2);
                    $end = min($pagination['total'], $pagination['current'] + 2);

                    for ($i = $start; $i <= $end; $i++):
                    ?>
                        <a href="?route=promotions&vue=<?= $vue ?>&search=<?= urlencode($search) ?>&filter=<?= $filter ?>&page=<?= $i ?>" class="<?= $pagination['current'] == $i ? 'active-page' : '' ?>"><?= $i ?></a>
                    <?php endfor; ?>

                    <?php if ($pagination['current'] < $pagination['total']): ?>
                        <a href="?route=promotions&vue=<?= $vue ?>&search=<?= urlencode($search) ?>&filter=<?= $filter ?>&page=<?= $pagination['current'] + 1 ?>"><i class="fa-solid fa-chevron-right"></i></a>
                    <?php endif; ?>
                </div>
            </div>
        <?php endif; ?>

    </div>

</div>




<!-- ------------------------------------------------------------SCRIPT JS------------------------------------------------------------ -->

<script>
    document.addEventListener('DOMContentLoaded', function() {
    // Vérifier si les formulaires sont affichés en raison d'erreurs
    const formContainer = document.getElementById('form-container');
    const formAjoutListe = document.getElementById('formAjoutListe');
    const boxFiltreCardsGrille = document.querySelector('.box-filtre-cards-grille');
    const boxFiltreCardsListe = document.querySelector('.box-filtre-cards-liste');
    const pagination = document.querySelector('.box-pagination');
    
    // Vérifier si les formulaires sont affichés en raison d'erreurs
    if(formContainer && formContainer.style.display === 'block') {
        // Masquer les éléments de la grille quand le formulaire est affiché à cause d'erreurs
        if(boxFiltreCardsGrille) boxFiltreCardsGrille.style.display = 'none';
        if(pagination) pagination.style.display = 'none';
    }
    
    if(formAjoutListe && formAjoutListe.style.display === 'block') {
        // Masquer les éléments de la liste quand le formulaire est affiché à cause d'erreurs
        if(boxFiltreCardsListe) boxFiltreCardsListe.style.display = 'none';
        if(pagination) pagination.style.display = 'none';
    }
    
    // Gestion des menus d'actions
    const actionIcons = document.querySelectorAll('.action-icon');

    actionIcons.forEach(icon => {
        icon.addEventListener('click', function(e) {
            e.stopPropagation();
            const menu = this.nextElementSibling;

            // Fermer tous les autres menus
            document.querySelectorAll('.action-menu').forEach(m => {
                if (m !== menu) {
                    m.style.display = 'none';
                }
            });

            // Basculer le menu actuel
            menu.style.display = menu.style.display === 'block' ? 'none' : 'block';
        });
    });

    // Fermer les menus en cliquant ailleurs
    document.addEventListener('click', function() {
        document.querySelectorAll('.action-menu').forEach(menu => {
            menu.style.display = 'none';
        });
    });

    // Masquer automatiquement les messages de succès après 5 secondes
    const successMessage = document.querySelector('.success-message');
    if (successMessage) {
        setTimeout(function() {
            successMessage.style.display = 'none';
        }, 5000);
    }

    // Gestion du formulaire principal (section grille)
    const showFormButton = document.getElementById('show-form-button');
    const hideFormButton = document.getElementById('hide-form-button');
    
    if (showFormButton && hideFormButton && formContainer) {
        showFormButton.addEventListener('click', function() {
            formContainer.style.display = 'block'; // Afficher le formulaire principal
            if (boxFiltreCardsGrille) boxFiltreCardsGrille.style.display = 'none'; // Masquer la section grille
            if (pagination) pagination.style.display = 'none'; // Masquer la pagination
            formContainer.scrollIntoView({ behavior: 'smooth' }); // Faire défiler jusqu'au formulaire
        });

        hideFormButton.addEventListener('click', function() {
            formContainer.style.display = 'none'; // Masquer le formulaire principal
            if (boxFiltreCardsGrille) boxFiltreCardsGrille.style.display = 'block'; // Réafficher la section grille
            if (pagination) pagination.style.display = 'flex'; // Réafficher la pagination
        });
    }

    // Gestion du formulaire de la liste
    const btnAjoutListe = document.getElementById('btnAjoutListe');
    const hideFormListe = document.getElementById('hideFormListe');
    
    if (btnAjoutListe && hideFormListe && formAjoutListe) {
        btnAjoutListe.addEventListener('click', function() {
            formAjoutListe.style.display = 'block'; // Afficher le formulaire de la liste
            if (boxFiltreCardsListe) boxFiltreCardsListe.style.display = 'none'; // Masquer la section liste
            if (pagination) pagination.style.display = 'none'; // Masquer la pagination
            formAjoutListe.scrollIntoView({ behavior: 'smooth' }); // Faire défiler jusqu'au formulaire
        });

        hideFormListe.addEventListener('click', function() {
            formAjoutListe.style.display = 'none'; // Masquer le formulaire de la liste
            if (boxFiltreCardsListe) boxFiltreCardsListe.style.display = 'block'; // Réafficher la section liste
            if (pagination) pagination.style.display = 'flex'; // Réafficher la pagination
        });
    }
});
</script>