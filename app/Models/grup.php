<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class grup extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $table = 'rad_grup';

    public static function getgrup($id)
    {
        return grup::where('idgrup', $id)->value('grup');
    }
    public static function getid($id)
    {
        return grup::where('idgrup', $id)->value('idgrup');
    }
}
