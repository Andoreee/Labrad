
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
<link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
<link rel="stylesheet" href="/resources/demos/style.css">
<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
<script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
@extends('template.popup')

@section('body')
    

<div>
    <div style="background-color:#97B903;">
        <table>
            <tr>
                <td>
                    <img src="{{asset('/img/menu/radiologi/pemeriksaan pasien.png')}}" width="40">
                </td>
                <td>
                    <h5 style="margin-top: 6px;">Radiologi - Pemeriksaan Pasien</h5>
                </td>
            </tr>
            <button onclick="window.close()" type="button" class="btn-close btn-close-white  ms-2 m-2" style="float:right;" aria-label="Close"></button>

        </table>
    </div>
    <div class="container-fluid" >
        @if(session('error'))
        <div class="alert alert-danger">
            @foreach(session('error') as $error )
            <p>{{$error}}</p>
            @endforeach
        </div>
        @endif
        <form  autocomplete="off" action="/pkl/radiologi/pemeriksaan-pasien/add" method="POST" >
            @csrf
            <div class="row">
                <div class="col-9">
                    <div class="row">
                        <div class="col mt-2">
                            <fieldset class="border border-secondary p-2">
                                <legend class="float-none w-auto p2 fs-6" >
                                    Jenis Rawat
                                </legend>
                                <div class="form-check form-check-inline">
                                    <input name="jenisrawat" id="yy" value="rawat jalan" class="form-check-input" type="radio">
                                    <label class="form-check-label" for="inlineRadio1">Rawat Jalan</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input name="jenisrawat" value="rawat inap" class="form-check-input" type="radio">
                                    <label class="form-check-label" id="inp" for="inlineRadio2">Rawat Inap</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input name="jenisrawat" value="pasien luar" class="form-check-input" type="radio">
                                    <label class="form-check-label" id="pr" for="inlineRadio2">Pasien Luar</label>
                                </div>
                            </fieldset>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col">
                            <div class="row">
                                <div class="col-6">
                                    <table class="mt-2">
                                        <thead>
                                            <tr>
                                                <th></th>
                                                <th></th>
                                                <th></th>
                                            </tr>
                                        <tbody>
                                            <tr>
                                                <td><input type="text" name="notest" id="" hidden></td>
                                            </tr>
                                            <tr>
                                                <td style="text-align:right;"><label for="">No Pendaftaran :</label></td>
                                                <td><input type="text" name="nodaftar" id="" style="width:100%;" maxlength="20"></td>
                                                <td><button><img src="{{asset('/img/others/pratinjau.png')}}" alt="" width="20"></button></td>
                                            </tr>
                                            <tr>
                                                <td style="text-align:right;"><label for="">Tanggal :</label></td>
                                                <td colspan="2"><input type="datetime-local" name="tgltest" id="" style="width:100%;"></td>
                                            </tr>
                                            <tr>
                                                <td style="text-align:right;"><label for="">Dokter Pemeriksa :</label></td>
                                                <td><input type="text" name="iddokter_periksa" id="" style="width:100%;" maxlength="20"></td>
                                                <td><button><img src="{{asset('/img/others/pratinjau.png')}}" alt="" width="20"></button></td>
                                            </tr>
                                            <tr>
                                                <td style="text-align:right;"><label for="">Dokter Kirim :</label></td>
                                                <td><input type="text" name="iddokter_kirim" id="" style="width:100%;" maxlength="20"></td>
                                                <td><button><img src="{{asset('/img/others/pratinjau.png')}}" alt="" width="20"></button></td>
                                            </tr>
                                            <tr>
                                                <td style="text-align:right;"><label for="">Dokter Luar :</label></td>
                                                <td><input type="checkbox" name="" id="cek"><input style="margin-left:6px;" type="text" name="dokterluar" id="box" maxlength="30"></td>

                                            </tr>
                                            <tr>
                                                <td style="text-align:right;"><label for="">Petugas :</label></td>
                                                <td><input type="text" name="idkaryawan" id="" style="width:100%;" maxlength="20"></td>
                                                <td><button><img src="{{asset('/img/others/pratinjau.png')}}" alt="" width="20"></button></td>
                                            </tr>
                                            <tr>
                                                <td style="text-align:right;"><label for="">Cito</label></td>
                                                <td><input type="checkbox" name="cito" id=""></td>
                                            </tr>
                                        </tbody>
                                        </thead>
                                    </table>
                                </div>
                                <div class="col-6">
                                     <fieldset class="border border-secondary p-2">
                                        <legend class="float-none w-auto p2 fs-6">
                                            Informasi Pasien
                                        </legend>
                                        <table id="tbl">
                                            <thead>
                                                <tr>
                                                    <th style="width:30%;"></th>
                                                    <th style="width:70%;"></th>
                                                </tr>
                                            </thead>
                                            <tbody id="lang">
                                                <tr>
                                                    <td><input type="text" name="notest" id="" hidden></td>
                                                </tr>
                                                <tr>
                                                    <td style="text-align:right;"><label for="">Medical Record:</label></td>
                                                    <td><input type="text" name="norm" id="medical" style="width:40%;" maxlength="10"><button style="margin-left:2px;"><img src="{{asset('/img/others/pratinjau.png')}}" alt="" width="20"></button>
                                                        <p style="font-size:12px;color:red;display:inline-block;margin-left:5px;"> <i> *khusus pasien<br>luar No RM = 000000*</i></p>
                                                    </td>

                                                </tr>
                                                <tr>
                                                    <td style="text-align:right;"><label for="">Nama Pasien :</label></td>
                                                    <td><input  readonly type="text" name="namapasien" id="" style="width:100%;" maxlength="50"></td>
                                                </tr>
                                                <tr>
                                                    <td style="text-align:right;"><label for="">Alamat :</label></td>
                                                    <td><input readonly type="text" name="alamat" id="" style="width:100%;" maxlength="60 "></td>
                                                </tr>
                                                <tr>
                                                    <td style="text-align:right;"><label for="">Jenis Kelamin:</label></td>
                                                    <td>
                                                        <select disabled name="jeniskelamin" class=" form-select-sm " style="width:21%; " id="select">
                                                            <option selected></option>
                                                            <option value="laki-laki">Laki-Laki</option>
                                                            <option value="perempuan">Perempuan</option>
                                                        </select>
                                                        <label for="" style="text-align:right;">Telp:<input  readonly type="tel" name="telepon" id="" style="width:45%;margin-left:8px;"></label>
                                                    </td>
                                                </tr>
                                               <tr>
                                                    <td style="text-align:right;"><label for="datepicker">Tanggal Lahir:</label></td>
                                                    <td><input  disabled readonly autocomplete="off" class="ui-widget" name="tgllahir" id="datepicker" style="width:49%;"><label style="text-align:right;">Umur :</label><input disabled readonly type="text" name="" id="age" style="width: 35%;">
                                                    </td>
                                                </tr>                                                <tr>
                                                    <td style="text-align:right;"><label for="" id="kopo">PoliKlinik :</label></td>
                                                    <td><input type="text" name="kodepoli" id="na" style="width:100%;" maxlength="5"></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </fieldset>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-7">
                                    <table class="table table-bordered  table-light justify-content-center">
                                        <thead class="text-center">
                                            <tr>
                                                <th rowspan="2" style="vertical-align:middle;">Item Pemeriksaan</th>
                                                <th rowspan="2" style="vertical-align:middle;">Biaya</th>
                                                <th colspan="2" style="vertical-align:middle;">Faktor Radiasi</th>
                                                <th rowspan="2" style="vertical-align:middle;">Expose</th>
                                            </tr>
                                            <tr>
                                                <th>kv</th>
                                                <th>mAs</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td hidden><input type="text" name="notest" id=""></td>
                                                <td hidden><input type="text" name="nourut" id=""></td>
                                                <td scope="row">
                                                    <select name="iditemrad" class="form-select form-select-sm" aria-label=".form-select-sm example">
                                                        <option value="" selected></option>
                                                        @foreach($data as $d)
                                                        <option value="{{ App\Models\itemtest::getid($d->iditemrad) }}">{{$d->namaitem}}</options>
                                                            @endforeach
                                                    </select>
                                                </td>
                                                <td scope="row"><input type="text" name="biaya" id="" style="border:none; outline:none; background-color: transparent; width:100%;"></td>
                                                <td scope="row"><input type="text" name="kilovolt" id="" style="border:none; outline:none; background-color: transparent; width:100%;"></td>
                                                <td scope="row"><input type="text" name="milliamperesecond" id="" style="border:none; outline:none; background-color: transparent; width:100%;"></td>
                                                <td scope="row"><input type="text" name="expose" id="" style="border:none; outline:none; background-color: transparent; width:100%;"></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class=" col-5">
                                    <table class="table table-bordered  table-light">
                                        <thead class="text-center">
                                            <tr>
                                                <th rowspan="2" style="vertical-align:middle;">Ukuran Film</th>
                                                <th colspan="2"  style="width:60%;">Jumlah Film</th>
                                            </tr>
                                            <tr>
                                                <th>digunakan</th>
                                                <th>ditolak</th>
                                            </tr>
                                        </thead>
                                                                               <tbody >

                                            <tr>
                                                <td hidden><input type="text" name="notest" id=""></td>
                                                <td>
                                                    <select name="idfilm" class="form-select form-select-sm" aria-label=".form-select-sm example" >
                                                        <option  value="" selected></option>
                                                        @foreach($test as $t)
                                                        <option value="{{App\Models\film::getid($t->idfilm)}}">{{$t->namafilm}}</options>
                                                            @endforeach
                                                    </select>
                                                </td>
                                                <td scope="row">
                                                    <input  type="text" placeholder="0" name="digunakan" id="" style="border:none; outline:none; background-color: transparent;  width:30%;">
                                                </td>
                                                <td scope="row">
                                                    <input type="text" placeholder="0" name="ditolak" id="" style="border:none; outline:none; background-color: transparent;  width:30%;" >
                                                </td>
                                            </tr>

                                        </tbody>                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="" class="col-1 col-form-label">Subtotal</label>
                        <div class="col-6">
                            <input type="number" class="form-control" id="">
                        </div>
                    </div>
                </div>
                <div class="col-3 mt-1">
                    <table class="table table-bordered  table-light" style="height: 65%;">
                        <thead class="text-center">
                            <tr>
                                <th rowspan="2"></th>
                                <th colspan="2">Riwayat</th>
                            </tr>
                            <tr>
                                <th>No rad</th>
                                <th>Tanggal</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td></td>
                                <td scope="row">1</td>
                                <td scope="row">2</td>
                            </tr>
                        </tbody>
                    </table>
                    <label>Diagnosa</label>
                    <textarea name="diagnosa" style="resize:none; width: 100%; height:30%;outline:none;"></textarea>
                </div>
            </div>
            <div class="row">
                <div class="col text-center">
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                        <label class="form-check-label" for="defaultCheck1">
                            Cetak
                        </label>
                    </div>
                    <button><img src="{{asset('/img/others/cancel.png')}}" alt="" height="20">Batal</button>
                    <button><img src="{{asset('/img/others/simpan.png')}}" alt="" height="20">Simpan</button>
                </div>
            </div>
        </form>
        
    </div>
