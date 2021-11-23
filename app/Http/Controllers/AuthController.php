<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    //
    public function get()
    {
        return view('login');
    }

    public function post(Request $req) 
    {
        $credentials = $req->only('email', 'password');
        // dd($credentials);
        if (Auth::attempt($credentials)) {
            // Authentication passed...
            return redirect()->route('admin.index');
        }

        return redirect()->back();
    }

    public function logout()
    {
        
    }
}
