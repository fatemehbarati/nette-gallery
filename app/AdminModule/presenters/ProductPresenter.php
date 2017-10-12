<?php
namespace App\AdminModule\Presenters;

use App\AdminModule\Forms\ProductForm;
use Nette\Application\UI\Presenter;

class ProductPresenter extends Presenter
{

    /** @var ProductForm @inject */
    public $productForm;

    public function createComponentProductForm()
    {

        $form = $this->productForm->create();

        return $form;
    }
}