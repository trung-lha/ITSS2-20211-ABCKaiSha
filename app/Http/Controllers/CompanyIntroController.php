<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CompanyIntroController extends Controller
{
    public function index()
    {
        return view('users.company_intro');
    }
}
