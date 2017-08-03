<?php namespace App\Cli;

use App\Entity\User\User;
use App\Entity\User\UserRepository;
use Phlex\Database\DataSource;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;


class QuickTest extends Command{
	protected function configure() {
		$this
			->setName('app:quicktest')
			->setDescription('Implement your quick tests here!')
		;
	}

	protected function execute(InputInterface $input, OutputInterface $output) {
		$style = new SymfonyStyle($input, $output);

		$generator = new \Badcow\LoremIpsum\Generator();

		for($i=0;$i<20;$i++) {
			$words = $generator->getRandomWords(3);
			$user = new User();
			$user->name = ucfirst($words[0])." ".ucfirst($words[1]);
			$user->email = "$words[1]@$words[0].com";
			$user->password = $words[2];
			$user->save();
		}
	}

}