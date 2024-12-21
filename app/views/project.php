<?php
$title = "Détails du projet";
use App\Models\CommentModel;

include __DIR__ . '/layouts/header.php';
?>

<h1><?= htmlspecialchars($project['titre']) ?></h1>
<p><?= htmlspecialchars($project['description_courte']) ?></p>
<p><?= htmlspecialchars($project['description_longue']) ?></p>

<?php if (isset($_GET['error'])): ?>
    <div class="alert alert-danger" role="alert">
        <?php if ($_GET['error'] === 'not_connected'): ?>
            Vous devez être connecté pour commenter.
        <?php elseif ($_GET['error'] === 'empty_comment'): ?>
            Le commentaire ne peut pas être vide.
        <?php else: ?>
            Une erreur est survenue, veuillez réessayer.
        <?php endif; ?>
    </div>
<?php endif; ?>

<?php if (isset($_SESSION['user_id'])): 
    $commentModel = new CommentModel();
    $comments = $commentModel->getCommentsByProject($project['id']);
    include __DIR__ . '/comments.php';
    ?>
    <form action="/albaxe_blog/public/project/<?= $project['id'] ?>/comment" method="post" class="mt-4">
        <textarea name="content" placeholder="Votre commentaire..." required class="form-control mb-2"></textarea>
        <button type="submit" class="btn btn-primary">Envoyer</button>
    </form>
<?php else: ?>
    <p>Vous devez être <a href="/albaxe_blog/public/login">connecté</a> ou <a href="/albaxe_blog/public/register">inscrit</a> pour voir et commenter.</p>
<?php endif; ?>

<?php include __DIR__ . '/layouts/footer.php'; ?>
