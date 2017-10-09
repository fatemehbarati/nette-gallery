<?php
namespace App\AdminModule\Forms;

use App\AdminModule\Forms\Interfaces\ISignInFormFactory;
use Nette\Application\Application;
use Nette\Application\UI\Form;

class SignInForm implements ISignInFormFactory
{

    /** @param $application Application */
    public function __construct(Application $application)
    {
        $this->application = $application;
    }

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

    public function signInOnSucceeded(Form $form, $values)
    {
        $this->application->getPresenter()->redirect(':Front:Homepage:');
    }
}