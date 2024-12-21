<?php

namespace App\Controllers;

use App\Models\UserModel;

class AdminController
{
    public function __construct()
    {
        // Vérification de session et des droits d'accès
        session_start();
        if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'admin') {
            header('Location: /albaxe_blog/public/login');
            exit;
        }
    }

    /**
     * Liste des utilisateurs
     */
    public function listUsers(): string
    {
        $userModel = new UserModel();
        $users = $userModel->getAllUsers();

        $title = "Gestion des utilisateurs";
        ob_start();
        include __DIR__ . '/../views/admin_list_users.php';
        return ob_get_clean();
    }

    /**
     * Formulaire d'édition d'un utilisateur
     */
    public function editUserForm(int $id): string
    {
        $userModel = new UserModel();
        $user = $userModel->getUserById($id);

        if (!$user) {
            // Redirection si l'utilisateur n'existe pas
            header("Location: /albaxe_blog/public/admin/users?error=Utilisateur introuvable");
            exit;
        }

        $title = "Éditer l'utilisateur";
        ob_start();
        include __DIR__ . '/../views/admin_edit_user.php';
        return ob_get_clean();
    }

    /**
     * Traitement du formulaire d'édition d'un utilisateur
     */
    public function updateUser(int $id): void
    {
        $userModel = new UserModel();
        $user = $userModel->getUserById($id);

        if (!$user) {
            header("Location: /albaxe_blog/public/admin/users?error=Utilisateur introuvable");
            exit;
        }

        // Récupérer les données du formulaire avec fallback
        $nom = $_POST['nom'] ?? $user['nom'];
        $prenom = $_POST['prenom'] ?? $user['prenom'];
        $email = $_POST['email'] ?? $user['email'];
        $role = $_POST['role'] ?? $user['role'];
        $photo_de_profil = $_POST['photo_de_profil'] ?? $user['photo_de_profil'];
        $a_propos = $_POST['a_propos'] ?? $user['a_propos'];
        $username = $_POST['username'] ?? $user['username'];

        // Préparer les données pour la mise à jour
        $data = [
            'nom' => htmlspecialchars($nom),
            'prenom' => htmlspecialchars($prenom),
            'email' => filter_var($email, FILTER_SANITIZE_EMAIL),
            'role' => htmlspecialchars($role),
            'photo_de_profil' => htmlspecialchars($photo_de_profil),
            'a_propos' => htmlspecialchars($a_propos),
            'username' => htmlspecialchars($username),
        ];

        // Mettre à jour l'utilisateur dans la base de données
        $success = $userModel->updateUser($id, $data);

        if ($success) {
            header("Location: /albaxe_blog/public/admin/users?success=Mise à jour réussie");
        } else {
            header("Location: /albaxe_blog/public/admin/users?error=Échec de la mise à jour");
        }
        exit;
        }

        /**
        * Supprimer un utilisateur
        */
        public function deleteUser(int $id): void
        {
        $userModel = new UserModel();
        $success = $userModel->deleteUser($id);

        if ($success) {
          header("Location: /albaxe_blog/public/admin/users?success=Utilisateur supprimé avec succès.");
        } else {
          header("Location: /albaxe_blog/public/admin/users?error=Échec de la suppression de l'utilisateur.");
        }
        exit;
        }

}
