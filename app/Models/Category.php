<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{

    protected $fillable = [
        'name',
        'description',
        'image',
        'status'
    ];

    private static $category, $image, $imageNewName, $directory, $imageUrl;

    public static function storeCategory($request)
    {
        self::$category = new Category();
        self::$category->name = $request->name;
        self::$category->description = $request->description;
        self::$category->status = $request->status;

        if ($request->hasFile('image')) {
            self::$category->image = self::saveImage($request);
        } else {
            self::$category->image = null;
        }

        self::$category->save();
    }

    private static function saveImage($request)
    {
        self::$image = $request->file('image');
        self::$imageNewName = 'cateogory' . '-' . uniqid() . '.' . self::$image->getClientOriginalExtension();
        self::$directory = 'admin-asset/assets/upload-images/category/';
        self::$image->move(self::$directory, self::$imageNewName);
        return self::$imageUrl = self::$directory . self::$imageNewName;
    }

    

}
