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

		$users = User::repository()->getSourceRequest()->pick();

		$user = User::repository()->pick(3);
		$avatars = $user->avatar->getAttachments();
		foreach ($avatars as $avatar){
			echo $avatar->getUrl();
		}

		//$access = CommentArticle::repository()->getDataSource()->getAccess();
		//
		//$timestamp = microtime();
		//$comments = CommentArticle::repository()->getSourceRequest(Filter::where('itemId = 2'))->k;  ->collect(50, 50000);
		//$style->success( microtime() - $timestamp );
		//
		//
		//$timestamp = microtime();
		//$ids = $access->getValues("SELECT id
       // FROM comment_article
       // where itemId = 2
       // ORDER BY id desc
       // LIMIT 50 OFFSET 50000");
		//$comments = CommentArticle::repository()->getSourceRequest(Filter::where('id in ($1)', $ids))->collect();
		//$style->success( microtime() - $timestamp );
		//

		//$access = User::repository()->getDataSource()->getAccess();
		//print_r($access->getRowsWithKey('SELECT email, user.* FROM user'));
		//print_r($access->getValuesWithKey('SELECT id, name FROM user'));

		//$generator = new \Badcow\LoremIpsum\Generator();
/*
		for($i=0;$i<200000;$i++) {
			//$words = $generator->getRandomWords(3);
			$comment = new CommentArticle();
			$comment->text = 'BLABLA';
			$comment->itemId = random_int(1,3);
			$comment->save();
		}
*/
	}

}