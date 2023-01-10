<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\User;
use GrahamCampbell\ResultType\Success;
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
        $categories = Category::paginate(7);
        return view('dashboard.categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('dashboard.categories.create');
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
            'name' => ['Required', 'String'],
            'photo' => ['required'],
            'icon' => ['required'],
        ]);

        $filename = now()->timestamp . '_' . $request->file('photo')->getClientOriginalName();
        $filePath = "uploads/" . $filename;
        $request->file('photo')->move('uploads', $filename);

        Category::create([
            'name' => $request->name,
            'photo' => $filePath,
            'icon' => $request->icon,
        ]);

        return redirect()->route('admin.categories.create')
            ->with('success', 'category has been saved successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        return view('dashboard.categories.show', compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        return view('dashboard.categories.edit', compact('category'));
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
        $request->validate([
            'name' => ['Required', 'String'],
            'icon' => ['required'],
        ]);

        if ($request->hasFile('photo')) {
            $filename = now()->timestamp . '_' . $request->file('photo')->getClientOriginalName();
            $filePath = "uploads/" . $filename;
            $request->file('photo')->move('uploads', $filename);
        }

        $category = Category::findOrfail($id);
        $category->name = $request->name;
        $category->icon = $request->icon;

        if ($request->hasFile('photo')) {
            $category->photo = $filePath;
        }
        $category->save();

        // $category->update([
        //     'name' => $request->name ,
        //     'photo' => $filePath ,
        //     'icon' => $request->icon ,
        // ]);

        return redirect()->route('admin.categories.edit', $category->id)
            ->with('success', 'category has been updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->route('admin.categories.index')
            ->with('success', 'Category deleted successfully');
    }
}