</div>
<script type="text/javascript">
    $(function() {
        $(document).ready(function() {
            var age = "";
            $('#datepicker').datepicker({
                onSelect: function(value, ui) {
                    var today = new Date();
                    age = today.getFullYear() - ui.selectedYear;
                    $('#age').val(age);
                },
                changeMonth: true,
                changeYear: true
            })
        })
    });
    $(function() {
        checkbox();
        $("#cek").click(checkbox);
    });

    function checkbox() {
        if (this.checked) {
            $("#box").removeAttr("disabled");
        } else {
            $("#box").attr("disabled", true);
        }
    }
</script>
<script>
    var update_label = function() {
        if ($('#yy').is(':checked')) {
            $('#kopo').html("Poliklinik:");
            $('#na').attr('name', 'kodepoli');
            $("#tbl").find("input,button,textarea,select").attr("readonly", true);
            $('#na').attr("readonly", false);
            $('#select, #datepicker, #age').attr("disabled", true);
            $('#medical').prop("readonly", false);
        } else {
            $('#kopo').html("Kelas / Ruang:");
            $('#na').attr('name', 'kodekamar');
            $("#tbl").find("input,button,textarea,select").attr("readonly", false);
            $('#select, #datepicker, #age').attr("disabled", false);
            $('#medical').prop("readonly", false);
        }
    };;
    $("input[type=radio]").change(update_label);
</script>

@endsection