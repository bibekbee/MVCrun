<?php

require_once(__DIR__ . '/Core/functions.php');
require_once(__DIR__ . '/vendor/autoload.php');
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();
require_once(__DIR__ . '/bootstrap.php');

use app\Core\Application;

$db = Application::container()->resolve('Core\Database');
dd($db->applyMigrations());

