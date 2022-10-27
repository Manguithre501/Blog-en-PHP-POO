<?php


use Dotenv\Dotenv;
use Routes\Router;

require_once '../vendor/autoload.php';
(Dotenv::createUnsafeImmutable(dirname(__DIR__)))->load();


require_once(dirname(__DIR__) . "/config/app.php");


new Router($_GET['page']);


require_once dirname(__DIR__) . '/routes/web.php';


Router::run();
