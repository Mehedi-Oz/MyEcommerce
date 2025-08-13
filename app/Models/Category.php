<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    private static $category, $image, $imageNewName, $directory, $imageUrl;

    public static function storeCategory($request){
        self::$category = new Category();
        self::$category->name = $request->name;
        self::$category->description = $request->description;
        if($request->hasFile('image')){
            self::$category
        }
    }
}
