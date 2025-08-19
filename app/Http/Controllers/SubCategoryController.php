<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\SubCategory;

class SubCategoryController extends Controller
{
    public function index()
    {
        return view('admin.sub-category.index', [
            'categories' => Category::all()
        ]);
    }

    public function store(Request $request)
    {
        SubCategory::storeSubCategory($request);
        return back()->with('message', 'New SubCategory Added to the Database Successfully!');
    }

    public function manage()
    {
        return view('admin.sub-category.manage', [
            'subcategories' => SubCategory::all()
        ]);
    }

    public function edit($id)
    {
        return view("admin.sub-category.edit", [
            'categories' => Category::all(),
            'subcategory' => SubCategory::find($id)
        ]);
    }

    public function status($id)
    {
        SubCategory::toggleStatus($id);
        return back();
    }

    public function update(Request $request, $id)
    {
        SubCategory::updateSubCategory($request, $id);
        return back()->with('message', 'SubCategory Updated Successfully!');
    }

    public function delete(Request $request)
    {
        SubCategory::deleteSubCategory($request);
        return back()->with('message', 'SubCategory Deleted!');
    }
}
