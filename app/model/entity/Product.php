<?php
namespace App\Model\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Nette\Utils\DateTime;
use Symfony\Component\Console\Input\StreamableInputInterface;

/**
 * @ORM\Entity(repositoryClass="App\Model\Entity\Repository\ProductRepository")
 * @ORM\Table(name="products")
 */
class Product
{

    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue
     */
    private $id;

    /**
     * @ORM\Column(type="string")
     */
    private $name;

    /**
     * @ORM\Column(type="text")
     */
    private $description;

    /**
     * @ORM\Column(type="integer", columnDefinition="ENUM(0, 1)")
     */
    private $active = 1;

    /**
     * @ORM\Column(type="datetime")
     */
    private $created_at;

    /**
     * Many Users have Many Groups.
     * @ORM\ManyToMany(targetEntity="Group", inversedBy="products")
     * @ORM\JoinTable(name="product_group",
     *      joinColumns={
     *          @ORM\JoinColumn(name="product_id", referencedColumnName="id")
     *      },
     *      inverseJoinColumns={
     *          @ORM\JoinColumn(name="group_id", referencedColumnName="id")
     *      }
     *   )
     */
    private $groups;

    public function __construct()
    {

        $this->groups = new ArrayCollection();
    }

    public function addProductGroups(Group $group)
    {
        $this->groups[] = $group;

        return $this;
    }

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
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param string $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * @return integer
     */
    public function getActive()
    {
        return $this->active;
    }

    /**
     * @param integer $active
     */
    public function setActive($active)
    {
        $this->active = $active;
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

    public function getProductGroups(){
        return $this->productGroups;
    }

    public function setProductGroups($productGroups){
        $this->productGroups = $productGroups;
    }

}