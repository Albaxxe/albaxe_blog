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
<header class="header">
    <div class="container">
        <h1 class="site-title">
            <a href="<?= BASE_URL; ?>">Albaxe Blog</a>
        </h1>
        <nav class="navigation">
            <button class="menu-toggle" aria-label="Ouvrir le menu">Menu</button>
            <ul class="nav-links">
                <li><a href="<?= BASE_URL; ?>/cv">CV</a></li>
                <li><a href="<?= BASE_URL; ?>/projects">Projets</a></li>
                <li><a href="<?= BASE_URL; ?>/login">Connexion</a></li>
                <li><a href="<?= BASE_URL; ?>/register">Inscription</a></li>
            </ul>
        </nav>
    </div>
</header>


<main>
