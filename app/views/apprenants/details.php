<link rel="stylesheet" href="assets/css/apprenants.css">

<div class="layout">
   <div class="content">
        <h1>Détails de l’Apprenant</h1>
        <div class="apprenant-detail">
            <div class="photo-box">
                <img src="public/uploads/<?= htmlspecialchars($apprenant['photo']) ?>" class="photo-large" alt="Photo de l'apprenant">
            </div>
            <div class="info-box">
                <h2><?= htmlspecialchars($apprenant['prenom'] . ' ' . $apprenant['nom']) ?></h2>
                <p><strong>Matricule :</strong> <?= htmlspecialchars($apprenant['matricule']) ?></p>
                <p><strong>Date & Lieu de naissance :</strong> <?= htmlspecialchars($apprenant['naissance']['date']) ?> à <?= htmlspecialchars($apprenant['naissance']['lieu']) ?></p>
                <p><strong>Adresse :</strong> <?= htmlspecialchars($apprenant['adresse']) ?></p>
                <p><strong>Email :</strong> <?= htmlspecialchars($apprenant['email']) ?></p>
                <p><strong>Téléphone :</strong> <?= htmlspecialchars($apprenant['telephone']) ?></p>
                <p><strong>Référentiel :</strong> <?= htmlspecialchars($referentiel) ?></p>
            </div>
        </div>

        <fieldset class="tuteur-box">
            <legend>Informations du Tuteur</legend>
            <p><strong>Nom :</strong> <?= htmlspecialchars($apprenant['tuteur']['nom']) ?></p>
            <p><strong>Lien de parenté :</strong> <?= htmlspecialchars($apprenant['tuteur']['lien']) ?></p>
            <p><strong>Adresse :</strong> <?= htmlspecialchars($apprenant['tuteur']['adresse']) ?></p>
            <p><strong>Téléphone :</strong> <?= htmlspecialchars($apprenant['tuteur']['telephone']) ?></p>
        </fieldset>

        <div class="frequentation-box">
            <div class="frequentation-column">
                <h3>Présences</h3>
                <ul>
                    <?php if (!empty($apprenant['presences'])): ?>
                        <?php foreach ($apprenant['presences'] as $date): ?>
                            <li><?= htmlspecialchars($date) ?></li>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <li>0</li>
                    <?php endif; ?>
                </ul>
            </div>
            <div class="frequentation-column">
                <h3>Retards</h3>
                <ul>
                    <?php if (!empty($apprenant['retards'])): ?>
                        <?php foreach ($apprenant['retards'] as $date): ?>
                            <li><?= htmlspecialchars($date) ?></li>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <li>0</li>
                    <?php endif; ?>
                </ul>
            </div>
            <div class="frequentation-column">
                <h3>Absences</h3>
                <ul>
                    <?php if (!empty($apprenant['absences'])): ?>
                        <?php foreach ($apprenant['absences'] as $date): ?>
                            <li><?= htmlspecialchars($date) ?></li>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <li>0</li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>

        <div class="module-programme">
            <h2>Programme & Modules</h2>
            <ul>
                <li>Introduction au développement</li>
                <li>Programmation Web</li>
                <li>JavaScript Avancé</li>
                <li>API REST & JSON</li>
                <li>Gestion de projet Agile</li>
            </ul>
        </div>

        <div class="presence-table">
            <h2>Liste de Présence</h2>
            <table>
                <thead>
                    <tr>
                        <th>Date & Heure</th>
                        <th>Statut</th>
                        <th>Justification</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (!empty($apprenant['historique_presences'])): ?>
                        <?php foreach ($apprenant['historique_presences'] as $entry): ?>
                            <tr>
                                <td><?= htmlspecialchars($entry['date']) ?></td>
                                <td><?= htmlspecialchars($entry['statut']) ?></td>
                                <td><?= $entry['justifie'] ? 'Oui' : 'Non' ?></td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="3">Aucune donnée</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>

        <a href="?route=apprenants" class="btn-orange">← Retour à la liste</a>
    </div>
</div>


