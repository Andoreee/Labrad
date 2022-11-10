<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class EkgPemPes extends Model
{
    public $timestamps = false;
    protected $table = "ekg_test";
    public $incrementing = false;
    protected $primaryKey = 'notest';
    protected $fillable = [ "nodaftar",
                            "tgltest",
                            "norm",
                            "idkaryawan",
                            "iddokter_periksa",
                            "iddokter_kirim",
                            "dokterluar",
                            "keterangan",
                            "statushasil",
                            "iduser",
                            "jenisrawat",
                            "cito",
                            "kodepoli",
                            "kodekamar",
                            "tglambil",
                            "diagnosa",
                            "notest",
                            "keterangan", ];
    public function EkgKalibrasi(){
        return $this->hasOne(EkgKalibrasi::class);
    }
    public function EkgPasienLuar(){
        return $this->belongsTo(EkgPasienLuar::class, 'notest');
    }
}