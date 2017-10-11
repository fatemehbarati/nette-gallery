<?php
namespace App\Model\Entity\Repository;

use App\Model\Entity\Group;
use App\Model\Entity\Product;
use App\Model\Entity\ProductGroup;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityRepository;

class ProductRepository extends EntityRepository
{

    public function add($values)
    {
//        var_dump($values['productGroups']);exit;
//        $group = new Group();
//        $group->setName('test');

        $group = new Group();
        $group->setId(1);
        $group->setName('test');

        $pg = new ProductGroup();
        $pg->setGroup($group);
        $pg->setProductId(1);

        $this->_em->persist($pg);
//        var_dump($group);exit;

        $product = new Product();
        $product->setName($values['name']);
        $product->setDescription($values['description']);
//        $product->getProductGroups()->add($pg);
//        $product->setProductGroups(array($group));

        $this->_em->persist($product);
        $this->_em->flush();
    }
}