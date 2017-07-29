<?php

namespace App\Site\Admin\Page;


use Phlex\Routing\Router;
use Phlex\Chameleon\SmartPageResponder;


class Login extends SmartPageResponder {

	protected function prepare() {
		$this->addJsInclude('/dist/admin/Login.js');
	}

	protected function bodyTpl() {?>
		<div class="container" style="margin-top:30px">

			<div class="col-md-12">
				<div class="modal-dialog" style="margin-bottom:0">
					<div class="modal-content">
						<div class="panel-heading">
							<h3 class="panel-title">Sign In</h3>
						</div>

						<div class="panel-body">
							<form role="form" method="post">
								<fieldset>
									<div class="form-group">
										<input type="text" id="login" name="login" placeholder="e-mail" class="input-xlarge" value="elvis@elvis.hu">
									</div>
									<div class="form-group">
										<input type="password" id="password" name="password" placeholder="password" class="input-xlarge" value="galaga">
									</div>
									<!-- Change this to a button or input when using this as a form -->
									<button type="button" class="btn btn-success">Login</button>
								</fieldset>
							</form>
						</div>

						<div class="panel-footer wrong-password" style="display: none;">
							<div class="alert alert-danger" role="alert">Wrong user name or password!</div>

						</div>
					</div>
				</div>
			</div>

			<hr>
			Mielőtt az adminisztrációs felületet működésbe hozhatnád, még egy két dolgot meg kell tegyél!
		</div>


	<?php }

}