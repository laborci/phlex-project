<?php namespace App\Site\Website\Page;

use Phlex\Chameleon\SmartPageResponder;

class Index extends SmartPageResponder {

	protected function prepare() {
		$this->addJsInclude('/www/Index.js');
	}


	protected function bodyTpl() { ?>

    Hello, this is phlex!

	<?php }

}