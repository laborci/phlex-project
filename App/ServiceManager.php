<?php namespace App;

use Phlex\Database\Access;
use Phlex\Routing\Request;
use Phlex\Sys\Logger;
use Symfony\Component\HttpFoundation\Response;

class ServiceManager extends \Phlex\Sys\ServiceManager\ServiceManager {

	static function getDatabase(): Access { return static::get('database'); }
	static function getRequest(): Request { return static::get('Request'); }
	static function getResponse(): Response { return static::get('Response'); }
	static function getLogger(): Logger { return static::get(Logger::class); }

}