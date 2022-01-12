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
        $request->validate([
            'phone' => 'required|max:10|min:10'
        ],
        [
            'phone.max' => "電話番号は10文字です"
        ]
        );

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
        $details = [];

        if ($request->status == "1") {
            $details['title'] = "入社おめでとうございます。";
        } else {
            $details['title'] = "会社にご関心をお寄せいただき、ありがとうございます。 あなたはこの採用ラウンドで失格となりました。";
        }

        Mail::to($can->mail)->send(new \App\Mail\ConfirmRecruitMail($details));
        $can->status = (int)$request->status;
        $can->save();

        return redirect()->back();
    }
}
