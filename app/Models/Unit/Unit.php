<?php

namespace App\Models\Unit;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Unit extends Model
{
    use HasFactory;

    private static $units, $unit;

    public static function newUnit($request)
    {
        self::$units                = new Unit();
        self::$units->name          = $request->name;
        self::$units->code          = $request->code;
        self::$units->description   = $request->description;
        self::$units->status        = $request->status;
        self::$units->save();
    }

    public static function updateUnit($request, $id)
    {
        self::$unit                  = Unit::find($id);
        self::$unit->name          = $request->name;
        self::$unit->code          = $request->code;
        self::$unit->description   = $request->description;
        self::$unit->status        = $request->status;
        self::$unit->save();
    }

    public static function deleteUnit($id)
    {
        self::$unit = Unit::find($id);
        self::$unit->delete();
    }
}
