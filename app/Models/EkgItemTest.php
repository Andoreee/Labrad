<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EkgItemTest extends Model
{
    use HasFactory;
    protected $table = 'ekg_itempemeriksaan';
    protected $primaryKey = 'iditemekg';
}
