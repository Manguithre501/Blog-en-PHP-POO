<?php


namespace Routes;

use App\Exceptions\NotFoundException;


class Router
{

    public static $url, $routes = [], $number = [];

    public function __construct($url)
    {
        static::$url = trim($url, '/');
    }



    public static function get(string $path, array $action)
    {
        static::$routes['GET'][] =  new Route($path, $action);
        static::whereNumber($path);
    }

    public static function post(string $path, array $action)
    {
        static::$routes['POST'][] =  new Route($path, $action);
    }

    public static function run()
    {
        foreach (static::$routes[$_SERVER['REQUEST_METHOD']] as $route) {

            if ($route->matches(static::$url)) {
                return $route->execute();
            }
        }

        /* $diso =  new NotFoundException();
        echo $diso->erro404(); */
    }


    private static function whereNumber(string $path)
    {

        $tab = explode('/', $path);
        $number = explode('/', static::$url);
        if (in_array(':id', $tab)) {
            if (count($number) === 2) {
                $nb = $number[1];
                $result = preg_match('/[0-9]/', $nb);

                if (is_numeric($nb) && $result === 1) {
                } else {

                    NotFoundException::erro404();
                }
            }
        }
    }

    /* public static function isActive(string $name = null): string
    {
        $url = explode('/', static::$url)[0];
        return trim($name) === $url ? 'current' : '';
    } */

    public static function name(string $name = '', array $params = []): string
    {

        $param = !empty($params) ? array_values($params)[0] : '';


        return is_null($params) ? APP_URL . $name  : APP_URL  . $name . '/' . $param;
    }

    public static function getCurrentUrl($name = ''): string
    {
        $url = explode('/', static::$url)[0];

        return $url;
    }
}
