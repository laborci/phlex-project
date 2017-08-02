<?php namespace App\Cli;

class Application extends \Phlex\Cli\Application {

	// http://symfony.com/doc/current/components/console/introduction.html

	public static function getCommands():array {
		return [
			new Init(),
		];
	}
}