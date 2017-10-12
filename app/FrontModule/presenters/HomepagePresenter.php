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

        $products = $this->productRepo->findAll();
        $this->template->products = $products;
    }
}
