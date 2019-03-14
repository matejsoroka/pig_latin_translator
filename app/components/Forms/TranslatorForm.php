<?php

namespace App\Components\Forms;

use Nette\Application\UI;

class TranslatorForm extends UI\Control
{

    /**
     * @return UI\Form
     */
    public function create() : UI\Form
    {
        $form = new UI\Form;
        $form->addText("input", "String");
        $form->addSubmit('send', 'Translate!');
        $form->onSuccess[] = [$this, 'processForm'];
        return $form;
    }

    /**
     * @param $form
     * @return string translated english word into pig latin
     */
    public function processForm($form) : string
    {
        $values = $form->getValues(true);
        return $values["input"];
    }
}
