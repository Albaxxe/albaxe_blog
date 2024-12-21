<?php
// File: app/views/auth/login.php
require_once '../app/views/layouts/header.php';
?>
<div class="form-container">
    <h2>Connexion</h2>
    <form action="<?= BASE_URL ?>/public/login" method="POST">
        <label for="usernameOrEmail">Nom d'utilisateur ou Email</label>
        <input type="text" name="usernameOrEmail" id="usernameOrEmail" required>
        
        <label for="password">Mot de passe</label>
        <input type="password" name="password" id="password" required>
        
        <button type="submit">Connexion</button>
        <p><a href="<?= BASE_URL ?>/public/register">Créer un compte</a></p>
    </form>
</div>
<?php
require_once '../app/views/layouts/footer.php';
?>
