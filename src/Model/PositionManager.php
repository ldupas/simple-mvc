<?php

namespace App\Model;

class PositionManager extends AbstractManager
{
    const TABLE = 'position';

    public function __construct()
    {
        parent::__construct(self::TABLE);
    }
}
