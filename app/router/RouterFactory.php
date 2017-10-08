<?php

namespace App;

use Nette;
use Nette\Application\Routers\Route;
use Nette\Application\Routers\RouteList;


class RouterFactory
{
	use Nette\StaticClass;

	/**
	 * @return Nette\Application\IRouter
	 */
	public static function createRouter()
	{
		$router = new RouteList;
        $router[] = new Route('<Module>/<presenter>/<action>[/<id>]', array(
            'module' => 'FrontModule',
            'presenter' => 'Homepage',
            'action' => 'default'
        ));
//        $router[] = new Route('<Module>/<presenter>/<action>[/<id>]', array(
//            'module' => 'AdminModule',
//            'presenter' => 'Homepage',
//            'action' => 'default'
//        ));
		return $router;
	}
}
