<?php

namespace App\Http\Controllers;

use PDF;
use App\Models\EkgGrup;
use App\Models\EkgKalibrasi;
use App\Models\EkgPasienLuar;
use App\Models\EkgPemPes;
use App\Models\EkgSG;
use Illuminate\Http\Request;
use Psy\Exception\BreakException;
use Illuminate\Support\Facades\DB;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use Illuminate\Auth\Events\Validated;

class EkgController extends Controller
{
/*
        Group
*/
    public function group(){
        $grup = EkgGrup::select('*');
        if(request('q')){$grup->where('grup','like',"%".request('q')."%");}
        $data = ["title" => "Elektrokardiogram", "group" => $grup->get()];
        return view('ekg/group', $data);
    }
        public function showG($id){
            $grup = EkgGrup::all();
            $idgrup = EkgGrup::findOrFail($id);
            $data = ["title" => "Elektrokardiogram","group" => $grup,
                        "groupInput" => $idgrup, "id" => $id,    ];
            return view('ekg/group', $data);
        }
        public function btn($id, $button){ 
            $getId = $id;
            $name = EkgGrup::findorfail($id);
            $getName = $name->grup;
            $grup = EkgGrup::all();
            switch ($button) {
                case 'create': $value = 1; break;
                case 'edit': $value = 2; break;
                case 'delete': $value = 3; break;
                default: $value = 4; break;
            }
            $data = ["title" => "Elektrokardiogram", "group" => $grup,
                    "btn" => $value, "idg" => $getId, "name" => $getName,];
            return view('ekg/group',$data);
        }
        public function addGroup(Request $get) {
            $this->validate($get, ['grup' => 'required',]);
            EkgGrup::create(['grup' => $get->grup,]);
            return redirect('ekg/group');
        }
        public function updateGroup(Request $get, $id){
            $this->validate($get, ["grup"=>'required']);
            $grup = EkgGrup::find($id);
            $grup->grup = $get->grup;
            $grup->save();
            return redirect('ekg/group');
        }
        public function deleteGroup(Request $get){
            $grup = EkgGrup::all();
            $this->validate($get, ["id" => 'required',]);
            if(!empty(EkgSG::where('idgrup','=',$get->id))){
                return view('ekg/group',[ "title" => "Elektrokardiogram", "group" => $grup,
                    'error' => 'Data tidak dapat dihapus karena sudah digunakan dalam proses',
                ]);
            }
            $grup = EkgGrup::find($get->id);
            $grup->delete();
            return redirect('ekg/group');
        }
        public function pratinjauGroup(){
            $grup = EkgGrup::all();
            $pdf = PDF::loadview('/ekg/pdf/group_pdf',['grup'=>$grup]);
            return $pdf->stream();
        }
/*
        Sub Group
*/
    public function subGroup(){
        $subGrup = EkgSG::with(['EkgGrup'])->orderby('idsubgrup', 'asc');
        if(request('q')){
            $subGrup->join('ekg_grup', 'ekg_grup.idgrup','=','ekg_subgrup.idgrup')
            ->orwhere('grup','like',"%".request('q')."%")
            ->orwhere('kodesubgrup','like',"%".request('q')."%")
            ->orwhere('subgrup','like',"%".request('q')."%")
        ->orderby('idsubgrup', 'asc')
        ->paginate();
        }
        return view('ekg/sub-group',[
            "subGroup" => $subGrup->get(),
            "title" => "Elektrokardiogram",
        ]); 
    }
        public function showSG($id){
            $Sgrup = EkgSG::with(['EkgGrup'])->orderby('idsubgrup', 'asc')->get();
            $idSgrup = EkgSG::findorfail($id);
            $data = [ "title" => "Elektrokardiogram", "subGroup" => $Sgrup,
                "subGroupInput" => $idSgrup, "idsg" => $id, "idgrp" => $idSgrup->idgrup, ];
                return view('ekg/sub-group', $data);
        }
        public function btnSG($id, $sendG, $button){
            $Sgrup = EkgSG::orderby('idsubgrup', 'asc')->get();
            switch ($button) {
                case 'create':$btn = '1';$popup = 'add';break;
                case 'edit'  :$btn = '2';$popup = 'update';break;
                case 'delete' :$btn = '3';$popup = 'delete';break;
                default      :$btn = '<i>ERROR : BUTTON TIDAK DITEMUKAN</i>'; $popup = ''; break;
            }
            if($id == 'add'){
                if(isset($sendG)){
                    $valuein = EkgGrup::findorfail($sendG);
                    $data = [ "title" => "Elektrokardiogram", "subGroup" => $Sgrup,
                        "btn" => $btn, "popup" => $popup, 'createValueinput' => $valuein, ];
                }
                else{
                    $valuein = EkgSG::findorfail($id);
                    $data = [ "title" => "Elektrokardiogram", "subGroup" => $Sgrup,
                        "btn" => $btn, "popup" => $popup ];
                }
            }
            else{
                $valuein = EkgSG::findorfail($id);
                if(isset($sendG)){
                    $ekgrup = EkgGrup::findorfail($sendG);
                    $valuein->idgrup = $sendG;
                    $valuein->EkgGrup->grup = $ekgrup->grup;
                    $data = ["title" => "Elektrokardiogram","subGroup" => $Sgrup,
                        "btn" => $btn,"popup" => $popup,'valueinput' => $valuein ];
                }else{
                    $data = [ "title" => "Elektrokardiogram", "subGroup" => $Sgrup,
                    "btn" => $btn, "popup" => $popup, 'valueinput' => $valuein ];
                }
            }
            return view('ekg/sub-group', $data);
        }
        public function addSGroup(Request $get){
            $get->validate(['idG' => 'required|max:11','sG' => 'max:30',
                'kodeSG' => 'max:10|unique:ekg_subgrup,kodesubgrup,,idsubgrup',]);
            EkgSG::create(['idgrup'=>$get->idG, 'subgrup'=>$get->sG,
                                'kodesubgrup'=>$get->kodeSG,]);
            return redirect('ekg/sub-group');
        }
        public function editSG(Request $get, EkgSG $id, $idG){
            $rules = [
                'idSG' => 'required',
                'idG' => 'required|max:11',
                'sG' => 'max:30',
            ];
            if($get->kodeSG != $id->kodesubgrup){
                $rules['kodeSG']= 'max:10|unique:ekg_subgrup,kodesubgrup,,idsubgrup';
            }
            $get->validate($rules);
            $ekgupdate = EkgSG::findorfail($get->idSG);
            $ekgupdate->idgrup = $idG;
            $ekgupdate->kodesubgrup = $get->kodeSG;
            $ekgupdate->subgrup = $get->sG;
            $ekgupdate->save();
            return redirect('ekg/sub-group');
        }
        public function deleteSGroup(Request $get){
            $get->validate([
                'hapus' => 'required',
                'idSG' => 'required'
            ]);
            if($get->hapus=='true'){
                $sg =  EkgSG::findorfail($get->idSG);
                $sg->delete();
                return redirect('ekg/sub-group');
            }else{
                return redirect('ekg/sub-group');
            }
        }
        public function popupGedit($id){
            $grup = EkgGrup::all();
            if($id == 'x'){
                return view('ekg/popup-window/popup-grupEditToSubGrup',[
                    "title" => "Elektrokardiogram",
                    "group" => $grup,
                    "ids" => 'x',
                ]);
            }
            else{
                return view('ekg/popup-window/popup-grupEditToSubGrup',[
                    "title" => "Elektrokardiogram",
                    "group" => $grup,
                    "ids" => $id,
                ]);
            }
        }
/*
        Item Test
*/
    public function itemTest(){
        $item = DB::table('ekg_itempemeriksaan')
        ->selectRaw('ekg_itempemeriksaan.*, ekg_grup.grup, eklaimbpjs.nama')
        ->join('ekg_grup', 'ekg_grup.idgrup','=','ekg_itempemeriksaan.idgrup')
        ->join('eklaimbpjs', 'eklaimbpjs.idklaim','=','ekg_itempemeriksaan.idklaim')
        ->orderby('ekg_itempemeriksaan.iditemekg','asc');
        if(request('q')){ $item->where('namaitem','like',"%".request('q')."%")
            ->orwhere('grup','like',"%".request('q')."%")
            ->orwhere('biaya_rawatjalan','like',"%".request('q')."%")
            ->orwhere('biaya_pasienluar','like',"%".request('q')."%")
            ->orwhere('dokterbaca_lk','like',"%".request('q')."%")
            ->orwhere('dokterbaca_pr','like',"%".request('q')."%")
            ->orwhere('nama','like',"%".request('q')."%");}
        $eklaim = DB::table('eklaimbpjs')->get();
        return view('ekg/item-test',[
            "title" => "Elektrokardiogram",
            "item" => $item->get(),
            "eklaim" => $eklaim,
        ]);
    }
        public function showIT($id, $idg){
            $item = DB::table('ekg_itempemeriksaan')
            ->select('*')
            ->join('ekg_grup', 'ekg_grup.idgrup','=','ekg_itempemeriksaan.idgrup')
            ->join('eklaimbpjs', 'eklaimbpjs.idklaim','=','ekg_itempemeriksaan.idklaim')
            ->orderby('ekg_itempemeriksaan.iditemekg','asc')
            ->get();  
            $eklaim = DB::table('eklaimbpjs')->get();
            $iditem = DB::table('ekg_itempemeriksaan')
            ->select('*')
            ->join('ekg_grup', 'ekg_grup.idgrup','=','ekg_itempemeriksaan.idgrup')
            ->join('eklaimbpjs', 'eklaimbpjs.idklaim','=','ekg_itempemeriksaan.idklaim')
            ->orderby('ekg_itempemeriksaan.iditemekg','asc')
            ->where('iditemekg',$id)
            ->get();
            $biaya = DB::table('ekg_itembiaya_rawatinap')->where('iditemekg',$id)->get();
            $data = [
                "title" => "Elektrokardiogram",
                "item" => $item,
                "eklaim" => $eklaim,
                "itemInput" => $iditem,
                "id" => $id,
                "biaya" => $biaya,
            ];
            return view('ekg/item-test', $data);
        }
        public function btnIT($id,EkgGrup $sendG,$button){
            $item = DB::table('ekg_itempemeriksaan')
            ->select('*')
            ->join('ekg_grup', 'ekg_grup.idgrup','=','ekg_itempemeriksaan.idgrup')
            ->join('eklaimbpjs', 'eklaimbpjs.idklaim','=','ekg_itempemeriksaan.idklaim')
            ->orderby('ekg_itempemeriksaan.iditemekg','asc')
            ->get();
            $iteminput = DB::table('ekg_itempemeriksaan')
            ->select('*')
            ->join('ekg_grup', 'ekg_grup.idgrup','=','ekg_itempemeriksaan.idgrup')
            ->join('eklaimbpjs', 'eklaimbpjs.idklaim','=','ekg_itempemeriksaan.idklaim')
            ->orderby('ekg_itempemeriksaan.iditemekg','asc')
            ->where('iditemekg',$id);
            
            $eklaim = DB::table('eklaimbpjs')->get();
            $biaya = DB::table('ekg_itembiaya_rawatinap')->where('iditemekg',$id)->get();
                switch ($button) {
                case 'create':
                    $btn = '1';
                    $popup = 'add';
                    break;
                case 'edit':
                    $btn='2';
                    $popup='edit';
                    break;
                case 'delete':
                    $btn='3';
                    $popup = '-';
                    break;
                default:
                    $btn = "ERROR::BUTTON TIDAK DITEMUKAN";
                    break;
            }
            if($id == 'add'){
                return view('ekg/item-test',[
                    "title" => "Elektrokardiogram",
                    "item" => $item,
                    "eklaim" => $eklaim,
                    "btn" => $btn,
                    "popup" => $popup,
                    "sendG" => $sendG,
                ]);
            }
            if($iteminput->first()->idgrup != $sendG->idgrup){
                return view('ekg/item-test',[
                    "title" => "Elektrokardiogram",
                    "item" => $item,
                    "eklaim" => $eklaim,
                    "btn" => $btn,
                    "popup" => $popup,
                    "itemInput" => $iteminput->get(),
                    "sendG" => $sendG,
                    'biaya' => $biaya
                ]);
            }
            else{
                return view('ekg/item-test',[
                    "title" => "Elektrokardiogram",
                    "item" => $item,
                    "eklaim" => $eklaim,
                    "btn" => $btn,
                    "popup" => $popup,
                    "itemInput" => $iteminput->get(),
                    'biaya' => $biaya
                ]);
            }
        }
        public function addIT(request $get){
            DB::table('ekg_itempemeriksaan')->insert([
                'namaitem' => $get->name,
                'biaya_rawatjalan' => $get->biayaRJ,
                'biaya_pasienluar' => $get->biayaPL,
                'idgrup' => $get->idG,
                'dokterbaca_lk' => $get->komenLK,
                'dokterbaca_pr' => $get->komenPR,
                'idklaim' => $get->eklaim,
            ]);
            $idIT = DB::table('ekg_itempemeriksaan')
            ->select('iditemekg')
            ->orderby('iditemekg', 'desc')
            ->get()
            ->first();
            DB::table('ekg_itembiaya_rawatinap')->insert([
                        "iditemekg"=>$idIT->iditemekg,
                        "kodekelas"=>1,
                        "biaya"=>$get->kelas1,
            ]);
            DB::table('ekg_itembiaya_rawatinap')->insert([
                        "iditemekg"=>$idIT->iditemekg,
                        "kodekelas"=>2,
                        "biaya"=>$get->kelas2,
            ]);
            DB::table('ekg_itembiaya_rawatinap')->insert([
                        "iditemekg"=>$idIT->iditemekg,
                        "kodekelas"=>3,
                        "biaya"=>$get->kelas3,
            ]);
            DB::table('ekg_itembiaya_rawatinap')->insert([
                        "iditemekg"=>$idIT->iditemekg,
                        "kodekelas"=>4,
                        "biaya"=>$get->kelas4,
            ]);
            DB::table('ekg_itembiaya_rawatinap')->insert([
                        "iditemekg"=>$idIT->iditemekg,
                        "kodekelas"=>5,
                        "biaya"=>$get->kelas5,
            ]);
            DB::table('ekg_itembiaya_rawatinap')->insert([
                        "iditemekg"=>$idIT->iditemekg,
                        "kodekelas"=>6,
                        "biaya"=>$get->kelas6,
            ]);
            DB::table('ekg_itembiaya_rawatinap')->insert([
                        "iditemekg"=>$idIT->iditemekg,
                        "kodekelas"=>7,
                        "biaya"=>$get->kelas7,
            ]);
            
            
            return redirect('ekg/item-test');
        }
        public function updateIT(request $get){
            if (ISSET($get->id)){
                DB::table('ekg_itempemeriksaan')->where('iditemekg', $get->id)->update([
                    'namaitem' => $get->name,
                    'biaya_rawatjalan' => $get->biayaRJ,
                    'biaya_pasienluar' => $get->biayaPL,
                    'idgrup' => $get->idG,
                    'dokterbaca_lk' => $get->komenLK,
                    'dokterbaca_pr' => $get->komenPR,
                    'idklaim' => $get->eklaim,
                ]);
                DB::select('UPDATE ekg_itembiaya_rawatinap SET biaya = '.$get->kelas1.' WHERE iditemekg = '.$get->id.' AND kodekelas = 1');
                DB::select('UPDATE ekg_itembiaya_rawatinap SET biaya = '.$get->kelas2.' WHERE iditemekg = '.$get->id.' AND kodekelas = 2');
                DB::select('UPDATE ekg_itembiaya_rawatinap SET biaya = '.$get->kelas3.' WHERE iditemekg = '.$get->id.' AND kodekelas = 3');
                DB::select('UPDATE ekg_itembiaya_rawatinap SET biaya = '.$get->kelas4.' WHERE iditemekg = '.$get->id.' AND kodekelas = 4');
                DB::select('UPDATE ekg_itembiaya_rawatinap SET biaya = '.$get->kelas5.' WHERE iditemekg = '.$get->id.' AND kodekelas = 5');
                DB::select('UPDATE ekg_itembiaya_rawatinap SET biaya = '.$get->kelas6.' WHERE iditemekg = '.$get->id.' AND kodekelas = 6');
                DB::select('UPDATE ekg_itembiaya_rawatinap SET biaya = '.$get->kelas7.' WHERE iditemekg = '.$get->id.' AND kodekelas = 7');
                return redirect('ekg/item-test');
            }
            else {
                return redirect()->back();
            }
        }
        public function deleteIT(Request $get){
            if ($get->hapus=='false') {
                return redirect('ekg/item-test');
            }
            else{
                DB::table('ekg_itempemeriksaan')->where('iditemekg',$get->id)->delete();
                return redirect('ekg/item-test');
            }
        }
        public function pratinjauIT(){
            $item = DB::table('ekg_itempemeriksaan')
            ->select('*')
            ->join('ekg_grup', 'ekg_grup.idgrup','=','ekg_itempemeriksaan.idgrup')->get();
            $pdf = PDF::loadview('/ekg/pdf/item-test_pdf',['item'=>$item]);
            return $pdf->stream();
        }
        public function popupGITE($id){
            $grup = EkgGrup::all();
            if($id == 'x'){
                return view('ekg/popup-window/popup-grupEditToItemtest',[
                    "title" => "Elektrokardiogram",
                    "group" => $grup,
                    "ids" => 'x',
                ]);
            }
            else{
                return view('ekg/popup-window/popup-grupEditToItemtest',[
                    "title" => "Elektrokardiogram",
                    "group" => $grup,
                    "ids" => $id,
                ]);
            }
        }
/*
        Film
*/
    public function film(){
        $film = DB::table('ekg_film');
        if(request('q'))$film->where('namafilm','like',"%".request('q')."%")->orwhere('ukuran','like',"%".request('q')."%");
        return view('ekg/film',[
            "title" => "Elektrokardiogram",
            "film" => $film->get(),
        ]);
        }
        public function showFilm($id){
            $film = DB::table('ekg_film')->get();
            $idfilm = DB::table('ekg_film')->where('idfilm',$id)->get();
            $data = [
                "title" => "Elektrokardiogram",
                "film" => $film,
                "filmInput" => $idfilm,
                "id" => $id,
            ];
            return view('ekg/film', $data);
        }
        public function btnfilm($id, $button){ 
            $idfilm = DB::table('ekg_film')->where('idfilm',$id)->get();
            $film = DB::table('ekg_film')->get();
            switch ($button) {
                case 'create':  $btn = 1; break;
                case 'edit':    $btn = 2; break;
                case 'delete':  $btn = 3; break;
                default:        $btn = 4; break;
            }
            $data = [  "title" => "Elektrokardiogram", "film" => $film,
                "filmInput" => $idfilm, "btn" => $btn ];
            return view('ekg/film', $data);
        }
        public function addFilm(Request $get) {
            DB::table('ekg_film')->insert([
                'namafilm' => $get->name,
                'ukuran' => $get->ukuran
            ]);
            return redirect('ekg/film');
        }
        public function updateFilm(Request $request, $id){
            DB::table('ekg_film')->where('idfilm',$id)->update([
                'namafilm' => $request->name,
                'ukuran' => $request->ukuran
            ]);
            return redirect('ekg/film');
        }
        public function deleteFilm(Request $get, $id){
            if ($get->hapus=='false') {
                return redirect('ekg/film');
            }
            else{
                DB::table('ekg_film')->where('idfilm',$id)->delete();
                return redirect('ekg/film');
            }
        }
        public function pratinjauFilm(){
            $film = DB::table('ekg_film')->get();
            $pdf = PDF::loadview('/ekg/pdf/film_pdf',['film'=>$film]);
            return $pdf->stream();
        }
/*
        Pemeriksaan Pasien
*/
    public function pemeriksaanPasien(){
        $riwayat = EkgPemPes::orderBy('notest','desc')->get();
        $film = DB::table('ekg_film');
        return view('ekg/pemeriksaan-pasien',[
            "title" => "Elektrokardiogram",
            "film" => $film->get(),
            "riwayat" => $riwayat,
        ]);
        }
    public function CrudPP(){
        $riwayat = EkgPemPes::orderBy('notest','desc')->get();
        $film = DB::table('ekg_film');
        return view('ekg/pemeriksaan-pasien-crud',[
            "film" => $film->get(),
            "riwayat" => $riwayat,
        ]);        
    }
        public function addPP(Request $get){
            $id = IdGenerator::generate(['table' => 'ekg_test', 'field' => 'notest', 'length' => 11, 'prefix' => 'PPE']);
            $lastidIT = DB::table('ekg_testdetail')->orderBy('nourut', 'desc')->first();
                $idIT = 1;
                if(isset($lastidIT->nourut)){
                    $idIT = $lastidIT->nourut+1;
                }
            $dokterbaca = DB::table('ekg_itempemeriksaan')->select('dokterbaca_lk','dokterbaca_pr','idklaim')->where('iditemekg', '=', $get->idit)->first();
            $this->validate($get, ['jenisrawat' => 'required','NoPen' => 'required',
                                    'name' => 'required','Petugas' => 'required',
                                    'DokPem' => 'required','tgltest' => 'reqired' ]);
            $cito = 0; $poli = ''; $kamar = '';
            if($get->jenisrawat=='rawat jalan')$poli=$get->polikamar;
            if($get->jenisrawat=='pasien luar'){$biaya=$get->biayaPL;}else{$biaya=$get->biayaRJ;}
            if($get->jenisKel=='laki-laki'){$dokterbc=$dokterbaca->dokterbaca_lk;}else{$dokterbc=$dokterbaca->dokterbaca_pr;}
            if($get->jenisrawat=='rawat inap' || $get->jenisrawat=='pasien luar')$kamar=$get->polikamar;
            if(isset($get->Cito))$cito = 1;
            
            EkgPemPes::create(['notest' => $id,  'nodaftar' => $get->NoPen, 'tgltest' => $get->Date,
                                'norm' => $get->noRM, 'idkaryawan' => $get->Petugas, 'iddokter_periksa' => $get->DokPem,
                                'iddokter_kirim' => $get->DokKir, 'dokterluar' => $get->DokLuar, 'jenisrawat' => $get->jenisrawat,
                                'cito' => $cito, 'kodepoli' => $poli, 'kodekamar' => $kamar, 'diagnosa' => $get->diagnosa, 'keterangan'=>$get->kesimpulan]);
            if($get->noRM=='0000000'){
                EkgPasienLuar::create(['notest' => $id,'namapasien' => $get->name, 'alamat' => $get->alamat,
                                'jeniskelamin' => $get->jenisKel,'tgllahir' => $get->tglLahir, 'telepon' => $get->telp,
                ]);
            }
            DB::table('ekg_testdetail')->insert([
                "notest"=>$id,
                "iditemekg"=>$get->idit,
                "nourut"=>$idIT,
                "biaya"=>$biaya,
                "dokterbaca"=>$dokterbc,
                "kilovolt"=>$get->kv,
                "milliamperesecond"=>$get->mas,
                "expose"=>$get->expose,
                "idklaim"=>$dokterbaca->idklaim,
            ]);
            DB::table('ekg_testfilm')->insert([
                "notest"=>$id,
                "iditemekg"=>$get->idit,
                "idfilm"=>$get->film,
                "digunakan"=>$get->digunakan,
                "ditolak"=>$get->ditolak,
            ]);
            EkgKalibrasi::create([ 'notest' => $id, 'irama' => $get->irama, 'irama_keterangan' => $get->iramaKet,
                'frekuensi_hr_keterangan' => $get->frekuensiHrKet, 'gelombang_p' => $get->gelombangP, 'gelombang_p_keterangan' => $get->gelombangPKet,
                'interval_pr' => $get->intervalPr, 'interval_pr_keterangan' => $get->intervalPrKet, 'gelombang_qrs' => $get->gelombangQrs,
                'gelombang_qrs_keterangan' => $get->gelombangQrsKet, 'segmen_st' => $get->segmenSt, 'segmen_st_keterangan' => $get->segmenStKet,
                'gelombang_t' => $get->gelombangT, 'gelombang_t_keterangan' => $get->gelombangTKet, 'axis' => $get->axis,
                'axis_keterangan' => $get->axisKet, 'q_patologis' => $get->qPatagolis, 'kesimpulan' => $get->kesimpulan,
                'kelainan_lain' => $get->kelainanLain,]);
            return redirect('ekg/pemeriksaan-pasien');
        }


