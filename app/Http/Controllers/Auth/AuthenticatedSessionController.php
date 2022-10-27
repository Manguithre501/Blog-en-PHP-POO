<?php

namespace App\Http\Controllers\Auth;

use App\Helpers\Redirect;
use Josantonius\Session\Session;
use App\Http\Middleware\Authenticate;
use App\Http\Requests\StoreLoginRequest;
use App\Http\Controllers\Auth\AuthController;

class AuthenticatedSessionController extends AuthController
{
    public function create()
    {
        Authenticate::if_session_existe();
        $this->view('Auth.login');
    }

    public function store()
    {
        $data = $this->json();
        $validator = (new StoreLoginRequest())->setEmail($data['email'])->setPassword($data['password']);
        $errors = $validator->validate();

        if (!empty($errors)) {
            http_response_code(400);
            echo json_encode($errors);
        } else {
            Session::set('auth', $validator->getEmail());
            $_SESSION['success'] = "Vous êtes connectée !";
            /*  Redirect::to(); */
            echo json_encode('ok');
        }
    }


    public function logout()
    {
        Session::destroy('auth');
        $_SESSION['success'] = "Vous êtes déconnectée !";
        Redirect::to();
    }
}
