<?php

namespace App\Presenters;

use App\Components\Forms\TranslatorForm;
use Nette;
use Nette\Application\UI;

final class HomepagePresenter extends Nette\Application\UI\Presenter
{

    /** @var TranslatorForm @inject */
    public $translatorForm;

    /** @var string translated result */
    private $translation;

    public function renderDefault() : void
    {
        $this->template->translation = $this->translation;
    }

    /**
     * @return UI\Form Generated form from component
     */
    protected function createComponentTranslatorForm() : UI\Form
    {
        $form = $this->translatorForm->create();
        $form->onSuccess[] = function (UI\Form $form) {
            $this->setTranslation($this->translatorForm->processForm($form));
            if ($this->isAjax()) {
                $this->redrawControl("translator");
            } else {
                $this->redirect("this");
            }
        };
        return $form;
    }

    /**
     * @param mixed $translation
     */
    public function setTranslation($translation): void
    {
        $this->translation = $translation;
    }

}
