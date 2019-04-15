<?php

namespace App\Model;

class PlayerManger extends AbstractManager
{
    const TABLE = 'player';

    public function __construct()
    {
        parent::__construct(self::TABLE);
    }

    public function getPlayers()
    {
        $request = $this->pdo->query("
            SELECT p.name as playerName,
            t.name as teamName,
            po.name as position
            FROM $this->table p
            INNER JOIN ".TeamManager::TABLE." AS t ON p.team_id = t.id
            INNER JOIN ".PositionManager::TABLE." as po ON p.position_id = po.id
            ORDER BY teamname ASC;
        ");
        return $request->fetchAll();
    }
}
