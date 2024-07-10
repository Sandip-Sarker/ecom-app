<?php

namespace App\Http\Controllers\Category;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
{
    public function index()
    {
        return view('admin.sub-category.index', ['sub_categories' => SubCategory::all()]);
    }

    public function create()
    {
        return view('admin.sub-category.create', [
            'categories' => Category::where('status', 1)->orderBy('id', 'desc')->get()]);
    }

    public function store(Request $request)
    {
       SubCategory::newSubCategories($request);
       return back()->with('message', 'Sub-Categories Info Create Successfully');
    }

    public function edit($id)
    {
        return view('admin.sub-category.edit', [
            'sub_category' => SubCategory::find($id),
            'categories' => Category::where('status', 1)->get()
        ]);
    }

    public function update(Request $request, $id)
    {
        SubCategory::updateSubCategory($request, $id);
        return redirect('/sub-category')->with('message', 'Sub-Categories Info Update Successfully');
    }

    public function destroy($id)
    {
        SubCategory::deleteSubCategory($id);
        return back()->with('message', 'Sub-Category Info Delete Successfully');
    }


}
