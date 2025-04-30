<?php
namespace App\Controllers;

use function App\Controllers\render_view;
use function App\Controllers\redirect_to_route;
use App\Enums\Rule;

require_once __DIR__ . '/controller.php';
require_once __DIR__ . '/../models/model.php';
require_once __DIR__ . '/../services/session.service.php';
require_once __DIR__ . '/../services/validator.service.php';

$model = include __DIR__ . '/../models/model.php';
$session = include __DIR__ . '/../services/session.service.php';
$validator = include __DIR__ . '/../services/validator.service.php';

$messages = include __DIR__ . '/../views/translate/fr/message.fr.php';
if (!$messages || !is_array($messages)) {
    $messages = [
        'login.success' => 'Connexion réussie.',
        'logout.success' => 'Déconnexion réussie.',
        'password.reset.success' => 'Votre mot de passe a été réinitialisé avec succès.',
    ];
}

function show_login(): void
{
    global $session;
    $session['start_session']();

    $data = [
        'error' => null,
        'formErrors' => [],
        'title' => 'Connexion'
    ];

    // Récupérer un éventuel message de succès depuis la session
    if ($session['get']('message')) {
        $data['message'] = $session['get']('message');
        $session['unset']('message'); // Effacer le message après l'avoir affiché
    }

    render_view('auth/login', $data);
}

function handle_login(): void
{
    global $model, $session, $validator;
    $session['start_session']();

    // Récupérer et filtrer les données de formulaire
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_SPECIAL_CHARS);
    $password = $_POST['password'] ?? '';

    // Charger les messages d'erreur
    $errors = @include __DIR__ . '/../views/translate/fr/error.fr.php';
    if (!$errors || !is_array($errors)) {
        $errors = [
            'login.required' => 'Veuillez saisir votre email ou matricule.',
            'password.required' => 'Veuillez saisir votre mot de passe.',
            'login.invalide' => 'Identifiants incorrects.',
        ];
    }

    // Validation basique
    $formErrors = [];
    
    if (empty(trim($email))) {
        $formErrors['email'] = $errors['login.required'];
    }
    
    if (empty(trim($password))) {
        $formErrors['password'] = $errors['password.required'];
    }
    
    // S'il y a des erreurs, réafficher le formulaire
    if (!empty($formErrors)) {
        render_view('auth/login', [
            'formErrors' => $formErrors,
            'title' => 'Connexion'
        ]);
        return;
    }

    // Vérifier les identifiants
    $utilisateurs = $model['get_users']();

    if (!is_array($utilisateurs)) {
        render_view('auth/login', [
            'error' => 'Erreur interne : impossible de charger les utilisateurs.',
            'title' => 'Connexion'
        ]);
        return;
    }

    $authenticated = false;

    foreach ($utilisateurs as $user) {
        if (($user['email'] === $email || $user['matricule'] === $email) && $user['mot_de_passe'] === $password) {
            $session['set']('user', $user);
            $authenticated = true;

            $messages = include __DIR__ . '/../views/translate/fr/message.fr.php';
            $session['set']('message', $messages['login.success']);
            

            redirect_to_route('?route=dashboard');
            break;
        }
    }

    if (!$authenticated) {
        render_view('auth/login', [
            'error' => $errors['login.invalide'],
            'title' => 'Connexion'
        ]);
    }
}

function logout(): void
{
    global $session;
    $session['start_session']();
    
    // Message de déconnexion
    $messages = include __DIR__ . '/../translate/message.fr.php';
    $session['set']('message', $messages['logout.success']);
    
    $session['destroy_session']();
    redirect_to_route('?route=login');
}

function show_forgot(): void
{
    global $session;
    $session['start_session']();

    $data = [
        'title' => 'Mot de passe oublié',
        'formErrors' => []
    ];

    // Récupérer un éventuel message d'erreur depuis la session
    if ($session['get']('error')) {
        $data['error'] = $session['get']('error');
        $session['unset']('error');
    }

    render_view('auth/forgot', $data);
}

