<?php namespace App\Entity\User;

class UserModel extends \Phlex\RedFox\Model{

	use Helpers\ModelTrait;

	protected function relations(){}

	protected function attachments(){
		$this->hasAttachmentGroup('avatar')
			->acceptExtensions('jpg', 'png')
			->maxFileCount(10)
			->maxFileSize(800 * 1024);
	}

	public function setDefaults(User $object){}

}
