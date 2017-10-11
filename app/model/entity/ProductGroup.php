<?php
namespace App\Model\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Nette\Utils\DateTime;

/**
 * @ORM\Entity(repositoryClass="App\Model\Entity\Repository\ProductGroupRepository")
 * @ORM\Table(name="product_group")
 */
class ProductGroup
{

    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue
     */
    private $id;



    /**
     * @ORM\Column(type="integer")
     */
    private $product_id;

    /**
     * @ORM\Column(type="integer")
     */
    private $group_id;

    /**
     * @ORM\Column(type="integer")
     */
    private $created_at;

    /**
     * @ORM\ManyToOne(targetEntity="Group", inversedBy="productGroupsGroup")
     * @ORM\JoinColumn(name="group_id", referencedColumnName="id")
     */
    public $group;
//
    /**
     * @ORM\ManyToOne(targetEntity="Product", inversedBy="productGroups")
     * @ORM\JoinColumn(name="product_id", referencedColumnName="id")
     */
    private $product;

    /**
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param integer $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return integer
     */
    public function getProductId()
    {
        return $this->product_id;
    }

    /**
     * @param integer $product_id
     */
    public function setProductId($product_id)
    {
        $this->product_id = $product_id;
    }

    /**
     * @return integer
     */
    public function getGroupId()
    {
        return $this->group_id;
    }

    /**
     * @param integer $group_id
     */
    public function setGroupId($group_id)
    {
        $this->group_id = $group_id;
    }

    /**
     * @return DateTime
     */
    public function getCreatedAt()
    {
        return $this->created_at;
    }

    /**
     * @param DateTime $created_at
     */
    public function setCreatedAt($created_at)
    {
        $this->created_at = $created_at;
    }

    public function getProduct(){
        return $this->product;
    }
    public function getGroup(){
        return $this->group;
    }

    public function setGroup($group){
        $this->group = $group;
    }

}