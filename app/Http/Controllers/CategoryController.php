<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::orderBy('id', 'DESC')->get();

        return view('admin.list_category', ['categories' => $categories]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("admin.create_category");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->flash();
        $request->validate([
            'name' => 'required|unique:categories'
        ], [
            'name.required' => 'カテゴリ名を入力してください',
            'name.unique' => 'このカテゴリはすでに存在します'
        ]);

        Category::create([
            'name' => $request->name
        ]);

        return redirect(route('category'))->with(['message' => 'カテゴリ作成の成功']);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Category::find($id);

        return view('admin.edit_category', ['category' => $category]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->flash();
        
        $category = Category::where('name', $request->name)->get();
        $count = count($category);

        if ($count >= 1 && $category[0]->id != $id) {
            $request->validate([
                'name' => 'required|unique:categories'
            ], [
                'name.required' => 'カテゴリ名を入力してください',
                'name.unique' => 'このカテゴリはすでに存在します'
            ]);
        }

        $count = Category::where('id', $id)
            ->update([
                'name' => $request->name,
                'description' => $request->description
            ]);
        
        if ($count == 0) {
            return redirect(route('category'))->with(['message' => 'カテゴリ情報を正常に失敗しました']);
        }
        return redirect(route('category'))->with(['message' => 'カテゴリ情報を正常に更新する']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $count = Category::destroy($id);
        if ($count == 0) {
            return redirect(route('category'))->with(['message' => 'カテゴリの削除に失敗しました']);
        }
        return redirect(route('category'))->with(['message' => 'カテゴリを正常に削除']);
    }
}
