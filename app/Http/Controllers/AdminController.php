<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function loginAdmin(){
        // dd(bcrypt('admin'));
        if(Auth::check()){
            return redirect()->to('home');
        }
        return view('login');
    }

    public function postloginAdmin(Request $request)
    {

     $remember = $request->has('remember') ? true : false;
     if(Auth::attempt([
     'email' => $request->email,
      'password' => $request->password],
       $remember))
     {
        return redirect()->to('home');
     }
    }

}
