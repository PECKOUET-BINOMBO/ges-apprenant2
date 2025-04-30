<!-- ------------------------------------------------------------STYLE------------------------------------------------------------ -->
<style>
   h1 {
    color: #009688;
    margin-bottom: 5px;
   }

   
  .subtitle {
    color: #666;
    margin-bottom: 20px;
  }

  .search-barr {
    display: flex;
    gap: 10px;
    margin-bottom: 30px;
  }

  .search-input {
    flex-grow: 1;
    position: relative;
    width: 100%;
    padding: 12px 15px 12px 40px;
    border: 1px solid #e0e0e0;
    border-radius: 5px;
    font-size: 14px;
    outline: none;
    background-color: white;
    display: flex;
    align-items: center;
  }

  .search-input form {
    width: 100%;
  }

  .search-input input {
    width: 100%;
    border: none;
    outline: none;
    font-size: 14px;
  }

  .search-icon {
    position: absolute;
    left: 15px;
    top: 50%;
    transform: translateY(-50%);
    color: #aaa;
    cursor: pointer;
  }

  .btn-orange {
    background-color: #FF7F1F;
    color: white;
    border: none;
    border-radius: 5px;
    padding: 12px 15px;
    cursor: pointer;
    font-weight: bold;
    display: flex;
    align-items: center;
    gap: 5px;
  }

  .btn-green {
    background-color: #009688;
    color: white;
    border: none;
    border-radius: 5px;
    padding: 12px 15px;
    cursor: pointer;
    font-weight: bold;
    display: flex;
    align-items: center;
    gap: 5px;
  }

  /* Form panel styles */
  .form-panel {
    background-color: white;
    border-radius: 8px;
    padding: 20px;
    margin-bottom: 30px;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    display: none;
  }

  .form-panel-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 20px;
  }

  .form-panel-title {
    font-size: 18px;
    font-weight: bold;
    color: #333;
  }

  .form-group {
    margin-bottom: 20px;
  }

  .form-label {
    display: block;
    margin-bottom: 5px;
    font-size: 14px;
    color: #333;
    font-weight: 600;
  }

  .form-input {
    width: 100%;
    padding: 10px;
    border: 1px solid #e0e0e0;
    border-radius: 5px;
    font-size: 14px;
  }

  .promotion-active {
    margin-bottom: 10px;
    font-size: 14px;
    color: #333;
    font-weight: 600;
  }

  .tags-container {
    display: flex;
    flex-wrap: wrap;
    gap: 8px;
    margin-top: 10px;
  }

  .tag {
    display: flex;
    align-items: center;
    background-color: #f0f0f0;
    border-radius: 15px;
    padding: 5px 10px;
    font-size: 12px;
  }

  .tag .remove-tag {
    margin-left: 5px;
    color: #E53935;
    cursor: pointer;
    font-size: 14px;
  }

  .form-buttons {
    display: flex;
    justify-content: flex-end;
    gap: 10px;
    margin-top: 20px;
  }

  .btn-cancel {
    background-color: #f5f5f5;
    color: #333;
    border: 1px solid #ddd;
    border-radius: 5px;
    padding: 8px 15px;
    cursor: pointer;
    font-weight: bold;
  }

  .btn-finish {
    background-color: #009688;
    color: white;
    border: none;
    border-radius: 5px;
    padding: 8px 15px;
    cursor: pointer;
    font-weight: bold;
  }

  .card-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
    gap: 20px;
    width: 100%;
    margin: 0;
    padding: 0;
  }

  .card {
    background-color: white;
    border-radius: 10px;
    overflow: hidden;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    padding: 8px;
    transition: transform 0.3s ease, box-shadow 0.3s ease;
  }

  .card:hover {
    transform: translateY(-5px);
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.15);
  }

  .card-image {
    height: 170px;
    width: 100%;
    object-fit: cover;
    border-radius: 10px;
    margin-bottom: 20px;
    background-position: center;
    background-size: cover;
  }

  .card-content {
    padding: 10px;
  }

  .card-title {
    color: #009688;
    margin-bottom: 5px;
    font-size: 16px;
  }

  .card-modules {
    font-size: 14px;
    color: #333;
    margin-bottom: 5px;
  }

  .card-description {
    font-size: 12px;
    color: #666;
    margin-bottom: 15px;
    display: -webkit-box;
    -webkit-line-clamp: 2;
    line-clamp: 2;
    -webkit-box-orient: vertical;
    overflow: hidden;
  }

  .card-footer {
    display: flex;
    align-items: center;
    justify-content: space-between;
    margin-top: 10px;
    border-top: solid 2px #009688;
    padding: 5px 0 0 0;
  }

  .card-users {
    display: flex;
  }

  .user-circle {
    width: 25px;
    height: 25px;
    background-color: #ddd;
    border-radius: 50%;
    margin-right: -8px;
  }

  .badge {
    background-color: #e0f2f1;
    color: #009688;
    padding: 5px 10px;
    border-radius: 15px;
    font-size: 12px;
  }

  .alert {
    padding: 10px 15px;
    margin-bottom: 20px;
    border-radius: 5px;
    font-size: 14px;
  }

  .alert-success {
    background-color: #d4edda;
    color: #155724;
    border: 1px solid #c3e6cb;
  }

  .alert-danger {
    background-color: #f8d7da;
    color: #721c24;
    border: 1px solid #f5c6cb;
  }

  .alert-warning {
    background-color: #fff3cd;
    color: #856404;
    border: 1px solid #ffeeba;
  }

  .alert-info {
    background-color: #d1ecf1;
    color: #0c5460;
    border: 1px solid #bee5eb;
  }

  /* Style du bouton retour */
  .back-link {
    margin-bottom: 20px;
  }

  .return-button {
    display: flex;
    align-items: center;
    color: #555;
    text-decoration: none;
    font-size: 14px;
    transition: color 0.3s;
  }

  .return-button:hover {
    color: #009688;
  }

  .return-button i {
    margin-right: 8px;
  }

  /* Styles pour l'en-tête de page */
  .page-header {
    margin-bottom: 30px;
  }

  .page-title {
    color: #009688;
    margin-bottom: 5px;
    font-size: 28px;
    font-weight: 500;
  }

  .page-subtitle {
    color: #666;
    margin-top: 0;
    font-size: 16px;
  }

  /* Barre de recherche et bouton création */
  .search-create-container {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 30px;
  }

  .search-container {
    position: relative;
    flex-grow: 1;
    margin-right: 20px;
  }

  .create-button {
    background-color: #009688;
    color: white;
    border: none;
    border-radius: 5px;
    padding: 12px 20px;
    font-weight: 500;
    font-size: 14px;
    cursor: pointer;
    display: flex;
    align-items: center;
    gap: 8px;
    transition: background-color 0.3s;
  }

  .create-button:hover {
    background-color: #00796b;
  }

  /* Sections visibility */
  #tous-referentiels-section {
    display: none;
  }

  #referentiels-actifs-section {
    display: block;
  }

  /* Responsive */
  @media (max-width: 992px) {
    .card-grid {
      grid-template-columns: repeat(2, 1fr);
    }
  }

  @media (max-width: 768px) {

    .search-create-container,
    .search-barr {
      flex-direction: column;
      align-items: stretch;
    }

    .search-container,
    .search-input {
      margin-right: 0;
      margin-bottom: 15px;
    }

    .btn-orange,
    .btn-green,
    .create-button {
      width: 100%;
      justify-content: center;
    }
  }

  @media (max-width: 576px) {
    .card-grid {
      grid-template-columns: 1fr;
    }
  }

  .error-message {
    color: #dc3545;
    font-size: 12px;
    margin-top: 5px;
  }

  .tag .remove-tag {
    margin-left: 8px;
    color: #E53935;
    cursor: pointer;
    font-size: 12px;
  }

  .card-actions {
    display: flex;
    gap: 5px;
    justify-content: flex-end;
    margin-top: 10px;
  }

  .btn-remove {
    background-color: #e53935;
    color: white;
    border: none;
    border-radius: 3px;
    padding: 3px 8px;
    font-size: 12px;
    cursor: pointer;
    transition: background-color 0.3s;
  }

  .btn-remove:hover {
    background-color: #c62828;
  }

  .btn-remove:disabled {
    background-color: #e0e0e0;
    color: #9e9e9e;
    cursor: not-allowed;
  }

  .confirmation-box {
    margin-top: 10px;
    padding: 10px;
    background-color: #f8f8f8;
    border: 1px solid #ddd;
    border-radius: 5px;
  }

  .confirmation-box p {
    margin-bottom: 10px;
    font-size: 13px;
    color: #333;
  }

  .confirmation-actions {
    display: flex;
    gap: 10px;
    justify-content: flex-end;
  }

  .btn-cancel {
    background-color: #f5f5f5;
    color: #333;
    border: 1px solid #ddd;
    border-radius: 3px;
    padding: 3px 8px;
    font-size: 12px;
    cursor: pointer;
  }
