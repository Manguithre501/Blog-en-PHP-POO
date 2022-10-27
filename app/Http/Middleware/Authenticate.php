<?php

namespace App\Http\Middleware;

use App\Helpers\Redirect;
use Josantonius\Session\Session;

final class Authenticate
{

    static function if_session_empty()
    {
        if (empty(Session::get('auth'))) {
            Redirect::to('login');
        }
    }


    static function if_session_existe()
    {
        if (!empty(Session::get('auth'))) {
            Redirect::to();
        }
    }
}
