<?php
namespace App\AdminModule\Forms;


use App\AdminModule\Forms\Interfaces\IProductFormFactory;
use App\AdminModule\Presenters\ProductPresenter;
use App\Model\Entity\Repository\GroupRepository;
use App\Model\Entity\Repository\ProductGroupRepository;
use App\Model\Entity\Repository\ProductRepository;
use App\Model\ProductModel;
use Nette\Application\Application;
use Nette\Application\UI\Control;
use Nette\Application\UI\Form;
use Nette\Application\UI\Presenter;
use Nette\ComponentModel\IContainer;
use Nette\Neon\Exception;

class ProductForm extends Control
{

    /** @param $groupRepo GroupRepository */
    private $groupRepo;

    public function __construct(ProductPresenter $productPresenter, GroupRepository $groupRepo)
    {
        parent::__construct($productPresenter, 'ProductForm');
        $this->groupRepo = $groupRepo;
    }

    /**
     * @return Form
     */
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

//        $form->addUpload('image', 'Image :')
//            ->setRequired('Please select an image file for product.');

        $form->addSubmit('save', 'Create new product');

        $form->onSuccess[] = [$this->presenter, 'submitProductFormSucceeded'];

        return $form;
    }

}