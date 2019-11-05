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
            "SELECT d.id, d.name, d.description, d.picture FROM ".self::TABLE." d 
            JOIN ".CategoryManager::TABLE." c 
            ON d.category_id=c.id 
            WHERE c.name = :categoryName"
        );
        $query->bindValue(":categoryName", $categoryName, \PDO::PARAM_STR);
        $query->execute();
        return $query->fetchAll();
    }

    public function selectDrinkByList(array $list): array
    {
        $implode = implode(',', array_fill(0, count($list), '?'));
        $query = $this->pdo->prepare("SELECT d.name FROM ".self::TABLE." d WHERE d.id IN (".$implode.")");
        foreach ($list as $k => $id) {
            $query->bindValue($k+1, $id, \PDO::PARAM_INT);
        }
        $query->execute();
        return $query->fetchAll();
    }
}
