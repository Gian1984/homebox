<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\LoginController;
use Illuminate\Validation\ValidationException;


class LoginController extends Controller
{
    public function login(Request $request ){

        $request->validate([
            'email'=>['required', 'email'],
            'password'=>['required', 'min:6'],
        ]);

        if (Auth::attempt($request->only('email','password'))){
            return response()->json(Auth::user(),200);
        }
        throw ValidationException::withMessages([
            'email'=>['The provided credentials are incorect.']
        ]);
        
    }

    public function logout(){
        Auth::logout();
    }

    public function userlogged(){

        $user = Auth::user();

        return $user;   

    }

    
}
