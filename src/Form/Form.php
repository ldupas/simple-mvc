<?php
/**
 * Created by PhpStorm.
 * User: nico
 * Date: 17/04/18
 * Time: 15:17
 */

namespace Form;


use Form\Element\Input;

class Form
{
    /**
     * @var string
     */
    private $action;

    /**
     * @var
     */
    private $method = 'POST';

    /**
     * @var array
     */
    private $elements = [];

    /**
     * @return string
     */
    public function getAction(): string
    {
        return $this->action;
    }

    /**
     * @param string $action
     * @return Form
     */
    public function setAction(string $action): Form
    {
        $this->action = $action;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getMethod()
    {
        return $this->method;
    }

    /**
     * @param mixed $method
     * @return Form
     */
    public function setMethod($method)
    {
        $this->method = $method;
        return $this;
    }

    /**
     * @return array
     */
    public function getElements(): array
    {
        return $this->elements;
    }

    /**
     * @param array $elements
     * @return Form
     */
    public function setElements(array $elements): Form
    {
        foreach ($elements as $element) {
            if (!$element instanceof Input) {
                throw new \LogicException('type inattendu');
            }
        }
        $this->elements = $elements;
        return $this;
    }

    public function addElement(Input $element) : Form
    {
        $this->elements[] = $element;
        return $this;
    }

    /**
     * @return string
     */
    public function render() : string
    {
        $str = sprintf('<form method="%s" action="%s">',
                        $this->getMethod(),
                        $this->getAction());

        foreach ($this->getElements() as $element) {
            $str .= $element->render();
        }

        $str .= '</form>';
        return $str."\n";
    }
}
