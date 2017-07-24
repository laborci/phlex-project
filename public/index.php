<?php

putenv('ROOT='.realpath(__DIR__.'/../'));


require_once (__DIR__.'/../'.'autoload.php');

session_start();

Phlex\Routing\Launcher::launch(
	\App\Site\Website\Site::class,
	\App\Site\Admin\Site::class
);

// TODO: what to do?
echo 'no answer from sites';