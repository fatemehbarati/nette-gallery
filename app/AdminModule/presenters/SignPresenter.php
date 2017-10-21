<?php
namespace App\AdminModule\Presenters;

use App\AdminModule\Forms\SignInForm;
use Nette\Application\UI\Form;
use Nette\Application\UI\Presenter;

class SignPresenter extends Presenter
{

    /**
     * @return Form
     */
    public function createComponentSignInAdmin()
    {

        $form = (new SignInForm($this))->create();
        return $form;
    }

    public function actionOut(){

        $this->getUser()->logout();
        $this->flashMessage('You have been signed out.', 'sign_info');
        $this->redirect(':Admin:Sign:in');
    }

//    public function renderIn()
//    {
//        if($this->getUser()->loggedIn){
//            $this->redirect(':Admin:Homepage:');
//        }
//    }

}