<?php
namespace App\AdminModule\Forms;


use App\AdminModule\Forms\Interfaces\IProductFormFactory;
use App\Model\Entity\Repository\GroupRepository;
use App\Model\Entity\Repository\ProductGroupRepository;
use App\Model\Entity\Repository\ProductRepository;
use Nette\Application\UI\Form;

class ProductForm implements IProductFormFactory
{

    /** @var GroupRepository @inject */
    public $groupRepo;


    /** @param GroupRepository $groupRepo */
    public function __construct(GroupRepository $groupRepo)
    {
        $this->groupRepo = $groupRepo;
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

        $form->addSelect('productGroups', 'Group of Product:', $groups)->setPrompt('test');

        return $form;
    }
}