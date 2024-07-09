<?php

namespace App\Http\Controllers\Unit;

use App\Http\Controllers\Controller;
use App\Models\Unit\Unit;
use Illuminate\Http\Request;

class UnitController extends Controller
{
    public function index()
    {
        return view('admin.unit.index', ['units' => Unit::all()]);
    }

    public function create()
    {
        return view('admin.unit.create');
    }

    public function store(Request $request)
    {
        Unit::newUnit($request);
        return back()->with('message', 'Unit Info Create Successfully');
    }


    public function edit($id)
    {
        return view('admin.unit.edit', ['unit' => Unit::find($id)]);
    }

    public function update(Request $request, $id)
    {
       Unit::updateUnit($request, $id);
       return redirect('/unit')->with('message', 'Unit Info Update Successfully');
    }

    public function destroy($id)
    {
        Unit::deleteUnit($id);
        return back()->with('message', 'Unit Info Delete Successfully');
    }

}
