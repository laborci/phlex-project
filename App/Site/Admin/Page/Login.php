<?php namespace App\Site\Admin\Page;


use Phlex\Chameleon\HandyResponder;

/**
 * @css style
 * @js  app.js
 * @title Phlex Codex
 * @bodyclass login
 */
class Login extends HandyResponder {
	protected function BODY() { ?>
		<px-login title="Phlex Codex" icon="fas fa-life-ring fa-spin" login-placeholder="e-mail"></px-login>
	<?php }
}