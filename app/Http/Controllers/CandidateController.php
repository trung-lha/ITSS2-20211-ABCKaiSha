<?php

namespace App\Http\Controllers;

use App\Models\Candidate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class CandidateController extends Controller
{
    public function index()
    {
        $candidates = Candidate::orderBy('id', 'desc')->get();

        return view('admin.candidate.index', compact('candidates', $candidates));
    }

    public function store(Request $request){
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

        Mail::to('hrnaninukaisha@gmail.com')->send(new \App\Mail\RecruitMail($details));

        $candidate = [
            'name' => $request->name,
            'mail' => $request->email,
            'address' => $request->address,
            'age' => $request->age,
            'phoneNumber' => $request->phone,
            'description' => $request->exp
        ];
        Candidate::create($candidate);

        return redirect()->route('recruitment.list')->with('success', 'あなたの要求が送られました');
    }

    public function candidateProcess(Request $request)
    {
        $can = Candidate::find($request->candidateId);
        $can->status = $request->status;
        $can->save();

        return redirect()->back();
    }
}
