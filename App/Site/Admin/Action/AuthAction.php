<?php namespace App\Site\Admin\Action;

use App\Site\Admin\Service\AuthService;
use Phlex\Chameleon\JsonResponder;
use Phlex\Sys\ServiceManager\InjectDependencies;

class AuthAction extends JsonResponder implements InjectDependencies {

	protected $authService;

	public function __construct(AuthService $authService) {
		parent::__construct();
		$this->authService = $authService;
	}

	protected function respond() {
		switch ($this->getAttributesBag()->get('method')) {
			case 'login':
				$administrator = $this->authService->checkLogin($this->getRequestBag()->get('login'), $this->getRequestBag()->get('password'));
				if (is_null($administrator)) {
					$this->getResponse()->setStatusCode('401');
				}else {
					$this->authService->login($administrator);
				}
				break;
			case 'logout':
				$this->authService->logout();
				break;
		}

	}
}