<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class EkgSG extends Model
{
    public $timestamps = false;
    protected $table = "ekg_subgrup";
    protected $primaryKey = 'idsubgrup';
    protected $fillable = [ 'kodesubgrup',
                            'subgrup',
                            'idgrup',];
    public function EkgGrup() {
        return $this->belongsTo(EkgGrup::class, 'idgrup');
    }
    public function scopeSearchGrup($q) {
        return $this->EkgGrup()->where('grup','like',"%".$q."%");
    }
}
