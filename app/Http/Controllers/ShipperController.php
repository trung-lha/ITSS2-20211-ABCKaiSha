<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ShipperController extends Controller
{
    public function register()
    {
        return redirect()->route('recruitment.list');
    }
}
