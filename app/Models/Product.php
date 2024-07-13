<?php

namespace App\Models;

use App\Models\Unit\Unit;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    private static $products, $product, $directory, $image, $imageName, $imageUrl;

    public static function newProduct( $request)
    {
        self::$image            = $request->file('image');
        self::$imageName        = self::$image->getClientOriginalName();
        self::$directory        = 'uploads/product-images/';
        self::$image->move(self::$directory, self::$imageName);
        self::$imageUrl         = self::$directory . self::$imageName;

        self::$products                     = new Product();
        self::$products->category_id        = $request->category_id;
        self::$products->sub_category_id    = $request->sub_category_id;
        self::$products->brand_id           = $request->brand_id;
        self::$products->unit_id            = $request->unit_id;
        self::$products->name               = $request->name;
        self::$products->code               = $request->code;
        self::$products->regular_price      = $request->regular_price;
        self::$products->selling_price      = $request->selling_price;
        self::$products->stock_amount       = $request->stock_amount;
        self::$products->meta_title         = $request->meta_title;
        self::$products->meta_description   = $request->meta_description;
        self::$products->short_description  = $request->short_description;
        self::$products->long_description   = $request->long_description;
        self::$products->meta_description   = $request->meta_description;
        self::$products->image              = self::$imageUrl;
        self::$products->status = $request->status;
        self::$products->save();

        return self::$products;
    }

    public static function updateProduct($request, $id)
    {
        self::$product = Product::find($id);

        if ($request->file('image'))
        {
            self::$image            = $request->file('image');
            self::$imageName        = self::$image->getClientOriginalName();
            self::$directory        = 'uploads/product-images/';
            self::$image->move(self::$directory, self::$imageName);
            self::$imageUrl         = self::$directory . self::$imageName;
        }
        else
        {
            self::$imageUrl  = self::$product->image;
        }

        self::$product->category_id        = $request->category_id;
        self::$product->sub_category_id    = $request->sub_category_id;
        self::$product->brand_id           = $request->brand_id;
        self::$product->unit_id            = $request->unit_id;
        self::$product->name               = $request->name;
        self::$product->code               = $request->code;
        self::$product->regular_price      = $request->regular_price;
        self::$product->selling_price      = $request->selling_price;
        self::$product->stock_amount       = $request->stock_amount;
        self::$product->meta_title         = $request->meta_title;
        self::$product->meta_description   = $request->meta_description;
        self::$product->short_description  = $request->short_description;
        self::$product->long_description   = $request->long_description;
        self::$product->meta_description   = $request->meta_description;
        self::$product->image              = self::$imageUrl;
        self::$product->status = $request->status;
        self::$product->save();

    }

    public static function deleteProduct($id)
    {
        self::$product = Product::find($id);
        self::$product->delete();
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function subCategory()
    {
        return $this->belongsTo(SubCategory::class);
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }


    public function unit()
    {
        return $this->belongsTo(Unit::class);
    }

}
