<?php namespace App\Site\Admin\Services;

use App\Entity\User\User;
use Phlex\Auth\AuthenticableInterface;

class AuthService extends \Phlex\Auth\AuthService {

	/**
	 * @return User|null
	 */
	public function getUser() {
		return User::repository()->pick($this->container->getUserId());
	}

	protected function findUser($login): AuthenticableInterface{
		return User::repository()->findByLogin($login);
	}

}