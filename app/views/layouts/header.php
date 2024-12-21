<?php
// File: app/views/layouts/header.php
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Albaxe Blog</title>
    <link rel="stylesheet" href="<?= BASE_URL ?>/css/style.css">
</head>
<body>
<header>
    <div class="container">
        <h1><a href="<?= BASE_URL ?>/public/projects">Albaxe Blog</a></h1>
        <nav>
            <ul>
                <li><a href="<?= BASE_URL ?>/public/projects">Projets</a></li>
                <li><a href="<?= BASE_URL ?>/public/cv">Mon CV</a></li>
                <?php if (isset($_SESSION['user'])): ?>
                    <li><a href="<?= BASE_URL ?>/public/logout">Déconnexion</a></li>
                <?php else: ?>
                    <li><a href="<?= BASE_URL ?>/public/login">Connexion</a></li>
                    <li><a href="<?= BASE_URL ?>/public/register">Inscription</a></li>
                <?php endif; ?>
            </ul>
        </nav>
    </div>
</header>
<main>
