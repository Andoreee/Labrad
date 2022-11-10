<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\grup;

class RadApi extends Controller
{
    public function group(){
        $rad = grup::all();
        $data = ['Rad' => $rad,];
        return $data;
    }
    public function addGroup(Request $get) {
        $grup = new grup;
        $grup->grup = $get->input('grup');
        $create = $grup->save();
        if($create){
            return "Berhasil Memasukan Data";
        }else{
            return "Gagal Memasukan Data";
        }
    }
    public function updateGroup(Request $get, $id){
        $this->validate($get, ["grup"=>'required',]);
        $grup = grup::where('idgrup', $id)
            ->update([
                'grup' => $get->grup
            ]);
        if($grup){
            return "Berhasil Update Data";
        }else{
            return "Gagal Update Data";
        }
    }
    public function deleteGroup($id){
        $grup = grup::where('idgrup', $id)->delete();
        if ($grup) {
            return 'Berhasil Menghapus Data';
        }
        else {
            return 'Gagal Menghapus Data';
        }
    }
}
