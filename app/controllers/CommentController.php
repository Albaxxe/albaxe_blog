<?php

namespace App\Controllers;

use App\Models\CommentModel;

class CommentController
{
    public function index($projectId)
    {
    session_start();
    if (!isset($_SESSION['user_id'])) {
        // Utilisateur non connecté
        return "Vous devez être connecté pour voir les commentaires.";
    }

    $commentModel = new CommentModel();
    $comments = $commentModel->getCommentsByProject($projectId);

    ob_start();
    include __DIR__ . '/../views/comments.php';
    return ob_get_clean();
    }


    public function store($projectId)
    {
    // Pas de session_start() ici si déjà faite dans index.php
    if (!isset($_SESSION['user_id'])) {
        // Redirection avec message d'erreur
        header("Location: /albaxe_blog/public/project/$projectId?error=not_connected");
        exit;
    }

    $userId = $_SESSION['user_id'];
    $content = $_POST['content'] ?? null;

    if (!$content) {
        // Redirection avec message d'erreur si contenu vide
        header("Location: /albaxe_blog/public/project/$projectId?error=empty_comment");
        exit;
    }

    $commentModel = new CommentModel();
    if ($commentModel->addComment($projectId, $userId, $content)) {
        header("Location: /albaxe_blog/public/project/$projectId");
        exit;
    } else {
        header("Location: /albaxe_blog/public/project/$projectId?error=unknown");
        exit;
    }
    }

}