</style>

<?php if (isset($_GET['success'])): ?>
  <div class="alert <?= $_GET['success'] === 'true' ? 'alert-success' : 'alert-danger' ?>">
    <?php if (isset($_GET['message'])): ?>
      <?php if ($_GET['message'] === 'date_expired'): ?>
        Impossible d'ajouter ou de supprimer le référentiel : la date de fin de promotion est dépassée.
      <?php elseif ($_GET['message'] === 'has_apprenants'): ?>
        Impossible de supprimer le référentiel : des apprenants y sont inscrits.
      <?php elseif ($_GET['message'] === 'desaffectation_ok'): ?>
        Le référentiel a été retiré de la promotion avec succès.
      <?php elseif ($_GET['message'] === 'not_found'): ?>
        Le référentiel n'existe pas ou n'est pas associé à la promotion active.
      <?php endif; ?>
    <?php else: ?>
      <?= $_GET['success'] === 'true' ? 'Opération réussie !' : 'Une erreur est survenue.' ?>
    <?php endif; ?>
  </div>
<?php endif; ?>



<!-- ------------------------------------------------------------SECTION REFERENTIELS ACTIFS------------------------------------------------------------ -->
<div id="referentiels-actifs-section" class="container">
  <h1>Référentiels</h1>
  <p class="subtitle">Gérer les référentiels de la promotion active</p>

  <!-- ------------------------------------------------------------SEARCH/ TOUS LES REF / ADD REF------------------------------------------------------------ -->
  <div class="search-barr">
    <div class="search-input">
      <form action="?route=referentiels" method="GET">
        <input type="hidden" name="route" value="referentiels">
        <label for="search-input" class="search-icon"><i class="fas fa-search"></i></label>
        <input type="text" id="search-input" name="search" placeholder="Rechercher un référentiel..." value="<?= htmlspecialchars($_GET['search'] ?? '') ?>">
      </form>
    </div>
    <button type="button" class="btn-orange" id="show-all-referentiels">
      <span><i class="fas fa-book"></i></span> Tous les référentiels
    </button>
    <button type="button" class="btn-green" id="add-button">
      <span>+</span> Ajouter à la promotion
    </button>
  </div> <!-- Fixed missing closing tag for div -->

  <!-- ------------------------------------------------------------FORMULAIRE AFFECTER UNE REF À LA PROMOTION ACTIVE------------------------------------------------------------ -->
  <div class="form-panel" id="form-panel">
    <div class="form-panel-header">
      <h3 class="form-panel-title">Ajouter un référentiel</h3>
    </div>
    <form method="POST" action="?route=ajouter_referentiel_a_promotion">
      <div class="form-group">
        <label class="form-label">Libellé référentiel</label>
        <select name="referentiel_id" class="form-input" id="referentiel-select" required>
          <option value="">Sélectionnez un référentiel</option>
          <?php foreach ($tousLesReferentiels as $ref): ?>
            <?php if (!in_array($ref['id'], $promotion_active['referentiels'] ?? [])): ?>
              <option value="<?= $ref['id'] ?>"><?= htmlspecialchars($ref['nom']) ?></option>
            <?php endif; ?>
          <?php endforeach; ?>
        </select>
      </div>
      <div class="form-group">
        <p class="promotion-active">Référentiels de la promotion active</p>
        <div class="tags-container">
          <?php if (!empty($promotion_active['referentiels'])): ?>
            <?php foreach ($referentielsEnCours as $ref): ?>
              <div class="tag">
                <?= htmlspecialchars($ref['nom']) ?>
              </div>
            <?php endforeach; ?>
          <?php else: ?>
            <div class="tag">
              Aucun référentiel associé
            </div>
          <?php endif; ?>
        </div>
      </div>
      <div class="form-buttons">
        <button type="button" class="btn-cancel" id="cancel-button">Annuler</button>
        <button type="submit" class="btn-finish">Terminer</button>
      </div>
    </form>
  </div>

  <!-- ------------------------------------------------------------CARDS REF DE LA PROMOTION ACTIVE ------------------------------------------------------------ -->
  <?php if (empty($referentielsEnCours)): ?>
    <div class="alert alert-info">
      Aucun référentiel n'est associé à la promotion active.
    </div>
  <?php else: ?>
    <div class="card-grid">
      <?php foreach ($referentielsEnCours as $ref): ?>
        <div class="card">
          <div class="card-image" style="background-image: url('assets/uploads/<?= htmlspecialchars($ref['image'] ?: 'default.jpg') ?>');"></div>
          <div class="card-content">
            <h3 class="card-title"><?= htmlspecialchars($ref['nom']) ?></h3>
            <p class="card-modules"><?= count($ref['modules'] ?? []) ?> modules</p>
            <p class="card-description"><?= htmlspecialchars($ref['description']) ?></p>
            <div class="card-footer">
              <!-- nombre d'apprenant -->
              <p>Nombre d'apprenant : <?= htmlspecialchars($ref['nombre_apprenant'] ?? 0) ?></p>
            </div>
            <div class="card-actions">
              <button type="button" class="btn-remove show-confirm-btn" data-ref-id="<?= $ref['id'] ?>" <?= ($ref['nombre_apprenant'] ?? 0) > 0 ? 'disabled' : '' ?>>
                <i class="fas fa-trash"></i> Retirer
              </button>
              
              <div class="confirmation-box" id="confirm-box-<?= $ref['id'] ?>" style="display: none;">
                <p>Êtes-vous sûr de vouloir retirer ce référentiel de la promotion active ?</p>
                <div class="confirmation-actions">
                  <button type="button" class="btn-cancel cancel-confirm-btn" data-ref-id="<?= $ref['id'] ?>">Annuler</button>
                  <form method="POST" action="?route=supprimer_referentiel_de_promotion">
                    <input type="hidden" name="referentiel_id" value="<?= $ref['id'] ?>">
                    <button type="submit" class="btn-remove">Confirmer</button>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
  <?php endif; ?>
