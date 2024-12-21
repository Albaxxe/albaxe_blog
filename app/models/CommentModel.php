<?php

namespace App\Models;

use App\Core\Database;
use PDO;

class CommentModel
{
    private $db;

    public function __construct()
    {
        $this->db = Database::getInstance();
    }

    public function getCommentsByProject($projectId)
    {
    $sql = "SELECT c.*, u.nom, u.photo_de_profil 
            FROM comments c 
            JOIN users u ON c.user_id = u.id 
            WHERE c.project_id = :project_id 
            ORDER BY c.date_publication DESC";
    $stmt = $this->db->prepare($sql);
    $stmt->bindValue(':project_id', $projectId, PDO::PARAM_INT);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

  

    public function addComment($projectId, $userId, $content, $parentId = null)
    {
        $stmt = $this->db->prepare("INSERT INTO comments (project_id, user_id, contenu, parent_id) 
                                    VALUES (:project_id, :user_id, :contenu, :parent_id)");
        return $stmt->execute([
            'project_id' => $projectId,
            'user_id' => $userId,
            'contenu' => htmlspecialchars($content),
            'parent_id' => $parentId
        ]);
    }
}
