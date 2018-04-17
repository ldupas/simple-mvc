<?php
/**
 * Created by PhpStorm.
 * User: nico
 * Date: 17/04/18
 * Time: 16:22
 */
namespace Validator;

interface ValidatorInterface
{
    /**
     * Vérifie la validité d'une valeur
     *
     * @return bool
     */
    public function isValid() : bool;
}
