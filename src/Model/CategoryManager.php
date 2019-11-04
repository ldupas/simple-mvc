<?php

namespace App\Model;

class CategoryManager extends AbstractManager
{
    const TABLE = "category";

    public function __construct()
    {
        parent::__construct(self::TABLE);
    }

    public function insert(array $category, string $filename): bool
    {
        $query = $this->pdo->prepare(
            "INSERT INTO ".self::TABLE." (name, description, image) VALUES (:name, :description, :image)"
        );
        $query->bindValue(":name", $category["name"], \PDO::PARAM_STR);
        $query->bindValue(":description", $category["description"], \PDO::PARAM_STR);
        $query->bindValue(":image", $filename, \PDO::PARAM_STR);
        return $query->execute();
    }
}