</div>

<!-- ------------------------------------------------------------TOUS LES REFERENTIELS EXISTANT------------------------------------------------------------ -->
<div id="tous-referentiels-section" class="container">
  <div class="back-link">
    <a href="#" class="return-button" id="back-to-active">
      <i class="fas fa-arrow-left"></i> Retour aux référentiels actifs
    </a>
  </div>

  <div class="page-header">
    <h1 class="page-title">Tous les Référentiels</h1>
    <p class="page-subtitle">Liste complète des référentiels de formation</p>
  </div>

  <!-- ------------------------------------------------------------RECHERCHE / BUTTON NOUVEAU REF------------------------------------------------------------ -->
  <div class="search-create-container">
    <div class="search-container">
      <form action="?route=referentiels" method="GET">
        <input type="hidden" name="route" value="referentiels">
        <input type="hidden" name="section" value="all"> <!-- Ajout de ce paramètre -->
        <i class="fas fa-search search-icon"></i>
        <input type="text" id="search-input-all" name="search" placeholder="Rechercher un référentiel..." class="search-input" value="<?= htmlspecialchars($_GET['search'] ?? '') ?>">
      </form>
    </div>
    <button type="button" class="create-button" id="create-referential-button">
      <i class="fas fa-plus"></i> Créer un référentiel
    </button>
  </div>

  <!-- ------------------------------------------------------------FORMULAIRE ADD NOUVEAU REF------------------------------------------------------------ -->
  <div class="form-panel" id="create-referential-form">
    <div class="form-panel-header">
        <h3 class="form-panel-title">Créer un nouveau référentiel</h3>
        <span class="close-button" id="close-create-form" style="cursor: pointer; font-size: 16px;">×</span>
    </div>

    <form method="POST" action="?route=store_referentiel" enctype="multipart/form-data">
        <div style="text-align: center; margin: 20px 0;">
            <label for="image-upload" style="cursor: pointer;">
                <div style="border: 1px dashed #ccc; width: 140px; height: 140px; margin: 0 auto; display: flex; flex-direction: column; justify-content: center; align-items: center; background-color: #f5f5f5; border-radius: 5px;">
                    <div style="width: 50px; height: 50px; display: flex; justify-content: center; align-items: center; color: #999;">
                        <i class="fas fa-image" style="font-size: 24px;"></i>
                    </div>
                    <div style="margin-top: 10px; font-size: 12px; color: #666; text-align: center;">
                        Cliquez pour ajouter<br>une photo
                    </div>
                </div>
            </label>
            <input type="file" id="image-upload" name="image" style="display: none;" accept="image/*">
            <?php if (isset($_SESSION['errors']['image'])): ?>
                <p class="error-message"><?= $_SESSION['errors']['image'] ?></p>
            <?php endif; ?>
        </div>

        <div class="form-group">
            <label class="form-label">Nom<span style="color: red;">*</span></label>
            <input type="text" name="nom" class="form-input" value="<?= htmlspecialchars($_SESSION['old']['nom'] ?? '') ?>">
            <?php if (isset($_SESSION['errors']['nom'])): ?>
                <p class="error-message"><?= $_SESSION['errors']['nom'] ?></p>
            <?php endif; ?>
        </div>

        <div class="form-group">
            <label class="form-label">Description<span style="color: red;">*</span></label>
            <textarea name="description" class="form-input" style="height: 100px;"><?= htmlspecialchars($_SESSION['old']['description'] ?? '') ?></textarea>
            <?php if (isset($_SESSION['errors']['description'])): ?>
                <p class="error-message"><?= $_SESSION['errors']['description'] ?></p>
            <?php endif; ?>
        </div>

        <div style="display: flex; gap: 15px;">
            <div class="form-group" style="flex: 1;">
                <label class="form-label">Capacité<span style="color: red;">*</span></label>
                <input type="number" name="capacite" class="form-input" placeholder="30" value="<?= htmlspecialchars($_SESSION['old']['capacite'] ?? '') ?>">
                <?php if (isset($_SESSION['errors']['capacite'])): ?>
                    <p class="error-message"><?= $_SESSION['errors']['capacite'] ?></p>
                <?php endif; ?>
            </div>

            <div class="form-group" style="flex: 1;">
                <label class="form-label">Nombre de sessions<span style="color: red;">*</span></label>
                <select name="sessions" class="form-input">
                    <option value="1" <?= (isset($_SESSION['old']['sessions']) && $_SESSION['old']['sessions'] == 1) ? 'selected' : '' ?>>1 session</option>
                    <option value="2" <?= (isset($_SESSION['old']['sessions']) && $_SESSION['old']['sessions'] == 2) ? 'selected' : '' ?>>2 sessions</option>
                    <option value="3" <?= (isset($_SESSION['old']['sessions']) && $_SESSION['old']['sessions'] == 3) ? 'selected' : '' ?>>3 sessions</option>
                    <option value="4" <?= (isset($_SESSION['old']['sessions']) && $_SESSION['old']['sessions'] == 4) ? 'selected' : '' ?>>4 sessions</option>
                </select>
                <?php if (isset($_SESSION['errors']['sessions'])): ?>
                    <p class="error-message"><?= $_SESSION['errors']['sessions'] ?></p>
                <?php endif; ?>
            </div>
        </div>

        <?php unset($_SESSION['old']); ?>

        <div class="form-buttons">
            <button type="button" class="btn-cancel" id="cancel-create-form">Annuler</button>
            <button type="submit" class="btn-finish" style="background-color: #4CAF50;">Créer</button>
        </div>
    </form>
