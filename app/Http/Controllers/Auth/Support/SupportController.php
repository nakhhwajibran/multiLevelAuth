<?php

namespace App\Http\Controllers\Auth\Support;

use App\Http\Controllers\Controller;
use App\User;

class SupportController extends Controller
{
    //

    protected $user;

    public function __construct()
    {
        $this->middleware('auth:support_user')->except('logout');
        $this->user = new User;
    }

    public function dashboard()
    {
        $logOutRoutes = 'support.logout';
        return view('auth.support.dashboard')->with(compact('logOutRoutes'));
    }
}
