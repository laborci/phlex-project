<?php namespace App;


use Phlex\Sys\Log;
use Phlex\Sys\RequestLog;
use Phlex\Sys\SqlLog;


class Env extends \Phlex\Sys\Environment {

	protected function initialize() {
		parent::initialize();
		if (getenv('CONTEXT') === 'web' && $this->devmode) {
			$this->bindService('Log')->sharedService(Log::class, null, $this->config['color-log']);
			$this->bindService('SqlLog')->sharedService(SqlLog::class, null, $this->config['color-log']);
			$this->bindService('RequestLog')->sharedService(RequestLog::class, null, $this->config['color-log']);
		}
		$this->bindService('database')->sharedService(\Phlex\Database\Access::class, $this->config['database'], $this->getService('SqlLog'));
	}

}
