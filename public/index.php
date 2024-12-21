<?php
// Démarrage de la session (nécessaire pour gestion utilisateurs, etc.)
session_start();

// Chargement des constantes de configuration
require_once __DIR__ . '/../app/config/config.php';

// Si l'utilisateur est connecté, mettez à jour les informations globales
if (isset($_SESSION['user_id'])) {
    define('IS_LOGGED_IN', true);
    define('USER_ID', $_SESSION['user_id']);
    define('USERNAME', $_SESSION['username']);
    define('PROFILE_PICTURE', $_SESSION['profile_picture']);
} else {
    define('IS_LOGGED_IN', false);
}


// Mode debug : affichage des erreurs si activé
if (defined('DEBUG_MODE') && DEBUG_MODE) {
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
}

// Autoloader pour les classes
spl_autoload_register(function ($class) {
    $baseDir = __DIR__ . '/../';
    $file = $baseDir . str_replace('\\', '/', $class) . '.php';
    if (file_exists($file)) {
        require_once $file;
    }
});

// Importation des namespaces
use App\Core\Router;
use App\Core\Request;
use App\Controllers\HomeController;
use App\Controllers\ProjectController;
use App\Controllers\AuthController;
use App\Controllers\CVController;
use App\Controllers\CommentController;
use App\Controllers\PostController;

// Initialisation du routeur
$router = new Router(new Request());

// Routes principales
$router->get('/', 'HomeController@index');

// Routes pour les projets
$router->get('/projects', 'ProjectController@list');       // Liste des projets
$router->get('/project/{id}', 'ProjectController@show');   // Détails d'un projet

// Si vous avez un système de création/édition de projets (Admin par ex.)
// $router->get('/project/create', 'ProjectController@createForm');
// $router->post('/project/create', 'ProjectController@create');
// $router->get('/project/{id}/edit', 'ProjectController@editForm');
// $router->post('/project/{id}/edit', 'ProjectController@edit');
// $router->get('/project/{id}/delete', 'ProjectController@delete');

// Routes pour le CV
$router->get('/cv', 'CVController@show'); // Page CV

// Routes d'authentification
$router->get('/register', 'AuthController@registerForm');
$router->post('/register', 'AuthController@register');
$router->get('/login', 'AuthController@loginForm');
$router->post('/login', 'AuthController@login');
$router->get('/logout', 'AuthController@logout');

// Routes pour les commentaires (si vous avez le contrôleur et les méthodes)
$router->get('/project/{id}/comments', 'CommentController@index');  // Liste des commentaires d'un projet
$router->post('/project/{id}/comment', 'CommentController@store');  // Ajouter un commentaire

// Routes pour les "postes" (mises à jour des projets) si vous avez un PostController
$router->get('/project/{id}/posts', 'PostController@index');     // Liste des postes d'un projet
$router->post('/project/{id}/post', 'PostController@store');     // Ajouter un poste
// $router->get('/project/{id}/post/{postId}/edit', 'PostController@editForm');
// $router->post('/project/{id}/post/{postId}/edit', 'PostController@edit');
// $router->get('/project/{id}/post/{postId}/delete', 'PostController@delete');

// Interface administrateur (si existante)
$router->get('/admin/users', 'AdminController@listUsers');
$router->get('/admin/user/{id}/edit', 'AdminController@editUserForm');
$router->post('/admin/user/{id}/edit', 'AdminController@updateUser');
$router->get('/admin/user/{id}/delete', 'AdminController@deleteUser');


// Exécution du routage
echo $router->dispatch();
