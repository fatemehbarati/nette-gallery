<?php
namespace App\AdminModule\Presenters;

use App\AdminModule\Forms\ProductForm;
use App\Model\Entity\Group;
use App\Model\ProductModel;
use Nette\Application\UI\Presenter;

class ProductPresenter extends Presenter
{

    /** @var ProductForm @inject */
    public $productForm;

    /** @var ProductModel @inject */
    public $productModel;

    public function createComponentProductForm()
    {

        $form = $this->productForm->create();

        return $form;
    }

    public function renderList()
    {
        $products = $this->productModel->getProductsInfo();

        $this->template->products = $products;
    }

    public function actionEdit($productId)
    {
        $product = $this->productModel->getProductWithId($productId);

        $productGroups = $product->getGroups();
        foreach ($productGroups as $productGroup) {
            $defaultGroups[] = $productGroup->getId();
        }

        $this['productForm']->setDefaults(
            array(
                'name' => $product->getName(),
                'description' => $product->getDescription(),
                'productGroups' => $defaultGroups
            )
        );
    }
}