<?php

namespace App\Http\Controllers\Auth\Support;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\SupportUser;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    //

    protected $support;


    use AuthenticatesUsers;

    public function __construct()
    {
        $this->middleware('guest:support_user')->except('logout');
        $this->support = new SupportUser;
    }

    /**
     * Where to redirect users after login.
     *
     * @var string
     */

    protected function guard()
    {
        return Auth::guard('support_user');
    }

    protected $redirectTo = 'support/dashboard';

    public function register(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'firstname' => 'required|string',
                'lastname' => 'required|string',
                'email' => 'required|email|unique:support_user',
                'password' => 'required|string|min:6',
            ]
        );
        if ($validator->fails()) {
            return redirect('support/register')
                ->withErrors($validator)
                ->withInput();
        }

        $registerComplete = $this->support::create([
            'firstname' => $request->firstname,
            'lastname' => $request->lastname,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return redirect(route('support.login'));
    }

    public function registerView()
    {
        return view('auth.support.register');
    }

    public function loginView()
    {
        return view('auth.support.login');
    }
}
