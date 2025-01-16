<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::paginate(10);

        return view('pages.categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:categories,name', //bertujuan untuk  mencegah duplicate name yg sudah ada
        ],[
            'name.required' => 'Nama category harus diisi',
            'name.unique' => 'Nama category sudah ada!'
        ]);

        $category = [
            'name' => $request->input('name'),
            'slug' => Str::slug($request->input('name')),
        ];

        Category::create($category);

        return redirect()->route('categories');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $category = Category::find($id);

        return view('pages.categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|unique:categories,name', //bertujuan untuk  mencegah duplicate name yg sudah ada
        ],[
            'name.required' => 'Nama category harus diisi',
            'name.unique' => 'Nama category sudah ada!'
        ]);

        $category = [
            'name' => $request->input('name'),
            'slug' => Str::slug($request->input('name')),
        ];

        Category::where('id', $id)->update($category);

        return redirect()->route('categories');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Category::where('id', $id)->delete();

        return redirect()->route('categories');
    }
}
