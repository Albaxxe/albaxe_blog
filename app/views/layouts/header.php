<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Charger les informations de l'utilisateur depuis la base de données
if (isset($_SESSION['user_id'])) {
    require_once __DIR__ . '/../../models/UserModel.php';
    $userModel = new UserModel();
    $user = $userModel->getUserById($_SESSION['user_id']);
    if ($user) {
        $_SESSION['username'] = htmlspecialchars($user['username']);
        $_SESSION['profile_picture'] = !empty($user['photo_de_profil']) ? htmlspecialchars($user['photo_de_profil']) : '/albaxe_blog/public/images/default-profile.png';
    } else {
        session_unset();
        session_destroy();
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?? 'Albaxe Blog'; ?></title>
    <link rel="stylesheet" href="/albaxe_blog/public/css/style.css">
    <script defer src="/albaxe_blog/public/js/app.js"></script>
</head>
<body>
<header>
    <div class="header-container">
        <!-- Menu déroulant à gauche -->
        <div class="menu-left">
            <button id="menu-toggle">Menu</button>
            <div class="dropdown">
                <a href="/albaxe_blog/public/cv">CV</a>
                <a href="/albaxe_blog/public/projects">Projets</a>
            </div>
        </div>

        <!-- Titre centré -->
        <h1><a href="/albaxe_blog/public">Albaxe Blog</a></h1>

        <!-- Connexion et Inscription -->
        <nav>
            <ul>
                <?php if (isset($_SESSION['username'])): ?>
                    <li>Bienvenue, <?= $_SESSION['username'] ?>!</li>
                    <li><a href="/albaxe_blog/public/logout">Déconnexion</a></li>
                <?php else: ?>
                    <li><a href="/albaxe_blog/public/login">Connexion</a></li>
                    <li><a href="/albaxe_blog/public/register">Inscription</a></li>
                <?php endif; ?>
            </ul>
        </nav>
    </div>
</header>

<main>
