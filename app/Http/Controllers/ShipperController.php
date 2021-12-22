<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ShipperController extends Controller
{
    public function register(Request $request)
    {
        $details = [
            'title' => '新しい求人応募を取得しました',
            'id' => $request->id,
            'recrname' => $request->recrname,
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'age' => $request->age,
            'address' => $request->address,
            'exp' => $request->exp
        ];

        \Illuminate\Support\Facades\Mail::to('hrnaninukaisha@gmail.com')->send(new \App\Mail\RecruitMail($details));
        return redirect()->route('recruitment.list');
    }
}
