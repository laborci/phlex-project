<?php namespace App\Entity\User;

use Phlex\Database\DataSource;


class UserModel extends \Phlex\RedFox\Model{

	private $passwordSalt = "19686a75d42ad3c1aca865af782bda46";

	function repository() { return $this->repositoryFactory('user', 'database'); }

	protected function fields(){
		$this->addField('id', (new \Phlex\RedFox\Fields\IdField("int(11) unsigned"))->notNullable()->constant());
		$this->addField('name', (new \Phlex\RedFox\Fields\StringField("varchar(255)")));
		$this->addField('password', (new \Phlex\RedFox\Fields\PasswordField("char(32)", $this->passwordSalt)));
		$this->addField('email', (new \Phlex\RedFox\Fields\StringField("varchar(255)")));
		$this->addField('hasNewMessage', (new \Phlex\RedFox\Fields\BoolField("tinyint(1)")));
		$this->addField('status', (new \Phlex\RedFox\Fields\EnumField("enum('pre','active','limbo','banned')"))->setOptions(['pre','active','limbo','banned']));
		$this->addField('access', (new \Phlex\RedFox\Fields\EnumField("enum('visitor','admin')"))->setOptions(['visitor','admin']));
	}

	protected function decorateFields(){}
	protected function relations(){}
	protected function attachments(){
		$this->hasAttachmentGroup('avatar');
	}

}