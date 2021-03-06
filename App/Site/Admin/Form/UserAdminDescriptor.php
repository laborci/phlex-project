<?php namespace App\Site\Admin\Form;


use App\Entity\User\User;
use Phlex\Codex\AdminDescriptor;
use Phlex\Codex\FormDataManager;
use Phlex\Codex\FormHandler;
use Phlex\Codex\ListHandler;
use Phlex\Codex\Validation\StringLengthValidator;
use Phlex\RedFox\Entity;

class UserAdminDescriptor extends AdminDescriptor {

	protected static function setOptions(&$url, &$entityClass, &$title, &$titleField, &$icon, &$attachments) {
		$url = '/admin/user/';
		$entityClass = User::class;
		$title = 'User';
		$titleField = 'name';
		$icon = 'fas fa-user-tie';
		$attachments = true;
	}

	public function setFields(FormDataManager $formDataManager) {
		$formDataManager->addField('name', 'név')->addValidator(new StringLengthValidator(5));
		$formDataManager->addField('email', 'e-mail');
		$formDataManager->addField('password', 'jelszó');
	}

	public function decorateListHandler(ListHandler $listHandler) {
		$listHandler->addField('name');
		$listHandler->addField('email');
	}

	public function decorateFormHandler(FormHandler $formHandler) {
		$formHandler->addSection()
			->addInput('text', 'name')
			->addInput('text', 'email')
			->addInput('password', 'password');
	}

	protected function createFormDataManager() {
		return new class($this) extends FormDataManager {
			public function pack(Entity $item, $data) {
				if ($data['password'] === null) unset($data['password']);
				parent::pack($item, $data);
			}
		};
	}
}
