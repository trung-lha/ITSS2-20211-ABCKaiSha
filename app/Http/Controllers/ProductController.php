<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Category;
use App\Models\Image;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::orderBy('id', 'desc')->get();
        foreach ($products as $key => $product) {
            $products[$key] = $product->format();
        }

        return view('admin.list', ['products' => $products]);
    }

    public function listProductsAndCategories()
    {
        $month = date('m');
        $products = Product::where(['category_id' => 1, 'month' => $month])
            ->orderBy('id', 'desc')->paginate(8);

        $categories = Category::get();
        $imageUrl = [];
        foreach ($products as $key => $product) {
            $products[$key] = $product->format();
            $img = $product->images->all();
            $url = $img[0]->url;
            array_push($imageUrl, $url);
        }
        return view('users.home', compact('products', 'categories', 'imageUrl', 'month'));
    }
    public function detailProduct(Request $request)
    {
        $product = Product::find($request->productId);
        // TODO: sua anh
        $image = $product->images->all();
        $urlImage = $image[0]->url;

        return view('users.detail', ['product' => $product, 'urlImage' => $urlImage, "images" => $image]);
    }

    public function groupProduct(Request $request)
    {
        $productList = Product::where('category_id', $request->categoryId)->orderBy('id', 'desc')->paginate(8);
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
        return view('admin.product_create', ['categories' => $categories]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProductRequest $request)
    {
        $month = date('m');
        $id = Product::create([
            'name' => $request->name,
            'description' => $request->description,
            'month' => $month,
            'category_id' => $request->category_id,
        ])->id;

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $files = $this->save_record_image($image);

                if (!empty($files['data'])) {
                    Image::create([
                        'url' => $files['data']['url'],
                        'product_id' => $id
                    ]);
                }
            }
        }

        return redirect()->route('admin.index')->with(['message' => '成功した新しい作成']);
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

        return view('admin.product_edit', [
            'product' => $product,
            'images' => $images,
            'categories' => $categories
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

            foreach ($images as $image) {
                Image::find($image->id)->delete();
            }

            foreach ($request->file('images') as $image) {
                $files = $this->save_record_image($image);

                if (!empty($files['data'])) {
                    Image::create([
                        'url' => $files['data']['url'],
                        'product_id' => $id
                    ]);
                }
            }
        }
        return redirect()->route('admin.index')->with(['message' => '更新の成功']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Product::destroy($id);

        return redirect()->back()->with(['message' => '削除に成功']);
    }

    /**
     * Ham phu upload anh
     */

    private function save_record_image($image, $name = null)
    {
        $API_KEY = '53f540128a97fa75d4dfcba827eb0511';
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'https://api.imgbb.com/1/upload?key=' . $API_KEY);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_SAFE_UPLOAD, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        $extension = pathinfo($image->getClientOriginalName(), PATHINFO_EXTENSION);
        $file_name = ($name) ? $name . '.' . $extension : $image->getClientOriginalName();
        $data = array('image' => base64_encode(file_get_contents($image)), 'name' => $file_name);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        $result = curl_exec($ch);
        if (curl_errno($ch)) {
            return 'Error:' . curl_error($ch);
        } else {
            return json_decode($result, true);
        }
        curl_close($ch);
    }
}
