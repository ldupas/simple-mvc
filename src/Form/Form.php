<?php
/**
 * Created by PhpStorm.
 * User: nico
 * Date: 17/04/18
 * Time: 15:17
 */

namespace Form;


use Form\Element\Element;
use Form\Element\Input;
use Form\Element\Submit;
use Message\Message;

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
     * @var Message
     */
    private $message;

    /**
     * Form constructor.
     */
    public function __construct(Message $message)
    {
        $this->setMessage($message);
    }

    /**
     * @return Message
     */
    public function getMessage(): Message
    {
        return $this->message;
    }

    /**
     * @param Message $message
     * @return Form
     */
    public function setMessage(Message $message): Form
    {
        $this->message = $message;
        return $this;
    }

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
            if (!$element instanceof Element) {
                throw new \LogicException('type inattendu');
            }
        }
        $this->elements = $elements;
        return $this;
    }

    public function addElement(Element $element) : Form
    {
        if (!$element instanceof Submit) {
            $getter = 'get'.ucfirst($element->getName());
            if (!method_exists($this->getMessage(), $getter)) {
                throw new \LogicException('getter non trouvé : '.$getter);
            }

            $element->setValue($this->getMessage()->$getter());
        }

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

        /* @var $element Element */
        foreach ($this->getElements() as $element) {
            $str .= $element->render();
        }

        $str .= '</form>';
        return $str."\n";
    }
}
