<?php

namespace App\Http\Controllers;

use App\Models\AdminMember;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login(){
        return view('auth.login', [
            'title' => 'Login',
            'active' => 'login'
        ]);
    }

    public function loginAuthentication(Request $request){

        $validators = $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:8|max:32',
        ]);

        if(Auth::attempt($validators)){
            $request->session()->regenerate();
            return redirect('/home')->with('success', 'Successfull login !!!');
        } else {
            return redirect('/login')->with('loginError', 'Successfull Unsucsseful !!!');
        }

    }

    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }

    // it difficult when it not use json
    public function validatorsInput($request){
        $rules =[
            'email'=> 'required',
            'password'=> 'required|min:8|max:32',
        ];

        $messages =[
            'email.required'=> 'isi email atau username sekarang',
            'password.required'=> 'isi password sekarang',
            'password.min'=> 'password minimal 8 karakter',
            'password.max'=> 'password maximal 32 karakter',
        ];

        return $registerValidate = Validator::make($request->all(), $rules, $messages);
    }
}
