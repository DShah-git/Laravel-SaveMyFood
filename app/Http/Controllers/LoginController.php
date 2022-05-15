<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function create(){

        if(Auth::check()){
            return redirect('/home')->with('message', 'You are already logged in');
        }
        return view('auth.login');

    }

    public function store(Request $request){
        $validator = Validator::make($request->all(),[
            'email'=>'required|email',
            'password'=>'required|min:6'
        ]);

        if($validator->fails()){
            return redirect('/login')->withErrors($validator)->withInput();
        }

        $user = ['email'=>$request['email'], 'password'=>$request['password']];

        if(auth()->attempt($user)){
            $request->session()->regenerate();

            return redirect('/home')->with('success','You are now logged in');
        }
        else{
            return redirect('/login')->withErrors(['email'=>'Invalid Credentials'])->onlyInput('email');
        }

    }

    public function logout(Request $request){
        auth()->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login')->with('message','You logged out');

    }
}
