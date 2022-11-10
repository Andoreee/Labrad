<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class EkgGrup extends Model
{
    public $timestamps = false;
    protected $table = "ekg_grup";
    protected $primaryKey = 'idgrup';
    protected $fillable = ["grup",];
    public function EkgSG(){
        return $this->hasMany(EkgSG::class);
    }
} 
