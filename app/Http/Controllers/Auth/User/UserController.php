<?php

namespace App\Http\Controllers\Auth\User;

use App\Http\Controllers\Controller;
use App\User;

class UserController extends Controller
{
    //

    protected $user;

    public function __construct()
    {
        $this->middleware('auth:users')->except('logout');
        $this->user = new User;
    }

    public function dashboard()
    {
        $logOutRoutes = 'user.logout';
        return view('auth.user.dashboard')->with(compact('logOutRoutes'));
    }
}
