<?php

namespace App\Services;

require_once __DIR__ . '/../enums/Rule.php';


use App\Enums\Rule;

return [
    Rule::MIN->value   => fn($value, $min) => strlen($value) >= $min,
    Rule::MAX->value   => fn($value, $max) => strlen($value) <= $max,
    Rule::EMAIL->value => fn($value) => filter_var($value, FILTER_VALIDATE_EMAIL),
    Rule::DATE->value  => fn($value) => strtotime($value) !== false,
    Rule::PHONE->value => fn($value) => preg_match('/^(77|78|76|70)[0-9]{7}$/', $value),
    Rule::REQUIRED->value => fn($value) => !empty(trim($value)),
    Rule::PASSWORD->value => fn($value) => strlen($value) >= 8 && preg_match('/[A-Z]/', $value) && preg_match('/[0-9]/', $value),
    Rule::MATRICULE->value => fn($value) => preg_match('/^[A-Z0-9]+$/', $value),

    'validate_promotion' => function (array $data, array $promotions): array {
        $errors = [];

        // Validation du nom (obligatoire et unique)
        if (empty(trim($data['nom']))) {
            $errors['nom'] = 'promotion.nom.required';
        } else {
            foreach ($promotions as $promo) {
                if (strtolower(trim($promo['nom'])) === strtolower(trim($data['nom']))) {
                    $errors['nom'] = 'promotion.nom.existe';
                    break;
                }
            }
        }

        // Validation de la date de début (obligatoire et valide)
        if (empty(trim($data['date_debut']))) {
            $errors['date_debut'] = 'promotion.date_debut.required';
        } elseif (!strtotime($data['date_debut'])) {
            $errors['date_debut'] = 'date';
        }

        // Validation de la date de fin (obligatoire et valide)
        if (empty(trim($data['date_fin']))) {
            $errors['date_fin'] = 'promotion.date_fin.required';
        } elseif (!strtotime($data['date_fin'])) {
            $errors['date_fin'] = 'date';
        }

        // Vérification de la chronologie des dates
        if (!empty($data['date_debut']) && !empty($data['date_fin'])) {
            if (strtotime($data['date_debut']) > strtotime($data['date_fin'])) {
                $errors['date_fin'] = 'promotion.date_fin.chronologie';
            }
        }

        //verifier le format de la date JJ/MM/AAAA
        if (!empty($data['date_debut']) && !preg_match('/^\d{2}\/\d{2}\/\d{4}$/', $data['date_debut'])) {
            $errors['date_debut'] = 'promotion.date_debut.format';
        }
        if (!empty($data['date_fin']) && !preg_match('/^\d{2}\/\d{2}\/\d{4}$/', $data['date_fin'])) {
            $errors['date_fin'] = 'promotion.date_fin.format';
        }

        // Validation de la photo (obligatoire et format)
        if (empty($data['photo']['name'])) {
            $errors['photo'] = 'photo.required';
        } else {
            $ext = strtolower(pathinfo($data['photo']['name'], PATHINFO_EXTENSION));
            $allowed = ['jpg', 'jpeg', 'png'];
            if (!in_array($ext, $allowed)) {
                $errors['photo'] = 'photo.format';
            }
            if ($data['photo']['size'] > 2 * 1024 * 1024) {
                $errors['photo'] = 'photo.size';
            }
        }

        // Validation des référentiels (au moins un référentiel requis)
        if (empty($data['referentiels'])) {
            $errors['referentiels'] = 'promotion.referentiels.required';
        }

        return $errors;
    },

    'validate_login' => function (array $data): array {
        $errors = [];

        // Validation du champ login (email ou matricule)
        if (empty(trim($data['login'] ?? ''))) {
            $errors['login'] = 'login.required';
        }

        // Validation du mot de passe
        if (empty(trim($data['password'] ?? ''))) {
            $errors['password'] = 'password.required';
        }

        return $errors;
    },

    'validate_password_reset' => function (array $data): array {
        $errors = [];

        // Validation de l'email pour la réinitialisation
        if (empty(trim($data['email'] ?? ''))) {
            $errors['email'] = 'required';
        } elseif (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
            $errors['email'] = 'forgot.email.invalid';
        }

        return $errors;
    },

    'validate_new_password' => function (array $data): array {
        $errors = [];

        // Validation du nouveau mot de passe
        if (empty(trim($data['new_password'] ?? ''))) {
            $errors['new_password'] = 'required';
        } elseif (strlen($data['new_password']) < 8) {
            $errors['new_password'] = 'reset.password.length';
        } elseif (!preg_match('/[A-Z]/', $data['new_password'])) {
            $errors['new_password'] = 'reset.password.majuscule';
        } elseif (!preg_match('/[0-9]/', $data['new_password'])) {
            $errors['new_password'] = 'reset.password.chiffre';
        }

        // Validation de la confirmation du mot de passe
        if (empty(trim($data['confirm_password'] ?? ''))) {
            $errors['confirm_password'] = 'required';
        } elseif ($data['new_password'] !== $data['confirm_password']) {
            $errors['confirm_password'] = 'password.confirm.mismatch';
        }

        return $errors;
    },

    'validate_referentiel' => function (array $data, array $referentiels): array {
        $errors = [];

        // Validation du nom (obligatoire et unique) 
        if (empty(trim($data['nom'] ?? ''))) {
            $errors['nom'] = 'referentiel.nom.required';
        } else {
            foreach ($referentiels as $ref) {
                if (strtolower(trim($ref['nom'])) === strtolower(trim($data['nom']))) {
                    $errors['nom'] = 'referentiel.nom.existe';
                    break;
                }
            }
        }

        // Validation de la description (obligatoire)
        if (empty(trim($data['description'] ?? ''))) {
            $errors['description'] = 'referentiel.description.required';
        }

        // Validation de la capacité (obligatoire et numérique)
        if (empty($data['capacite'])) {
            $errors['capacite'] = 'referentiel.capacite.required';
        } elseif (!is_numeric($data['capacite']) || intval($data['capacite']) <= 0) {
            $errors['capacite'] = 'referentiel.capacite.numeric';
        }

        // Validation du nombre de sessions (obligatoire)
        if (empty($data['sessions'])) {
            $errors['sessions'] = 'referentiel.sessions.required';
        }

        // Validation de la photo (obligatoire et format)
        if (empty($data['image']['name'] ?? '')) {
            $errors['image'] = 'photo.required';
        } else {
            $ext = strtolower(pathinfo($data['image']['name'], PATHINFO_EXTENSION));
            $allowed = ['jpg', 'jpeg', 'png'];
            if (!in_array($ext, $allowed)) {
                $errors['image'] = 'photo.format';
            }
            if ($data['image']['size'] > 2 * 1024 * 1024) {
                $errors['image'] = 'photo.size';
            }
        }

        return $errors;
    },

    'validate_apprenant' => function (array $data, array $apprenants): array {
        $errors = [];

        // Validation du nom
        if (empty(trim($data['nom'] ?? ''))) {
            $errors['nom'] = 'apprenant.nom.required';
        } elseif (strlen($data['nom']) > 50) {
            $errors['nom'] = 'apprenant.nom.max';
        }

        // Validation du prénom
        if (empty(trim($data['prenom'] ?? ''))) {
            $errors['prenom'] = 'apprenant.prenom.required';
        } elseif (strlen($data['prenom']) > 50) {
            $errors['prenom'] = 'apprenant.prenom.max';
        }

        // Validation de la date de naissance
        if (empty(trim($data['naissance']['date'] ?? ''))) {
            $errors['date_naissance'] = 'apprenant.date_naissance.required';
        } elseif (!preg_match('/^\d{2}\/\d{2}\/\d{4}$/', $data['naissance']['date'])) {
            $errors['date_naissance'] = 'apprenant.date_naissance.format';
        } elseif (!strtotime($data['naissance']['date'])) {
            $errors['date_naissance'] = 'apprenant.date_naissance.invalide';
        }

        // Validation du lieu de naissance
        if (empty(trim($data['naissance']['lieu'] ?? ''))) {
            $errors['lieu_naissance'] = 'apprenant.lieu_naissance.required';
        } elseif (strlen($data['naissance']['lieu']) > 100) {
            $errors['lieu_naissance'] = 'apprenant.lieu_naissance.max';
        }

        // Validation de l'adresse
        if (empty(trim($data['adresse'] ?? ''))) {
            $errors['adresse'] = 'apprenant.adresse.required';
        } elseif (strlen($data['adresse']) > 200) {
            $errors['adresse'] = 'apprenant.adresse.max';
        }

        // Validation de l'email
        if (empty(trim($data['email'] ?? ''))) {
            $errors['email'] = 'apprenant.email.required';
        } elseif (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
            $errors['email'] = 'apprenant.email.invalid';
        } else {
            // Vérifier si l'email existe déjà
            foreach ($apprenants as $apprenant) {
                if (strtolower($apprenant['email']) === strtolower($data['email'])) {
                    $errors['email'] = 'apprenant.email.exists';
                    break;
                }
            }
        }

        // Validation du téléphone
        if (empty(trim($data['telephone'] ?? ''))) {
            $errors['telephone'] = 'apprenant.telephone.required';
        } elseif (!preg_match('/^(77|78|76|70)[0-9]{7}$/', $data['telephone'])) {
            $errors['telephone'] = 'apprenant.telephone.format';
        }

        // Validation de la photo
        if (empty($data['photo']['name'] ?? '') && empty($data['photo'] ?? '')) {
            $errors['photo'] = 'apprenant.photo.required';
        } elseif (!empty($data['photo']['name'])) {
            $ext = strtolower(pathinfo($data['photo']['name'], PATHINFO_EXTENSION));
            $allowed = ['jpg', 'jpeg', 'png'];
            if (!in_array($ext, $allowed)) {
                $errors['photo'] = 'apprenant.photo.format';
            }
            if ($data['photo']['size'] > 2 * 1024 * 1024) {
                $errors['photo'] = 'apprenant.photo.size';
            }
        }

        // Validation du référentiel
        if (empty(trim($data['referentiel_id'] ?? ''))) {
            $errors['referentiel_id'] = 'apprenant.referentiel.required';
        }

        // Validation des informations du tuteur
        // Nom du tuteur
        if (empty(trim($data['tuteur']['nom'] ?? ''))) {
            $errors['nom_tuteur'] = 'apprenant.tuteur.nom.required';
        } elseif (strlen($data['tuteur']['nom']) > 100) {
            $errors['nom_tuteur'] = 'apprenant.tuteur.nom.max';
        }

        // Lien de parenté
        if (empty(trim($data['tuteur']['lien'] ?? ''))) {
            $errors['lien_parente'] = 'apprenant.tuteur.lien.required';
        } elseif (strlen($data['tuteur']['lien']) > 50) {
            $errors['lien_parente'] = 'apprenant.tuteur.lien.max';
        }

        // Adresse du tuteur
        if (empty(trim($data['tuteur']['adresse'] ?? ''))) {
            $errors['adresse_tuteur'] = 'apprenant.tuteur.adresse.required';
        } elseif (strlen($data['tuteur']['adresse']) > 200) {
            $errors['adresse_tuteur'] = 'apprenant.tuteur.adresse.max';
        }

        // Téléphone du tuteur
        if (empty(trim($data['tuteur']['telephone'] ?? ''))) {
            $errors['telephone_tuteur'] = 'apprenant.tuteur.telephone.required';
        } elseif (!preg_match('/^(77|78|76|70)[0-9]{7}$/', $data['tuteur']['telephone'])) {
            $errors['telephone_tuteur'] = 'apprenant.tuteur.telephone.format';
        }

        return $errors;
    },
];