<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\AdminMember;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

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

        if(count($validators)){
            $identifierUser = User::where('email','=', $request->email)->firstOrFail();
            if($identifierUser->position === 'member'){
                $this->updateStatusLoginUser($identifierUser, 'login');
            }

            if(Auth::attempt($validators)){
                $request->session()->regenerate();
                $request->session()->flash('success', 'Successful Login !!!');
                return view('home.home',[
                    'title' =>'Home',
                    'active' => 'home'
                ]);
            } else {
                return redirect('/login')->with('loginError', 'Unsucsseful Login!!!');
            }
        }
    }

    public function logout(Request $request){

        $identifierUser = User::where('email','=', auth()->user()->email)->firstOrFail();
        if($identifierUser->position === 'member'){
            $this->updateStatusLoginUser($identifierUser, 'logout');
        }

        $request->session()->invalidate();
        $request->session()->regenerateToken();
        
        Auth::logout();
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

    public function updateStatusLoginUser($user, $status){
        $result = $status === 'login' ? 1 : 0;

        User::where('id','=', $user->id)
            ->update([
                'status'=> $result
            ]);
    }
}
