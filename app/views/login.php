<?php $title = "Connexion"; ?>
<?php include __DIR__ . '/layouts/header.php'; ?>

<div class="main-container">
    <h2>Connexion</h2>

    <?php 
    $flashMessage = \App\Controllers\AuthController::getFlashMessage();
    if ($flashMessage): 
    ?>
        <div class="flash-message <?= htmlspecialchars($flashMessage['type']) ?>">
            <?= htmlspecialchars($flashMessage['content']) ?>
        </div>
    <?php endif; ?>

    <form action="/albaxe_blog/public/login" method="post" class="login-form">
        <input type="hidden" name="redirect" value="<?= htmlspecialchars($_GET['redirect'] ?? '/albaxe_blog/public') ?>">

        <label for="username">Nom d'utilisateur ou Email</label>
        <input type="text" id="username" name="username" placeholder="Entrez votre nom d'utilisateur ou email" required>

        <label for="password">Mot de passe</label>
        <input type="password" id="password" name="password" placeholder="Entrez votre mot de passe" required>

        <?php if (!empty($error_message)): ?>
            <div class="error-message" style="color: red; font-weight: bold; margin-top: 10px;">
                <?= htmlspecialchars($error_message) ?>
            </div>
        <?php endif; ?>

        <div class="form-links-top">
            <a href="#">Mot de passe oublié ?</a>
        </div>

        <button type="submit">Connexion</button>
    </form>

    <div class="form-links-bottom">
        <span>Vous n'avez pas de compte ?</span>
        <a href="/albaxe_blog/public/register">Créez un compte</a>
    </div>
</div>

<?php include __DIR__ . '/layouts/footer.php'; ?>
