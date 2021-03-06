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
        $req->flash();
        $credentials = $req->only('email', 'password');
        // dd($credentials);
        if (Auth::attempt($credentials)) {
            // Authentication passed...
            return redirect()->route('admin.index');
        }

        return redirect()->back()->with(['message' => '正しいアカウントとパスワードを入力してください']);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('admin.login');
    }
}
