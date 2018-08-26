<?php namespace App\Entity\User;

class UserModel extends \Phlex\RedFox\Model{

	function repository() { return $this->repositoryFactory('user', 'database'); }

	public function fields():array {
		return [
			'@id'       => [\Phlex\RedFox\Fields\IdField::class],
			'name'      => [\Phlex\RedFox\Fields\StringField::class],
			'email'     => [\Phlex\RedFox\Fields\StringField::class],
			'!password' => [\Phlex\RedFox\Fields\PasswordField::class, '19686a75d42ad3c1acac65af7a2bda46'],
		];
	}

	protected function relations(){
	}

	protected function attachments(){
		$this->hasAttachmentGroup('avatar')
				->acceptExtensions('jpg', 'png')
				->maxFileCount(10)
				->maxFileSize(800*1024);
	}

}

/**
 * px: @method \App\Entity\User\User[] collect($limit = null, $offset = null)
 * px: @method \App\Entity\User\User pick()
 */
class Finder extends \Phlex\Database\Finder{}