function handle_forgot(): void
{
    global $model, $session;
    $session['start_session']();

    // Charger les messages d'erreur
    $errors = include __DIR__ . '/../views/translate/fr/error.fr.php';
    
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $formErrors = [];

    // Validation de l'email
    if (empty(trim($email))) {
        $formErrors['email'] = $errors['required'];
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $formErrors['email'] = $errors['email'];
    }

    // S'il y a des erreurs, réafficher le formulaire
    if (!empty($formErrors)) {
        render_view('auth/forgot', [
            'title' => 'Mot de passe oublié',
            'formErrors' => $formErrors,
            'email' => $email
        ]);
        return;
    }

    // Recherche de l'utilisateur par email
    $utilisateurs = $model['get_users']();
    $utilisateur = null;

    foreach ($utilisateurs as $user) {
        if ($user['email'] === $email) {
            $utilisateur = $user;
            break;
        }
    }

    if ($utilisateur) {
        // Si l'utilisateur existe, afficher la page de réinitialisation
        render_view('auth/reset', [
            'title' => 'Réinitialisation du mot de passe',
            'email' => $email,
            'nom' => $utilisateur['nom'],
            'prenom' => $utilisateur['prenom']
        ]);
    } else {
        // Pour des raisons de sécurité, ne pas révéler si l'email existe ou non
        // Mais stocker l'erreur pour l'afficher plus tard si nécessaire
        $session['set']('error', $errors['password.reset.email_sent']);
        render_view('auth/forgot', [
            'title' => 'Mot de passe oublié',
            'message' => $errors['password.reset.email_sent'],
            'email' => $email
        ]);
    }
}

function handle_reset(): void
{
    global $model, $session;
    $session['start_session']();

    // Charger les messages
    $errors = include __DIR__ . '/../views/translate/fr/error.fr.php';
    $messages = include __DIR__ . '/../views/translate/fr/message.fr.php';

    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $new_password = trim($_POST['mot_de_passe'] ?? '');
    $confirm_password = trim($_POST['confirm_password'] ?? '');
    
    $formErrors = [];

    // Validation du mot de passe
    if (empty($new_password)) {
        $formErrors['mot_de_passe'] = $errors['required'];
    } elseif (strlen($new_password) < 8) {
        $formErrors['mot_de_passe'] = $errors['min']; // Remplacer :min par 8
    } elseif (!preg_match('/[A-Z]/', $new_password) || !preg_match('/[0-9]/', $new_password)) {
        $formErrors['mot_de_passe'] = $errors['password'];
    }

    // Validation de la confirmation du mot de passe
    if (empty($confirm_password)) {
        $formErrors['confirm_password'] = $errors['required'];
    } elseif ($new_password !== $confirm_password) {
        $formErrors['confirm_password'] = $errors['password.confirm.mismatch'];
    }

    // Récupérer les informations utilisateur pour réafficher le formulaire en cas d'erreur
    $utilisateurs = $model['get_users']();
    $utilisateur = null;

    foreach ($utilisateurs as $user) {
        if ($user['email'] === $email) {
            $utilisateur = $user;
            break;
        }
    }

    // S'il y a des erreurs, réafficher le formulaire
    if (!empty($formErrors) && $utilisateur) {
        render_view('auth/reset', [
            'title' => 'Réinitialisation du mot de passe',
            'formErrors' => $formErrors,
            'email' => $email,
            'nom' => $utilisateur['nom'],
            'prenom' => $utilisateur['prenom']
        ]);
        return;
    }

    // Si l'utilisateur n'existe pas ou s'il y a des erreurs sans utilisateur
    if (!$utilisateur || !empty($formErrors)) {
        $session['set']('error', $errors['password.reset.token_invalid']);
        redirect_to_route('?route=forgot');
        return;
    }

    // Mettre à jour le mot de passe
    if ($model['update_user_password']($email, $new_password)) {
        // Redirection vers la page de connexion avec un message de succès
        $session['set']('message', $messages['password.reset.success']);
        redirect_to_route('?route=login');
    } else {
        // En cas d'erreur lors de la mise à jour
        render_view('auth/reset', [
            'title' => 'Réinitialisation du mot de passe',
            'error' => "Une erreur est survenue lors de la réinitialisation du mot de passe.",
            'email' => $email,
            'nom' => $utilisateur['nom'],
            'prenom' => $utilisateur['prenom']
        ]);
    }
}