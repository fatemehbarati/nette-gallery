<?php
namespace App\Model;


use App\Model\Entity\Repository\ProductRepository;

class ProductModel
{

    /** @param $productRepo ProductRepository */
    public function __construct(ProductRepository $productRepo)
    {

        $this->productRepo = $productRepo;
    }

    public function addNewProduct($values)
    {

        $this->productRepo->add($values);
        var_dump($values);exit;
    }
}