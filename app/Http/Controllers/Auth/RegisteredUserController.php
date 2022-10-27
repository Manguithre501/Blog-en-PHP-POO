<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Auth\AuthController;



class RegisteredUserController extends AuthController
{
    public function create()
    {
        $this->view('Auth.register');
    }
}
