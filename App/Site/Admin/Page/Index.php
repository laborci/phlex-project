<?php namespace App\Site\Admin\Page;

use App\Site\Admin\Service\AuthService;
use Phlex\Chameleon\HandyResponder;
use Phlex\Sys\ServiceManager\InjectDependencies;

/**
 * @css style
 * @js  app.js
 * @title Phlex Codex
 */
class Index extends HandyResponder implements InjectDependencies{

	protected $username;
	protected $authService;

	public function __construct(AuthService $authService= null) {
		parent::__construct();
		$this->authService = $authService;
	}

	function BODY() {?>
		<px-admin admin-title="Phlex Codex" icon="fas fas fa-life-ring" user="{{authService.getAuthenticated().name}}" avatar="{{authService.getAuthenticated().avatar.first.thumbnail.crop(64,64).png}}"></px-admin>
	<?php }
}