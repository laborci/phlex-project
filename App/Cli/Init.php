<?php namespace App\Cli;

use App\Entity\User\User;
use Phlex\Sys\ServiceManager;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;
use Symfony\Component\HttpFoundation\File\File;


class Init extends Command{
	protected function configure() {
		$this
			->setName('app:init')
			->setDescription('Initializes your application template')
		;
	}

	protected function execute(InputInterface $input, OutputInterface $output) {

		$style = new SymfonyStyle($input, $output);

		$style->title('Initializing your application');

		/** @var \Phlex\Database\Access $db */
		$db = ServiceManager::get('database');
		try {
			$db->query("CREATE TABLE `user` (
							  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
							  `name` varchar(255) DEFAULT NULL,
							  `email` varchar(255) DEFAULT NULL,
							  `password` char(32) DEFAULT NULL COMMENT 'password',
							  PRIMARY KEY (`id`),
							  UNIQUE KEY `email` (`email`)
							) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;");
			$style->success('Table for User entity created');
		}catch (\PDOException $exception){
			if($exception->getCode() === '42S01'){
				$style->note(['Table already exists', $exception->getMessage()]);
			}else{
				throw $exception;
			}
		}

		$user = new User();
		$user->name = "Elvis Presley";
		$user->email = "elvis@presley.com";
		$user->password = "vegas";
		try {
			$user->save();
		}catch (\PDOException $exception){
			if($exception->getCode() === '23000'){
				$style->note(['User already exists', $exception->getMessage()]);
			}else{
				throw $exception;
			}
		}

		User::repository()->pick(1)->avatar->addFile(new File('./elvis.jpg'));

		$style->success('Done');
	}

}