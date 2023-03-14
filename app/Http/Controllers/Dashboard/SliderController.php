<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Slide;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $slides = Slide::with('product')->paginate(10);

        return view('dashboard.slider.index', compact('slides'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $products = Product::get();

        return view('dashboard.slider.create', compact('products'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $filename = now()->timestamp . '_' . $request->file('photo')->getClientOriginalName();
        $filePath = "uploads/" . $filename;
        $request->file('photo')->move('uploads', $filename);

        $inputs = request()->all();
        $inputs['photo'] = $filePath;

        $newSlide = Slide::create($inputs);

        return back()->with('success', 'Slide has been saved successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
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

    public function toggleActive($id)
    {
        $slide = Slide::find($id);

        $slide->update([
            'active' => ! $slide->active,
        ]);

        return back()->with('success', 'Slide has been updated successfully.');
    }
}
