<?php
namespace App\Model;


use App\Model\Entity\Repository\ProductRepository;

class ProductModel
{

    /** @param $productRepo ProductRepository */
    /** @param $groupModel GroupModel */
    public function __construct(ProductRepository $productRepo, GroupModel $groupModel)
    {

        $this->productRepo = $productRepo;
        $this->groupModel = $groupModel;
    }

    public function addNewProduct($values)
    {

        $tmpProductGroups = $values['productGroups'];
        $groups = array();
        foreach ($tmpProductGroups as $productGroupId) {

            $groups[] = $this->groupModel->getGroupById($productGroupId);
        }

        $this->productRepo->add($values, $groups);
    }
}