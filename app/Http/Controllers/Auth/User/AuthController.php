<?php

namespace App\Http\Controllers\Auth\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    //

    protected $user;

    public function __construct()
    {
        $this->middleware('guest:users')->except('logout');
        $this->user = new User;
    }

    use AuthenticatesUsers;
    /**
     * Where to redirect users after login.
     *
     * @var string
     */

    protected function guard()
    {
        return Auth::guard();
    }

    protected $redirectTo = 'user/dashboard';

    public function register(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'firstname' => 'required|string',
                'lastname' => 'required|string',
                'email' => 'required|email|unique:users',
                'password' => 'required|string|min:6',
            ]
        );
        if ($validator->fails()) {
            return redirect('user/register')
                ->withErrors($validator)
                ->withInput();
        }

        $registerComplete = $this->user::create([
            'firstname' => $request->firstname,
            'lastname' => $request->lastname,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return redirect(route('user.login'));
    }

    public function registerView()
    {
        return view('auth.user.register');
    }

    public function loginView()
    {
        return view('auth.user.login');
    }
}
