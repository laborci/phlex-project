<?php namespace App\Site\Website;

use App\Site\Website\Action\AddUser;
use App\Site\Website\Action\HandleUpload;
use App\Site\Website\Middleware\MyMiddleware;
use App\Site\Website\Page\Error404;
use App\Site\Website\Page\Index;
use Phlex\ErrorHandling\ErrorCatcher;
use Phlex\RedFox\Attachment\ThumbnailResponder;
use Phlex\Routing\Handler;
use Phlex\Routing\Middleware;
use Phlex\Routing\Request;
use Phlex\Routing\Router;
use App\Env;

class Site extends \Phlex\Routing\Site {

	protected function domainMatch(Request $request): bool {
		return $request->fnMatchHost('www.*');
	}

	protected function init(){
		parent::init();
		//Env::bind(MyContainer::class)->sharedService(MyContainer::class);
	}

	function route(Router $router) {
		$router->addMiddleware(ErrorCatcher::class);
		$router->get('/thumbnails/{file}', ThumbnailResponder::class);
		$router->get('/user/{userId}',Index::class);
		$router->get('/',Index::class);
		$router->post('/api/adduser/{userId}',AddUser::class);
		$router->post('/uploadUserFiles',HandleUpload::class);
		$router->get('/some-trash/{number}')->addMiddlewares([ [MyMiddleware::class, ['n'=>11]] ])->redirect('/some-valuable');
		$router->any('/*',Error404::class);
	}

}
