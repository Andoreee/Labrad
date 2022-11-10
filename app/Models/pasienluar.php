<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pasienluar extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'rad_pasienluar';

    public static function getpasien($id)
    {
        return pasienluar::where('notest',$id)->value('namapasien');
    }
}

