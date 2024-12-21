<?php include __DIR__ . '/layouts/header.php'; ?>
<h2>Éditer l'utilisateur #<?= htmlspecialchars($user['id']) ?></h2>
<form action="/albaxe_blog/public/admin/user/<?= $user['id'] ?>/edit" method="post">
    <div class="mb-3">
        <label>Nom</label>
        <input type="text" name="nom" class="form-control" value="<?= htmlspecialchars($user['nom']) ?>">
    </div>
    <div class="mb-3">
        <label>Prénom</label>
        <input type="text" name="prenom" class="form-control" value="<?= htmlspecialchars($user['prenom']) ?>">
    </div>
    <div class="mb-3">
        <label>Email</label>
        <input type="email" name="email" class="form-control" value="<?= htmlspecialchars($user['email']) ?>">
    </div>
    <div class="mb-3">
        <label>Rôle (admin ou user)</label>
        <input type="text" name="role" class="form-control" value="<?= htmlspecialchars($user['role']) ?>">
    </div>
    <div class="mb-3">
        <label>Photo de profil (URL)</label>
        <input type="text" name="photo_de_profil" class="form-control" value="<?= htmlspecialchars($user['photo_de_profil']) ?>">
    </div>
    <div class="mb-3">
        <label>A propos</label>
        <textarea name="a_propos" class="form-control"><?= htmlspecialchars($user['a_propos']) ?></textarea>
    </div>
    <div class="mb-3">
        <label>Username</label>
        <input type="text" name="username" class="form-control" value="<?= htmlspecialchars($user['username']) ?>">
    </div>
    <button type="submit" class="btn btn-primary">Mettre à jour</button>
</form>
<?php include __DIR__ . '/layouts/footer.php'; ?>
