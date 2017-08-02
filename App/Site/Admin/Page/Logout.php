<?php namespace App\Site\Admin\Page;

use Phlex\Auth\AuthServiceInterface;
use Phlex\Chameleon\PageResponder;
use Phlex\Sys\ServiceManager;


class Logout extends PageResponder {

	protected function prepare() {
		/** @var AuthServiceInterface $auth */
		$auth = ServiceManager::get(AuthServiceInterface::class);
		$auth->logout();
		die(header('location:/'));
	}

	protected function respond() {}

}