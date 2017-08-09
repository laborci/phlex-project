<?php namespace App\Entity\User;

use Phlex\Database\Filter;

/**
 * @method \App\Entity\User\User pick(int $id)
 * @method \App\Entity\User\User[] collect(array $id_list)
 * @method \App\Entity\User\Request getSourceRequest(Filter $filter = null)
 */

class UserRepository extends \Phlex\RedFox\Repository{

	public function findByLogin(string $login){
		return $this->throwExceptionOnEmpty(
				$this->getSourceRequest(Filter::where('email=$1', $login))->pick()
		);
	}

}