<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class kelas extends Model
{
    use HasFactory;

    protected $table = 'kelas';

    public static function getkelas($id){
        return kelas::where('kodekelas',$id)->value('namakelas') ;
    }
}
