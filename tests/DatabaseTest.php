<?php

require_once __DIR__ . '/../app/config/config.php';
require_once __DIR__ . '/../app/Core/Database.php';

use App\Core\Database;

try {
    $db = Database::getInstance();
    echo "Connexion réussie !";
} catch (Exception $e) {
    echo "Erreur de connexion : " . $e->getMessage();
}
