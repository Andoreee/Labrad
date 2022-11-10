<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class biaya extends Model
{
    use HasFactory;
    use HasFactory;
    public $timestamps = false;

    protected $table = 'rad_itembiaya_rawatinap';

    public static function getkode($id)

    {
            return biaya::where('iditemrad', $id)->value('biaya');
    }
}
