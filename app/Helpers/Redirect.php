<?php

namespace App\Helpers;

final class Redirect
{
    static function to(string $param = '')
    {
        return header('Location:' . 'http://examblog/' .  trim($param));
    }
}
