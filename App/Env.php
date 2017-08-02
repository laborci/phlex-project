<?php namespace App;

use Phlex\Database\Access;
use Phlex\Routing\Launcher;
use Phlex\Sys\Log\Log;
use Phlex\Sys\Log\RequestLog;
use Phlex\Sys\Log\SqlLog;
use Phlex\Sys\ServiceManager;
use Psr\Log\LoggerInterface;

class Env extends \Phlex\Sys\Environment {

	protected function initialize() {

		parent::initialize();

		ServiceManager::bind(LoggerInterface::class)->sharedService(Log::class);
		ServiceManager::bind(LoggerInterface::class, Access::class)->sharedService(SqlLog::class);
		ServiceManager::bind(LoggerInterface::class, Launcher::class)->sharedService(RequestLog::class);

		ServiceManager::bind('database')->sharedService(Access::class, $this->config['database']);
	}

}
