<?php
// File: app/config/config.php

define('DB_HOST', 'localhost');
define('DB_NAME', 'albaxe_blog');
define('DB_USER', 'root');
define('DB_PASSWORD', '');

try {
    $db = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME, DB_USER, DB_PASSWORD);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Erreur de connexion : " . $e->getMessage());
}
