<?php

namespace App\Controllers;

use App\Core\Database;

class ProjectController
{
    public function show($id)
    {
        $db = Database::getInstance();

        // Récupérer un projet spécifique
        $stmt = $db->prepare("SELECT * FROM projects WHERE id = :id");
        $stmt->execute(['id' => $id]);
        $project = $stmt->fetch();

        if (!$project) {
            return "<h1>404 - Projet introuvable</h1><p>Le projet demandé n'existe pas.</p>";
        }

        ob_start();
        include __DIR__ . '/../views/project.php';
        return ob_get_clean();
    }

    public function list()
    {
        $db = Database::getInstance();

        // Récupérer tous les projets
        $stmt = $db->query("SELECT * FROM projects");
        $projects = $stmt->fetchAll();

        ob_start();
        include __DIR__ . '/../views/projects.php';
        return ob_get_clean();
    }
}
