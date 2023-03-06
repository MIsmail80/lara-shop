<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cats = Category::paginate(10);

        return view('dashboard.category.index', compact('cats'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.category.create');
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
            'icon' => 'required',
            'photo' => 'required',
        ]);

        $filename = now()->timestamp . '_' . $request->file('photo')->getClientOriginalName();
        $filePath = "uploads/" . $filename;
        $request->file('photo')->move('uploads', $filename);

        /* $newCategory = new Category();
        $newCategory->name = $request->name;
        $newCategory->icon = $request->icon;
        $newCategory->photo = $filePath;
        $newCategory->save(); */

        $inputs = $request->all();
        $inputs['photo'] = $filePath;
        $newCategory = Category::create($inputs);

        return back()->with('success', 'Category has been saved successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        return view('dashboard.category.show', compact('category'));
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

        return view('dashboard.category.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        $request->validate([
            'name' => 'required',
            'icon' => 'required',
        ]);

        if ($request->hasFile('photo')) {
            $filename = now()->timestamp . '_' . $request->file('photo')->getClientOriginalName();
            $filePath = "uploads/" . $filename;
            $request->file('photo')->move('uploads', $filename);
        }

        $inputs = $request->all();

        if ($request->hasFile('photo')) {
            $inputs['photo'] = $filePath;
        }

        $category->update($inputs);

        return back()->with('success', 'Category has been updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Category::destroy($id);

        return back();
    }
}
