<?php
// File: app/controllers/ProjectController.php

require_once 'app/models/Project.php';

class ProjectController {
    private $projectModel;

    public function __construct($db) {
        $this->projectModel = new Project($db);
    }

    // Afficher la liste des projets
    public function index() {
        return $this->projectModel->getAll();
    }

    // Afficher un projet spécifique
    public function view($id) {
        return $this->projectModel->getById($id);
    }
}
