<?php

namespace App\Models;

use App\Core\Database;
use PDO;

class UserModel
{
    private $db;

    public function __construct()
    {
        $this->db = Database::getInstance();
    }

    public function getUserByEmail(string $email): ?array
    {
    $sql = "SELECT * FROM users WHERE email = :email";
    $stmt = $this->db->prepare($sql);
    $stmt->bindParam(':email', $email, PDO::PARAM_STR);
    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    // Retourne null si aucun résultat n'est trouvé
    return $result ?: null;
    }
    public function createUser(string $name, string $email, string $hashedPassword, string $username): void
    {
    $sql = "INSERT INTO users (nom, email, mot_de_passe, username, role, photo_de_profil, date_inscription)
            VALUES (:name, :email, :password, :username, 'user', 'images/users/default.png', NOW())";
    $stmt = $this->db->prepare($sql);
    $stmt->bindParam(':name', $name, PDO::PARAM_STR);
    $stmt->bindParam(':email', $email, PDO::PARAM_STR);
    $stmt->bindParam(':password', $hashedPassword, PDO::PARAM_STR);
    $stmt->bindParam(':username', $username, PDO::PARAM_STR);
    $stmt->execute();
    }
    public function generateUniqueUsername(string $name): string
    {
    $baseUsername = strtolower(preg_replace('/\s+/', '_', $name)); // Remplace les espaces par des underscores
    $username = $baseUsername;
    $counter = 1;

    while ($this->getUserByUsername($username) !== null) {
        $username = $baseUsername . '_' . $counter; // Ajoute un numéro si le username existe déjà
        $counter++;
    }

    return $username;
    }

    public function getUserByUsername(string $username): ?array
    {
    $sql = "SELECT * FROM users WHERE username = :username";
    $stmt = $this->db->prepare($sql);
    $stmt->bindParam(':username', $username, PDO::PARAM_STR);
    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    // Retourne null si aucun résultat n'est trouvé
    return $result ?: null;
    }
    public function getUserById($id) {
        $query = "SELECT * FROM users WHERE id = :id";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

}

