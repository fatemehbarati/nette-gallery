<?php
namespace App\Model\Entity\Repository;

use App\Model\Entity\Group;
use App\Model\Entity\Product;
use App\Model\Entity\ProductGroup;
use App\Model\GroupModel;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\Mapping;
use Nette\Utils\Image;

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

        if($values->image->name)
        {
//            $image = Image::fromFile($values['image']);
//            var_dump('/www/temp/' . $values->image->name);exit;
            $values->image->move('./uploadedImages/' . $values->image->name);exit;
        }

        foreach ($newProductGroups as $newProductGroup) {
            $product->addProductGroups($newProductGroup);
        }

        $this->_em->persist($product);
        $this->_em->flush();
    }

    public function persist($product)
    {

        $this->_em->persist($product);
        $this->_em->flush();
    }
}