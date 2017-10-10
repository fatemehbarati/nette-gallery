<?php
namespace App\AdminModule\Forms;

use App\AdminModule\Forms\Interfaces\ISignInFormFactory;
use Nette\Application\Application;
use Nette\Application\UI\Form;
use Nette\Security\AuthenticationException;

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
        try{
            $this->application->getPresenter()->getUser()->login($values->username, $values->password);
            $this->application->getPresenter()->redirect(':Admin:Homepage:');
        }catch (AuthenticationException $exception){
            $form->addError($exception->getMessage());
//            $form->addError('Username or Password is not correct!');
        }
//        $this->application->getPresenter()->redirect(':Front:Homepage:');
    }
}