<?php

namespace App\Http\Controllers\Auth\Marketing;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\MarketingUser;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    //

    protected $marketing;

    public function __construct()
    {
        $this->middleware('guest:marketing_user')->except('logout');
        $this->marketing = new MarketingUser;
    }

    use AuthenticatesUsers;
    /**
     * Where to redirect users after login.
     *
     * @var string
     */


    protected function guard()
    {
        return Auth::guard('marketing_user');
    }

    protected $redirectTo = 'marketing/dashboard';

    public function register(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'firstname' => 'required|string',
                'lastname' => 'required|string',
                'email' => 'required|email|unique:marketing_user',
                'password' => 'required|string|min:6',
            ]
        );
        if ($validator->fails()) {
            return redirect('marketing/register')
                ->withErrors($validator)
                ->withInput();
        }

        $registerComplete = $this->marketing::create([
            'firstname' => $request->firstname,
            'lastname' => $request->lastname,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return redirect(route('marketing.login'));
    }

    public function registerView()
    {
        return view('auth.marketing.register');
    }

    public function loginView()
    {
        return view('auth.marketing.login');
    }
}
