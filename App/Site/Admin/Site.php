<?php namespace App\Site\Admin;

use App\Env;
use App\Site\Admin\Action\Form;
use App\Site\Admin\Services\ArticleAdmin;
use App\Site\Admin\Services\Authentication\AdminAuthService;
use App\Site\Admin\Page\Error404;
use App\Site\Admin\Page\Index;
use App\Site\Admin\Action\Listing;
use App\Site\Admin\Page\Login;
use App\Site\Admin\Page\Logout;
use App\Site\Admin\Services\UserAdmin;
use Phlex\Auth\AuthContainerInterface;
use Phlex\Auth\AuthServiceInterface;
use Phlex\Routing\Request;
use Phlex\Routing\Router;
use Phlex\Chameleon\ReRouter;


class Site extends \Phlex\Routing\Site {

	protected function domainMatch(Request $request): bool {
		return $request->fnMatchHost('admin.*');
	}

	protected function init() {
		parent::init();
		Env::bind(AuthContainerInterface::class)->sharedService(UserContainer::class);
		Env::bind(AuthServiceInterface::class)->sharedService(AdminAuthService::class);

		Env::bind('UserAdmin')->sharedService(UserAdmin::class);
		Env::bind('ArticleAdmin')->sharedService(ArticleAdmin::class);
	}

	function route(Router $router) {

		/** @var AuthServiceInterface $auth */
		$auth = Env::get(AuthServiceInterface::class);

		if ($auth->isAuthenticated()) {
			$router->post('/{name}/list', Listing::class);
			$router->post('/{name}/form', Form::class);
			$router->get('/logout', Logout::class);
			$router->get('/', Index::class);
			$router->get('/*', Error404::class);
		} else {
			$router->get('/login', Login::class);
			$router->post('/login', \App\Site\Admin\Action\Login::class);
			$router->get('/*')->redirect('/login');
		}
	}
}
