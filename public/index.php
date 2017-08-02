<?php

putenv('ROOT='.realpath(__DIR__.'/../'));
putenv('CONTEXT=web');

require_once (__DIR__.'/../'.'autoload.php');

session_start();

\App\Env::load();

Phlex\Routing\Launcher::launch(
	\App\Site\Website\Site::class,
	\App\Site\Admin\Site::class
);

// TODO: what to do?
echo 'no answer from sites';