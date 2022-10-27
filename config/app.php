<?php

use Whoops\Run;
use Josantonius\Session\Session;
use Whoops\Handler\PrettyPageHandler;


require_once(dirname(__DIR__) . "/app/Services/helpers.php");

$app_name =  env('APP_NAME') != ""  ? env('APP_NAME') : 'Manguithre';



define('APP_NAME', $app_name);
define('APP_URL', env('APP_URL'));



$whoops = new Run;
$whoops->pushHandler(new PrettyPageHandler);
$whoops->register();

$ds = DIRECTORY_SEPARATOR;


define('VIEWS', dirname(__DIR__) . $ds . 'resources\views' . $ds);
define('ASSETS', dirname(__DIR__) . $ds . 'public' . $ds);

Session::init();
