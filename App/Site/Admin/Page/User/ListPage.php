<?php namespace App\Site\Admin\Page\User;


use App\Entity\User\User;
use Phlex\Database\Filter;


class ListPage extends \Phlex\Chameleon\SmartPageResponder {

	protected $fields;
	protected $items;

	protected function setFields(){
		$this->fields[] = 'id';
		$this->fields[] = 'name';
		$this->fields[] = 'pseudoField';
		$this->fields[] = 'email';
	}

	protected function prepare() {
		$this->addCssInclude('/css/admin/style.list.css');
		$this->addCssInclude('/bower/font-awesome/css/font-awesome.css');
		$this->addJsInclude('/bower/jquery/dist/jquery.min.js');
		$this->addJsInclude('/js/admin/listPage.js');

		$this->setFields();
		$this->items = User::repository()->search()->collect();
	}

	protected function bodyTpl() {?>

		<header>

		</header>
		<table class="list">

		</table>

	<?php }

}