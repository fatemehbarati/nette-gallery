<?php
namespace App\AdminModule\Forms\Interfaces;

use Nette\Application\UI\Form;

interface IProductFormFactory
{

    /**
     * @return Form
     */
    public function create();
}