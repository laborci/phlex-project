<?php namespace App\Site\Admin\Page;


use App\Env;
use Phlex\Auth\AuthServiceInterface;
use Phlex\Chameleon\SmartPageResponder;
use Phlex\Sys\InjectDependencies;


class Index extends SmartPageResponder implements InjectDependencies {

	protected $user;

	/** @var \Phlex\Auth\AuthServiceInterface */
	protected $authService;

	public function __construct(AuthServiceInterface $authService) {
		$this->authService = $authService;
	}

	protected function prepare(): bool {

//		$this->addCssInclude('/css/admin/style.css');
//
//		 $this->addJsInclude('/bower/jquery/dist/jquery.min.js');
//
//		$this->addCssInclude('/bower/bootstrap/dist/css/bootstrap.min.css');
//		$this->addJsInclude('/bower/bootstrap/dist/js/bootstrap.min.js');
//
//		$this->addCssInclude('/bower/font-awesome/css/font-awesome.min.css');
//
//		$this->addJsInclude('/bower/air-datepicker/dist/js/datepicker.min.js');
//		$this->addJsInclude('/bower/air-datepicker/dist/js/i18n/datepicker.en.js');
//		$this->addCssInclude('/bower/air-datepicker/dist/css/datepicker.min.css');
//
//		if(Env::instance()->devmode) {
//			$this->addJsInclude('/asset/jspm/system.js');
//			$this->addJsInclude('/asset/jspm/config.js');
//			$this->addJsInclude('<script>
//				SystemJS.config({
//				  map: {
//				    PXA: "asset/admin/js/PxAdmin"
//				  }
//				});
//				System.import("/asset/admin/js/Admin-page.js");
//			</script>', true);
//		}else{
//		}

		$this->addJsInclude('/dist/admin/Index.js');

		$this->user = $this->authService->getUser();
		$this->title = 'Phlex Admin';
		return true;
	}


	protected function bodyTpl() { ?>
		<nav class="main navbar navbar-inverse navbar-static-top" style="margin-bottom:0;">
			<div class="container-fluid">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<div class="navbar-brand" href="#">Phlex</div>
				</div>

				<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
					<ul class="nav navbar-nav menu">
					</ul>
					<ul class="nav navbar-nav navbar-right">
						<li><a href="/logout">Logout</a></li>
					</ul>
				</div>
			</div>
		</nav>

		<div class="container-fluid" style="height:calc(100% - 50px);">
			<div class="row" style="height: 100%;">
				<div class="col-md-6 box-list">


				</div>
				<div class="col-md-6 box-form">
					<div>


					</div>
				</div>

			</div>
		</div>
	<?php }
}