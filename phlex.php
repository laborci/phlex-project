#!/usr/bin/env php
<?php
putenv('ROOT='.realpath(__DIR__));
require __DIR__.'/autoload.php';
\Phlex\Cli\Application::cli(true);