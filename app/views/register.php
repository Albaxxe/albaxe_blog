<?php $title = "Inscription"; ?>
<?php include __DIR__ . '/layouts/header.php'; ?>

<div class="main-container">
    <h2>Inscription</h2>
    <form action="" method="POST">
        <input type="text" name="username" placeholder="Pseudo" required>
        <input type="email" name="email" placeholder="Adresse Email" required>
        <input type="password" name="password" placeholder="Mot de passe" required>
        <button type="submit">S'inscrire</button>
    </form>
    <p>Déjà inscrit ? <a href="<?= BASE_URL ?>/login">Se connecter</a></p>
</div>

<?php include __DIR__ . '/layouts/footer.php'; ?>
