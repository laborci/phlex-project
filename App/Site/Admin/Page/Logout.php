<?php namespace App\Site\Admin\Page;

use App\Env;
use Phlex\Auth\AuthServiceInterface;
use Phlex\Chameleon\PageResponder;


class Logout extends PageResponder {

	protected function prepare() {
		/** @var AuthServiceInterface $auth */
		$auth = Env::get(AuthServiceInterface::class);
		$auth->logout();
		die(header('location:/'));
	}

	protected function respond() {}

}