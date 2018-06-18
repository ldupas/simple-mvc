<?php
/**
 * Created by PhpStorm.
 * User: nico
 * Date: 17/04/18
 * Time: 15:29
 */

namespace Form\Element;


abstract class Input extends Element
{
    /**
     * @var string
     */
    protected $type;

    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @param string $type
     * @return Input
     */
    public function setType(string $type): Input
    {
        $this->type = $type;
        return $this;
    }

    public function render() : string
    {
        return sprintf('<input type="%s" name="%s" value="%s" />'."\n",
                        $this->type,
                        $this->name,
                        $this->value);
    }
}
