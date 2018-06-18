<?php
/**
 * Created by PhpStorm.
 * User: nico
 * Date: 18/06/18
 * Time: 09:46
 */

namespace Form\Element;


abstract class Element implements RenderInterface
{
    /**
     * @var string
     */
    protected $name;

    /**
     * @var string
     */
    protected $value;

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return Element
     */
    public function setName(string $name): Element
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return string
     */
    public function getValue(): string
    {
        return $this->value;
    }

    /**
     * @param string $value
     * @return Element
     */
    public function setValue(string $value): Element
    {
        $this->value = $value;
        return $this;
    }

    public function __construct(string $name)
    {
        $this->name = $name;
    }

    abstract public function render(): string;
}
