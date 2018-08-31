<?php namespace App\Site\Admin\Service;

use App\Entity\User\User;
use App\ServiceManager;
use Phlex\Database\Filter;
use Phlex\Sys\ServiceManager\InjectDependencies;
use Phlex\Sys\ServiceManager\SharedService;

class AuthService implements SharedService, InjectDependencies {

	protected $container;

	public function __construct(AuthSessionContainer $container) {
		$this->container = $container;
	}


	public function isAuthenticated(){
		return (bool)$this->container->userId;
	}

	public function getAuthenticated(){
		return User::repository()->pick($this->container->userId);
	}

	public function checkLogin($login, $password){
		$user = User::repository()->search(Filter::where('email = $1', $login))->pick();
		ServiceManager::getLogger()->info($user);
		return $user && User::model()->getField('password')->check($password, $user->password) ? $user : null;
	}

	public function login($user){
		$this->container->userId = $user->id;
	}

	public function logout(){
		$this->container->forget();
	}

}