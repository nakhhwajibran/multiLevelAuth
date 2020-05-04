<?php

namespace App\Http\Controllers\Auth\Marketing;

use App\Http\Controllers\Controller;
use App\User;

class MarketingController extends Controller
{
    //

    protected $user;

    public function __construct()
    {
        $this->middleware('auth:marketing_user')->except('logout');
        $this->user = new User;
    }

    public function dashboard()
    {
        $logOutRoutes = 'marketing.logout';
        return view('auth.marketing.dashboard')->with(compact('logOutRoutes'));
    }
}
