<?php namespace App\Site\Admin\Action;

use App\Env;
use Phlex\Auth\AuthServiceInterface;
use Phlex\Chameleon\JsonResponder;

class Login extends JsonResponder {

	protected function prepare() {
		/** @var AuthServiceInterface $authService */
		$authService = Env::get(AuthServiceInterface::class);

		$this->getQueryBag();
		$login = $this->getRequestBag()->get('login');
		$password = $this->getRequestBag()->get('password');


		$this->data['result'] = $authService->authenticate($login, $password);
	}

}