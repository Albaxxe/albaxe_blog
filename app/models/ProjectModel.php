<?php

namespace App\Models;

use App\Models\BaseModel;

class ProjectModel extends BaseModel
{
    protected string $table = 'projects';

    /**
     * Récupère tous les projets
     *
     * @return array
     */
    public function getAllProjects(): array
    {
        return $this->all($this->table);
    }

    /**
     * Récupère un projet par son ID
     *
     * @param int $id
     * @return array|null
     */
    public function findProject(int $id): ?array
    {
        return $this->find($this->table, $id);
    }

    /**
     * Crée un nouveau projet
     *
     * @param array $data
     * @return int ID du projet créé
     */
    public function createProject(array $data): int
    {
        return $this->create($this->table, $data);
    }

    /**
     * Met à jour un projet existant
     *
     * @param int $id
     * @param array $data
     * @return bool
     */
    public function updateProject(int $id, array $data): bool
    {
        return $this->update($this->table, $id, $data);
    }

    /**
     * Supprime un projet par son ID
     *
     * @param int $id
     * @return bool
     */
    public function deleteProject(int $id): bool
    {
        return $this->delete($this->table, $id);
    }
}
