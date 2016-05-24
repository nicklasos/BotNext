<?php
require 'TestCase.php';
require 'Helpers.php';

define('ROOT', dirname(__DIR__));

$env = new \Dotenv\Dotenv(ROOT);
$env->load();
