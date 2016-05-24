<?php

require 'vendor/autoload.php';

define('ROOT', __DIR__);
define('ASSETS', ROOT . '/public/assets');

$env = new \Dotenv\Dotenv(ROOT);
$env->load();
