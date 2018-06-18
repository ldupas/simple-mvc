<?php
/**
 * Created by PhpStorm.
 * User: nico
 * Date: 18/06/18
 * Time: 09:43
 */

namespace Form\Element;


class Textarea extends Element
{
    public function render(): string
    {
        return sprintf('<textarea name="%s">%s</textarea>'."\n",
                        $this->name,
                        $this->value);
    }
}
