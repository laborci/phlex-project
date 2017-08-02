<?php namespace App\Site\Website;

use App\Env;
use Phlex\ErrorHandling\ErrorCatcher;
use Phlex\Routing\Request;
use Phlex\Routing\Router;


class Site extends \Phlex\Routing\Site {

	protected function domainMatch(Request $request): bool {
		return $request->fnMatchHost('www.*', Env::get('domain'));
	}

	function route(Router $router) {
		$router->addMiddleware(ErrorCatcher::class);
		$router->get('/',Page\Index::class);
	}

}
