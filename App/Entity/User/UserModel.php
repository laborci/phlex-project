<?php namespace App\Entity\User;

class UserModel extends \Phlex\RedFox\Model{

	protected function fields(){
		$this->addField('id', (new \Phlex\RedFox\Fields\IdField("int(11) unsigned"))->notNullable()->constant());
		$this->addField('name', (new \Phlex\RedFox\Fields\StringField("varchar(255)")));
		$this->addField('email', (new \Phlex\RedFox\Fields\StringField("varchar(255)")));
		$this->addField('password', (new \Phlex\RedFox\Fields\StringField("varchar(255)")));
	}
	
	protected function decorateFields(){}
	protected function relations(){}
	protected function attachments() {}

}