<?php

require 'vendor/autoload.php';

define('ROOT', __DIR__);

$env = new \Dotenv\Dotenv(ROOT);
$env->load();
