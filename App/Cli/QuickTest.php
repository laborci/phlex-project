<?php namespace App\Cli;

use App\Entity\User\User;
use Phlex\Database\Filter;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;
use Symfony\Component\HttpFoundation\File\File;


class QuickTest extends Command{
	protected function configure() {
		$this
			->setName('app:quicktest')
			->setDescription('Implement your quick tests here!')
		;
	}

	protected function execute(InputInterface $input, OutputInterface $output) {
		$style = new SymfonyStyle($input, $output);


		/** @var array $avatars */
		$user->avatar->addFile(new File('/Users/elvis/Desktop/pecs_varosnezes_latnivalok.jpg'));

		$users = User::repository()->search()->pick();

		$user = User::repository()->pick(3);
		$avatars = $user->avatar->getAttachments();
		foreach ($avatars as $avatar){
			echo $avatar->getUrl();
		}
	}

}