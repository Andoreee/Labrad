<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class testfilm extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'rad_testfilm';
}
