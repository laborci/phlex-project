<?php namespace App\Entity\User\Helpers;
/**
 * px: @property-read \Phlex\RedFox\Fields\IdField $id
 * px: @property-read \Phlex\RedFox\Fields\StringField $name
 * px: @property-read \Phlex\RedFox\Fields\StringField $email
 * px: @property-read \Phlex\RedFox\Fields\PasswordField $password

 */
trait ModelTrait{
	public function repository(){ return $this->repositoryFactory(...(include('source.php'))); }
	public function fields():array { return include("fields.php"); }
}