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
            'roles'=> ['required'],
            'quote'=> ['required'],
            'author'=> ['required'],
            'avatar'=> ['required'],

        ]);

        User::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>Hash::make($request->password),
            'roles'=>$request->roles,
            'quote'=>$request->quote,
            'author'=>$request->author,
            'avatar'=>$request->avatar,
        ]);

    }

    public function delete($id)
    {
        return User::findOrFail($id)->delete();
    }

    public function update(Request $request, $id){

        $request->validate([

            'name'=>['required'],
            'email'=>['required', 'email'],
            'roles'=> ['required'],
            'quote'=> ['required'],
            'author'=> ['required'],

        ]);


        User::where('id', $id)->update([
            'name'=>$request->name,
            'email'=>$request->email,
            'roles'=>$request->roles,
            'quote'=>$request->quote,
            'author'=>$request->author,
        ]);
        
    }
}
