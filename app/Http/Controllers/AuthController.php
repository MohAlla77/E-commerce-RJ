<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register(){
        return view('auth.register');
    }
    public function store(){
        //validated
        //create user
        //redirect

        $validated  = request()->validate(
            [

            'name' => 'required|min:3|max:40',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|confirmed|min:8',

           ]
        );

        User::create(
            [
                'name' => $validated['name'],
                'email' => $validated['email'],
                'password' => Hash::make($validated['password']),

            ]
        );
        return redirect()->route('home')->with('success', 'Acoount created Successfuly!');



    }


public function login(){
    return view('auth.login');
}

public function authenticate(){
    //validated
    //create user
    //redirect

    //dd(request()->all());
    $validated  = request()->validate(
        [


        'email' => 'required|email',
        'password' => 'required|min:8',

       ]
    );

    if(auth()->attempt($validated)) {
        request()->session()->regenerate();

        return redirect()->route('home')->with('success', 'logged in Successfuly!');
    }

    return redirect()->route('login')->withErrors([

        'email' => "Email or password miss match !"
    ]);

}
public function logout(){

    auth()->logout();
    request()->session()->invalidate();
    request()->session()->regenerateToken();

    return redirect()->route('home')->with('success', 'logged out Successfuly!');
}
}


