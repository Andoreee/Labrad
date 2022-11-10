<?php

namespace App\Models;

use App\Models\Posting;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pengguna extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function posting()
    {
        return $this->hasMany(Posting::class);
    }
}
