<?php

namespace App\Site\Admin\Action;


use App\Env;
use Phlex\Chameleon\JsonResponder;


class Form extends JsonResponder {

	protected $formName;

	protected function prepare() {
		$this->formName = $this->getPathBag()->get('name');

		/** @var \App\Site\Admin\Services\AdminService $service */
		$service = Env::get($this->formName.'Admin');
		$this->data['result'] = $service->getFormData($this->getRequestBag());
	}

}