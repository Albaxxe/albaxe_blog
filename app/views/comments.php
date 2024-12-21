<?php foreach ($comments as $comment): ?>
    <div class="comment-container">
        <div class="comment-content">
            <p><?= htmlspecialchars($comment['contenu'] ?? '') ?></p>
            <small>Posté le: <?= htmlspecialchars($comment['date_publication'] ?? '') ?></small>
        </div>
        <div class="comment-user">
            <img src="/albaxe_blog/public/<?= htmlspecialchars($comment['photo_de_profil'] ?? 'images/users/default.png') ?>" alt="Photo profil" class="comment-photo">
            <strong><?= htmlspecialchars($comment['nom'] ?? '') ?></strong>
        </div>
    </div>
<?php endforeach; ?>
