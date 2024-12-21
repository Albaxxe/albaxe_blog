<?php
require '../app/config/config.php';

$page = $_GET['page'] ?? 'login';

switch ($page) {
    case 'login':
        $authController = new AuthController(new UserModel($pdo));
        $authController->login();
        break;
    case 'register':
        $authController = new AuthController(new UserModel($pdo));
        $authController->register();
        break;
    default:
        echo "Page non trouvée.";
}
?>
