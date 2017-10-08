<?php

namespace App\FrontModule\Presenters;

use App\Model\Entity\Product;
use Nette;


class HomepagePresenter extends Nette\Application\UI\Presenter
{
    public function renderDefault()
    {

        $test = new Product();
        $test->setName("test");
        $test->setDescription("this is just test");

        $this->template->products = array($test);
    }
}
