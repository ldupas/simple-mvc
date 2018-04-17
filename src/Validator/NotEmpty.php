<?php
/**
 * Created by PhpStorm.
 * User: nico
 * Date: 17/04/18
 * Time: 16:24
 */

namespace Validator;


class NotEmpty extends Validator
{
    const NOT_EMPTY = 'Valeur vide non autorisée';
    /**
     * @var mixed
     */
    private $input;

    public function __construct($input)
    {
        $this->input = $input;
    }

    public function isValid(): bool
    {
        if (empty($this->input)) {
            $this->errors[] = self::NOT_EMPTY;
            return false;
        }
        return true;
    }
}
