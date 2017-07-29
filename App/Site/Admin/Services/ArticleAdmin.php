<?php namespace App\Site\Admin\Services;

use App\Entity\Article\Article;
use Phlex\RedFox\Repository;


class ArticleAdmin extends AdminService {

	protected function getRepository(): Repository{
		return Article::repository();
	}


	/**
	 * @param Article $item
	 * @param array $row
	 * @return array
	 */
	protected function mapListFields($item){

		$row = $this->passThroughFields($item, ['title', 'id']);

		$row['author'] = (string) $item->author;

		return $row;

	}

	protected function mapFormFields($item) {

	}

}