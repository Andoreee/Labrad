<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class LabGrup extends Model
{
    public $timestamps = false;
    protected $table = "lab_grup";
    protected $primaryKey = 'idgrup';
    protected $fillable = ["grup","kode",'nourut','kelompok'];
} 
