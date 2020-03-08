<?php

namespace App\Http\Controllers;

use App\form;
use App\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class dashboardController extends Controller
{

    public function index(){
        if(Auth::check()) {
            $users = form::with('phones')->latest()->get();
            return view('customAuth.dashboard',compact('users'));
        }
        return redirect('signin');
    }
}
