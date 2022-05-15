<?php

namespace App\Http\Controllers;
use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class RegistrationController extends Controller
{
    public function create()
    {
        if(Auth::check()){
            return redirect('/home')->with('message', 'You are already logged in');
        }
        return view('auth.register');
    }

    public function store(Request $request){

        $validator = Validator::make($request->all(), [
            'name' => 'required|min:3',
            'email' => 'required| email | unique:users',
            'password' => 'required|confirmed|min:6'
        ]);

        if($validator->fails()){
            return redirect('/')->withErrors($validator)->withInput();
        }

        $user_to_save = [
            'name'=>$request['name'],
            'email'=>$request['email'],
            'password'=>bcrypt($request['password'])
        ];

        // Create User
        $user = User::create($user_to_save);

        // Login
        auth()->login($user);
        return redirect('/home')->with('success','register and login successful');

    }


}
