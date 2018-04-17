<?php
/**
 * Created by PhpStorm.
 * User: nico
 * Date: 17/04/18
 * Time: 16:44
 */

namespace Validator;


abstract class Validator implements ValidatorInterface
{
    abstract public function isValid(): bool;

    /**
     * @var array
     */
    protected $errors = [];

    /**
     * @return array
     */
    public function getErrors(): array
    {
        return $this->errors;
    }

    /**
     * @param array $errors
     * @return NotEmpty
     */
    public function setErrors(array $errors): ValidatorInterface
    {
        $this->errors = $errors;
        return $this;
    }
}
