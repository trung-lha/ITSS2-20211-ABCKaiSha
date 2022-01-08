<?php

namespace App\Http\Controllers;

use App\Models\Plan;
use App\Models\PlanProduct;
use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PlanController extends Controller
{
    //
    public function index()
    {
        $now = Carbon::now();
        $month = $now->month;

        $products = Product::where('month', $month)->get();
        return view ('users.plan.index', compact('products'));
    }

    public function index_ad()
    {
        $plans = Plan::get();
        $productsOfPlans = [];
        foreach ($plans as $plan){
            $array_name = [];
            foreach ($plan->products as $index => $product) {
                array_push($array_name, $product->pivot->productName);
            }
            array_push($productsOfPlans, $array_name);
        }
        return view('admin.plans.index', compact('plans', 'productsOfPlans'));
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
            $productName = Product::find($product_id)->name;
            PlanProduct::create([
                'product_id' => (int)$product_id,
                'plan_id' => $plan_id,
                'productName' => $productName
            ]);
        }

        return redirect()->route('user.home');
    }

    public function update(Request $request, $id)
    {

        Plan::find($id)->update([
            'status' => $request->status
        ]);

        return redirect()->back();
    }

    public function destroy($id)
    {
        Plan::destroy($id);

        dd("Successfully");
    }
}
