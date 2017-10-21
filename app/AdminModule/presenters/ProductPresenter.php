<?php
namespace App\AdminModule\Presenters;

use App\AdminModule\Forms\ProductForm;
use App\Model\Entity\Group;
use App\Model\Entity\Repository\GroupRepository;
use App\Model\ProductModel;
use Nette\Application\UI\Presenter;
use Nette\Forms\Form;

class ProductPresenter extends Presenter
{

    /** @var ProductModel @inject */
    public $productModel;

    /** @var GroupRepository @inject */
    public $groupRepo;

    /**
     * @return \Nette\Application\UI\Form
     */
    public function createComponentProductForm()
    {

        $form = (new ProductForm($this, $this->groupRepo))->create();

        return $form;
    }

    public function renderList()
    {
        $products = $this->productModel->getProductsInfo();

        $this->template->products = $products;
    }

    /**
     * @param $productId
     */
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

    /**
     * @param Form $form
     * @param $values
     */
    public function submitProductFormSucceeded(Form $form, $values)
    {
        $productId = $this->getParameter('productId');
        if( $productId )
        {
            $this->productModel->updateWithId($productId, $values);
            $this->flashMessage('Edit Product Succeeded!', 'product_edit_info');
            $this->redirect("this");
        }
        else
        {
            $this->productModel->addNewProduct($values);
            $this->flashMessage('Create Product Succeeded!', 'product_new_info');
            $this->redirect("Product:new");
        }
    }
}