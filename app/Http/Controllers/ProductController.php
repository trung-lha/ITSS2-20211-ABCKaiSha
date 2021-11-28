<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Category;
use App\Models\Image;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::orderBy('id', 'desc')->paginate(10);
        foreach ($products as $key => $product) {
            $products[$key] = $product->format();
        }

        return view('admin.list', ['products' => $products]);
    }

    public function listProductsAndCategories()
    {
        $products = Product::orderBy('id', 'desc')->paginate(8);
        $categories = Category::get();
        $imageUrl = [];
        foreach ($products as $key => $product) {
            $products[$key] = $product->format();
            $img = $product->images->all();
            $url = $img[0]->url;
             array_push($imageUrl, $url);
        }
        return view('users.home', compact('products', 'categories', 'imageUrl'));
    }
    public function detailProduct(Request $request)
    {
        $product = Product::find($request->productId);
        $image = $product->images->all();
        $urlImage = $image[0]->url;

        return view('users.detail', ['product' => $product, 'urlImage' => $urlImage]);
    }

    public function groupProduct(Request $request)
    {
        if($request->categoryId == 4){
            $productList = Product::orderBy('id', 'desc')->paginate(8);
        } else {
            $productList = Product::where('category_id', $request->categoryId)->paginate(8);
        }
        $imageUrl = [];
        foreach ($productList as $key => $product) {
            $img = $product->images->all();
            $url = $img[0]->url;
             array_push($imageUrl, $url);
        }
        return view('users.listProducts', compact('productList', 'imageUrl'))->render();
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.create', ['categories'=>$categories]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProductRequest $request)
    {
        $id = Product::create([
            'name' => $request->name,
            'description' => $request->description,
            'category_id' => $request->category_id,
        ])->id;

        if ($request->hasFile('images')) {
            foreach($request->file('images') as $image) {
                $paths = explode("/", $image->store('/images'));

                Image::create([
                    'url' => $paths[1],
                    'product_id' => $id
                ]);
            }
        }

        return redirect()->route('admin.index')->with(['message' => '成功した新しい作成']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::find($id);
        $images = $product->images()->get();

        // Tra ve view cua trang homepage san pham
        return view('', [
            'product'=>$product,
            'images'=>$images,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::find($id);
        $images = $product->images()->get();
        $categories = Category::all();

        return view('admin.edit', [
            'product'=>$product,
            'images'=>$images,
            'categories'=>$categories
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProductRequest $request, $id)
    {
        $product = Product::find($id);
        $product->update([
            'name' => $request->name,
            'description' => $request->description,
            'category_id' => $request->category_id,
        ]);

        if ($request->hasFile('images')) {
            $images = Product::find($id)->images()->get();

            foreach($images as $image) {
                Storage::delete('/images/'.$image->url);
                Image::find($image->id)->delete();
            }

            foreach($request->file('images') as $image) {
                $paths = explode("/", $image->store('/images'));

                Image::create([
                    'url' => $paths[1],
                    'product_id' => $id
                ]);
            }
        }
        return redirect()->route('admin.index')->with(['message'=>'更新の成功']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $images = Product::find($id)->images()->get();

        foreach($images as $image) {
            Storage::delete('/images/'.$image->url);
        }
        Product::destroy($id);

        return redirect()->back()->with(['message' => '削除に成功']);
    }
}
