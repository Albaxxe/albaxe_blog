<?php
// File: public/index.php

session_start();

// Autoloading des classes
spl_autoload_register(function ($class) {
    $paths = [
        __DIR__ . '/../app/controllers/',
        __DIR__ . '/../app/models/',
    ];

    foreach ($paths as $path) {
        $file = $path . $class . '.php';
        if (file_exists($file)) {
            require_once $file;
            return;
        }
    }
});


// Configuration de la base de données
require_once '../app/config/config.php';

// Exemple de routage basique
$page = $_GET['page'] ?? 'login';

switch ($page) {
    case 'login':
        $authController = new AuthController($db);
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $message = $authController->login($_POST['usernameOrEmail'], $_POST['password']);
        }
        $viewPath = __DIR__ . '/../app/views/auth/login.php';
        if (!file_exists($viewPath)) {
        die("Erreur : La vue demandée n'existe pas ($viewPath)");
        }    
        require_once $viewPath;
        break;

    case 'register':
        $authController = new AuthController($db);
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $message = $authController->register($_POST['username'], $_POST['email'], $_POST['password']);
        }
        require_once '../app/views/auth/register.php';
        break;

    case 'projects':
        $projectController = new ProjectController($db);
        $projects = $projectController->index();
        require_once '../app/views/projects/index.php';
        break;

    default:
        echo "Page non trouvée";
        break;
}
