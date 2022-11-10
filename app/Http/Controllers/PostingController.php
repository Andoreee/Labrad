<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Posting; 

class PostingController extends Controller
{
    public function main()
    {
        return view('panduan',[
            "title" => "Panduan",
            "posting" => Posting::with(['pengguna' , 'kategori'])->get()
            // "posting" => Posting::all()
            
        ]);
    }

    public function display(Posting $judul)
    {
        return view ('post' , [
            "title" => "Postingan",
            "post" => $judul
            ]);
    }
}
