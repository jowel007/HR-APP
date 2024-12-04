<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Hash;
use Str;
class AuthController extends Controller
{
    public function index()
    {
        return view('login');
    }

    public function forgot_password()
    {
        return view('forgot_password');
    }

    public function register()
    {
        return view('register');
    }

    public function register_post(Request $request)
    {
        //  dd($request->all());

        $user = $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users',
            'password' => 'required|min:6',
            'confirm_password' => 'required_with:password|same:password|min:6'
        ]);

        $user = new User;
        $user->name = trim($request->name);
        $user->email = trim($request->email);
        $user->password = Hash::make($request->password);
        $user->remember_token = Str::random(50);
        $user->save();

        return redirect('/')->with('primary', 'Register Successfully Done! ');
    }
}
