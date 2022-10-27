<?php

namespace Database;

final class DbHelper
{
    public static function arr($key)
    {
        return getenv($key);
    }
}
