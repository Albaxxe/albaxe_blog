<?php $title = "Connexion"; ?>
<?php include __DIR__ . '/layouts/header.php'; ?>

<div class="main-container">
    <h2>Connexion</h2>
    <form action="" method="POST">
        <input type="email" name="email" placeholder="Adresse Email" required>
        <input type="password" name="password" placeholder="Mot de passe" required>
        <button type="submit">Se connecter</button>
    </form>
    <p>Pas encore inscrit ? <a href="<?= BASE_URL ?>/register">Créer un compte</a></p>
</div>


<?php include __DIR__ . '/layouts/footer.php'; ?>
