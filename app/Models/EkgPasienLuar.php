<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EkgPasienLuar extends Model
{
    public $timestamps = false;
    protected $table = 'ekg_pasienluar';
    protected $primaryKey = 'notest';
    protected $fillable = ['notest','namapasien',
    'alamat','jeniskelamin','tgllahir','telepon'];
    public function EkgPemPes(){
        return $this->hasOne(EkgPemPes::class);
    }
}
