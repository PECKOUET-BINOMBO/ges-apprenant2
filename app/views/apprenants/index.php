<style>
    .titre {
        display: flex;
        align-items: center;
        color: #3D9B9B;
    }

    .titre span {
        color: #FCAC43;
        background: #FCEFDC;
        padding: 5px 10px;
        border-radius: 10px;
        margin-left: 10px;
        font-size: 14px;
        font-weight: bold;
    }

    .barre-filtre-btn {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin: 20px 0;
    }

    .search-filtre {
        display: flex;
        gap: 10px;
        align-items: center;
    }

    .search-filtre .filtre {
        display: flex;
        align-items: center;
        position: relative;
        width: 100%;
        /* Added width for better layout */
    }

    .search-filtre .filtre i {
        position: absolute;
        left: 10px;
        color: silver;
    }

    .search-filtre input[type="search"] {
        background: white;
        padding: 10px 10px 10px 30px;
        border-radius: 5px;
        border: 1px solid #ccc;
        width: 100%;
        /* Added width for better layout */
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        outline: none;

    }

    .search-filtre select {
        padding: 10px;
        border-radius: 5px;
        border: 1px solid #ccc;
        background: white;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        outline: none;
    }

    .search-filtre select option {
        padding: 10px;
    }

    .btn-group {
        display: flex;
        gap: 10px;
    }

    .choix-liste {
        display: flex;
        justify-content: space-around;
        align-items: center;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        background: white;
        margin-bottom: 30px;
    }

    .choix-liste .liste-active {
        border-left: none;
        border-bottom: solid 3px #FCAC43 !important;
        background: #fff;
    }

    .choix-liste .nonactive {
        border-left: none;
        border-bottom: solid 3px #ccc;
        background: #fff;
    }

    .choix-liste div {
        flex: 1;
        padding: 10px;
        text-align: center;
    }

    .choix-liste div p {
        font-size: 18px;
        font-weight: bold;
        text-align: center;

    }

    .error-message {
        color: red;
        font-size: 0.9em;
        margin-top: 5px;
        display: block;
    }

    .form-group {
        margin-bottom: 15px;
    }

    .alert {
        padding: 15px;
        margin-bottom: 20px;
        border-radius: 5px;
    }

    .alert-danger {
        background-color: #f8d7da;
        color: #721c24;
        border: 1px solid #f5c6cb;
    }

    .alert-success {
        background-color: #d4edda;
        color: #155724;
        border: 1px solid #c3e6cb;
    }

    .btn-liste {
        background-color: #000;
        color: white;
        padding: 10px 20px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        outline: none;
        border: none;
    }

    .btn-add {
        background-color: #3D9B9B;
        color: white;
        padding: 10px 20px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        outline: none;
        text-decoration: none;
    }

    .btn-group-telecharger-ajouter {
        display: flex;
        gap: 10px;
        align-items: center;

    }


    .dropdown-content {
        display: none;
        position: absolute;
        background-color: #f9f9f9;
        min-width: 160px;
        box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
        z-index: 1;

    }

    .dropdown-content a {
        padding: 12px 16px;
        text-decoration: none;
        display: block;
    }

    .dropdown-content a:hover {
        background-color: #f1f1f1;
    }

    .dropdown-content .pdf {
        color: red;
        font-weight: 600;
    }

    .dropdown-content .excel {
        color: green;
        font-weight: 600;
    }

    .dropdown:hover .dropdown-content {
        display: block;
    }


    thead tr {
        background: #FCAC43;
        color: white;
        font-weight: bold;
        text-align: center;
        border-radius: 10px;
    }

    thead th {
        padding: 10px;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        margin-bottom: 20px;

    }

    .apprenant-list-img {
        width: 80px;
        height: 80px;
        border-radius: 50%;
        overflow: hidden;
    }

    .apprenant-list-img img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        object-position: center;
        border-radius: 50%;
    }

    tr {
        background: white;
        border-radius: 15px;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    }



    td {
        padding: 10px;
        text-align: center;
        font-size: 14px;
        color: #555;
        font-weight: normal;
    }

    .form-container {
        background: white;
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        margin-top: 20px;
    }

    .form-container h2 {
        margin-bottom: 20px;
        color: #3D9B9B;
        text-align: center;
    }

    .form-container h3 {
        margin-bottom: 20px;
        color: #555;
    }

    .form-container form {
        display: flex;
        flex-direction: column;
        gap: 15px;
        margin-top: 20px;
        border-radius: 10px;
        padding: 20px;
        background: #fff;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    }

    .form-group input,
    .form-group select {
        border: none;
        background: #f0f0f0;
        padding: 10px 15px;
        width: 100%;
        border-radius: 7px;
        color: grey;
        font-size: 14px;
    }

    .form-group label {
        color: #717171;
        font-size: 15px;
        font-weight: 600;
    }

    .apprenant-info {
        display: flex;
        gap: 15%;
        margin-bottom: 20px;
        align-items: center;
    }

    .form-group-file {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: space-between;
        border: dashed;
        padding: 15px;
        color: #1142C3;
        border-radius: 7px;
        gap: 10px;
        position: relative;
    }

    .form-group-file label {
        color: #1142C3;
        border-radius: 7px;
        padding: 7px;
        width: 100%;
        white-space: nowrap;
        border: solid 1px #1142C3;
    }

    .form-group-file i {
        font-size: 20px;
    }

    .form-group-file input {
        position: absolute;
        width: 100%;
        height: 100%;
        z-index: 5;
        cursor: pointer;
        background: transparent;
        padding: 0;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        opacity: 0;
    }

    .tuteur-info {
        display: flex;
        gap: 15%;
        margin-bottom: 20px;
        align-items: center;
    }

    .tuteur-info-btn {
        display: flex;
        align-items: center;
        justify-content: end;
        width: 100%;
        gap: 40px;
    }

    .tuteur-info-btn button {
        background-color: #3D9B9B;
        color: white;
        padding: 10px 20px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        outline: none;
        text-decoration: none;
    }

    .tuteur-info-btn a {
        text-decoration: none;
        color: #000;
        padding: 10px 20px;
        border: none;
        border-radius: 5px;
        background: rgb(244, 244, 244);
    }
</style>

<div class="layout">
    <div class="content">
        <div class="topbar">
            <!-- ---------------------TITRE--------------------- -->

            <div class="titre">
                <h1>Apprenants</h1>
                <span>180 apprenants</span>
            </div>

            <!-- ---------------------------------SEARCH ET FILTRES ET BTN--------------------------------- -->
            <div class="barre-filtre-btn">
                <form action="?route=apprenants" method="get" class="search-filtre">
                    <input type="hidden" name="route" value="apprenants">
                    <div class="filtre">
                        <i class="fas fa-search"></i>
                        <input type="search" name="search" placeholder="Rechercher par matricule..." value="<?= isset($_GET['search']) ? htmlspecialchars($_GET['search']) : '' ?>">
                    </div>
                    <div>
                        <select name="referentiel">
                            <option value="">-- Choisir un référentiel --</option>
                            <?php foreach ($referentiels as $ref): ?>
                                <option value="<?= $ref['id'] ?>" <?= (isset($_GET['referentiel']) && $_GET['referentiel'] == $ref['id']) ? 'selected' : '' ?>><?= htmlspecialchars($ref['nom']) ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div>
                        <select name="statut">
                            <option value="">-- Filtrer par statut --</option>
                            <option value="actif" <?= (isset($_GET['statut']) && $_GET['statut'] == 'actif') ? 'selected' : '' ?>>Actif</option>
                            <option value="inactif" <?= (isset($_GET['statut']) && $_GET['statut'] == 'inactif') ? 'selected' : '' ?>>Inactif</option>
                        </select>
                    </div>
                    <button type="submit" class="btn-liste">Filtrer</button>
                </form>
                <div class="btn-group-telecharger-ajouter">
                    <div class="dropdown">
                        <button class="btn-liste dropdown-toggle" id="btn-download">Télécharger la Liste <i class="fa-solid fa-file-import"></i></button>
                        <div class="dropdown-content" id="download-options">
                            <!-- télécharger fichier pdf -->
                            <a href="?route=download_pdf" class="btn-orange pdf">PDF <i class="fa-solid fa-file-pdf"></i></a>
                            <!-- télécharger fichier excel -->
                            <a href="?route=download_excel" class="btn-orange excel">Excel <i class="fa-solid fa-file-excel"></i></a>
                        </div>
                    </div>
                    <a href="#" id="btn-ajouter" class="btn-add">Ajouter un apprenant</a>
                </div>
            </div>
        </div>

        <!-- --------------------------------- MESSAGE--------------------------------- -->

        <?php if (isset($_GET['success'])): ?>
            <div class="success-message">
                <p><?= htmlspecialchars($_GET['message'] ?? 'apprenant.ajout.success') ?></p>
            </div>
        <?php endif; ?>
        <?php if (!empty($errors) && !is_array($errors)): ?>
            <div class="alert alert-danger">
                <?= $errors ?>
            </div>
        <?php endif; ?>

        <!-- ---------------------------------FORMULAIRE-------------------------------- -->
        <div class="form-container">
            <h2>Ajouter un Apprenant</h2>

            <h3>Informations de l'apprenant <i class="fa-solid fa-pen"></i></h3>
            <form action="?route=store_apprenant" method="post" enctype="multipart/form-data">
                <div class="apprenant-info">

                    <div class="apprenant-info-1">
                        <div class="form-group">
                            <label>Prénom<span style="color: red;">*</span></label>
                            <input type="text" name="prenom" value="<?= isset($old['prenom']) ? htmlspecialchars($old['prenom']) : '' ?>">
                            <?php if (isset($errors['prenom'])): ?>
        <span class="error-message"><?= $errors['prenom'] ?></span>
    <?php endif; ?>

                        </div>

                        <div class="form-group">
                            <label>Date de naissance<span style="color: red;">*</span></label>
                            <input type="date" name="date_naissance" value="<?= htmlspecialchars($old['date_naissance'] ?? '') ?>">
                            <?php if (isset($errors['date_naissance'])): ?>
                                <span class="error-message"><?= $errors['date_naissance'] ?></span>
                                <?php endif; ?>

                        </div>
                        <div class="form-group">
                            <label>Adresse<span style="color: red;">*</span></label>
                            <input type="text" name="adresse" value="<?= htmlspecialchars($old['adresse'] ?? '') ?>">
                            <?php if (isset($errors['adresse'])): ?>
                                <span class="error-message"><?= $errors['adresse'] ?></span>
                                <?php endif; ?>
                        </div>
                        <div class="form-group">
                            <label>Téléphone<span style="color: red;">*</span></label>
                            <input type="text" name="telephone" value="<?= htmlspecialchars($old['telephone'] ?? '') ?>">
                            <?php if (isset($errors['telephone'])): ?>
                                <span class="error-message"><?= $errors['telephone'] ?></span>
                                <?php endif; ?>

                        </div>
                    </div>
                    <div class="apprenant-info-2">
                        <div class="form-group">
                            <label for="nom">Nom<span style="color: red;">*</span></label>
                            <input type="text" class="form-control" id="nom" name="nom" value="<?= htmlspecialchars($old['nom'] ?? '') ?>">
                            <?php if (isset($errors['nom'])): ?>
                                 <span class="error-message"><?= $errors['nom'] ?></span>
                                 <?php endif; ?>

                        </div>

                        <div class="form-group">
                            <label>Lieu de naissance<span style="color: red;">*</span></label>
                            <input type="text" name="lieu_naissance" value="<?= htmlspecialchars($old['lieu_naissance'] ?? '') ?>">
                            <?php if (isset($errors['lieu_naissance'])): ?>
                                <span class="error-message"><?= $errors['lieu_naissance'] ?></span>
                                <?php endif; ?>

                        </div>

                        <div class="form-group">
                            <label>Email<span style="color: red;">*</span></label>
                            <input type="email" name="email" value="<?= htmlspecialchars($old['email'] ?? '') ?>">
                            <?php if (isset($errors['email'])): ?>
                                <span class="error-message"><?= $errors['email'] ?></span>
                                <?php endif; ?>

                        </div>
                        <div class="form-group">
                            <label>Référentiel<span style="color: red;">*</span></label>
                            <select name="referentiel_id">
                                <option value="">-- Sélectionnez un référentiel --</option>
                                <?php foreach ($referentiels as $ref): ?>
                                    <option value="<?= $ref['id'] ?>" <?= (isset($old['referentiel_id']) && $old['referentiel_id'] == $ref['id']) ? 'selected' : '' ?>>
                                        <?= htmlspecialchars($ref['nom']) ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                            <?php if (isset($errors['referentiel_id'])): ?>
                                <span class="error-message"><?= $errors['referentiel_id'] ?></span>
                                <?php endif; ?>

                        </div>
                    </div>
                    <div class="apprenant-info-3">
                        <div class="form-group form-group-file">
                            <i class="fa-solid fa-folder-plus"></i>
                            <label>Ajouter des documents<span style="color: red;">*</span></label>
                            <input type="file" name="file">
                            <?php if (isset($errors['file'])): ?>
                                <span class="error-message"><?= $errors['file'] ?></span>
                                <?php endif; ?>
                        </div>
                    </div>

                </div>

                <div class="tuteur-info-box">
                    <!-- Ajout des champs pour le tuteur -->
                    <h3>Informations du tuteur <i class="fa-solid fa-pen"></i></h3>

                    <div class="tuteur-info">
                        <div class="tuteur-info-1">
                            <div class="form-group">
                                <label>Prénom & nom<span style="color: red;">*</span></label>
                                <input type="text" name="nom_tuteur" value="<?= htmlspecialchars($old['nom_tuteur'] ?? '') ?>">
                                <?php if (isset($errors['nom_tuteur'])): ?>
                                    <span class="error-message"><?= $errors['nom_tuteur'] ?></span>
                                    <?php endif; ?>
                            </div>
                            <div class="form-group">
                                <label>Adresse<span style="color: red;">*</span></label>
                                <input type="text" name="adresse_tuteur" value="<?= htmlspecialchars($old['adresse_tuteur'] ?? '') ?>">
                                <?php if (isset($errors['adresse_tuteur'])): ?>
                                    <span class="error-message"><?= $errors['adresse_tuteur'] ?></span>
                                    <?php endif; ?>
                            </div>
                        </div>

                        <div class="tuteur-info-2">
                            <div class="form-group">
                                <label>Lien de parenté<span style="color: red;">*</span></label>
                                <input type="text" name="lien_parente" value="<?= htmlspecialchars($old['lien_parente'] ?? '') ?>">
                                <?php if (isset($errors['lien_parente'])): ?>
                                    <span class="error-message"><?= $errors['lien_parente'] ?></span>
                                    <?php endif; ?>

                            </div>

                            <div class="form-group">
                                <label>Téléphone du tuteur<span style="color: red;">*</span></label>
                                <input type="text" name="telephone_tuteur" value="<?= htmlspecialchars($old['telephone_tuteur'] ?? '') ?>">
                                <?php if (isset($errors['telephone_tuteur'])): ?>
                                    <span class="error-message"><?= $errors['telephone_tuteur'] ?></span>
                                    <?php endif; ?>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="tuteur-info-btn">
                    <a href="#" id="btn-annuler" class="btn btn-secondary">Annuler</a>
                    <button type="submit" class="btn-orange">Enregistrer</button>
                </div>
            </form>
        </div>

        <!-- ---------------------------------LISTES APPRENANT-------------------------------- -->

        <div class="box-table">
            <div class="table-header">
                <div class="choix-liste ">
                    <div class="liste-active">
                        <a href="#" id="btn-retenus">Liste des retenus</a>
                    </div>
                    <div class="nonactive">
                        <a href="#" id="btn-attente">Liste d'attente</a>
                    </div>
                </div>

                <!-- ------------------------TABLEAU RETENUS------------------------ -->
                <table class="table-apprenants-retenus">
                    <thead>
                        <tr>
                            <th>Photo</th>
                            <th>Matricule</th>
                            <th>Nom Complet</th>
                            <th>Adresse</th>
                            <th>Téléphone</th>
                            <th>Référentiel</th>
                            <th>Statut</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($apprenants)): ?>
                            <?php foreach ($apprenants as $a): ?>
                                <?php if (isset($a['statut']) && $a['statut'] === 'actif'): ?>
                                    <tr>
                                        <td class="apprenant-list-img">
                                            <img src="assets/images/<?= htmlspecialchars($a['photo'] ?? 'profil.jpg') ?>" alt="Photo de <?= htmlspecialchars($a['nom'] ?? '') ?>" class="photo-apprenant">
                                        </td>
                                        <td><?= htmlspecialchars($a['matricule'] ?? '') ?></td>
                                        <td><?= htmlspecialchars(($a['prenom'] ?? '') . ' ' . ($a['nom'] ?? '')) ?></td>
                                        <td><?= htmlspecialchars($a['adresse'] ?? '') ?></td>
                                        <td><?= htmlspecialchars($a['telephone'] ?? '') ?></td>
                                        <td>
                                            <?php
                                            $ref_id = $a['referentiel_id'] ?? null;
                                            $ref_nom = 'Non défini';
                                            if ($ref_id) {
                                                foreach ($referentiels as $ref) {
                                                    if ($ref['id'] == $ref_id) {
                                                        $ref_nom = $ref['nom'];
                                                        break;
                                                    }
                                                }
                                            }
                                            echo htmlspecialchars($ref_nom);
                                            ?>
                                        </td>
                                        <td>Actif</td>
                                        <td>
                                            <div class="dropdown">
                                                <i class="fa-solid fa-ellipsis"></i>
                                                <div class="dropdown-content" id="dropdown-<?= $a['id'] ?>">
                                                    <a href="?route=apprenant_details&id=<?= $a['id'] ?>" class="btn btn-details">Voir</a>
                                                    <a href="#">Désactiver</a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="8" style="text-align: center;">Aucun apprenant actif trouvé.</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>

                <!-- ------------------------TABLEAU ATTENTE------------------------ -->
                <table class="table-apprenants-attente">
                    <thead>
                        <tr>
                            <th>Photo</th>
                            <th>Matricule</th>
                            <th>Nom Complet</th>
                            <th>Adresse</th>
                            <th>Téléphone</th>
                            <th>Référentiel</th>
                            <th>Statut</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($apprenants)): ?>
                            <?php foreach ($apprenants as $a): ?>
                                <?php if (isset($a['statut']) && $a['statut'] === 'inactif'): ?>
                                    <tr>
                                        <td class="apprenant-list-img">
                                            <img src="assets/images/<?= htmlspecialchars($a['photo'] ?? 'profil.jpg') ?>" alt="Photo de <?= htmlspecialchars($a['nom'] ?? '') ?>" class="photo-apprenant">
                                        </td>
                                        <td><?= htmlspecialchars($a['matricule'] ?? '') ?></td>
                                        <td><?= htmlspecialchars(($a['prenom'] ?? '') . ' ' . ($a['nom'] ?? '')) ?></td>
                                        <td><?= htmlspecialchars($a['adresse'] ?? '') ?></td>
                                        <td><?= htmlspecialchars($a['telephone'] ?? '') ?></td>
                                        <td>
                                            <?php
                                            $ref_id = $a['referentiel_id'] ?? null;
                                            $ref_nom = 'Non défini';
                                            if ($ref_id) {
                                                foreach ($referentiels as $ref) {
                                                    if ($ref['id'] == $ref_id) {
                                                        $ref_nom = $ref['nom'];
                                                        break;
                                                    }
                                                }
                                            }
                                            echo htmlspecialchars($ref_nom);
                                            ?>
                                        </td>
                                        <td>En attente</td>
                                        <td>
                                            <div class="dropdown">
                                                <i class="fa-solid fa-ellipsis"></i>
                                                <div class="dropdown-content" id="dropdown-<?= $a['id'] ?>-inactif">
                                                    <a href="?route=apprenant_details&id=<?= $a['id'] ?>" class="btn btn-details">Voir les détails</a>
                                                    <a href="#">Activer</a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="8" style="text-align: center;">Aucun apprenant en attente trouvé.</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                // Éléments du DOM
                const formContainer = document.querySelector('.form-container');
                const boxTable = document.querySelector('.box-table');
                const btnAjouter = document.getElementById('btn-ajouter');
                const btnAnnuler = document.getElementById('btn-annuler');
                const btnRetenus = document.getElementById('btn-retenus');
                const btnAttente = document.getElementById('btn-attente');
                const tableRetenus = document.querySelector('.table-apprenants-retenus');
                const tableAttente = document.querySelector('.table-apprenants-attente');

                // Cacher le formulaire au chargement initial (s'il n'est pas explicitement demandé par l'URL)
                if (!window.location.search.includes('action=ajouter')) {
                    if (formContainer) formContainer.style.display = 'none';
                    if (boxTable) boxTable.style.display = 'block';
                } else {
                    if (formContainer) formContainer.style.display = 'block';
                    if (boxTable) boxTable.style.display = 'none';
                }

                // Afficher le formulaire et cacher la liste quand on clique sur "Ajouter"
                if (btnAjouter) {
                    btnAjouter.addEventListener('click', function(e) {
                        e.preventDefault();
                        if (formContainer) formContainer.style.display = 'block';
                        if (boxTable) boxTable.style.display = 'none';

                        // Mettre à jour l'URL sans recharger la page
                        const newUrl = updateQueryStringParameter(window.location.href, 'action', 'ajouter');
                        window.history.pushState({
                            path: newUrl
                        }, '', newUrl);
                    });
                }

                // Cacher le formulaire et afficher la liste quand on clique sur "Annuler"
                if (btnAnnuler) {
                    btnAnnuler.addEventListener('click', function(e) {
                        e.preventDefault();
                        if (formContainer) formContainer.style.display = 'none';
                        if (boxTable) boxTable.style.display = 'block';

                        // Retirer le paramètre action de l'URL
                        const newUrl = removeQueryStringParameter(window.location.href, 'action');
                        window.history.pushState({
                            path: newUrl
                        }, '', newUrl);
                    });
                }

                // Gestion de l'affichage des listes (retenus/attente)
                if (btnRetenus) {
                    btnRetenus.addEventListener('click', function(e) {
                        e.preventDefault();

                        // Mettre à jour les classes pour l'effet visuel actif
                        btnRetenus.parentElement.classList.add('liste-active');
                        btnRetenus.parentElement.classList.remove('nonactive');
                        btnAttente.parentElement.classList.add('nonactive');
                        btnAttente.parentElement.classList.remove('liste-active');

                        // Afficher la table appropriée
                        if (tableRetenus) tableRetenus.style.display = 'table';
                        if (tableAttente) tableAttente.style.display = 'none';

                        // Mettre à jour l'URL sans recharger la page
                        const newUrl = updateQueryStringParameter(window.location.href, 'liste', 'retenus');
                        window.history.pushState({
                            path: newUrl
                        }, '', newUrl);
                    });
                }

                if (btnAttente) {
                    btnAttente.addEventListener('click', function(e) {
                        e.preventDefault();

                        // Mettre à jour les classes pour l'effet visuel actif
                        btnAttente.parentElement.classList.add('liste-active');
                        btnAttente.parentElement.classList.remove('nonactive');
                        btnRetenus.parentElement.classList.add('nonactive');
                        btnRetenus.parentElement.classList.remove('liste-active');

                        // Afficher la table appropriée
                        if (tableRetenus) tableRetenus.style.display = 'none';
                        if (tableAttente) tableAttente.style.display = 'table';

                        // Mettre à jour l'URL sans recharger la page
                        const newUrl = updateQueryStringParameter(window.location.href, 'liste', 'attente');
                        window.history.pushState({
                            path: newUrl
                        }, '', newUrl);
                    });
                }

                // Initialiser l'affichage de la liste selon l'URL
                if (window.location.search.includes('liste=attente')) {
                    if (btnAttente) btnAttente.click();
                } else {
                    if (btnRetenus) btnRetenus.click();
                }

                // Gestion du dropdown pour le téléchargement
                const btnDownload = document.getElementById('btn-download');
                if (btnDownload) {
                    btnDownload.addEventListener('click', function() {
                        const downloadOptions = document.getElementById('download-options');
                        downloadOptions.classList.toggle('show');
                    });
                }

                // Gestion des dropdowns pour les actions
                const dropdownBtns = document.querySelectorAll('.dropdown-btn');
                dropdownBtns.forEach(function(btn) {
                    btn.addEventListener('click', function() {
                        const dropdownId = this.getAttribute('data-toggle');
                        const dropdown = document.getElementById(dropdownId);
                        dropdown.classList.toggle('show');
                    });
                });

                // Fermer les dropdowns quand on clique ailleurs
                window.addEventListener('click', function(event) {
                    if (!event.target.matches('.dropdown-toggle') && !event.target.matches('.dropdown-btn')) {
                        const dropdowns = document.querySelectorAll('.dropdown-content');
                        dropdowns.forEach(function(dropdown) {
                            if (dropdown.classList.contains('show')) {
                                dropdown.classList.remove('show');
                            }
                        });
                    }
                });

                // Fonctions utilitaires pour gérer les paramètres d'URL
                function updateQueryStringParameter(uri, key, value) {
                    var re = new RegExp("([?&])" + key + "=.*?(&|$)", "i");
                    var separator = uri.indexOf('?') !== -1 ? "&" : "?";
                    if (uri.match(re)) {
                        return uri.replace(re, '$1' + key + "=" + value + '$2');
                    } else {
                        return uri + separator + key + "=" + value;
                    }
                }

                function removeQueryStringParameter(uri, key) {
                    var rtn = uri.split("?")[0];
                    var param = null;
                    var params_arr = [];
                    if (uri.indexOf("?") !== -1) {
                        params_arr = uri.split("?")[1].split("&");
                        for (var i = params_arr.length - 1; i >= 0; i -= 1) {
                            param = params_arr[i].split("=")[0];
                            if (param === key) {
                                params_arr.splice(i, 1);
                            }
                        }
                        if (params_arr.length) rtn = rtn + "?" + params_arr.join("&");
                    }
                    return rtn;
                }
            });
        </script>