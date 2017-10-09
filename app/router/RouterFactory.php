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

        $list = new RouteList('Front');
        $list[] = new Route('Front/<presenter>/<action>[/<id>]', 'Homepage:default');
        $router[] = $list;

        $list = new RouteList('Admin');
        $list[] = new Route('Admin/<presenter>/<action>[/<id>]', 'Sign:in');
        $router[] = $list;

        $list = new RouteList();
        $list[] = new Route('<presenter>/<action>[/<id>]', 'Front:Homepage:default');
        $router[] = $list;

		return $router;
	}
}
