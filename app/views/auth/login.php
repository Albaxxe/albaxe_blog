<div class="form-container">
    <form action="<?= BASE_URL ?>/auth/login" method="POST">
        <label for="email">Email</label>
        <input type="email" name="email" id="email" placeholder="Entrez votre email" required>
        
        <label for="password">Mot de passe</label>
        <input type="password" name="password" id="password" placeholder="Entrez votre mot de passe" required>
        
        <button type="submit">Se connecter</button>
    </form>
</div>