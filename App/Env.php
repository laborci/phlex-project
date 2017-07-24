<?php namespace App;

class Env extends \Phlex\Sys\Environment {

	protected function initialize() {
		parent::initialize();
		$this->bindService('database')->sharedService(
			\Phlex\Database\Access::class,
			$this->config['dbDefault']
		);
	}

}
