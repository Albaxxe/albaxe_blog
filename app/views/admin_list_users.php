<?php include __DIR__ . '/layouts/header.php'; ?>

<h2>Liste des utilisateurs</h2>

<!-- Affichage des messages de succès ou d'erreur -->
<?php if (!empty($_GET['error'])): ?>
    <div class="alert alert-danger" role="alert">
        <?= htmlspecialchars($_GET['error']) ?>
    </div>
<?php endif; ?>

<?php if (!empty($_GET['success'])): ?>
    <div class="alert alert-success" role="alert">
        <?= htmlspecialchars($_GET['success']) ?>
    </div>
<?php endif; ?>

<!-- Tableau des utilisateurs -->
<table class="table table-striped">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nom</th>
            <th>Prénom</th>
            <th>Email</th>
            <th>Rôle</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($users as $u): ?>
        <tr>
            <td><?= htmlspecialchars($u['id']) ?></td>
            <td><?= htmlspecialchars($u['nom']) ?></td>
            <td><?= htmlspecialchars($u['prenom']) ?></td>
            <td><?= htmlspecialchars($u['email']) ?></td>
            <td><?= htmlspecialchars($u['role']) ?></td>
            <td>
                <a href="/albaxe_blog/public/admin/user/<?= $u['id'] ?>/edit" class="btn btn-sm btn-primary">Éditer</a>
                <a href="/albaxe_blog/public/admin/user/<?= $u['id'] ?>/delete" class="btn btn-sm btn-danger" 
                   onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet utilisateur ?');">Supprimer</a>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>

<?php include __DIR__ . '/layouts/footer.php'; ?>
