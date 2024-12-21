<?php
// File: public/index.php

session_start();

// Autoloading des classes
spl_autoload_register(function ($class) {
    $file = '../app/controllers/' . $class . '.php';
    if (file_exists($file)) {
        require_once $file;
    } else {
        die("Le fichier pour la classe $class n'existe pas : $file");
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
        require_once '../app/views/auth/login.php';
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
