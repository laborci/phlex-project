<?php namespace App\Entity\User;

class UserModel extends \Phlex\RedFox\Model{

	private $passwordSalt = "19686a75d42ad3c1aca865af782bda46";

	function repository() { return $this->repositoryFactory('user', 'database'); }

	protected function fields(){
		$this->addField('id', (new \Phlex\RedFox\Fields\IdField("int(11) unsigned"))->notNullable()->constant());
		$this->addField('name', (new \Phlex\RedFox\Fields\StringField("varchar(255)")));
		$this->addField('password', (new \Phlex\RedFox\Fields\PasswordField("char(32)", $this->passwordSalt)));
		$this->addField('email', (new \Phlex\RedFox\Fields\StringField("varchar(255)")));
	}

	protected function decorateFields(){}
	protected function relations(){}
	protected function attachments(){
		$this->hasAttachmentGroup('avatar')->acceptExtensions('jpg','png')->maxFileCount(1);
	}

}

/**
 * @package App\Entity\User
 * @method \App\Entity\User\User[] collect($limit = null, $offset = null)
 * @method \App\Entity\User\User pick()
 */
class Request extends \Phlex\Database\Request{}