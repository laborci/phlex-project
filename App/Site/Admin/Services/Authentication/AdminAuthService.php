<?php namespace App\Site\Admin\Services\Authentication;

use App\Entity\User\User;
use Phlex\Auth\AuthContainerInterface;
use Phlex\Auth\AuthenticableInterface;
use Phlex\Auth\AuthService;
use Phlex\Database\Filter;
use Phlex\RedFox\EmptyResultException;


class AdminAuthService extends AuthService implements \Phlex\Auth\AuthServiceInterface {

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