<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Photo;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::with(['category'])->paginate(10);

        return view('dashboard.products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cats = Category::get();

        return view('dashboard.products.create', compact('cats'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'category_id' => 'required',
        ]);

        $inputs = $request->all();
        $inputs['sku'] = '';
        $newProduct = Product::create($inputs);

        if ($request->hasFile('photos')) {
            foreach ($request->file('photos') as $photo) {
                $filename = now()->timestamp . '_' . $photo->getClientOriginalName();
                $filePath = "uploads/products/" . $filename;
                $photo->move('uploads/products', $filename);

                Photo::create([
                    'name' => $filename,
                    'path' => $filePath,
                    'product_id' => $newProduct->id,
                ]);
            }
        }

        return back()->with('success', 'The prodsuct has been saved.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        $product->load(['category', 'photos']);

        return view('dashboard.products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $cats = Category::get();

        $product->load(['photos']);

        return view('dashboard.products.edit', compact('product', 'cats'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'category_id' => 'required',
        ]);

        $inputs = $request->all();

        $product->update($inputs);

        if ($request->hasFile('photos')) {
            foreach ($request->file('photos') as $photo) {
                $filename = now()->timestamp . '_' . $photo->getClientOriginalName();
                $filePath = "uploads/products/" . $filename;
                $photo->move('uploads/products', $filename);

                Photo::create([
                    'name' => $filename,
                    'path' => $filePath,
                    'product_id' => $product->id,
                ]);
            }
        }

        return back()->with('success', 'The product has been updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function delImage($id)
    {
        Photo::destroy($id);

        return back()->with('success', 'The photo has been deleted.');
    }
}
