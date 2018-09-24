<?php namespace App\Entity\User;

class User extends \Phlex\RedFox\Entity implements Helpers\EntityInterface{

	use Helpers\EntityTrait;

	public function __toString(){ return (string) $this->id; }

}