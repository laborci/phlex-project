<?php namespace App\Entity\User;

use Phlex\Database\DataSource;

class UserDataSource extends DataSource {
	public function __construct() { parent::__construct('user', 'database'); }
}