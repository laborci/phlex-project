<?php namespace App\Cli;

use App\Entity\User\User;
use App\Env;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class Init extends Command{
	protected function configure() {
		$this
			->setName('app:init')
			->setDescription('Initializes your application template')
		;
	}

	protected function execute(InputInterface $input, OutputInterface $output) {
		/** @var \Phlex\Database\Access $db */
		$db = Env::get('database');
		$db->query("CREATE TABLE IF NOT EXISTS `user` (
							  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
							  `name` varchar(255) DEFAULT NULL,
							  `email` varchar(255) DEFAULT NULL,
							  `password` char(32) DEFAULT NULL COMMENT 'password',
							  PRIMARY KEY (`id`),
							  UNIQUE KEY `email` (`email`)
							) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;");

		$user = new User();
		$user->name = "Elvis Presley";
		$user->email = "elvis@presley.com";
		$user->password = "vegas";
		$user->save();

	}

}