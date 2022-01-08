<?php

namespace App\Http\Controllers;

use App\Models\Contact;
// TEST: ko xoa
use App\Models\Product;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        return view('users.contact');
    }

    public function index_ad()
    {
        $contacts = Contact::orderBy('id', 'desc')->get();
        return view('admin.contacts.index', compact('contacts'));
    }

    public function contact(Request $request)
    {
        $request->flash();
        $request->validate(
            [
                'username' => 'required',
                'email' => 'required',
                'phone' => 'required|max:11|min:10',
                'postcode' => 'required',
                'content' => 'required',
                'contactbody' => 'required'
            ],
            [
                'phone.max' => '10桁の電話番号を入力してください',
                'phone.min' => '10桁の電話番号を入力してください',
                'username.required' => 'お名前を入力してください',
                'email.required' => 'メールアドレスを入力してください',
                'postcode.required' => '郵便番号を入力してください',
                'phone.required' => 'お電話番号を入力してください',
                'content.required' => 'お問合せ内容を入力してください',
                'contactbody.required' => 'お問合せ本文を入力してください',
            ]
        );

        $contact = $request->only('username', 'phone', 'email', 'postcode', 'content', 'contactbody');

        $contact = Contact::create($contact);

        if (empty($contact)){
            return redirect()->back()->with('message', 'Failed');
        }

        return redirect(route('user.home'));
    }

    public function update_status(Request $request, $id)
    {
        $status = strcmp('true', $request->status) === 0;

        $count = Contact::where('id', $id)
                ->update(['status' => $status]);

        if ($count == 0) {
            return response(['error' => 'Update Failed'], 400);
        }

        return response(['data' => $status], 200);
    }

    public function update(Request $request, $id)
    {

        Contact::find($id)->update([
            'status' => $request->status
        ]);

        return redirect()->back();
    }

}
