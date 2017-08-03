<?php namespace App\Entity\User;

use Phlex\Auth\AuthenticableInterface;
use Phlex\Database\DataSource;
use Phlex\RedFox\Repository;


/**
 * px: @method static \App\Entity\User\UserRepository repository()
 * px: @method static \App\Entity\User\UserModel model()
 * px: @property-read int $id
 * px: @property string $name
 * px: @property string $password
 * px: @property string $email

 */

class User extends \Phlex\RedFox\Entity implements AuthenticableInterface {

	public function checkPassword($password): bool { return $password === $this->password; }

	/*
	public static function secondaryRepository():UserRepository{
		static $repository;
		return is_null($repository) ? $repository = new UserRepository(new DataSource('user_copy', 'database'), get_called_class()) : $repository;
	}
	*/

}
