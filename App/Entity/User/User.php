<?php namespace App\Entity\User;

use Phlex\Auth\AuthenticableInterface;

/**
 * px: @method static \App\Entity\User\UserRepository repository()
 * px: @method static \App\Entity\User\UserModel model()
 * px: @property-read int $id
 * px: @property string $name
 * px: @property string $password
 * px: @property string $email

 */

class User extends \Phlex\RedFox\Entity implements AuthenticableInterface {

	public function checkPassword($password): bool {
		/** @var \Phlex\RedFox\Fields\PasswordField $field */
		$field = static::model()->getField('password');
		return $field->check($password, $this->password);
	}

}
