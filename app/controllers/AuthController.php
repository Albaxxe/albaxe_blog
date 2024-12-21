<?php

namespace App\Controllers;

use App\Models\UserModel;

class AuthController
{
    /**
    * Affiche le formulaire d'inscription.
    */
    public function registerForm(): void
    {
    $title = "Inscription";
    require_once __DIR__ . '/../views/register.php';
    }

    /**
    * Affiche le formulaire de connexion.
    */
    public function loginForm(): void
    {
    $redirect = $_GET['redirect'] ?? '/albaxe_blog/public';
    $title = "Connexion";
    require_once __DIR__ . '/../views/login.php';
    }


    /**
     * Gère l'inscription des utilisateurs.
     */
    public function register(): void
    {
        $email = $_POST['email'] ?? '';
        $password = $_POST['password'] ?? '';
        $confirmPassword = $_POST['confirm_password'] ?? '';
        $name = $_POST['name'] ?? '';

        // Validation des champs
        if (empty($email) || empty($password) || empty($name)) {
            $this->setFlashMessage('Tous les champs sont obligatoires.', 'error');
            header('Location: /albaxe_blog/public/register');
            exit;
        }

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $this->setFlashMessage('Adresse email invalide.', 'error');
            header('Location: /albaxe_blog/public/register');
            exit;
        }

        if ($password !== $confirmPassword) {
            $this->setFlashMessage('Les mots de passe ne correspondent pas.', 'error');
            header('Location: /albaxe_blog/public/register');
            exit;
        }

        if (strlen($password) < 8) {
            $this->setFlashMessage('Le mot de passe doit contenir au moins 8 caractères.', 'error');
            header('Location: /albaxe_blog/public/register');
            exit;
        }

        $userModel = new UserModel();

        // Vérification de l'existence de l'email
        if ($userModel->getUserByEmail($email)) {
            $this->setFlashMessage('Un utilisateur avec cet email existe déjà.', 'error');
            header('Location: /albaxe_blog/public/register');
            exit;
        }

        // Génération d'un username unique
        $username = $this->generateUniqueUsername($name);
        $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

        // Création de l'utilisateur
        $userModel->createUser($name, $email, $hashedPassword, $username);

        $this->setFlashMessage('Inscription réussie. Veuillez vous connecter.', 'success');
        header('Location: /albaxe_blog/public/login');
        exit;
    }

    /**
     * Gère la connexion des utilisateurs.
     */
    public function login(): void
    {
    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';
    $redirect = $_POST['redirect'] ?? '/albaxe_blog/public';

    $userModel = new UserModel();
    $user = $userModel->getUserByEmail($email);

    if ($user && password_verify($password, $user['mot_de_passe'])) {
        session_start();
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['username'] = $user['username'];
        $_SESSION['profile_picture'] = $user['photo_de_profil'] ?? '/path/to/default-profile.png';
        header("Location: $redirect");
        exit;
    }

    $this->setFlashMessage('Email ou mot de passe incorrect.', 'error');
    header('Location: /albaxe_blog/public/login');
    exit;
    }


    /**
    * Gère la déconnexion des utilisateurs.
    */
    public function logout(): void
    {
    session_start();
    session_unset();
    session_destroy();

    $this->setFlashMessage('Vous avez été déconnecté avec succès.', 'success');
    header('Location: /albaxe_blog/public/login');
    exit;
    }


    /**
     * Génère un username unique à partir du nom complet.
     */
    private function generateUniqueUsername(string $name): string
    {
        $baseUsername = strtolower(preg_replace('/\s+/', '_', $name));
        $userModel = new UserModel();
        $uniqueUsername = $baseUsername;
        $counter = 1;

        while ($userModel->getUserByUsername($uniqueUsername)) {
            $uniqueUsername = $baseUsername . '_' . $counter;
            $counter++;
        }

        return $uniqueUsername;
    }

    /**
    * Définit un message flash pour l'utilisateur.
    */
    private function setFlashMessage(string $message, string $type): void
    {
    if (!isset($_SESSION)) {
        session_start();
    }
    $_SESSION['flash_message'] = [
        'content' => $message,
        'type' => $type,
    ];
    }

    /**
    * Récupère le message flash défini.
    */
    public static function getFlashMessage(): ?array
    {
    if (!isset($_SESSION)) {
        session_start();
    }
    $message = $_SESSION['flash_message'] ?? null;
    unset($_SESSION['flash_message']);
    return $message;
    }
}
