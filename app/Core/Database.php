<?php

namespace App\Core;

use PDO;
use PDOException;

class Database
{
    private static $instance = null;

    public static function getInstance(): PDO
    {
        if (self::$instance === null) {
            try {
                // Les constantes sont définies globalement, utilisez-les sans namespace
                $dsn = 'mysql:host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=utf8mb4';
                self::$instance = new PDO($dsn, DB_USER, DB_PASSWORD);
                self::$instance->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {
                die('Erreur de connexion à la base de données : ' . $e->getMessage());
            }
        }
        return self::$instance;
    }
}
