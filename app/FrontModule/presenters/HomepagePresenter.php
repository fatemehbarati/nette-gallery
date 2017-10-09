<?php

namespace App\FrontModule\Presenters;

use App\Model\Entity\Group;
use App\Model\Entity\Product;
use App\Model\Entity\Repository\GroupRepository;
use App\Model\Entity\Repository\ProductGroupRepository;
use App\Model\Entity\Repository\ProductRepository;
use Nette;


class HomepagePresenter extends Nette\Application\UI\Presenter
{
    /** @var ProductRepository @inject */
    public $productRepo;

    /** @var ProductGroupRepository @inject */
    public $productGroupRepo;

    /** @var GroupRepository @inject */
    public $groupRepo;

    public function renderDefault()
    {
//        $groups = $this->groupRepo->find(1);exit;
        $products = $this->productRepo->find(1);
//        $productGroup = $this->productGroupRepo->find(1);
//        var_dump($productGroup->getGroup()->getName());exit;

        $productGroups = $products->getProductGroups();

        foreach ($productGroups as $productGroup) {
//            var_dump($productGroup->getGroup());
            var_dump($productGroup->getGroup()->getName());exit;
            $group = $productGroup->getName();
            var_dump($group->getName);
            foreach ($group as $item) {
                if($group instanceof Group){
                    var_dump('ok');exit;
                }
                var_dump(gettype($item));exit;
                var_dump($item->getName());
            }exit;
        }exit;
        var_dump($products->getProductGroups());exit;
        $productGroup = $products->getProductGroups();exit;
        var_dump($productGroup[0]->getId());exit;

        $this->template->products = array($products);
    }
}
