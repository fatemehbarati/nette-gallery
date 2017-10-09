<?php
namespace App\AdminModule\Forms\Interfaces;

use Nette\Application\UI\Form;

interface ISignInFormFactory
{

    /**
     * @return Form
     */
    public function create();
}