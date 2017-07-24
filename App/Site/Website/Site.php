<?php namespace App\Site\Website;

use App\Site\Website\Page\Index;
use Phlex\ErrorHandling\ErrorCatcher;
use Phlex\Routing\Router;

class Site extends \Phlex\Routing\Site {

	protected function domainMatch(Request $request): bool {
		return $request->fnMatchHost('www.*');
	}

	function route(Router $router) {
		$router->addMiddleware(ErrorCatcher::class);
		$router->get('/',Index::class);
	}

}
