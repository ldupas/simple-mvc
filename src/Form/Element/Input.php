<?php
/**
 * Created by PhpStorm.
 * User: nico
 * Date: 17/04/18
 * Time: 15:29
 */

namespace Form\Element;


abstract class Input implements RenderInterface
{
    /**
     * @var string
     */
    protected $type;

    /**
     * @var string
     */
    protected $name;

    public function __construct(string $name)
    {
        $this->name = $name;
    }

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

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return Input
     */
    public function setName(string $name): Input
    {
        $this->name = $name;
        return $this;
    }

    public function render() : string
    {
        return sprintf('<input type="%s" name="%s" />'."\n", $this->type, $this->name);
    }
}
