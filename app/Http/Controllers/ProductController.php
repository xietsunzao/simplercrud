<?php

namespace App\Http\Controllers;

use App\Product;
use App\Category;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $product=Product::all();
        return view('product.index', compact('product'));
    }
    public function create()
    {
        $category = Category::all();
        return view('product.create',compact('category'));
    }
    public function store(Request $request)
    {
        $this->validate($request,[
            'productid' => 'required|string|max:50|unique:products',
            'name' => 'required|string|max:50|unique:products',
            'price' => 'required|string',
            'category_id' => 'required',
            'description' => 'required',
        ]);
        Product::create($request->except('_token'));
        return redirect()
            ->route('product.index')
            ->with('success', 'Product Created Successful')
        ;
    }
    public function show(Product $product)
    {
        //
    }
    public function edit(Product $product)
    {
        return view('product.edit', compact('product'));
    }
    public function update(Request $request, Product $product)
    {
        $this->validate($request,[
            'name' => 'required|string|max:50',
            'price' => 'required|string',
            'category_id' => 'required|string',
            'description' => 'required',
        ]);
        $product->update($request->except('_token'));
        return redirect()
            ->route('product.index')
            ->with('success', 'Product Updated Successful')
        ;
    }
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()
            ->route('product.index')
            ->with('success', 'Product Deleted Successful')
        ;
    }
}
