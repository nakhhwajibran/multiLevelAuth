<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\MarketingUser;
use App\Providers\RouteServiceProvider;
use App\SuperAdmin;
use App\SupportUser;
use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    //

    protected $user;
    protected $super_admin;
    protected $marketing;
    protected $support;
    public function __construct()
    {
        $this->user = new User;
        $this->super_admin = new SuperAdmin;
        $this->support = new SupportUser;
        $this->marketing = new MarketingUser;
    }


    public function login()
    {
    }

    public function userRegister(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'firstname' => 'required|string',
                'lastname' => 'required|string',
                'email' => 'required|email',
                'password' => 'required|string|min:6',
            ]
        );

        if ($validator->fails()) {
            return redirect('user/register')
                ->withErrors($validator)
                ->withInput();
        }
    }

    public function userRegisterView(Request $request)
    {
        return view('auth.userRegister');
    }
}
