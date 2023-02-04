<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Photo;
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
        $products = Product::with(['category'])->paginate(5);
        return view('dashboard.product.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::select('id', 'name')->get();
        return view('dashboard.product.create', compact('categories'));
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
            'category_id' => ['required'],
            'name' => ['required'],
            'description' => ['required'],
            'price' => ['numeric'],
            'stock' => ['numeric'],

        ]);

        $inputs = $request->all();
        $inputs['sku'] = rand(1000, 9999);
        $product = Product::create($inputs);

        if ($request->hasFile('photos'))
        {
            foreach ($request->file('photos') as $photo)
            {
                $filename = now()->timestamp . '_' . $photo->getClientOriginalName();
                $filePath = "uploads/product/" . $filename;
                $photo->move('uploads/product/', $filename);

                Photo::create([
                    'name' => $filename ,
                    'path' => $filePath ,
                    'product_id' => $product->id ,

                ]);
            }
        }

        return back()->with('success', 'product has been updated successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        return view('dashboard.product.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $categories = Category::select('id', 'name')->get();
        return view('dashboard.product.edit', compact('product', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product ,Photo $photo)
    {
        $request->validate([
            'category_id' => ['required'],
            'name' => ['required'],
            'description' => ['required'],
            'price' => ['numeric'],
            'stock' => ['numeric'],

        ]);

        // dd($request->all());
        $inputs = $request->all();
        $inputs['sku'] = $product->sku;
        $product->update($inputs);

        if ($request->hasFile('photos'))
        {
            foreach ($request->file('photos') as $requestPhoto)
            {
                $filename = now()->timestamp . '_' . $requestPhoto->getClientOriginalName();
                $filePath = "uploads/product/" . $filename;
                $requestPhoto->move('uploads/product/', $filename);

                $photo->update([
                    'name' => $filename ,
                    'path' => $filePath ,
                    'product_id' => $product->id ,
                ]);

                // $photos = Photo::findOrfail($id);
                // $photos->name = $filename ;
                // $photos->path = $filePath ;
                // $photos->product_id = $product->id ;
                // $photos->save() ;


            }
        }


        return back()->with('success', 'product has been updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();

        return redirect()->route('admin.products.index');
    }
}
