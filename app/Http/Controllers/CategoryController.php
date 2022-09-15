<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;

class CategoryController extends Controller
{
    public function create()
    {
        return view('categories/create');
    }
    
        public function store(Request $request, Category $category)
    {
        $input = $request['category'];
        $category->fill($input)->save();
        return redirect('/category/create');
    }
}
