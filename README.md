# Albaxe Blog

Ce projet est un site web dynamique en PHP respectant une architecture MVC et offrant les fonctionnalités suivantes :

- Présentation d'un CV dynamique.
- Affichage de projets avec possibilité d'ajouter des "postes" d'avancement.
- Interaction utilisateur : commentaires sur les projets et postes.
- Système de comptes (inscription, connexion, déconnexion).
- Interface administrateur pour gérer le contenu.
- Design responsive avec Bootstrap.
- Sécurité : mots de passe hashés, requêtes préparées, protection contre XSS.

## Prérequis

- XAMPP ou WAMP (Apache, MySQL, PHP).
- PHP 7.4 ou supérieur.
- MySQL 5.7 ou supérieur.

## Installation

1. Clonez ce dépôt dans `C:/xampp/htdocs/albaxe_blog` (Windows).
2. Créez une base de données `albaxe_blog` via phpMyAdmin.
3. Importez le fichier `scripts/create_database.sql` dans la base `albaxe_blog`.
4. Assurez-vous que `mod_rewrite` est activé dans Apache et que `AllowOverride All` est configuré pour `htdocs`.
5. Rendez-vous sur `http://localhost/albaxe_blog/public/`.

## Configuration

Fichier `app/config/config.php` :

```php
<?php
const DB_HOST = 'localhost';
const DB_NAME = 'albaxe_blog';
const DB_USER = 'root';
const DB_PASSWORD = '';

const BASE_URL = 'http://localhost/albaxe_blog';
const SECURITY_SALT = 'random_salt_for_extra_security';
const DEBUG_MODE = true;
date_default_timezone_set('UTC');
