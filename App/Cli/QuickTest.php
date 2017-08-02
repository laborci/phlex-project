<?php namespace App\Cli;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class QuickTest extends Command{
	protected function configure() {
		$this
			->setName('app:quicktest')
			->setDescription('Implement your quick tests here!')
		;
	}

	protected function execute(InputInterface $input, OutputInterface $output) {
		$output->writeln('Grinding!');
	}

}