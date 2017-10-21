<?php
namespace App\AdminModule\Forms;

use App\AdminModule\Forms\Interfaces\ISignInFormFactory;
use App\AdminModule\Presenters\SignPresenter;
use Nette\Application\Application;
use Nette\Application\UI\Control;
use Nette\Application\UI\Form;
use Nette\Object;
use Nette\Security\AuthenticationException;

//class SignInForm extends Object implements ISignInFormFactory
class SignInForm extends Control
{

    public function __construct(SignPresenter $presenter)
    {
        parent::__construct($presenter, 'SignInForm');
    }

    /** @var  array */
    public $onSuccess;

    /**
     * @return Form
     */
    public function create()
    {
        $form = new Form();

        $form->addText('username', 'Username')
            ->setHtmlAttribute('placeholder', 'Username');

        $form->addPassword('password', 'Password')
            ->setHtmlAttribute('placeholder', 'Password');


        $form->addSubmit('save', 'Sign In');

        $form->onSuccess[] = [$this, 'signInOnSucceeded'];

        return $form;
    }

    /**
     * @param Form $form
     * @param $values
     */
    public function signInOnSucceeded(Form $form, $values)
    {
        try{

            $this->presenter->getUser()->login($values->username, $values->password);

            $this->onSuccess($values->username, $values->password);
            $this->presenter->redirect(':Admin:Homepage:');
        }catch (AuthenticationException $exception){

            $form->addError($exception->getMessage());
        }
    }
}