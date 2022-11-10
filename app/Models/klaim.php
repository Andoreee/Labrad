<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class klaim extends Model
{
    use HasFactory;
    protected $table = 'eklaimbpjs';

    public static function getKlaim($id)
    {
        return klaim::where('idklaim', $id)->value('nama');
    }

    public static function getid($id)
    {
        return klaim::where('idklaim',$id)->value('idklaim');
    }
   
}
