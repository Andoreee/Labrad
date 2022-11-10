<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EkgKalibrasi extends Model
{
    public $timestamps = false;
    protected $table = 'ekg_kalibrasi';
    protected $fillable = ['notest','irama','irama_keterangan',
                            'frekuensi_hr_keterangan','gelombang_p',
                            'gelombang_p_keterangan','gelombang_qrs_keterangan',
                            'segmen_st','segmen_st_keterangan','gelombang_t',
                            'gelombang_t_keterangan','axis','axis_keterangan',
                            'q_patologis','kesimpulan','kelainan_lain'];
    public function EkgPemPes(){
        return $this->belongsTo(EkgPemPes::class);
    }
}