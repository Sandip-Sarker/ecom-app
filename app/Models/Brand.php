<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use function Laravel\Prompts\select;

class Brand extends Model
{
    use HasFactory;

    private static $brands, $brand, $image, $imageName, $directory, $imageUrl;

    public static function newBrand($request)
    {
        self::$image                = $request->file('image');
        self::$imageName            = self::$image->getClientOriginalName();
        self::$directory            = 'uploads/brand-images/';
        self::$image->move(self::$directory, self::$imageName);
        self::$imageUrl             = self::$directory . self::$imageName;

        self::$brands               = new Brand();
        self::$brands->name         = $request->name;
        self::$brands->description  = $request->description;
        self::$brands->image        =  self::$imageUrl;
        self::$brands->status       = $request->status;
        self::$brands->save();
    }

    public static function updateBrand($request, $id)
    {
        self::$brands = Brand::find($id);

        if ($request->file('image'))
        {
            self::$image                = $request->file('image');
            self::$imageName            = self::$image->getClientOriginalName();
            self::$directory            = 'uploads/brand-images/';
            self::$image->move(self::$directory, self::$imageName);
            self::$imageUrl             = self::$directory . self::$imageName;
        }
        else
        {
            self::$imageUrl = self::$brands->image;
        }

        self::$brands->name         = $request->name;
        self::$brands->description  = $request->description;
        self::$brands->image        =  self::$imageUrl;
        self::$brands->status       = $request->status;
        self::$brands->save();
    }

    public static function deleteBrand($id)
    {
        self::$brand = Brand::find($id);
        self::$brand->delete();
    }
}
