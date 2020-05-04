<?php

namespace App\Http\Controllers\Auth\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\SuperAdmin;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    //

    protected $admin;

    public function __construct()
    {
        $this->middleware('guest:super_admin')->except('logout');
        $this->admin = new SuperAdmin;
    }

    use AuthenticatesUsers;
    /**
     * Where to redirect users after login.
     *
     * @var string
     */


    protected $redirectTo = 'admin/dashboard';

    protected function guard()
    {
        return Auth::guard('super_admin');
    }

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
            return redirect('admin/register')
                ->withErrors($validator)
                ->withInput();
        }

        $registerComplete = $this->admin::create([
            'firstname' => $request->firstname,
            'lastname' => $request->lastname,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return redirect(route('admin.login'));
    }

    public function registerView()
    {
        return view('auth.admin.register');
    }

    public function loginView()
    {
        return view('auth.admin.login');
    }
}
