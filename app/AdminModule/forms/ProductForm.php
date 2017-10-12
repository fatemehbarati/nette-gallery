<?php
namespace App\AdminModule\Forms;


use App\AdminModule\Forms\Interfaces\IProductFormFactory;
use App\Model\Entity\Repository\GroupRepository;
use App\Model\Entity\Repository\ProductGroupRepository;
use App\Model\Entity\Repository\ProductRepository;
use App\Model\ProductModel;
use Nette\Application\Application;
use Nette\Application\UI\Form;
use Nette\Neon\Exception;

class ProductForm implements IProductFormFactory
{

    /** @param $application Application */
    /** @param $groupRepo GroupRepository */
    /** @param $productModel ProductModel */
    public function __construct(Application $application, GroupRepository $groupRepo, ProductModel $productModel)
    {

        $this->application = $application;
        $this->groupRepo = $groupRepo;
        $this->productModel = $productModel;
    }

    public function create()
    {
        $groupsOfProducts = $this->groupRepo->findAll();

        foreach ($groupsOfProducts as $groupsOfProduct) {
            $groups[ $groupsOfProduct->getId() ] = $groupsOfProduct->getName();
        }

        $form = new Form();

        $form->addText('name', 'Product Name : ')
            ->setRequired('Please enter a name for product;');

        $form->addTextArea('description', 'Product Description : ');

        $form->addMultiSelect('productGroups', 'Group of Product:', $groups);

        $form->addSubmit('save', 'Create new product');

        $form->onSuccess[] = [$this, 'submitProductFormSucceeded'];

        return $form;
    }

    public function submitProductFormSucceeded(Form $form, $values)
    {

        $this->productModel->addNewProduct($values);
        $this->application->getPresenter()->redirect("Product:new");
    }

}