<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductImage extends Model
{
    use HasFactory;

    private static $productImages, $directory, $image, $imageName, $imageUrl;

    public static function newProductImage($images, $id)
    {
        foreach ($images as $image)
        {
            self::$imageName        = $image->getClientOriginalName();
            self::$directory        = 'uploads/product-other-images/';
            $image->move(self::$directory, self::$imageName);
            self::$imageUrl         = self::$directory . self::$imageName;

            self::$productImages                = new  ProductImage();
            self::$productImages->product_id   = $id;
            self::$productImages->image  = self::$imageUrl ;
            self::$productImages->save();
        }
    }
}
