<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;


class LoginController extends Controller
{
    public function index()
    {
        return view('login');
    }


    public function authentication(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if ($validator->fails()) {
            return redirect()->route('account.login')
                ->withInput()
                ->withErrors($validator);
        }

        $credentials = [
            'email' => $request->email,
            'password' => $request->password,
            'role' => 'customer'
        ];

        if (Auth::guard('web')->attempt($credentials)) {
            return redirect()->route('account.dashboard');
        }

        return back()->with('error', 'Invalid credentials');
    }


    public function registration()
    {
        return view('registration');
    }

    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'fullName' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6|confirmed'
        ]);

        if ($validator->fails()) {
            return redirect()->route('account.signup')->withInput()->withErrors($validator);
        }

        $user = User::create([
            'name' => $request->fullName,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'customer'
        ]);

        Auth::login($user);
        return redirect()->route('account.login')->with('success', 'Account created successfully!');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('account.login');
    }
}
