<?php

namespace App\Http\Controllers\Auth\Admin;

use App\Http\Controllers\Controller;
use App\User;

class AdminController extends Controller
{
    //

    protected $user;

    public function __construct()
    {
        $this->middleware('auth:super_admin')->except('logout');
        $this->user = new User;
    }

    public function dashboard()
    {
        $logOutRoutes = 'admin.logout';
        return view('auth.admin.dashboard')->with(compact('logOutRoutes'));
    }
}
