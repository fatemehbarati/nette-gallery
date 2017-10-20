<?php
namespace App\Listener;

use Kdyby\Events\Subscriber;
use Nette\Mail\Message;
use Nette\Mail\SendmailMailer;
use Nette\Object;

class SignInMailerListener extends Object implements Subscriber
{
    public function onSuccess($username, $password)
    {

        /** Do what you want to do */
    }
    public function getSubscribedEvents()
    {
        return array('App\AdminModule\Forms\SignInForm::onSuccess' => 'onSuccess');
    }
}