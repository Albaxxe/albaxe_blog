<?php
// File: app/models/User.php

class User {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    // Créer un utilisateur
    public function create($username, $email, $password, $role = 'user') {
        $hashedPassword = password_hash($password, PASSWORD_BCRYPT);
        $stmt = $this->db->prepare("INSERT INTO users (username, email, mot_de_passe, role) VALUES (?, ?, ?, ?)");
        return $stmt->execute([$username, $email, $hashedPassword, $role]);
    }

    // Trouver un utilisateur par email ou username
    public function findByUsernameOrEmail($identifier) {
        $stmt = $this->db->prepare("SELECT * FROM users WHERE username = ? OR email = ?");
        $stmt->execute([$identifier, $identifier]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Vérifier le mot de passe
    public function verifyPassword($user, $password) {
        return password_verify($password, $user['mot_de_passe']);
    }
}
