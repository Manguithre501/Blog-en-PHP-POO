<?php

namespace App\Http\Controllers;

use App\Helpers\Auth;
use App\Models\User;
use App\Helpers\Redirect;
use Josantonius\Session\Session;
use App\Http\Middleware\Authenticate;
use App\Models\Response;
use App\Models\Topic;

class ProfileController extends Controller
{

    public function show()
    {
        /* Authenticate::if_session_empty(); */
        $profile = User::findOrFail(Auth::user()->id);
        return $this->view('Profiles.profile', compact('profile'));
    }

    public function update()
    {
    }

    public function logout()
    {
        Session::destroy('auth');
        Redirect::to();
    }
}
