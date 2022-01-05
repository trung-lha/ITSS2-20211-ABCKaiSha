<?php

namespace App\Http\Controllers;

use App\Models\Plan;
use App\Models\PlanProduct;
use App\Models\Product;
use Illuminate\Http\Request;

class PlanController extends Controller
{
    //
    public function index()
    {
        $plans = Plan::get();

        foreach($plans as $key => $plan) {
            $plans[$key] = $plan->format();
        }

        dd($plans);
    }

    public function create()
    {
        $month = date('m');
        $products = Product::where('month', $month)->orderBy('id', 'desc')->get();
        return view('users.test_plan', compact('products', 'month'));
    }

    public function store(Request $request)
    {
        $request->flash();
        $request->validate(
            [
                'username' => 'required',
                'email' => 'required',
                'phone' => 'required|max:11|min:10',
                'postcode' => 'required',
                'content' => 'required',
                'address' => 'required'
            ],
            [
                'phone.max' => '10桁の電話番号を入力してください',
                'phone.min' => '10桁の電話番号を入力してください',
                'username.required' => 'お名前を入力してください',
                'email.required' => 'メールアドレスを入力してください',
                'postcode.required' => '郵便番号を入力してください',
                'phone.required' => 'お電話番号を入力してください',
                'content.required' => 'お問合せ内容を入力してください',
                'address.required' => 'お場所を入力してください',
            ]
        );

        $plan_choices = $request->only('plan-choices');
        foreach ($plan_choices['plan-choices'] as $product_id) {
            echo $product_id;
        }
        $plan = $request->only(['username', 'email', 'postcode', 'phone', 'content', 'address']);

        $plan_id = Plan::create($plan)->id;

        foreach ($plan_choices['plan-choices'] as $product_id) {
            PlanProduct::create([
                'product_id' => (int)$product_id,
                'plan_id' => $plan_id
            ]);
        }

        return redirect()->route('user.home');
    }

    public function edit($id)
    {

    }

    public function update(Request $request, $id)
    {
        
    }

    public function destroy($id)
    {
        Plan::destroy($id);

        dd("Successfully");
    }
}
