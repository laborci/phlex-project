<?php namespace App;

use Phlex\Database\Access;

class Env extends \Phlex\Sys\Environment {

	protected function initialize() {
		parent::initialize();
		ServiceManager::bind('database')->sharedService(Access::class, Env::get('database'));
	}

}
