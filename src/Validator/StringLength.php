<?php
/**
 * Created by PhpStorm.
 * User: nico
 * Date: 17/04/18
 * Time: 16:24
 */

namespace Validator;


class StringLength extends Validator
{
    const STRING_LENGTH = 'La longueur de la chaîne n\'est pas correcte.';
    /**
     * @var mixed
     */
    private $input;

    /**
     * @var int
     */
    private $length;

    public function __construct(string $input, int $length)
    {
        $this->input = $input;
        $this->length = $length;
    }

    public function isValid(): bool
    {
        if (mb_strlen($this->input) > $this->length) {
            $this->errors[] = self::STRING_LENGTH;
            return false;
        }
        return true;
    }
}
