<?php

namespace App\Helpers;


final class Mot
{
    /**
     * METHODE QUI RECUPERE LE PREMIER CARACTERE D'UN MOT
     */
    public static function firstChars(string $name = null): string
    {
        $chars = ['A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z'];
        $name = !empty($name) ? $name : Auth::user()->name;
        $new_name = trim(ucfirst(substr($name, 0, 1)));

        if (in_array($new_name, $chars)) {
            return APP_URL  . 'public/img/avatars/icons/' . $new_name . '.svg';
        }
    }
}
