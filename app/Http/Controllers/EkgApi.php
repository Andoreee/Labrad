<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\EkgGrup;
use App\Models\EkgSG;

class EkgApi extends Controller
{
    public function group(){
        $ekg = EkgGrup::all();
        $data = ['Ekg' => $ekg,];
        return $data;
    }
    public function addGroup(Request $get){
        $this->validate($get, ['grup' => 'required',]);
        $create = EkgGrup::create(['grup' => $get->grup,]);
        if($create){
            return "Berhasil Memasukan Data";
        }else{
            return "Gagal Memasukan Data";
        }
    }
    public function updateGroup(Request $get, $id){
        $this->validate($get, ["grup"=>'required']);
        $grup = EkgGrup::find($id)->update([
            'grup' => $get->grup,
        ]);
        if($grup){
            return "Berhasil Update Data";
        }else{
            return "Gagal Update Data";
        }
    }
    public function deleteGroup($id){
        $grup = EkgGrup::find($id);
        if ($grup->delete()) {
            return 'Berhasil Menghapus Data';
        }
        else {
            return 'Gagal Menghapus Data';
        }
    }
    public function showSG(){
        $Sgrup = EkgSG::with(['EkgGrup'])->orderby('idsubgrup', 'asc')->get();
        $data = [ "Sub Group" => $Sgrup ];
        return $data;
    }
}
