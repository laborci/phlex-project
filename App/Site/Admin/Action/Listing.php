<?php namespace App\Site\Admin\Action;

use Phlex\Chameleon\JsonResponder;
use Phlex\Sys\ServiceManager;

class Listing extends JsonResponder {

	protected $formName;

	protected function prepare() {
		$this->formName = $this->getPathBag()->get('name');

		/** @var \App\Site\Admin\Services\AdminService $service */
		$service = ServiceManager::get($this->formName.'Admin');
		$this->data['result'] = $service->getList($this->getRequestBag());
	}

}
