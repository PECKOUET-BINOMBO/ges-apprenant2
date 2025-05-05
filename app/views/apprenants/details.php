<style>
    .apprenant-layout {
        display: flex;
        gap: 20px;
    }

    .apprenant-leftpanel {
        width: 220px;
        flex-shrink: 0;
    }

    .apprenant-mainpanel {
        flex: 1;
    }

    .apprenant-topbar {
        display: flex;
        align-items: center;
        margin-bottom: 20px;
    }

    .apprenant-heading {
        display: flex;
        align-items: center;
        gap: 5px;
    }

    .apprenant-heading h1 {
        color: #1a9a9a;
        font-size: 24px;
        font-weight: 500;
    }

    .apprenant-heading span {
        color: #ff9933;
        font-size: 18px;
    }

    .apprenant-returnlink {
        display: flex;
        align-items: center;
        gap: 5px;
        color: #666;
        text-decoration: none;
        font-size: 14px;
        margin-bottom: 15px;
        cursor: pointer;
    }

    .apprenant-userbox {
        background: white;
        border-radius: 10px;
        padding: 20px;
        margin-bottom: 20px;
        box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
    }

    .apprenant-usersummary {
        display: flex;
        flex-direction: column;
        align-items: center;
        gap: 10px;
    }

    .apprenant-avatar {
        width: 80px;
        height: 80px;
        border-radius: 50%;
        overflow: hidden;
        background-color: #1a9a9a;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .apprenant-avatar img {
        width: 80px;
        height: 80px;
        object-fit: cover;
    }

    .apprenant-fullname {
        font-weight: 500;
        text-align: center;
    }

    .apprenant-category {
        background-color: #1a9a9a;
        color: white;
        font-size: 12px;
        padding: 5px 10px;
        border-radius: 4px;
        font-weight: 500;
    }

    .apprenant-statusbadge {
        background-color: #8ce08c;
        color: white;
        font-size: 12px;
        padding: 3px 15px;
        border-radius: 15px;
        margin-top: 5px;
    }

    .apprenant-contactblock {
        margin-top: 15px;
    }

    .apprenant-contactrow {
        display: flex;
        align-items: center;
        gap: 10px;
        margin-bottom: 10px;
        font-size: 14px;
    }

    .apprenant-contactrow i {
        color: #888;
        font-size: 16px;
        width: 20px;
    }

    .apprenant-contactlabel {
        font-weight: 500;
        width: 50px;
    }

    .apprenant-statsgroup {
        display: flex;
        gap: 20px;
        margin-bottom: 20px;
    }

    .apprenant-statbox {
        flex: 1;
        background: white;
        border-radius: 10px;
        padding: 20px;
        display: flex;
        align-items: center;
        box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
    }

    .apprenant-staticon {
        width: 50px;
        height: 50px;
        border-radius: 50%;
        display: flex;
        justify-content: center;
        align-items: center;
        margin-right: 20px;
    }

    .apprenant-statpresent .apprenant-staticon {
        background-color: #e6f7f1;
        color: #1a9a9a;
    }

    .apprenant-statlate .apprenant-staticon {
        background-color: #fff5e6;
        color: #ff9933;
    }

    .apprenant-statabsent .apprenant-staticon {
        background-color: #ffebee;
        color: #f44336;
    }

    .apprenant-statinfo .apprenant-statnumber {
        font-size: 24px;
        font-weight: 500;
        margin-bottom: 5px;
    }

    .apprenant-statinfo .apprenant-statlabel {
        font-size: 14px;
        color: #888;
    }

    .apprenant-statpresent .apprenant-statnumber {
        color: #1a9a9a;
    }

    .apprenant-statlate .apprenant-statnumber {
        color: #ff9933;
    }

    .apprenant-statabsent .apprenant-statnumber {
        color: #f44336;
    }

    .apprenant-tabgroup {
        display: flex;
        margin-bottom: 20px;
        border-radius: 10px;
        overflow: hidden;
    }

    .apprenant-tabitem {
        flex: 1;
        padding: 15px;
        text-align: center;
        cursor: pointer;
        background-color: #fff;
        border-bottom: 3px solid #ddd;
    }

    .apprenant-tabitem.active-tab {
        background-color: #ff9933;
        color: white;
        border-bottom: 3px solid #e67300;
    }

    .apprenant-tabitem:last-child {
        border-right: none;
    }

    .apprenant-modulesgrid {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 20px;
    }

    .apprenant-modulecard {
        background: white;
        border-radius: 10px;
        overflow: hidden;
        box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
    }

    .apprenant-moduletop {
        position: relative;
        padding: 15px;
    }

    .apprenant-modulelength {
        display: flex;
        align-items: center;
        gap: 5px;
        font-size: 12px;
        color: white;
        background-color: rgba(0, 0, 0, 0.7);
        padding: 5px 10px;
        border-radius: 15px;
        width: fit-content;
        margin-bottom: 10px;
    }

    .apprenant-modulemenu {
        position: absolute;
        top: 15px;
        right: 15px;
        cursor: pointer;
    }

    .apprenant-modulename {
        font-size: 16px;
        font-weight: 500;
        margin-bottom: 5px;
    }

    .apprenant-moduledesc {
        font-size: 12px;
        color: #666;
        margin-bottom: 15px;
    }

    .apprenant-modulelevel {
        display: inline-block;
        font-size: 11px;
        background-color: #e6f7f1;
        color: #1a9a9a;
        padding: 3px 10px;
        border-radius: 10px;
        margin-bottom: 15px;
    }

    .apprenant-modulebottom {
        display: flex;
        padding: 10px 15px;
        border-top: 1px solid #eee;
    }

    .apprenant-moduledate,
    .apprenant-moduletime {
        display: flex;
        align-items: center;
        gap: 5px;
        font-size: 12px;
        color: #666;
        flex: 1;
    }

    .apprenant-moduledate i,
    .apprenant-moduletime i {
        color: #1a9a9a;
    }

    .apprenant-moduletime i {
        color: #ff9933;
    }

    .apprenant-accentstripe {
        height: 5px;
        background: linear-gradient(to right, #1a9a9a, #ff9933);
        position: absolute;
        top: 0;
        right: 0;
        width: 80px;
    }

    /* Icons */
    .apprenant-icon {
        font-size: 20px;
    }

    .apprenant-tabcontent {
        position: relative;
    }
</style>
<?php if (isset($apprenant)): ?>
    <div class="apprenant-wrapper">
        <header class="apprenant-topbar">
            <div class="apprenant-heading">
                <h1>Apprenants</h1>
                <span>/ Détails</span>
            </div>
        </header>

        <div class="apprenant-layout">
            <div class="apprenant-leftpanel">
                <a href="?route=apprenants" class="apprenant-returnlink">
                    ← Retour à la liste
                </a>

                <div class="apprenant-userbox">
                    <div class="apprenant-usersummary">
                        <div class="apprenant-avatar">
                            <img src="/assets/images/<?= htmlspecialchars($apprenant['photo'] ?? 'default.jpg') ?>" alt="Photo de <?= htmlspecialchars($apprenant['nom'] ?? '') ?>">
                        </div>
                        <h3 class="apprenant-fullname"><?= htmlspecialchars($apprenant['prenom'] ?? '') . ' ' . htmlspecialchars($apprenant['nom'] ?? '') ?></h3>
                        <div class="apprenant-category">
                            <?php if (is_array($apprenant['referentiel'] ?? '')): ?>
                                <?= htmlspecialchars(implode(', ', $apprenant['referentiel'])) ?>
                            <?php else: ?>
                                <?= htmlspecialchars($apprenant['referentiel'] ?? 'Non défini') ?>
                            <?php endif; ?>
                        </div>
                        <div class="apprenant-statusbadge"><?= htmlspecialchars($apprenant['statut'] ?? 'Inconnu') ?></div>
                    </div>

                    <div class="apprenant-contactblock">
                        <div class="apprenant-contactrow">
                            <i class="apprenant-icon">📱</i>
                            <span class="apprenant-contactlabel">Tel</span>
                            <span><?= htmlspecialchars($apprenant['telephone'] ?? 'Non défini') ?></span>
                        </div>
                        <div class="apprenant-contactrow">
                            <i class="apprenant-icon">✉️</i>
                            <span class="apprenant-contactlabel">Email</span>
                            <span><?= htmlspecialchars($apprenant['email'] ?? 'Non défini') ?></span>
                        </div>
                        <div class="apprenant-contactrow">
                            <i class="apprenant-icon">📍</i>
                            <span class="apprenant-contactlabel">Adresse</span>
                            <span><?= htmlspecialchars($apprenant['adresse'] ?? 'Non défini') ?></span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="apprenant-mainpanel">
                <div class="apprenant-statsgroup">
                    <div class="apprenant-statbox apprenant-statpresent">
                        <div class="apprenant-staticon">
                            <span class="apprenant-icon">✓</span>
                        </div>
                        <div class="apprenant-statinfo">
                            <div class="apprenant-statnumber"><?= htmlspecialchars($apprenant['presences'] ?? 0) ?></div>
                            <div class="apprenant-statlabel">Présence(s)</div>
                        </div>
                    </div>

                    <div class="apprenant-statbox apprenant-statlate">
                        <div class="apprenant-staticon">
                            <span class="apprenant-icon">⏰</span>
                        </div>
                        <div class="apprenant-statinfo">
                            <div class="apprenant-statnumber"><?= htmlspecialchars($apprenant['retards'] ?? 0) ?></div>
                            <div class="apprenant-statlabel">Retard(s)</div>
                        </div>
                    </div>

                    <div class="apprenant-statbox apprenant-statabsent">
                        <div class="apprenant-staticon">
                            <span class="apprenant-icon">⚠️</span>
                        </div>
                        <div class="apprenant-statinfo">
                            <div class="apprenant-statnumber"><?= htmlspecialchars($apprenant['absences'] ?? 0) ?></div>
                            <div class="apprenant-statlabel">Absence(s)</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php else: ?>
    <p>Apprenant introuvable.</p>
<?php endif; ?>