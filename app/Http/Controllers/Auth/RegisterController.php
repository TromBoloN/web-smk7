<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    public function showRegisterForm()
    {
        return view('auth.register');
    }

    // public function register(Request $request)
    // {
    //     $request->validate([
    //         'username' => 'required|string|max:40',
    //         'email' => 'required|string|email|max:40|unique:user',
    //         'password' => 'required|string|min:6|confirmed',
    //     ]);

    //     $user = User::create([
    //         'username' => $request->username,
    //         'email' => $request->email,
    //         'password' => Hash::make($request->password), // Password should be hashed
    //         'role' => 'admin',
    //     ]);

    //     Auth::login($user);

    //     return redirect('/');
    // }
}
