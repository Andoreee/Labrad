<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Eloquent;

class itemtest extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'rad_itempemeriksaan';
 public static function getid($id)
 {
    return itemtest::where('iditemrad',$id)->value('iditemrad');
 }
}
