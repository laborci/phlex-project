<?php namespace App\Site\Admin\Action;

use Phlex\Auth\AuthServiceInterface;
use Phlex\Chameleon\JsonResponder;
use Phlex\Sys\ServiceManager;


class Login extends JsonResponder {

	protected function prepare() {
		/** @var AuthServiceInterface $authService */
		$authService = ServiceManager::get(AuthServiceInterface::class);

		$this->getQueryBag();
		$login = $this->getRequestBag()->get('login');
		$password = $this->getRequestBag()->get('password');


		$this->data['result'] = $authService->authenticate($login, $password);
	}

}