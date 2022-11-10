<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LabGrup;

class LabApi extends Controller
{
    public function group(){
        $Lab = LabGrup::all();
        $data = ['Lab' => $Lab,];
        return $data;
    }
    public function addGroup(Request $get) {
        $this->validate($get, ['grup' => 'required',]);
        $create = LabGrup::create(['grup' => $get->grup,]);
        if($create){
            return "Berhasil Memasukan Data";
        }else{
            return "Gagal Memasukan Data";
        }
    }
    public function updateGroup(Request $get, $id){
        $this->validate($get, ["grup"=>'required']);
        $grup = LabGrup::find($id)->update([
            'grup'     => $get->grup,
        ]);
        if($grup){
            return "Berhasil Update Data";
        }else{
            return "Gagal Update Data";
        }
    }
    public function deleteGroup($id){
        $grup = labGrup::find($id);
        if ($grup->delete()) {
            return 'Berhasil Menghapus Data';
        }
        else {
            return 'Gagal Menghapus Data';
        }
    }
}
