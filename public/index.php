<?php

require_once(__DIR__ . '/../Core/functions.php');
require_once(base_path('vendor/autoload.php'));
$dotenv = Dotenv\Dotenv::createImmutable(dirname(__DIR__));
$dotenv->load();

require_once(base_path('bootstrap.php'));
require_once(base_path('web.php'));
