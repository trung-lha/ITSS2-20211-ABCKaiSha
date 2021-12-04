<?php

namespace App\Http\Controllers;

use App\Models\Recruitment;
use Illuminate\Http\Request;

class RecruitmentController extends Controller
{
    public function index()
    {
        $recruiments = Recruitment::paginate(5);

        return view('users.recruit', compact('recruiments'));
    }
}