</div>

  <!-- ------------------------------------------------------------CARDS TOUS LES REFS------------------------------------------------------------ -->
  <div class="card-grid">
    <?php foreach ($tousLesReferentiels as $ref): ?>
      <div class="card">
        <div class="card-image" style="background-image: url('assets/uploads/<?= htmlspecialchars($ref['image'] ?: 'default.jpg') ?>');"></div>
        <div class="card-content">
          <h3 class="card-title"><?= htmlspecialchars($ref['nom']) ?></h3>
          <p class="card-description"><?= htmlspecialchars($ref['description']) ?></p>
          <div class="card-footer">
            <p>Capacité : <?= htmlspecialchars($ref['capacite']) ?> places</p>
            <?php if (in_array($promotion_active, $ref['promotions'] ?? [])): ?>
              <span class="badge">Actif</span>
            <?php endif; ?>
          </div>
        </div>
      </div>
    <?php endforeach; ?>
  </div>
</div>

<!-- JavaScript pour les interactions -->
<script>
  document.addEventListener('DOMContentLoaded', function() {
    // Éléments DOM
    const addButton = document.getElementById('add-button');
    const cancelButton = document.getElementById('cancel-button');
    const formPanel = document.getElementById('form-panel');
    const showAllRefButton = document.getElementById('show-all-referentiels');
    const backToActiveButton = document.getElementById('back-to-active');
    const refActifsSection = document.getElementById('referentiels-actifs-section');
    const tousRefSection = document.getElementById('tous-referentiels-section');
    const createRefButton = document.getElementById('create-referential-button');
    const createRefForm = document.getElementById('create-referential-form');
    const cancelCreateForm = document.getElementById('cancel-create-form');
    const closeCreateForm = document.getElementById('close-create-form');
    const searchInput = document.getElementById('search-input');
    const searchInputAll = document.getElementById('search-input-all');

    const urlParams = new URLSearchParams(window.location.search);
    if (urlParams.get('section') === 'all') {
      refActifsSection.style.display = 'none';
      tousRefSection.style.display = 'block';
    }

    // Afficher/cacher le formulaire d'ajout de référentiel à la promotion
    if (addButton && cancelButton && formPanel) {
      addButton.addEventListener('click', function() {
        formPanel.style.display = 'block';
      });

      cancelButton.addEventListener('click', function() {
        formPanel.style.display = 'none';
      });
    }

    // Navigation entre les sections
    if (showAllRefButton && backToActiveButton && refActifsSection && tousRefSection) {
      showAllRefButton.addEventListener('click', function() {
        refActifsSection.style.display = 'none';
        tousRefSection.style.display = 'block';
      });

      backToActiveButton.addEventListener('click', function() {
        tousRefSection.style.display = 'none';
        refActifsSection.style.display = 'block';
      });
    }

    // Formulaire de création de référentiel
    if (createRefButton && createRefForm && cancelCreateForm && closeCreateForm) {
      createRefButton.addEventListener('click', function() {
        createRefForm.style.display = 'block';
      });

      cancelCreateForm.addEventListener('click', function() {
        createRefForm.style.display = 'none';
      });

      closeCreateForm.addEventListener('click', function() {
        createRefForm.style.display = 'none';
      });
    }




    // Prévisualisation de l'image
    const imageUpload = document.getElementById('image-upload');
    if (imageUpload) {
      imageUpload.addEventListener('change', function(e) {
        const file = e.target.files[0];
        if (file) {
          const reader = new FileReader();
          reader.onload = function(event) {
            const parent = imageUpload.parentElement.querySelector('div');
            parent.style.backgroundImage = `url(${event.target.result})`;
            parent.style.backgroundSize = 'cover';
            parent.style.backgroundPosition = 'center';
            parent.innerHTML = '';
          }
          reader.readAsDataURL(file);
        }
      });
    }

    // Gestion des boutons de confirmation
    const showConfirmBtns = document.querySelectorAll('.show-confirm-btn');
    const cancelConfirmBtns = document.querySelectorAll('.cancel-confirm-btn');

    // Afficher la boîte de confirmation
    showConfirmBtns.forEach(btn => {
      btn.addEventListener('click', function() {
        const refId = this.getAttribute('data-ref-id');
        document.getElementById('confirm-box-' + refId).style.display = 'block';
        this.style.display = 'none';
      });
    });

    // Masquer la boîte de confirmation
    cancelConfirmBtns.forEach(btn => {
      btn.addEventListener('click', function() {
        const refId = this.getAttribute('data-ref-id');
        document.getElementById('confirm-box-' + refId).style.display = 'none';
        document.querySelector(`.show-confirm-btn[data-ref-id="${refId}"]`).style.display = 'inline-block';
      });
    });
  });
</script>