<?php namespace App\Site\Admin\Services;

use App\Entity\User\User;
use Phlex\RedFox\Repository;


class UserAdmin extends AdminService {

	protected function getRepository(): Repository{
		return User::repository();
	}

}