<?php
// File: app/views/auth/login.php
require_once '../app/views/layouts/header.php';
?>
<div class="form-container">
     <h1>Connexion</h1>
<form action="login" method="POST">
    <input type="email" name="email" placeholder="Email" required>
    <input type="password" name="password" placeholder="Mot de passe" required>
    <button type="submit">Se connecter</button>
</form>
</div>
<?php
require_once '../app/views/layouts/footer.php';
?>
