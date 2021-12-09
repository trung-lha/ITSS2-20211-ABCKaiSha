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

    public function detail(Request $request)
    {
        $recruit = Recruitment::find($request->recruitID);
        $create_at = $recruit->created_at->isoFormat('dddd D/MM/YYYY');
        $location = $recruit->location;
        $salary = $recruit->salary;
        $idImage = $request->recruitID;
        $description = $recruit->description;
        // TODO: sua anh

        return view('users.detailRecruit', ['recruit' => $recruit, 'idImage' => $idImage, 'create_at' => $create_at, 'location' => $location, 'salary' => $salary, 'description' => $description]);
    }

    public function register(Request $request)
    {
        $recruit = Recruitment::find($request->recruitID);
        $create_at = $recruit->created_at->isoFormat('dddd D/MM/YYYY');
        $location = $recruit->location;
        $salary = $recruit->salary;
        // TODO: sua anh

        return view('users.register', [
            'recruit' => $recruit, 
            'create_at' => $create_at, 
            'location' => $location, 
            'salary' => $salary, 
            'id' => $request->recruitID,
            'name' => $recruit->name,
        ]);
    }
}
