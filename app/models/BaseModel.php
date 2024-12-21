<?php

namespace App\Models;

use App\Core\Database;
use PDO;

abstract class BaseModel
{
    protected PDO $db;

    public function __construct()
    {
        $this->db = Database::getInstance();
    }

    /**
     * Récupère tous les enregistrements d'une table.
     *
     * @param string $table
     * @return array
     */
    protected function all(string $table): array
    {
        $stmt = $this->db->query("SELECT * FROM $table");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * Récupère un enregistrement par ID.
     *
     * @param string $table
     * @param int $id
     * @return array|null
     */
    protected function find(string $table, int $id): ?array
    {
        $stmt = $this->db->prepare("SELECT * FROM $table WHERE id = :id LIMIT 1");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC) ?: null;
    }

    /**
     * Insère un nouvel enregistrement dans une table.
     *
     * @param string $table
     * @param array $data
     * @return int
     */
    protected function create(string $table, array $data): int
    {
        $columns = implode(', ', array_keys($data));
        $placeholders = ':' . implode(', :', array_keys($data));

        $stmt = $this->db->prepare("INSERT INTO $table ($columns) VALUES ($placeholders)");
        $stmt->execute($data);

        return (int)$this->db->lastInsertId();
    }

    /**
     * Met à jour un enregistrement dans une table.
     *
     * @param string $table
     * @param int $id
     * @param array $data
     * @return bool
     */
    protected function update(string $table, int $id, array $data): bool
    {
        $fields = implode(', ', array_map(fn($key) => "$key = :$key", array_keys($data)));
        $data['id'] = $id;

        $stmt = $this->db->prepare("UPDATE $table SET $fields WHERE id = :id");
        return $stmt->execute($data);
    }

    /**
     * Supprime un enregistrement par ID.
     *
     * @param string $table
     * @param int $id
     * @return bool
     */
    protected function delete(string $table, int $id): bool
    {
        $stmt = $this->db->prepare("DELETE FROM $table WHERE id = :id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        return $stmt->execute();
    }
}
