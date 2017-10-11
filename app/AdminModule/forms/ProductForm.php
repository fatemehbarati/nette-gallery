<?php
namespace App\AdminModule\Forms;


use App\AdminModule\Forms\Interfaces\IProductFormFactory;
use App\Model\Entity\Repository\GroupRepository;
use App\Model\Entity\Repository\ProductGroupRepository;
use App\Model\Entity\Repository\ProductRepository;
use App\Model\ProductModel;
use Nette\Application\UI\Form;

class ProductForm implements IProductFormFactory
{

    /** @param GroupRepository $groupRepo */
    /** @param ProductModel $productModel */
    public function __construct(GroupRepository $groupRepo, ProductModel $productModel)
    {
        $this->groupRepo = $groupRepo;
        $this->productModel = $productModel;
    }


    public function create()
    {
        $groupsOfProducts = $this->groupRepo->findAll();

        $groups[0] = 'select Group';

        foreach ($groupsOfProducts as $groupsOfProduct) {
            $groups[ $groupsOfProduct->getId() ] = $groupsOfProduct->getName();
        }
//        var_dump($groupsOfProducts);exit;

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
    }
}