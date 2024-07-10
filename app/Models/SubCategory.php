<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    use HasFactory;

    private static $subCategories, $subCategory, $image, $imageName, $directory, $imageUrl;

    public static function newSubCategories($request)
    {

        self::$image                            = $request->file('image');
        self::$imageName                        = self::$image->getClientOriginalName();
        self::$directory                        = 'uploads/sub-categories-images/';
        self::$image->move(self::$directory, self::$imageName);
        self::$imageUrl                         = self::$directory . self::$imageName;

        self::$subCategories                    = new SubCategory();
        self::$subCategories->category_id       = $request->category_id;
        self::$subCategories->name              = $request->name;
        self::$subCategories->description       = $request->description;
        self::$subCategories->image             = self::$imageUrl;
        self::$subCategories->status            = $request->status;
        self::$subCategories->save();
    }

    public static function updateSubCategory($request, $id)
    {
        self::$subCategory = SubCategory::find($id);
        if ($request->file('image'))
        {
            self::$image = $request->file('image');
            self::$imageName = self::$image->getClientOriginalName();
            self::$directory = 'uploads/sub-category-images/';
            self::$image->move(self::$directory, self::$imageName);
            self::$imageUrl = self::$directory . self::$imageName;
        }
        else
        {
            self::$imageUrl  = self::$subCategory->image;
        }

        self::$subCategory->category_id      = $request->category_id;
        self::$subCategory->name             = $request->name;
        self::$subCategory->description      = $request->description;
        self::$subCategory->image            = self::$imageUrl;
        self::$subCategory->status           = $request->status;
        self::$subCategory->save();

    }

    public static function deleteSubCategory($id)
    {
        self::$subCategory = SubCategory::find($id);
        self::$subCategory->delete();
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
