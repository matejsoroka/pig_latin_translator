<?php

namespace App\Presenters;

use Nette;
use Nette\Application\UI;

final class HomepagePresenter extends Nette\Application\UI\Presenter
{

    /** @var \App\Components\Forms\TranslatorForm @inject */
    public $translatorForm;

    /** @var string translated result */
    private $translation;

    public function renderDefault()
    {
        $this->template->translation = $this->translation;
    }

	/**
	 * @return UI\Form Generated form from component
	 */
	protected function createComponentTranslatorForm()
    {
        $form = $this->translatorForm->create();
        $form->onSuccess[] = function (UI\Form $form) {
            $this->setTranslation($this->translatorForm->processForm($form));
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
