<?php

namespace App\Model;

class DrinkManager extends AbstractManager
{
    const TABLE = "drink";

    public function __construct()
    {
        parent::__construct(self::TABLE);
    }

    public function selectAllByCategoryName(string $categoryName)
    {
        $query = $this->pdo->prepare(
            "SELECT d.name, d.description, d.picture FROM ".self::TABLE." d 
            JOIN ".CategoryManager::TABLE." c 
            ON d.category_id=c.id 
            WHERE c.name = :categoryName"
        );
        $query->bindValue(":categoryName", $categoryName, \PDO::PARAM_STR);
        $query->execute();
        return $query->fetchAll();
    }
}
