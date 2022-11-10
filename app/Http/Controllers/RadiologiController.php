<?php

namespace App\Http\Controllers;

use App\Models\grup;
use App\Models\itemtest;
use App\Models\film;
use App\Models\klaim;
use App\Models\biaya;
use App\Models\pasienluar;
use App\Models\test;
use App\Models\testdetail;
use App\Models\testfilm;
use App\Models\kelas;
use Dotenv\Validator;
use PDF;
use Session;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use Illuminate\Auth\Events\Validated;
use Illuminate\Auth\Middleware\RequirePassword;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use phpDocumentor\Reflection\PseudoTypes\False_;
use phpDocumentor\Reflection\Types\Null_;
use Symfony\Contracts\Service\Attribute\Required;

class RadiologiController extends Controller
{
    public function index()
    {
        return view("radiologi", [
            "title" => "radiologi"
        ]);
    }
    /** Group */
    public  function group()
    {
        $data = DB::select('select*from rad_grup');
        return view("/radiologi/group", [
            "title" => "group"
        ])->with('data', $data);
    }
    public function tinjaug()
    {
        $data = grup::all();
        $pdf = PDF::loadview('/radiologi/formgrup/pratinjau', ['data' => $data]);
        return $pdf->stream();
    }
    public function vaddg()
    {
        $data = grup::all();
        return view('/radiologi/formgrup/add', [
            "title" => "Add-Group"
        ])->with('data', $data);
    }
    public function addgroup(Request $request)
    {
        if ($request->isMethod('POST')) {
            $validate =  \Validator::make($request->all(), [
                'grup' => 'required|max:30'
            ]);
            if ($validate->fails()) {
                return redirect('/radiologi/group/add');
            } else {
                $grup = new grup;
                $grup->grup = $request->input('grup');
                $grup->save();
                return redirect('/radiologi/group/add');
            }
        } else {
            return view('/radiologi/formgrup/add');
        }
    }
    public function veg(Request $request, $id = '')
    {
        $data2 = grup::all();
        if (!empty($id)) {
            $data  = grup::where('idgrup', $id)->first();
        } else {
            $data  = [
                'grup' => ''
            ];

            $data = json_decode(json_encode($data), FALSE);
        }
        if ($request->isMethod('POST') && !empty($data->grup)) {
            $validate = \Validator::make($request->all(), [
                'grup' => 'required|max:30'
            ]);
            if ($validate->fails()) {
                return redirect('/radiologi/group/edit');
            } else {
                $grup = grup::where('idgrup', $id)
                    ->update([
                        'grup' => $request['grup']
                    ]);
                if ($grup) {
                    return redirect('/radiologi/group/edit/' . $id);
                }
            }
        }
        return view('/radiologi/formgrup/edit', [
            'data2' => $data2,
            'title' => 'Edit Group',
            'data' => $data
        ]);
    }
    public function deletegroup(Request $request, $id = '')
    {
        $data = grup::all();
        if (!empty($id)) {

            $data2 = grup::where('idgrup', $id)->first();
        } else {
            $data2 = [
                'grup' => ''
            ];
            $data2 = json_decode(json_encode($data2), FALSE);
        }
        if ($request->isMethod('POST') && !empty($data2->grup)) {
            $grup = grup::where('idgrup', $id)->delete();
            if ($grup) {
                return redirect('/radiologi/group/delete');
            }
        }
        return view('radiologi/formgrup/hapus', [
            'data2' => $data2,
            'data' => $data,
            'title' => 'Delete Group'
        ]);
    }
    public function searchgroup(Request $request)
    {
        $cari = $request->cari;
        $data = DB::table('rad_grup')
            ->where('grup', 'like', "%" . $cari . "%")
            ->paginate();
        return view('/radiologi/group', [
            "data" => $data,
            "title" => "group"
        ]);
    }
    /**item test */
    public function itemtest()
    {
        $grup = grup::all();
        $data = itemtest::get();
        $klaim = klaim::all();

        return view('/radiologi/itemtest', [
            "title" => "item-test",
            'data' => $data,
            'klaim' => $klaim,
            'grup' => $grup,

        ]);
    }
    public function additem(Request $request)
    {
        $grup = grup::all();
        $klaim = klaim::all();
        $data = itemtest::all();
        if ($request->isMethod('POST')) {
            $validate = \Validator::make($request->all(), [
                'namaitem' => 'required|max:50',
                'biaya_rawatjalan' => 'required|max:15',
                'biaya_pasienluar' => 'required|max:15',
                'dokterbaca_lk' => '',
                'dokterbaca_pr' => '',
                'idklaim' => '',
                'idgrup' => ''

            ]);
            if ($validate->fails()) {
                return redirect('/radiologi/item-test/add');
            } else {
                $item = new itemtest();
                $item->namaitem = $request['namaitem'];
                $item->biaya_rawatjalan = $request['biaya_rawatjalan'];
                $item->biaya_pasienluar = $request['biaya_pasienluar'];
                $item->dokterbaca_lk = $request['dokterbaca_lk'];
                $item->dokterbaca_pr = $request['dokterbaca_pr'];
                $item->idklaim = $request['idklaim'];
                $item->idgrup = $request['idgrup'];

                $item->save();
                if ($item) {
                    return redirect('/radiologi/item-test/add');
                }
            }
        }
        return view('/radiologi/formitem/add', [

            'title' => 'Add item-test',
            'data' => $data,
            'klaim' => $klaim,
            'grup' => $grup
        ]);
    }
    public function edititem(Request $request, $id = '')
    {
        $grup = grup::all();
        $klaim = klaim::all();
        $data = itemtest::all();
        if (!empty($id)) {
            $data2  = itemtest::where('iditemrad', $id)->first();
        } else {
            $data2  = [
                'namaitem' => '',
                'biaya_rawatjalan' => '',
                'biaya_pasienluar' => '',
                'idgrup' => '',
                'dokterbaca_lk' => '',
                'dokterbaca_pr' => '',
                'idklaim' => '',

            ];
            $data2 = json_decode(json_encode($data2), FALSE);
        }
        if ($request->isMethod('POST') && !empty($data2->namaitem)) {
            $validate = \Validator::make($request->all(), [
                'namaitem' => 'required|max:50',
                'biaya_rawatjalan' => 'required|max:12',
                'biaya_pasienluar' => 'required|max:12',
                'dokterbaca_lk' => '',
                'dokterbaca_pr' => '',
                'idklaim' => 'required',
                'idgrup' => '',


            ]);
            if ($validate->fails()) {
                Session::flash('error', $validate->errors()->all());
                return redirect('/radiologi/item-test/edit');
            } else {
                $item = itemtest::where('iditemrad', $id)
                    ->update([
                        'namaitem' => $request['namaitem'],
                        'biaya_rawatjalan' => $request['biaya_rawatjalan'],
                        'biaya_pasienluar' => $request['biaya_pasienluar'],
                        'dokterbaca_lk' => $request['dokterbaca_lk'],
                        'dokterbaca_pr' => $request['dokterbaca_pr'],
                        'idklaim' => $request['idklaim'],
                        'idgrup' => $request['idgrup']

                    ]);
                if ($item) {
                    return redirect('/radiologi/item-test/edit/' . $id);
                }
            }
        }
        return view('/radiologi/formitem/edit', [
            'data2' => $data2,
            'title' => 'Edit item-test',
            'data' => $data,
            'klaim' => $klaim,
            'grup' => $grup
        ]);
    }
    public function hapusi(Request $request, $id = '')
    {
        $klaim = klaim::all();
        $data = itemtest::all();

        if (!empty($id)) {

            $data2 = itemtest::where('iditemrad', $id)->first();
        } else {
            $data2 = [
                'namaitem' => '',
                'biaya_rawatjalan' => '',
                'biaya_pasienluar' => '',
                'idgrup' => '',
                'idklaim' => '',
                'dokterbaca_lk' => '',
                'dokterbaca_pr' => ''
            ];
            $data2 = json_decode(json_encode($data2), FALSE);
        }
        if ($request->isMethod('POST') && !empty($data2->namaitem)) {
            $item = itemtest::where('iditemrad', $id)->delete();
            if ($item) {
                return redirect('/radiologi/item-test/delete');
            }
        }
        return view('radiologi/formitem/hapus', [
            'data2' => $data2,
            'klaim' => $klaim,
            'data' => $data,
            'title' => 'delete item'
        ]);
    }
    public function tinjaui()
    {
        $data = itemtest::all();
        $pdf = PDF::loadview('/radiologi/formitem/pratinjau', ['data' => $data]);
        return $pdf->stream();
    }
    public function searchitem(Request $request)
    {
        $cari = $request->cari;
        $validate = \Validator::make($request->all(), [
            'cari' => 'max:30'
        ]);
        if ($validate->fails()) {
            return redirect('/radiologi/item-test');
        } else {
            $grup = grup::all();
            $klaim = klaim::all();
            $data = DB::table('rad_itempemeriksaan')
                ->where('namaitem', 'like', "%" . $cari . "%")
                ->paginate();
            return view('/radiologi/itemtest', [
                'data' => $data,
                "title" => "item-test",
                'klaim' => $klaim,
                'grup' => $grup
            ]);
        }
    }
    /**Film */
    public function film()
    {
        $data = film::all();
        return view('/radiologi/film', [
            "title" => "film"
        ])->with('data', $data);
    }
    public function vfa()
    {
        $data = film::all();
        return view('/radiologi/formfilm/add', [
            "title" => "Add-film"
        ])->with('data', $data);
    }
    public function addfilm(Request $request)
    {
        if ($request->isMethod('POST')) {
            $validate =  \Validator::make($request->all(), [
                'namafilm' => 'required|max:20',
                'ukuran' => 'required|max:11',
            ]);
            if ($validate->fails()) {
                return redirect('/radiologi/film/add');
            } else {
                $grup = new film;
                $grup->namafilm = $request['namafilm'];
                $grup->ukuran = $request['ukuran'];
                $grup->save();
                return redirect('/radiologi/film/add');
            }
        } else {
            return view('/radiologi/formfilm/add');
        }
    }
    public function editfilm(Request $request, $id = '')
    {
        $data2 = film::all();
        if (!empty($id)) {
            $data  = film::where('idfilm', $id)->first();
        } else {
            $data  = [
                'namafilm' => '',
                'ukuran' => ''
            ];

            $data = json_decode(json_encode($data), FALSE);
        }
        if ($request->isMethod('POST') && !empty($data->namafilm)) {
            $validate = \Validator::make($request->all(), [
                'namafilm' => 'required|max:20',
                'ukuran' => 'required|max:11'
            ]);
            if ($validate->fails()) {
                return redirect('/radiologi/film/edit');
            } else {
                $film = film::where('idfilm', $id)
                    ->update([
                        'namafilm' => $request['namafilm'],
                        'ukuran' => $request['ukuran']
                    ]);
                if ($film) {
                    return redirect('/radiologi/film/edit/' . $id);
                }
            }
        }
        return view('/radiologi/formfilm/edit', [
            'data2' => $data2,
            'title' => 'Edit Film',
            'data' => $data
        ]);
    }
    public function hapusfilm(Request $request, $id = '')
    {
        $data = film::all();
        if (!empty($id)) {

            $data2 = film::where('idfilm', $id)->first();
        } else {
            $data2 = [
                'namafilm' => '',
                'ukuran' => ''
            ];
            $data2 = json_decode(json_encode($data2), FALSE);
        }
        if ($request->isMethod('POST') && !empty($data2->namafilm)) {
            $film = film::where('idfilm', $id)->delete();

            if ($film) {
                return redirect('/radiologi/film/delete');
            }
        }
        return view('radiologi/formfilm/hapus', [
            'data2' => $data2,
            'data' => $data,
            'title' => 'Delete Film'
        ]);
    }
    public function tinjauf()
    {
        $data = film::all();
        $pdf = PDF::loadview('/radiologi/formfilm/pratinjau', ['data' => $data]);
        return $pdf->stream();
    }
    public function searchfilm(Request $request)
    {
        $cari = $request->cari;
        $data = DB::table('rad_film')
            ->where('namafilm', 'like', "%" . $cari . "%")
            ->paginate();
        return view('/radiologi/film', [
            'data' => $data,
            "title" => "film"
        ]);
    }
    /**pemeriksaan pasien*/
    public function periksa()
    {
        $data = itemtest::all();
        return view('/radiologi/pemeriksaanpasien', [
            "title" => "pemeriksaan",
            'data' => $data
        ]);
    }
    public function periksa2()
    {
        return view('/radiologi/pemeriksaanpasien2', [
            "title" => "pemeriksaan"
        ]);
    }
    public function addr(Request $request)
    {
        $data8 = itemtest::all();
        if ($request->isMethod('POST')) {
            $validate =  \Validator::make($request->all(), [
                'jenisrawat' => 'required',
                'nodaftar' => 'required|max:20',
                'tgltest' => 'required',
                'iddokter_periksa' => 'required|max:20',
                'iddokter_kirim' => 'required|max:20',
                'dokterluar' => 'required|max:50',
                'idkaryawan' => 'required|max:20',
                'cito' => '',
                'kodepoli' => '',
                'kodekamar' => '',
                'diagnosa' => 'required',

                'norm' => 'max:10',
                'namapasien' => '',
                'alamat' => '',
                'jeniskelamin' => '',
                'telepon' => '',
                'notest' => '',
                'tgllahir' => '',

                'nourut' => '',
                'iditemrad' => 'required',
                'kilovolt' => 'required',
                'milliamperesecond' => 'required',
                'expose' => 'required',

                'idfilm' => 'required',
                'biaya' => 'required',
                'iditemrad' => 'required',
                'digunakan' => '',
                'ditolak' => ''

            ]);

            if ($validate->fails()) {
                Session::flash('error', $validate->errors()->all());
                return redirect('/radiologi/pemeriksaan-pasien');
            } else {
                $nourut = IdGenerator::generate(['table' => 'rad_testdetail', 'field' => 'nourut', 'length' => 11, 'prefix' => ('ANTRN-')]);
                $notest = IdGenerator::generate(['table' => 'rad_test', 'field' => 'notest', 'length' => 11, 'prefix' => ('PPR')]);
                $periksa2 = new pasienluar;
                $periksa = new test;
                $periksa4 = new testfilm;
                $periksa3 = new testdetail;


                $periksa->notest = $notest;
                $periksa->jenisrawat = $request['jenisrawat'];
                $periksa->nodaftar = $request['nodaftar'];
                $periksa->tgltest = $request['tgltest'];
                $periksa->iddokter_periksa = $request['iddokter_periksa'];
                $periksa->iddokter_kirim = $request['iddokter_kirim'];
                $periksa->dokterluar = $request['dokterluar'];
                $periksa->idkaryawan = $request['idkaryawan'];
                $periksa->cito = $request['cito'];
                $periksa->kodepoli = $request['kodepoli'];
                $periksa->diagnosa = $request['diagnosa'];
                $periksa->kodekamar = $request['kodekamar'];

                $periksa->norm = $request['norm'];

                $periksa3->nourut = $nourut;
                $periksa3->iditemrad = $request['iditemrad'];
                $periksa3->biaya = $request['biaya'];

                $periksa3->notest = $notest;
                $periksa3->kilovolt = $request['kilovolt'];
                $periksa3->milliamperesecond = $request['milliamperesecond'];
                $periksa3->expose = $request['expose'];

                $periksa4->notest = $notest;
                $periksa4->iditemrad = $request['iditemrad'];
                $periksa4->idfilm = $request['idfilm'];
                $periksa4->digunakan = $request['digunakan'];
                $periksa4->ditolak = $request['ditolak'];

                if ($request->norm == '000000') {

                    $periksa2->namapasien = $request['namapasien'];
                    $periksa2->alamat = $request['alamat'];
                    $periksa2->jeniskelamin = $request['jeniskelamin'];
                    $periksa2->telepon = $request['telepon'];
                    $periksa2->notest = $notest;
                    $periksa2->tgllahir = $request['tgllahir'];
                    $periksa2->save();
                }

                $periksa4->save();
                $periksa3->save();
                $periksa->save();

                return redirect(
                    '/radiologi/pemeriksaan-pasien'
                );
            }
        } else {
            return redirect('/radiologi/pemeriksaan-pasien');
        }
    }

