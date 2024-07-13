<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductImage;
use App\Models\SubCategory;
use App\Models\Unit\Unit;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public $product;

    public function index()
    {
        return view('admin.product.index', ['products' => Product::all()]);
    }

    public function create()
    {
        return view('admin.product.create', [
            'categories'        => Category::all(),
            'sub_categories'    => SubCategory::all(),
            'brands'            => Brand::all(),
            'units'             => Unit::all(),
        ]);
    }

    public function store(Request $request)
    {
        $this->product = Product::newProduct($request);
        ProductImage::newProductImage($request->file('other_image'), $this->product->id);
        return back()->with('message', 'Product Create Successfully');
    }

    public function edit($id)
    {
        return view('admin.product.edit', [
            'product' => Product::find($id),
            'categories'        => Category::all(),
            'sub_categories'    => SubCategory::all(),
            'brands'            => Brand::all(),
            'units'             => Unit::all(),
        ]);
    }

    public function update(Request $request, $id)
    {
        Product::updateProduct($request, $id);
        return redirect('/product')->with('message', 'Product Update Successfully');
    }

    public function destroy($id)
    {
        Product::deleteProduct($id);
        return back()->with('message', 'Product delete Successfully');
    }
}
