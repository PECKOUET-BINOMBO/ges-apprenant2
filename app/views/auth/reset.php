<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?? 'Réinitialiser le mot de passe' ?></title>
    <link rel="stylesheet" href="public/assets/css/auth.css">
</head>
<style>
    /* auth.css */
body {
    font-family: 'Arial', sans-serif;
    background-color: #f5f5f5;
    margin: 0;
    padding: 0;
    display: flex;
    justify-content: center;
    align-items: center;
    min-height: 100vh;
}

.login-container {
    display: flex;
    justify-content: center;
    align-items: center;
    width: 100%;
}

.login-box {
    background-color: white;
    padding: 30px;
    border-radius: 15px;
    box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
    width: 90%;
    max-width: 400px;
    position: relative;
    text-align: center;
    border-right: 8px solid #ff7900;
}

.login-box::before {
    content: '';
    position: absolute;
    bottom: 0;
    left: 0;
    right: 0;
    height: 10px;
    background-color: #009688;
    border-bottom-left-radius: 15px;
    border-bottom-right-radius: 15px;
}

.logo {
    max-width: 120px;
    margin-bottom: 15px;
}

h2 {
    font-size: 24px;
    margin-bottom: 25px;
    color: #333;
}

h3 {
    font-size: 18px;
    margin-bottom: 25px;
    color: #555;
    font-weight: normal;
}

.orange {
    color: #ff7900;
    font-weight: bold;
}

label {
    display: block;
    text-align: left;
    margin-bottom: 8px;
    color: #555;
    font-weight: bold;
}

input[type="text"],
input[type="email"],
input[type="password"] {
    width: 100%;
    padding: 12px;
    margin-bottom: 20px;
    border: 1px solid #ddd;
    border-radius: 5px;
    box-sizing: border-box;
    font-size: 16px;
}

.forgot {
    display: block;
    text-align: right;
    color: #ff7900;
    text-decoration: none;
    margin-bottom: 20px;
    font-size: 14px;
}

.btn-orange {
    background-color: #ff7900;
    color: white;
    border: none;
    padding: 12px 20px;
    width: 100%;
    border-radius: 5px;
    cursor: pointer;
    font-size: 16px;
    font-weight: bold;
    transition: background-color 0.3s;
}

.btn-orange:hover {
    background-color: #e66c00;
}

.error-msg {
    color: #d9534f;
    background-color: #f8d7da;
    border: 1px solid #f5c6cb;
    border-radius: 5px;
    padding: 10px;
    margin-bottom: 15px;
    text-align: left;
    font-size: 14px;
}

.success-msg {
    color: #3c763d;
    background-color: #dff0d8;
    border: 1px solid #d6e9c6;
    border-radius: 5px;
    padding: 10px;
    margin-bottom: 15px;
    text-align: left;
    font-size: 14px;
}

.link-back {
    margin-top: 20px;
}

.link-back a {
    color: #555;
    text-decoration: none;
}

.link-back a:hover {
    color: #ff7900;
}

@media (max-width: 768px) {
    .login-box {
        width: 95%;
        padding: 20px;
    }
}
</style>
<body>
    <div class="login-container">
        <div class="login-box">
            <img src="public/assets/images/logo.png" alt="Logo ODC" class="logo">
            <h3>Bienvenue sur<br><span class="orange">Ecole du code Sonatel Academy</span></h3>
            <h2>Réinitialisation du mot de passe</h2>

            <?php if (isset($error)) : ?>
                <div class="error-msg"><?= htmlspecialchars($error) ?></div>
            <?php endif; ?>

            <form action="?route=reset_post" method="post">
                <input type="hidden" name="email" value="<?= htmlspecialchars($email ?? '') ?>">

                <p><strong><?= htmlspecialchars($prenom ?? '') ?> <?= htmlspecialchars($nom ?? '') ?></strong></p>
                <p>Veuillez saisir un nouveau mot de passe :</p>

                <label for="mot_de_passe">Nouveau mot de passe</label>
                <input type="password" id="mot_de_passe" name="mot_de_passe" required placeholder="********">
                <?php if (!empty($formErrors['mot_de_passe'])) : ?>
                    <div class="error-msg"><?= htmlspecialchars($formErrors['mot_de_passe']) ?></div>
                <?php endif; ?>

                <label for="confirm_password">Confirmer le mot de passe</label>
                <input type="password" id="confirm_password" name="confirm_password" required placeholder="********">
                <?php if (!empty($formErrors['confirm_password'])) : ?>
                    <div class="error-msg"><?= htmlspecialchars($formErrors['confirm_password']) ?></div>
                <?php endif; ?>

                <button type="submit" class="btn-orange">Réinitialiser</button>
            </form>

            <div class="link-back">
                <a href="?route=login">← Retour à la connexion</a>
            </div>
        </div>
    </div>
</body>
</html>