<?php namespace App\Site\Admin\Middleware;

use App\ServiceManager;
use App\Site\Admin\Page\Login;
use Phlex\Chameleon\Middleware;
use Phlex\ErrorHandling\PageException;

class AuthCheck extends Middleware {

	protected function run() {
		if(!ServiceManager::getAuthService()->isAuthenticated()) {
			$this->respond(Login::class);
		}
		$this->next();
	}

}
