<?php

namespace App\Http\Controllers;


use Routes\Router;
use App\Helpers\Auth;
use App\Helpers\Mot;
use eftec\bladeone\BladeOne;
use Josantonius\Session\Session;


abstract class  Controller
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
        self::$instance->addAliasClasses('auth', Auth::class);
        self::$instance->addAliasClasses('logo', Mot::class);
        self::$instance->setAuth(Session::get('auth'));


        self::$instance->setBaseUrl("http://examblog/public/");

        self::$instance->directive('userId', function () {
            return  Auth::user()->id;
        });




        echo self::$instance->run($path, $params);
    }

    public function json()
    {
        return json_decode(file_get_contents("php://input"), true);
    }
}
