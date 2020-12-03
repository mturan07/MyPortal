<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\User;

class AuthController extends Controller
{
    public function login(){
        return view('auth.login');
    }

    public function loginPost(Request $request){
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])){
            toastr()->success('Sn. '.Auth::user()->name, 'Hoşgeldiniz');
            return redirect()->route('portal');
        }
        return redirect()->route('login')->withErrors('Email adresi veya şifre hatalı!');

        // $credentials = $request->only('email', 'password');

        // if (Auth::attempt($credentials)) {
        //     return redirect()->intended('portal');
        // }
    }

    public function logout(){
        Auth::logout();
        return redirect()->route('login');
    }
}
