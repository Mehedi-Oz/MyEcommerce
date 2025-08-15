<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        return view("admin.category.index");
    }

    public function manage()
    {
        return view("admin.category.manage", [
            'categories' => Category::all()
        ]);
    }

    public function store(Request $request)
    {
        Category::storeCategory($request);
        return back()->with('success', 'New Category Added to the Database Successfully!');
    }


    public function edit($id)
    {
        return view("admin.category.edit", [
            "category" => Category::find($id)
        ]);
    }

    public function update()
    {

    }

    public function status()
    {

    }

    public function delete()
    {

    }
}
