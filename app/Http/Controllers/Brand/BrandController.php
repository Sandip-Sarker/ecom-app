<?php

namespace App\Http\Controllers\Brand;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    public function index()
    {
        return view('admin.brand.index', ['brands' => Brand::all()]);
    }

    public function create()
    {
        return view('admin.brand.create');
    }

    public function store(Request $request)
    {
        Brand::newBrand($request);
        return back()->with('message', 'Brand Info Create Successfully');
    }

    public function edit($id)
    {
        return view('admin.brand.edit', ['brand' => Brand::find($id)]);
    }

    public function update(Request $request, $id)
    {
        Brand::updateBrand($request, $id);
        return redirect('/brand')->with('message', 'Brand Info Update Successfully');
    }

    public function destroy($id)
    {
        Brand::deleteBrand($id);
        return back()->with('message', 'Brand Info Delete Successfully');
    }
}
