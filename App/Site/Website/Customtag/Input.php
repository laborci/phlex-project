<?php namespace App\Site\Website\Customtag;

class Input extends \Phlex\Chameleon\DoubleCustomtag {

	protected $label;

	protected function prepare() {
		$this->label = $this->getAttributeParamBag()->get('label', 'label');
	}

	protected function tag() { ?>
		<div>
			<label>{{label}}</label>
	<?php }

	protected function closer() { ?>
		</div>
	<?php }
}