        // Popup Item Test
        public function popupPP(){
            $item = DB::table('ekg_itempemeriksaan')
            ->selectRaw('ekg_itempemeriksaan.*, ekg_grup.grup, eklaimbpjs.nama')
            ->join('ekg_grup', 'ekg_grup.idgrup','=','ekg_itempemeriksaan.idgrup')
            ->join('eklaimbpjs', 'eklaimbpjs.idklaim','=','ekg_itempemeriksaan.idklaim')
            ->orderby('ekg_itempemeriksaan.iditemekg','asc');
            if(request('q')){ $item->where('namaitem','like',"%".request('q')."%")
                ->orwhere('grup','like',"%".request('q')."%")
                ->orwhere('biaya_rawatjalan','like',"%".request('q')."%")
                ->orwhere('biaya_pasienluar','like',"%".request('q')."%")
                ->orwhere('dokterbaca_lk','like',"%".request('q')."%")
                ->orwhere('dokterbaca_pr','like',"%".request('q')."%")
                ->orwhere('nama','like',"%".request('q')."%");}
            $eklaim = DB::table('eklaimbpjs')->get();
            return view('ekg/popup-window/popup-ItemTestToPP',[
                "title" => "Elektrokardiogram",
                "item" => $item->get(),
                "eklaim" => $eklaim,
            ]);
            }
            
