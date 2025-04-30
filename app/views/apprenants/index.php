<style>
    .titre {
        display: flex;
        align-items: center;
    }

    .barre-filtre-btn {
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .search-filtre {
        display: flex;
        gap: 10px;
        align-items: center;
    }

    .btn-group {
        display: flex;
        gap: 10px;
    }

    .choix-liste {
        display: flex;
        justify-content: space-around;
        margin-bottom: 20px;
        align-items: center;
    }

    .choix-liste div p {
        font-size: 18px;
        font-weight: bold;
        text-align: center;

    }
</style>

<div class="layout">
    <div class="content">
        <?php if (!isset($_GET['add_apprenant'])): ?>
            <!-- AFFICHAGE DE LA LISTE DES APPRENANTS -->
            <div class="topbar">
                <div class="titre">
                    <h1>Apprenants</h1>
                    <span>180 apprenants</span>
                </div>
                <div class="barre-filtre-btn">
                    <div class="search-filtre">
                        <div>
                            <i class="fas fa-search"></i>
                            <input type="search" name="search" placeholder="Rechercher...">
                        </div>
                        <div>
                            <select name="referentiel">
                                <option value="">-- Choisir un référentiel --</option>
                                <?php foreach ($referentiels as $ref): ?>
                                    <option value="<?= $ref['id'] ?>"><?= htmlspecialchars($ref['nom']) ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div>
                            <select name="statut">
                                <option value="">-- Filtrer par statut --</option>
                                <option value="actif">Actif</option>
                                <option value="inactif">Inactif</option>
                            </select>
                        </div>
                    </div>
                    <div class="btn-group">
                        <div class="dropdown">
                            <button class="btn-orange dropdown-toggle" id="btn-download">Télécharger la Liste</button>
                            <div class="dropdown-content" id="download-options">
                                <!-- télécharger fichier pdf -->
                                 <a href="?route=download_pdf" class="btn-orange">PDF</a>
                                <!-- télécharger fichier excel -->
                            </div>
                        </div>
                        <a href="?route=apprenants&add_apprenant=true" class="btn-orange">+ Ajouter un Apprenant</a>

                    </div>
                </div>
            </div>

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

            <div class="box-table">
                <div class="table-header">
                    <div class="choix-liste">
                        <div>
                            <p> Liste des retenues
                            </p>
                        </div>
                        <div>
                            <p>Liste d'attente</p>
                        </div>
                    </div>
                    <table class="table-apprenants">
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
                            <?php foreach ($apprenants as $a): ?>
                                <tr>
                                    <td><img src="public/uploads/<?= htmlspecialchars($a['photo']) ?>" class="photo-thumbnail"></td>
                                    <td><?= htmlspecialchars($a['matricule']) ?></td>
                                    <td><?= htmlspecialchars($a['prenom'] . ' ' . $a['nom']) ?></td>
                                    <td><?= htmlspecialchars($a['email']) ?></td>
                                    <td><?= htmlspecialchars($a['telephone']) ?></td>
                                    <td>
                                        <?php
                                        foreach ($referentiels as $ref) {
                                            if ($ref['id'] === $a['referentiel_id']) {
                                                echo htmlspecialchars($ref['nom']);
                                                break;
                                            }
                                        }
                                        ?>
                                    </td>
                                    <td>
                                        <div class="dropdown">
                                            <button class="dropdown-btn" data-toggle="dropdown-<?= $a['id'] ?>">⋮</button>
                                            <div class="dropdown-content" id="dropdown-<?= $a['id'] ?>">
                                                <a href="?route=apprenant_details&id=<?= $a['id'] ?>">Voir</a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            <?php else: ?>
                <!-- FORMULAIRE D'AJOUT D'APPRENANT -->
                <div class="form-container">
                    <h2>Ajouter un Apprenant</h2>
                    <?php if (isset($message) && !empty($message)): ?>
                        <div class="alert alert-success">
                            <?= $message ?>
                        </div>
                    <?php endif; ?>
                    <form action="?route=store_apprenant" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label>Nom<span style="color: red;">*</span></label>
                            <input type="text" name="nom" value="<?= htmlspecialchars($old['nom'] ?? '') ?>">
                            <?php if (isset($errors['nom'])): ?>
                                <p class="error-message"><?= $errors['nom'] ?></p>
                            <?php endif; ?>
                        </div>

                        <div class="form-group">
                            <label>Prénom<span style="color: red;">*</span></label>
                            <input type="text" name="prenom" value="<?= htmlspecialchars($old['prenom'] ?? '') ?>">
                            <?php if (isset($errors['prenom'])): ?>
                                <p class="error-message"><?= $errors['prenom'] ?></p>
                            <?php endif; ?>
                        </div>

                        <div class="form-group">
                            <label>Date de naissance<span style="color: red;">*</span></label>
                            <input type="date" name="date_naissance" value="<?= htmlspecialchars($old['date_naissance'] ?? '') ?>">
                            <?php if (isset($errors['date_naissance'])): ?>
                                <p class="error-message"><?= $errors['date_naissance'] ?></p>
                            <?php endif; ?>
                        </div>

                        <div class="form-group">
                            <label>Lieu de naissance<span style="color: red;">*</span></label>
                            <input type="text" name="lieu_naissance" value="<?= htmlspecialchars($old['lieu_naissance'] ?? '') ?>">
                            <?php if (isset($errors['lieu_naissance'])): ?>
                                <p class="error-message"><?= $errors['lieu_naissance'] ?></p>
                            <?php endif; ?>
                        </div>

                        <div class="form-group">
                            <label>Adresse<span style="color: red;">*</span></label>
                            <input type="text" name="adresse" value="<?= htmlspecialchars($old['adresse'] ?? '') ?>">
                            <?php if (isset($errors['adresse'])): ?>
                                <p class="error-message"><?= $errors['adresse'] ?></p>
                            <?php endif; ?>
                        </div>

                        <div class="form-group">
                            <label>Email<span style="color: red;">*</span></label>
                            <input type="email" name="email" value="<?= htmlspecialchars($old['email'] ?? '') ?>">
                            <?php if (isset($errors['email'])): ?>
                                <p class="error-message"><?= $errors['email'] ?></p>
                            <?php endif; ?>
                        </div>

                        <div class="form-group">
                            <label>Téléphone<span style="color: red;">*</span></label>
                            <input type="text" name="telephone" value="<?= htmlspecialchars($old['telephone'] ?? '') ?>">
                            <?php if (isset($errors['telephone'])): ?>
                                <p class="error-message"><?= $errors['telephone'] ?></p>
                            <?php endif; ?>
                        </div>

                        <div class="form-group">
                            <label>Photo<span style="color: red;">*</span></label>
                            <input type="file" name="photo">
                            <?php if (isset($errors['photo'])): ?>
                                <p class="error-message"><?= $errors['photo'] ?></p>
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
                                <p class="error-message"><?= $errors['referentiel_id'] ?></p>
                            <?php endif; ?>
                        </div>

                        <!-- Ajout des champs pour le tuteur -->
                        <h3>Informations du tuteur</h3>

                        <div class="form-group">
                            <label>Nom du tuteur<span style="color: red;">*</span></label>
                            <input type="text" name="nom_tuteur" value="<?= htmlspecialchars($old['nom_tuteur'] ?? '') ?>">
                            <?php if (isset($errors['nom_tuteur'])): ?>
                                <p class="error-message"><?= $errors['nom_tuteur'] ?></p>
                            <?php endif; ?>
                        </div>

                        <div class="form-group">
                            <label>Lien de parenté<span style="color: red;">*</span></label>
                            <input type="text" name="lien_parente" value="<?= htmlspecialchars($old['lien_parente'] ?? '') ?>">
                            <?php if (isset($errors['lien_parente'])): ?>
                                <p class="error-message"><?= $errors['lien_parente'] ?></p>
                            <?php endif; ?>
                        </div>

                        <div class="form-group">
                            <label>Adresse du tuteur<span style="color: red;">*</span></label>
                            <input type="text" name="adresse_tuteur" value="<?= htmlspecialchars($old['adresse_tuteur'] ?? '') ?>">
                            <?php if (isset($errors['adresse_tuteur'])): ?>
                                <p class="error-message"><?= $errors['adresse_tuteur'] ?></p>
                            <?php endif; ?>
                        </div>

                        <div class="form-group">
                            <label>Téléphone du tuteur<span style="color: red;">*</span></label>
                            <input type="text" name="telephone_tuteur" value="<?= htmlspecialchars($old['telephone_tuteur'] ?? '') ?>">
                            <?php if (isset($errors['telephone_tuteur'])): ?>
                                <p class="error-message"><?= $errors['telephone_tuteur'] ?></p>
                            <?php endif; ?>
                        </div>

                        <button type="submit" class="btn-orange">Ajouter</button>
                        <a href="index.php?action=liste_apprenants" class="btn-orange">Retour</a>   
                    </form>
                </div>
            <?php endif; ?>
            </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
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
        });
    </script>