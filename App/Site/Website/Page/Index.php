<?php namespace App\Site\Website\Page;

use Phlex\Chameleon\SmartPageResponder;

class Index extends SmartPageResponder {

	protected function prepare() {
		$this->addJsInclude('/dist/www/Index.js');
	}


	protected function bodyTpl() { ?>

    <div class="site-wrapper">

      <div class="site-wrapper-inner">

        <div class="cover-container">


          <div class="inner cover" style="text-align: center;">
            <h1 class="cover-heading">Phlex works</h1>
            <p class="lead">You are almost a phlexer! It's time to grind!</p>
            <img src="/img/grinder.svg" width="30%">
          </div>

        </div>

      </div>

    </div>
	<?php }

}