<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    public function index()
    {
        return view("admin.brand.index");
    }

    public function manage()
    {
        return view("admin.brand.manage", [
            'brands' =>Brand::all()
        ]);
    }

    public function store(Request $request)
    {

        Brand::storeBrand($request);
        return back()->with('message', 'New Brand Added to the Database Successfully!');
    }

    public function edit($id)
    {
        return view('admin.brand.edit', [
            'brand' => Brand::find($id)
        ]);
    }

    public function update(Request $request, $id)
    {
        Brand::updateBrand($request, $id);
        return back()->with('message', 'Brand Updated Successfully!');
    }

    public function status($id)
    {
        Brand::toggleStatus($id);
        return back()->with('message', "Brand Status Updated!");
    }
    public function delete(Request $request)
    {
        Brand::deleteBrand($request);
        return back()->with('message', "Brand Deleted!");
    }
}
