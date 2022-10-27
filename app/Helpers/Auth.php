<?php

namespace App\Helpers;

use App\Models\Model;
use Josantonius\Session\Session;

class Auth extends Model
{

    public static function user()
    {
        if (!empty(Session::get('auth'))) {
            $session = Session::get('auth');
            return parent::prepare("SELECT * FROM users WHERE email = ?", [$session], true);
        }
    }
}
