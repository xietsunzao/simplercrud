<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $category=Category::all();
        return view('category.index',compact('category'));
    }
    public function create()
    {
        return view('category.create');
    }
    public function store(Request $request)
    {
        $this->validate($request,[
            'name' => 'required|string|max:50|unique:categories',
            'categoryid' => 'required|string|max:50|unique:categories',
        ]);
        Category::create($request->except('_token'));
        return redirect()
            ->route('category.index')
            ->with('success', 'Category Created Successful')
        ;
    }
    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()
            ->route('category.index')
            ->with('success', 'Category Deleted Successful')
        ;
    }
}
