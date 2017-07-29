<?php

namespace App\Site\Admin\Page;


use Phlex\Chameleon\PageResponder;


class Error404 extends PageResponder {

	protected function prepare() {

		header('location: /');
	}

	protected function respond() {
		?>
			<h1 style="color: magenta;">404</h1>
		<?
		// TODO: Implement respond() method.
	}
}