    /**data */
    public function data()
    {

        $data = test::all();
        return view('/radiologi/datapemeriksaan', [
            "title" => "data pemeriksaan",
            'data' => $data

        ]);
    }
    // public function searchdata(Request $request)
    // {
    //     $cari = $request->cari;
    //     $data = DB::table('rad_test')
    //         ->where('notest', 'like', "%" . $cari . "%")
    //         ->paginate();
    //     return view('/radiologi/datapemeriksaan', [
    //         'data' => $data,
    //         "title" => "test"
    //     ]);
    // }
    /**laporan */
    public function laporan()
    {

        return view('/radiologi/laporanradiologi', [
            "title" => "laporan radiologi"
        ]);
    }
    public function addlap()
    {
        return view('/radiologi/formlaporan/add', [
            'title' => 'add-laporan'
        ]);
    }

    /**laporan 2 */
    public function laporan2()
    {
        return view('/radiologi/laporan2', [
            "title" => "Laporan Radiologi"
        ]);
    }
    /**popup */
    public function gpop(Request $request, $id = '')
    {
        $data = grup::all();
        if (!empty($id)) {
            $data2  = grup::where('idgrup', $id)->first();
        } else {
            $data2  = [
                'grup' => '',
                'idgrup' => ''
            ];

            $data2 = json_decode(json_encode($data2), FALSE);
        }
        if ($request->isMethod('POST') && !empty($data2->grup)) {
            $item = itemtest::where('idgrup', $id)->update([
                'idgrup' => $request('idgrup')
            ]);

            if ($item) {
                return view('/radiologi/item-test/edit');
            }
        }

        return view('/radiologi/popup/groupop', [
            'data' => $data,
            'data2' => $data2
        ]);
    }
}