        public function showITPP($id, $idg){
            $item = DB::table('ekg_itempemeriksaan')
            ->select('*')
            ->join('ekg_grup', 'ekg_grup.idgrup','=','ekg_itempemeriksaan.idgrup')
            ->join('eklaimbpjs', 'eklaimbpjs.idklaim','=','ekg_itempemeriksaan.idklaim')
            ->orderby('ekg_itempemeriksaan.iditemekg','asc')
            ->get();  
            $eklaim = DB::table('eklaimbpjs')->get();
            $iditem = DB::table('ekg_itempemeriksaan')
            ->select('*')
            ->join('ekg_grup', 'ekg_grup.idgrup','=','ekg_itempemeriksaan.idgrup')
            ->join('eklaimbpjs', 'eklaimbpjs.idklaim','=','ekg_itempemeriksaan.idklaim')
            ->orderby('ekg_itempemeriksaan.iditemekg','asc')
            ->where('iditemekg',$id)
            ->get();
            $biaya = DB::table('ekg_itembiaya_rawatinap')->where('iditemekg',$id)->get();
            $data = [
                "title" => "Elektrokardiogram",
                "item" => $item,
                "eklaim" => $eklaim,
                "itemInput" => $iditem,
                "id" => $id,
                "biaya" => $biaya,
            ];
            return view('ekg/popup-window/popup-ItemTestToPP', $data);
        }
        public function btnITPP($id,EkgGrup $sendG,$button){
            $item = DB::table('ekg_itempemeriksaan')
            ->select('*')
            ->join('ekg_grup', 'ekg_grup.idgrup','=','ekg_itempemeriksaan.idgrup')
            ->join('eklaimbpjs', 'eklaimbpjs.idklaim','=','ekg_itempemeriksaan.idklaim')
            ->orderby('ekg_itempemeriksaan.iditemekg','asc')
            ->get();
            $iteminput = DB::table('ekg_itempemeriksaan')
            ->select('*')
            ->join('ekg_grup', 'ekg_grup.idgrup','=','ekg_itempemeriksaan.idgrup')
            ->join('eklaimbpjs', 'eklaimbpjs.idklaim','=','ekg_itempemeriksaan.idklaim')
            ->orderby('ekg_itempemeriksaan.iditemekg','asc')
            ->where('iditemekg',$id);
            
            $eklaim = DB::table('eklaimbpjs')->get();
            $biaya = DB::table('ekg_itembiaya_rawatinap')->where('iditemekg',$id)->get();
                switch ($button) {
                case 'create':
                    $btn = '1';
                    $popup = 'add';
                    break;
                case 'edit':
                    $btn='2';
                    $popup='edit';
                    break;
                case 'delete':
                    $btn='3';
                    $popup = '-';
                    break;
                default:
                    $btn = "ERROR::BUTTON TIDAK DITEMUKAN";
                    break;
            }
            if($id == 'add'){
                return view('ekg/popup-window/popup-ItemTestToPP',[
                    "title" => "Elektrokardiogram",
                    "item" => $item,
                    "eklaim" => $eklaim,
                    "btn" => $btn,
                    "popup" => $popup,
                    "sendG" => $sendG,
                ]);
            }
            if($iteminput->first()->idgrup != $sendG->idgrup){
                return view('ekg/popup-window/popup-ItemTestToPP',[
                    "title" => "Elektrokardiogram",
                    "item" => $item,
                    "eklaim" => $eklaim,
                    "btn" => $btn,
                    "popup" => $popup,
                    "itemInput" => $iteminput->get(),
                    "sendG" => $sendG,
                    'biaya' => $biaya
                ]);
            }
            else{
                return view('ekg/popup-window/popup-ItemTestToPP',[
                    "title" => "Elektrokardiogram",
                    "item" => $item,
                    "eklaim" => $eklaim,
                    "btn" => $btn,
                    "popup" => $popup,
                    "itemInput" => $iteminput->get(),
                    'biaya' => $biaya
                ]);
            }
        }
        public function addITPP(request $get){
            DB::table('ekg_itempemeriksaan')->insert([
                'namaitem' => $get->name,
                'biaya_rawatjalan' => $get->biayaRJ,
                'biaya_pasienluar' => $get->biayaPL,
                'idgrup' => $get->idG,
                'dokterbaca_lk' => $get->komenLK,
                'dokterbaca_pr' => $get->komenPR,
                'idklaim' => $get->eklaim,
            ]);
            $idIT = DB::table('ekg_itempemeriksaan')
            ->select('iditemekg')
            ->orderby('iditemekg', 'desc')
            ->get()
            ->first();
            DB::table('ekg_itembiaya_rawatinap')->insert([
                        "iditemekg"=>$idIT->iditemekg,
                        "kodekelas"=>1,
                        "biaya"=>$get->kelas1,
            ]);
            DB::table('ekg_itembiaya_rawatinap')->insert([
                        "iditemekg"=>$idIT->iditemekg,
                        "kodekelas"=>2,
                        "biaya"=>$get->kelas2,
            ]);
            DB::table('ekg_itembiaya_rawatinap')->insert([
                        "iditemekg"=>$idIT->iditemekg,
                        "kodekelas"=>3,
                        "biaya"=>$get->kelas3,
            ]);
            DB::table('ekg_itembiaya_rawatinap')->insert([
                        "iditemekg"=>$idIT->iditemekg,
                        "kodekelas"=>4,
                        "biaya"=>$get->kelas4,
            ]);
            DB::table('ekg_itembiaya_rawatinap')->insert([
                        "iditemekg"=>$idIT->iditemekg,
                        "kodekelas"=>5,
                        "biaya"=>$get->kelas5,
            ]);
            DB::table('ekg_itembiaya_rawatinap')->insert([
                        "iditemekg"=>$idIT->iditemekg,
                        "kodekelas"=>6,
                        "biaya"=>$get->kelas6,
            ]);
            DB::table('ekg_itembiaya_rawatinap')->insert([
                        "iditemekg"=>$idIT->iditemekg,
                        "kodekelas"=>7,
                        "biaya"=>$get->kelas7,
            ]);
            
            
            return redirect('ekg/popup-window/popup-ItemTestToPP');
        }
        public function updateITPP(request $get){
            if (ISSET($get->id)){
                DB::table('ekg_itempemeriksaan')->where('iditemekg', $get->id)->update([
                    'namaitem' => $get->name,
                    'biaya_rawatjalan' => $get->biayaRJ,
                    'biaya_pasienluar' => $get->biayaPL,
                    'idgrup' => $get->idG,
                    'dokterbaca_lk' => $get->komenLK,
                    'dokterbaca_pr' => $get->komenPR,
                    'idklaim' => $get->eklaim,
                ]);
                DB::select('UPDATE ekg_itembiaya_rawatinap SET biaya = '.$get->kelas1.' WHERE iditemekg = '.$get->id.' AND kodekelas = 1');
                DB::select('UPDATE ekg_itembiaya_rawatinap SET biaya = '.$get->kelas2.' WHERE iditemekg = '.$get->id.' AND kodekelas = 2');
                DB::select('UPDATE ekg_itembiaya_rawatinap SET biaya = '.$get->kelas3.' WHERE iditemekg = '.$get->id.' AND kodekelas = 3');
                DB::select('UPDATE ekg_itembiaya_rawatinap SET biaya = '.$get->kelas4.' WHERE iditemekg = '.$get->id.' AND kodekelas = 4');
                DB::select('UPDATE ekg_itembiaya_rawatinap SET biaya = '.$get->kelas5.' WHERE iditemekg = '.$get->id.' AND kodekelas = 5');
                DB::select('UPDATE ekg_itembiaya_rawatinap SET biaya = '.$get->kelas6.' WHERE iditemekg = '.$get->id.' AND kodekelas = 6');
                DB::select('UPDATE ekg_itembiaya_rawatinap SET biaya = '.$get->kelas7.' WHERE iditemekg = '.$get->id.' AND kodekelas = 7');
                return redirect('ekg/popup-window/popup-ItemTestToPP');
            }
            else {
                return redirect()->back();
            }
        }
        public function deleteIPP(Request $get){
            if ($get->hapus=='false') {
                return redirect('ekg/popup-window/popup-ItemTestToPP');
            }
            else{
                DB::table('ekg_itempemeriksaan')->where('iditemekg',$get->id)->delete();
                return redirect('ekg/popup-window/popup-ItemTestToPP');
            }
        }
        

    public function dataPemeriksaan(){
        // $pemeriksaan = EkgPemPes::all();
        $pemeriksaan = DB::table('ekg_test')
                                ->leftjoin('ekg_pasienluar','ekg_pasienluar.notest','=','ekg_test.notest')
                                ->leftjoin('ekg_testdetail','ekg_testdetail.notest','=','ekg_test.notest')
                                ->select('ekg_test.*','ekg_pasienluar.namapasien','ekg_testdetail.biaya')->get();
        return view('ekg/data-pemeriksaan',[
            "title" => "Elektrokardiogram",
            'pemeriksaan' => $pemeriksaan,
        ]);
    }
}
// ALTER TABLE test_table DROP idtest ;
// ALTER TABLE test_table ADD  idtest INT( 11 ) NOT NULL AUTO_INCREMENT FIRST ,ADD PRIMARY KEY (idtest);