<?php

namespace App\Http\Controllers\Auth;

use Routes\Router;
use App\Helpers\Auth;
use eftec\bladeone\BladeOne;
use Josantonius\Session\Session;


abstract class AuthController
{
    private static $instance = null;

    public function __construct()
    {
        if (self::$instance === null) {

            self::$instance = new BladeOne(VIEWS, null, BladeOne::MODE_DEBUG);
        }

        return self::$instance;
    }


    protected function view(string $path, array $params = [])
    {
        self::$instance->addAliasClasses('route', Router::class);

        self::$instance->setAuth(Session::get('auth'));
        self::$instance->setBaseUrl("http://dts/POO/public/");
        echo self::$instance->run($path, $params);
    }

    public function json()
    {
        return json_decode(file_get_contents("php://input"), true);
    }
}
