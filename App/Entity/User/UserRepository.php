<?php namespace App\Entity\User;

use Phlex\Database\Filter;

/**
 * px: @method \App\Entity\User\User pick(int $id)
 * px: @method \App\Entity\User\User[] collect(array $id_list)
 * px: @method \App\Entity\User\Request search(Filter $filter = null)
 */

class UserRepository extends \Phlex\RedFox\Repository{

	public function findByLogin(string $login){
		return $this->throwExceptionOnEmpty(
				$this->search(Filter::where('email=$1', $login))->pick()
		);
	}

}