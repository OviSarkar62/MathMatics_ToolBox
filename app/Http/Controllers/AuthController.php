<?php

namespace App\Http\Controllers;

use App\Http\Controllers\UserRegistrationRequest;
use App\Http\Requests\UserRegistrationRequest as RequestsUserRegistrationRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{

    // User Registration Form
    public function createUser()
    {
        return view('user.user-register');
    }

    // User Registration Store
    public function storeUser(RequestsUserRegistrationRequest $request)
    {
        $user = User::create([
            'name' => request('name'),
            'email' => request('email'),
            'password' => bcrypt(request('password')),
        ]);

        return redirect()->route('login')->with('successMessage','Your account is created');
    }

    // USer Login Form
    public function login()
    {
        return view('user.user-login');
    }

    // User Login Store
    public function postLogin(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $credentails = $request->only('email', 'password');

        if(Auth::attempt($credentails))
        {
            return redirect()->to('dashboard');
        } else
        {
            return redirect()->to('login')->with('errorMessage','Wrong email or password');
        }

    }

    // User Logout
    public function logout()
    {
        auth()->logout();

        return redirect()->route('login');
    }
}
