<?php namespace App\Site\Website\Page;

use App\Entity\User\User;
use Phlex\Chameleon\HandyResponder;

/**
 * @css style
 * @jsappmodule Form
 */
class Index extends HandyResponder {

	protected $user;

	protected function prepare() {
		$this->user = User::repository()->pick(1);
	}

	protected function BODY() { ?>
		<div class="site-wrapper">
			<div class="site-wrapper-inner">
				<div class="cover-container">
					<div class="inner cover" style="text-align: center;">
						Hello {{.user.name}}!
						<div><img style="border-radius: 30px;" src="{{.user.avatar.first.thumbnail.height(60).png}}"></div>
						<h1 class="cover-heading">Phlex works</h1>
						<p class="lead">It's time to grind!</p>
						<img src="/img/grinder.svg" width="30%"><br>
					</div>
				</div>
			</div>
		</div>
	<?php }

}
