<?php $title = "Inscription"; ?>
<?php include __DIR__ . '/layouts/header.php'; ?>

<div class="main-container">
    <h2>Inscription</h2>

    <?php 
    $flashMessage = \App\Controllers\AuthController::getFlashMessage();
    if ($flashMessage): 
    ?>
        <div class="flash-message <?= htmlspecialchars($flashMessage['type']) ?>">
            <?= htmlspecialchars($flashMessage['content']) ?>
        </div>
    <?php endif; ?>

    <form action="/albaxe_blog/public/register" method="post" class="login-form">
        <div class="form-group">
            <label for="username">Pseudo</label>
            <input type="text" id="username" name="username" placeholder="Entrez votre pseudo" required>
        </div>
        <div class="form-group">
            <label for="email">Adresse Email</label>
            <input type="email" id="email" name="email" placeholder="Entrez votre adresse email" required>
        </div>
        <div class="form-group">
            <label for="password">Mot de passe</label>
            <input type="password" id="password" name="password" placeholder="Entrez votre mot de passe" required>
        </div>
        <div class="form-group">
            <label for="confirm_password">Confirmez le mot de passe</label>
            <input type="password" id="confirm_password" name="confirm_password" placeholder="Confirmez le mot de passe" required>
        </div>
        <button type="submit">S'inscrire</button>
        <div class="form-links-bottom">
            <span>Vous avez déjà un compte ? </span><a href="/albaxe_blog/public/login">Connectez-vous</a>
        </div>
    </form>
</div>

<?php include __DIR__ . '/layouts/footer.php'; ?>
