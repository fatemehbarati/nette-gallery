<?php
namespace App\AdminModule\Presenters;

use App\AdminModule\Forms\SignInForm;
use Nette\Application\UI\Form;
use Nette\Application\UI\Presenter;

class SignPresenter extends Presenter
{

    /** @var SignInForm @inject */
    public $signInForm;

    /**
     * @return Form
     */
    public function createComponentSignInAdmin()
    {

        $form = $this->signInForm->create();

        return $form;
    }

}