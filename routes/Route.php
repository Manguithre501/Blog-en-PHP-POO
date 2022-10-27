<?php

namespace Routes;


class Route
{
    public $path,
        $routes = [],
        $matches,
        $request;
    public function __construct($path, $action)
    {
        $this->path = trim($path, '/');
        $this->action = $action;
    }


    public function matches(string $url)
    {
        $path = preg_replace('#:([\w]+)#', '([^/]+)', $this->path);
        $pathToMatch = "#^$path$#";
        if (preg_match($pathToMatch, $url, $matches)) {
            $this->matches = $matches;
            return true;
        } else {
            return false;
        }
    }

    public function execute()
    {
        $action =  $this->action;
        $controller  = new $action[0]; // controller
        $method = $action[1]; // methode

        /* $this->request */
        return isset($this->matches[1]) ? $controller->$method($this->matches[1]) : $controller->$method();
    }
}
