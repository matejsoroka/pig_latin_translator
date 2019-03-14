<?php

namespace App\Presenters;

use Nette;
use Nette\Application\UI;

final class HomepagePresenter extends Nette\Application\UI\Presenter
{

    /** @var \App\Components\Forms\TranslatorForm @inject */
    public $translatorForm;

	/**
	 * @return UI\Form Generated form from component
	 */
	protected function createComponentTranslatorForm()
    {
        $form = $this->translatorForm->create();
        $form->onSuccess[] = function (UI\Form $form) {
            $this->redirect("this");
        };
        return $form;
    }

}
