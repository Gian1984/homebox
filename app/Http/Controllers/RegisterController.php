<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\RegisterController;

class RegisterController extends Controller
{
    public function register(Request $request ){

        $request->validate([
            'name'=>['required'],
            'email'=>['required', 'email', 'unique:users'],
            'password'=>['required', 'min:6'],
        ]);

        User::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>Hash::make($request->password)
        ]);

    }
}
