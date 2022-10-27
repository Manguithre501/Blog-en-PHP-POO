<?php

namespace App\Services;

class Env
{

    public static function get($key, $default = null)
    {
        return getenv($key);
    }
}
