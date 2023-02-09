<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Party extends Model
{
    use HasFactory;

    public static function LP()
    {
        return self::where('name', 'LP')->first();
    }

    public static function PDP()
    {
        return self::where('name', 'PDP')->first();
    }

    public static function APC()
    {
        return self::where('name', 'APC')->first();
    }
}
