<?php namespace App\Site\Website;

use App\Env;
use Phlex\ErrorHandling\ErrorCatcher;
use Phlex\RedFox\Attachment\ThumbnailResponder;
use Phlex\Routing\Request;
use Phlex\Routing\Router;

/**
 * @domain @ www.@
 */
class Site extends \Phlex\Routing\Site {

	function route(Router $router) {
		$router->get('/thumbnails/*', ThumbnailResponder::class);
		//$router->addMiddleware(ErrorCatcher::class);
		$router->get('/',Page\Index::class);
	}

}
