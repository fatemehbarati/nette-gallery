<?php
namespace App\Model;


use App\Model\Entity\Product;
use App\Model\Entity\Repository\ProductRepository;
use Nette\Object;

class ProductModel
{

    /** @param $productRepo ProductRepository */
    /** @param $groupModel GroupModel */
    public function __construct(ProductRepository $productRepo, GroupModel $groupModel)
    {

        $this->productRepo = $productRepo;
        $this->groupModel = $groupModel;
    }

    /**
     * @param $values
     */
    public function addNewProduct($values)
    {

        $tmpProductGroups = $values['productGroups'];
        $groups = array();
        foreach ($tmpProductGroups as $productGroupId) {

            $groups[] = $this->groupModel->getGroupById($productGroupId);
        }

        $this->productRepo->add($values, $groups);
    }

    /**
     * @return array|Product[]
     */
    public function getProductsInfo()
    {
        $products = $this->productRepo->findAll();

        return $products;
    }

    /**
     * @param $productId
     * @return null|Object
     */
    public function getProductWithId($productId)
    {
        return $this->productRepo->find($productId);
    }

    /**
     * @param $productId
     * @param $values
     */
    public function updateWithId($productId, $values)
    {

        $product = $this->productRepo->find($productId);
        $product->setName($values['name']);
        $product->setDescription($values['description']);

        $tmpProductGroups = $values['productGroups'];
        $groups = array();
        foreach ($tmpProductGroups as $productGroupId) {

            $groups[] = $this->groupModel->getGroupById($productGroupId);
        }

        $product->setGroups($groups);

        $this->productRepo->persist($product);
    }
}