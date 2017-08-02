<?php namespace App\Site\Admin;

use Phlex\Auth\AuthContainerInterface;
use Phlex\Auth\AuthServiceInterface;
use Phlex\Routing\Request;
use Phlex\Routing\Router;
use Phlex\Sys\ServiceManager;


class Site extends \Phlex\Routing\Site {

	protected function domainMatch(Request $request): bool {
		return $request->fnMatchHost('admin.*');
	}

	protected function init() {
		parent::init();
		ServiceManager::bind(AuthContainerInterface::class)->sharedService(UserContainer::class);
		ServiceManager::bind(AuthServiceInterface::class)->sharedService(Services\AuthService::class);
		ServiceManager::bind('UserAdmin')->sharedService(Services\UserAdmin::class);
	}

	function route(Router $router) {

		/** @var AuthServiceInterface $auth */
		$auth = ServiceManager::get(AuthServiceInterface::class);

		if ($auth->isAuthenticated()) {
			$router->post('/{name}/list', Action\Listing::class);
			$router->post('/{name}/form', Action\Form::class);
			$router->get('/logout', Page\Logout::class);
			$router->get('/', Page\Index::class);
			$router->get('/*', Page\Error404::class);
		} else {
			$router->get('/login', Page\Login::class);
			$router->post('/login', Action\Login::class);
			$router->get('/*')->redirect('/login');
		}
	}
}
