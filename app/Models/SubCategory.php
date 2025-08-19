<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Client\Request;

class SubCategory extends Model
{
    protected $fillable = [
        'category_id',
        'name',
        'description',
        'image',
        'status'
    ];

    private static $subcategory, $image, $imageNewName, $directory, $imageUrl;

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public static function storeSubCategory($request)
    {
        self::$subcategory = new SubCategory();
        self::$subcategory->category_id = $request->category_id;
        self::$subcategory->name = $request->name;
        self::$subcategory->description = $request->description;

        if ($request->hasFile('image')) {
            self::$subcategory->image = self::saveImage($request);
        } else {
            self::$subcategory->image = null;
        }

        self::$subcategory->status = $request->status;
        self::$subcategory->save();
    }

    private static function saveImage($request)
    {
        self::$image = $request->file('image');
        self::$imageNewName = 'sub-category' . '-' . uniqid() . '.' . self::$image->getClientOriginalExtension();
        self::$directory = "admin-asset/assets/upload-images/sub-category/";
        self::$image->move(self::$directory, self::$imageNewName);
        return self::$imageUrl = self::$directory . self::$imageNewName;
    }

    public static function toggleStatus($id)
    {
        self::$subcategory = SubCategory::find($id);
        if (self::$subcategory->status == 1) {
            self::$subcategory->status = 2;
        } else {
            self::$subcategory->status = 1;
        }
        return self::$subcategory->save();
    }

    public static function updateSubCategory($request, $id)
    {
        self::$subcategory = SubCategory::find($id);
        self::$subcategory->category_id = $request->category_id;
        self::$subcategory->name = $request->name;
        self::$subcategory->description = $request->description;

        if ($request->hasFile("image")) {
            if (self::$subcategory->image && file_exists(self::$subcategory->image)) {
                unlink(self::$subcategory->image);
            }
            self::$subcategory->image = self::saveImage($request);
        }

        self::$subcategory->status = $request->status;
        self::$subcategory->save();
    }

    public static function deleteSubCategory($request)
    {
        self::$subcategory = SubCategory::find($request->id);

        if (self::$subcategory->image) {
            if (self::$subcategory->image && file_exists(self::$subcategory->image)) {
                unlink(self::$subcategory->image);
            }
        }

        self::$subcategory->delete();
    }

}
