<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $brands =Brand::paginate(10);
        return view('dashboard.brand.index', compact('brands'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.brand.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request , Brand $brand)
    {
        $request->validate([
            'name' => ['required' , 'string'] ,
            'photo' => ['required' ]
        ]);

        $filename = now()->timestamp . '_' . $request->file('photo')->getClientOriginalName() ;
        $filepath = "uploads/brand/" . $filename ;
        $request->file('photo')->move("uploads/brand" , $filename) ;

        $inputs=$request->all();
        $inputs['photo'] = $filepath ;

        $brand->create($inputs);

        return redirect()
                    ->route('admin.brands.create')
                    ->with('success', 'Brands has been saved successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Brand $brand)
    {
        return view('dashboard.brand.show' ,compact('brand'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Brand $brand)
    {
        return view('dashboard.brand.edit' ,compact('brand'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Brand $brand)
    {
        $request->validate([
            'name' => ['required' , 'string'] ,

        ]);

        if($request->hasFile('photo'))
        {
        $filename = now()->timestamp . '_' . $request->file('photo')->getClientOriginalName() ;
        $filepath = "uploads/brand/" . $filename ;
        $request->file('photo')->move("uploads/brand" , $filename) ;
        }

        $inputs=$request->all();
        if($request->hasFile('photo'))
        {
        $inputs['photo'] = $filepath ;
        }

        $brand->update($inputs);

        return redirect()
                    ->route('admin.brands.edit' , $brand->id)
                    ->with('success', 'Brands has been updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Brand $brand)
    {
        $brand->delete();

        return redirect()
        ->route('admin.brands.index')
        ->with('success', 'Brands has been deleted successfully');
    }
}
