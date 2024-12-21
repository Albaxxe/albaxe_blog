<?php
// File: app/models/Project.php

class Project {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    // Créer un nouveau projet
    public function create($title, $description_short, $description_long) {
        $stmt = $this->db->prepare("INSERT INTO projects (title, description_short, description_long) VALUES (?, ?, ?)");
        return $stmt->execute([$title, $description_short, $description_long]);
    }

    // Obtenir tous les projets
    public function getAll() {
        $stmt = $this->db->query("SELECT * FROM projects ORDER BY created_at DESC");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Obtenir un projet par son ID
    public function getById($id) {
        $stmt = $this->db->prepare("SELECT * FROM projects WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
