<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MyEcommerceController extends Controller
{
    public function index()
    {
        return view("frontEnd.home.index");
    }

    public function category(){
        return view("frontEnd.category.index");
    }

    public function detail()
    {
        return view("frontEnd.detail.index");
    }
}
