<?php
namespace App\AdminModule\Presenters;


use App\AdminModule\Forms\ProductForm;
use App\Model\Entity\Repository\ProductRepository;
use Nette\Application\UI\Presenter;

class ProductPresenter extends Presenter
{

    /** @var ProductForm @inject */
    public $productForm;
//        /** @param $productForm ProductForm */
//        public function __construct(ProductForm $productForm)
//        {
//            $this->productForm = $productForm;
//        }

    /** @var ProductRepository @inject */
    public $productRepository;

    public function createComponentProductForm()
    {

        $form = $this->productForm->create();

        return $form;
    }
}