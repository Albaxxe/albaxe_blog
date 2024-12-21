<?php

namespace App\Models;

class PostModel extends BaseModel
{
    protected string $table = 'posts';

    public function getPostsByProject(int $projectId): array
    {
        $stmt = $this->db->prepare("SELECT * FROM {$this->table} WHERE project_id = :project_id ORDER BY date_publication DESC");
        $stmt->execute(['project_id' => $projectId]);
        return $stmt->fetchAll();
    }

    public function createPost(array $data): int
    {
        return $this->create($this->table, $data);
    }

    public function updatePost(int $id, array $data): bool
    {
        return $this->update($this->table, $id, $data);
    }

    public function deletePost(int $id): bool
    {
        return $this->delete($this->table, $id);
    }
}
