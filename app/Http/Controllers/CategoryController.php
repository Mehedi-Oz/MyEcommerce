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
        return view("admin.category.manage");
    }

    public function store(Request $request)
    {
        Category::storeCategory($request);
        return back()->with('message', 'Category added successfully!');
    }

    public function edit()
    {

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
