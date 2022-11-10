<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class testdetail extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'rad_testdetail';

    public static function getdetail($id)
    {
        return testdetail::where('notest', $id)->value('biaya');
    }
}
