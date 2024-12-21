<?php
// File: app/controllers/AuthController.php

require_once __DIR__ . '/../models/User.php';

class AuthController {
    private $userModel;

    public function __construct($db) {
        $this->userModel = new User($db);
    }

    // Gérer la connexion
    public function login($usernameOrEmail, $password) {
        $user = $this->userModel->findByUsernameOrEmail($usernameOrEmail);

        if ($user && $this->userModel->verifyPassword($user, $password)) {
            $_SESSION['user'] = $user;
            header('Location: /albaxe_blog/public/projects');
            exit();
        } else {
            return "Identifiant ou mot de passe incorrect.";
        }
    }

    // Gérer l'inscription
    public function register($username, $email, $password) {
        if ($this->userModel->create($username, $email, $password)) {
            header('Location: /albaxe_blog/public/login');
            exit();
        } else {
            return "Erreur lors de l'inscription. Veuillez réessayer.";
        }
    }

    // Gérer la déconnexion
    public function logout() {
        session_destroy();
        header('Location: /albaxe_blog/public/login');
        exit();
    }
}
