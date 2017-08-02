<?php namespace App\Entity\User;

use Phlex\Database\DataSource;
use Phlex\Database\Filter;

/**
 * @method \App\Entity\User\User pick(int $id)
 * @method \App\Entity\User\User[] collect(array $id_list)
 */

class UserRepository extends \Phlex\RedFox\Repository{

	/**
	 * @param $login
	 * @return User
	 */
	public function findByLogin($login){
		return $this->throwExceptionOnEmpty(
				$this->getSourceRequest(Filter::where('email=$1', $login))->pick()
		);
	}

}