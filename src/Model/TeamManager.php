<?php

namespace App\Model;

class TeamManager extends AbstractManager
{
    const TABLE = 'team';

    public function __construct()
    {
        parent::__construct(self::TABLE);
    }
}
