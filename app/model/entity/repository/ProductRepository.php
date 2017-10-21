<?php
namespace App\Model\Entity\Repository;

use App\Model\Entity\Group;
use App\Model\Entity\Product;
use App\Model\Entity\ProductGroup;
use App\Model\GroupModel;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\Mapping;

class ProductRepository extends EntityRepository
{
    /** @param GroupModel $groupRepo */
    public function __construct(EntityManager $em, Mapping\ClassMetadata $class, GroupRepository $groupRepo)
    {
        parent::__construct($em, $class);
        $this->groupRepo = $groupRepo;
    }

    public function add($values, $newProductGroups)
    {
        $product = new Product();
        $product->setName($values['name']);
        $product->setDescription($values['description']);

        foreach ($newProductGroups as $newProductGroup) {
            $product->addProductGroups($newProductGroup);
        }

//        $values->image->move($values['uploadFileDirectory'] . $values->image->name);
//        $product->setImage($values->image);

        $this->_em->persist($product);
        $this->_em->flush();
    }

    public function persist($product)
    {

        $this->_em->persist($product);
        $this->_em->flush();
    }
}