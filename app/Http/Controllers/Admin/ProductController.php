<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::with('category')->paginate(10);

        return view('pages.products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();

        return view('pages.products.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required|min:3',
            'description'=>'nullable',
            'sku'=>'required',
            'price'=>'required',
            'stock'=>'required',
            'category_id'=>'required',
        ]);

        $data = [
            'name'=>$request->input('name'),
            'description'=>$request->input('description'),
            'sku'=>$request->input('sku'),
            'price'=>$request->input('price'),
            'stock'=>$request->input('stock'),
            'category_id'=>$request->input('category_id'),
        ];
        
        Product::create($data);

        return redirect()->route('products');
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
        $categories = Category::all();
        $product = Product::findOrFail($id);

        return view('pages.products.edit', [
            'categories' => $categories,
            'product' => $product,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name'=>'required|min:3',
            'description'=>'nullable',
            'sku'=>'required',
            'price'=>'required',
            'stock'=>'required',
            'category_id'=>'required',
        ]);

        $data = [
            'name'=>$request->input('name'),
            'description'=>$request->input('description'),
            'sku'=>$request->input('sku'),
            'price'=>$request->input('price'),
            'stock'=>$request->input('stock'),
            'category_id'=>$request->input('category_id'),
        ];

        Product::where('id', $id)->update($data);

        return redirect()->route('products');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Product::where('id', $id)->delete();

        return redirect()->route('products');
    }
}
