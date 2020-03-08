<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Session;

class AuthController extends Controller
{
    public function register(){
        return view('customAuth.register');
    }

    public function login(){
        return view('customAuth.login');
    }

    public function postRegister(Request $request){
        $this->validate($request,[
            'name' => 'required',
            'email' => 'required|unique:users|email',
            'password'=> 'required|min:6',
            'cpassword'=>'required|same:password'
        ]);
        $data = $request->all();
        User::create([
            'name'=> $data['name'],
            'email'=> $data['email'],
            'password'=> Hash::make($data['password'])
        ]);

        return redirect('dashboard');

    }

    public function postLogin(Request $request){
      $credentials = $request->only('email','password');
        if(Auth::attempt($credentials)){
            return redirect()->intended('dashboard');
        }
        return redirect('signin');
    }

    public function signOut(){
        Session::flush();
        Auth::logout();
        return redirect('signin');
    }
//    public function dashboard(){
//        if (Auth::check()) {
//            return view('customAuth.dashboard');
//        }
//        return redirect('signin');
//    }

}
