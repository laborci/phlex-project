<?php namespace App\Site\Admin\Action;

use App\Site\Admin\Form\CurriculumAdminDescriptor;
use App\Site\Admin\Form\ProgrammeAdminDescriptor;
use App\Site\Admin\Form\SkillAdminDescriptor;
use App\Site\Admin\Form\SubjectAdminDescriptor;
use App\Site\Admin\Form\UserAdminDescriptor;

class GetMenu extends \Phlex\Codex\Responder\Menu {
	protected function createMenu() {
		$this->addMenu()
			->addList(...UserAdminDescriptor::getMenuArguments())
		;
	}

}
