<?php

namespace App\Models;

use App\Models\Pengguna;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Posting extends Model
{
    use HasFactory;

    //protected $fillable = ['tittle' , 'type' , 'preview' , 'body' , 'url'];
    protected $guarded = ['id'];

    public function kategori()
    {
        return $this->belongsTo(kategori::class);
    }

    public function pengguna()
    {
        return $this->belongsTo(Pengguna::class);
    }

}
