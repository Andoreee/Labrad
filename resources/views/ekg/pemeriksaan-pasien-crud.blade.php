<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>LABRAD TRY | Elektorkardiagram</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>
<body>
    <div class="" style="background-color: #97B903;" >

        <table>

            <tr>

                <td>

                    <img src="{{ asset('/img/menu/radiologi/pemeriksaan pasien.png')}}" width="20" height="20" style="margin: 15px;">

                </td>

                <td>

                    <h5 style="padding-top: 6px">Elektrokardiogram - Pemeriksaaan Pasien</h5>  

                </td>

            </tr>

            <a href="javascript:void(0)" onclick="window.close()" class="btn btn-danger mt-2" style="float: right"> <b>X</b> </a>

        </table>

    </div>
{{-- POP UP DISINI --}}



<div class="modal fade" id="itemtest" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
      <div class="modal-content">
        <div class="modal-body">
          ...
        </div>
      </div>
    </div>
  </div>


    <form style="background-color: #F0F0F0" id="form1" method="post" action="{{ route('addPP') }}">
    
    @csrf

        <div class="row">

            <div class="col-8" style="">

                <div class="row">

                    <div class="col-6">

                <fieldset class="border p-2" style="border: #DCDCDC;margin-left:7%">

                    <legend class="float-none w-auto p-2" style="font-size: 15px;">

                        Jenis Rawat

                    </legend>

                    <div class="row" style="margin-left: 15px">

                    <div class="col-4"><input type="radio" id="rj" value="rawat jalan" name="jenisrawat" checked><label for="rj">Rawat Jalan</label></div>

                    <div class="col-4"><input type="radio" id="ri" value="rawat inap" name="jenisrawat"><label for="ri">Rawat Inap</label></div>

                    <div class="col-4"><input type="radio" id="pl" value="pasien luar" name="jenisrawat"><label for="pl">Pasien Luar</label></div>

                    </div>

                </fieldset>

                </div>

                </div>

                <div class="row">

                    <div class="col-6">

                <div class="allForm" style="justify-content: end;" id="form1">

                    {{-- <div class="col-auto"> --}}

                    <table align="right" class="form2" style="margin-top:2%">

                        <thead>

                            <tr>

                                <th width=31%></th><th width=69% style="margin-left: 5px;"></th>

                            </tr>

                        </thead>

                        <tbody>

                        <tr>

                            <td style="text-align: right"><label for="NoPen">No Pendaftaran :</label></td>

                            <td><input type="text" id="NoPen" style="width: 86%;margin-right:5px" name="NoPen" maxlength="20"><button type="button" id="disabledbtn1"><img src="{{ asset('/img/others/pratinjau.png') }}" width="20" height="20"></button></td> 

                        </tr>

                        <tr>

                            <td style="text-align: right"><label for="Date">Tanggal :</label></td>

                            <td><input type="datetime-local" id="Date" style="width: 100%" name="Date"></td>

                        </tr>

                        <tr>

                            <td style="text-align: right"><label for="DokPem">Dokter Pemeriksa :</label></td>

                            <td><input type="text"id="DokPem" style="width: 86%;margin-right:5px" name="DokPem" maxlength="20"><button type="button"><img src="{{ asset('/img/others/pratinjau.png') }}" width="20" height="20"></button></td>

                        </tr>

                        <tr>

                            <td style="text-align: right"><label for="DokKir">Dokter Kirim :</label></td>

                            <td><input  type="text"id="DokKir" style="width: 86%;margin-right:5px" name="DokKir" maxlength="20"><button type="button"><img src="{{ asset('/img/others/pratinjau.png')}}" width="20" height="20"></button></td>

                        </tr>

                        <tr>

                            <td style="text-align: right"><label for="DokLuar">Dokter Luar :</label></td>

                            <td><input type="checkbox" name="" id="DokLuar"><input name="DokLuar"  maxlength="50" type="text"id="DokLuar1" style="width: 80%;margin-left:5px;"></td>

                        </tr>

                        <tr>

                            <td style="text-align: right"><label for="Petugas">Petugas :</label></td>

                            <td><input name="Petugas" type="text"id="Petugas" style="width: 86%;margin-right:5px" maxlength="20"><button type="button"><img src="{{ asset('/img/others/pratinjau.png')}}" width="20" height="20"></button></td>

                        </tr>

                        <tr><td style="text-align: right"><label for="Cito">Cito :</label></td>

                            <td><input type="checkbox" name="Cito" id="Cito" style=""></td>

                        </tr>

                        </tbody>

                    </table>

                </div>

                </div>

                <div class="col-6" style="margin-top:-15px">

                    <fieldset class="border p-2" style="border: #DCDCDC">

                        <legend class="float-none w-auto p-2" style="font-size: 15px;">Informasi Pasien</legend>

                            <div class="allForm" style="justify-content: end;" id="form2">

                                {{-- <div class="col-auto"> --}}

                                <table align="right" class="form2" id="form2">

                                    <thead>

                                        <tr>

                                            <th width=30%></th><th width=70%></th>

                                        </tr>

                                    </thead>

                                    <tbody>

                                    <tr>

                                        <td style="text-align: right"><label >Medical Record:</label></td>

                                        <td>

                                            <input type="text" maxlength="10" style="width: 45%" name="noRM"><button type="button" id="disabledbtn2"><img src="{{ asset('/img/others/pratinjau.png')}}" width="20" height="20"></button>

                                            <p style="font-size: 12px;display:inline-block;color:red"><i>*khusus pasien luar<br>No RM = 000000</i></p>

                                        </td>

                                    </tr>

                                    <tr>

                                        <td style="text-align: right"><label >Nama Pasien:</label></td>

                                        <td><input readonly type="text" style="width: 100%" name="name" maxlength="50"></td>

                                    </tr>

                                    <tr>

                                        <td style="text-align: right"><label >Alamat:</label></td>

                                        <td><input readonly type="text" style="width: 100%" name="alamat" maxlength="60"></td>

                                    </tr>

                                    <tr>

                                        <td style="text-align: right"><label >Jenis Kelamin:</label></td>

                                        <td><select style="width: 45%;margin-right:13px;" name="jenisKel">

                                            <option value=""></option>

                                            <option value="Laki-Laki">Laki-Laki</option>

                                            <option value="Perempuan">Perempuan</option>

                                        </select><label for="">Telp:</label><input type="text" style="width: 39%" name="telp" maxlength="50"></td>

                                    </tr>

                                    <tr>

                                        <td style="text-align: right"><label >Tanggal Lahir:</label></td>

                                        <td><input type="date" style="width: 45%;margin-right:14px;" id="date" name="tglLahir"><label for="">Umur:</label><input disabled type="text" style="width: 35%" id="umur"></td>

                                    </tr>

                                    <tr>

                                        <td style="text-align: right"><label id="poli">Poliklinik:</label></td>

                                        <td><input readonly type="text" style="width: 100%" name="polikamar" maxlength="5"></td>

                                    </tr>

                                    </tbody>

                                </table>

                    </fieldset>

                </div>

                <div class="row">

                    <div class="col-6 mt-3">

                        <div style="margin-left: 10px;background-color: #ffffff;overflow-y:scroll;height: 200px">

                            <table class="table table-bordered">

                                <thead>

                                    <tr>

                                        <th rowspan="2" style="text-align:center;vertical-align:middle">Item Pemeriksaan</th>
                                        <th rowspan="2" style="text-align:center;vertical-align:middle">Biaya</th>
                                        <th colspan="2">Faktor Radiasi</th>
                                        <th rowspan="2" style="text-align:center;vertical-align:middle">Expose</th>
                                        
                                    </tr>
                                    <tr>

                                        <th style="text-align:center;">kv</th>
                                        <th style="text-align:center;">mAs</th>

                                    </tr>

                                </thead>
                                <tbody>

                                    <tr>

                                        <td><input type="" style="width:100%" class="inputable" id="itemfocus" onfocus="btnitem()"><button type="button" id="itembtn" style="float: right;display:none;" data-bs-toggle="modal" data-bs-target="#itemtest">...</button></td>
                                        <script>
                                            var a = document.getElementById("itembtn");
                                            var b = document.getElementById("itemfocus");
                                            function btnitem(){
                                                a.style.display = "block";
                                                b.style.width = "80%";

                                            }

                                        </script>
                                    </tr>

                                </tbody>

                            </table>

                        </div>

                    </div>

                    <div class="col-6 mt-3" style="background-color: #ffffff;overflow-y:scroll;height: 200px">

                        <table class="table table-bordered" style=";">

                            <thead>

                                <tr>

                                    <th rowspan="2" style="text-align:center;vertical-align:middle;width:40%">Ukuran Film</th>

                                    <th colspan="2" style="text-align:center">Jumlah Film</th>

                                </tr>

                                <tr>

                                    <th style="text-align:center">digunakan</th>

                                    <th style="text-align:center">ditolak</th>

                                </tr>

                            </thead>

                            <tbody>
                            
                                @foreach ($film as $a)

                                    <tr>

                                        <td>

                                          {{ $a->namafilm }}
                                          
                                        </td>

                                        <td>

                                            <input type="number" name="digunakan" class="inputable" value="0" onfocus="this.select();" max=2147483647>
                                            
                                          </td>

                                          <td>

                                            <input type="number" name="ditolak" class="inputable" value="0" onfocus="this.select();" max=2147483647>
                                            
                                          </td>

                                    </tr> 
                                @endforeach

                                

                            </tbody>

                        </table>

                    </div>

                </div>

                <div class="row" id="form3">

                    <div class="col-8 mt-4">

                        <div style="margin-left: 5%;margin-right:5%">

                            <h4>Kalibrasi EKG:</h4>

                            <table class="form2">

                                <thead>

                                    <tr>

                                        <th width=35%></th><th width=32%></th><th width=33%></th>

                                    </tr>

                                </thead>

                                <tbody>

                                <tr>

                                    <td style=""><label>a. Irama</label></td>

                                    <td>

                                        <select class="" style="width: 100%;background-color:#dcdcdc;height:28px;" name="irama">

                                            <option value=""></option>

                                            <option value="ireguler">ireguler</option>

                                            <option value="reguler">reguler</option>

                                        </select>

                                    </td>

                                    <td><input type="text" name="iramaKet" maxlength="50"></td>

                                </tr>

                                <tr>

                                    <td style=""><label >b. Frekuensijantung/ HR</label></td>

                                    <td colspan="2"><input type="text" name="frekuensiHrKet" style="width: 100%" maxlength="50"></td>

                                </tr>

                                <tr>

                                    <td style=""><label >c. Gelombang P</label></td>

                                    <td>

                                        <select class="" style="width: 100%;background-color:#dcdcdc;height:28px;" name="gelombangP">

                                            <option value=""></option>

                                            <option value="Normal">Normal</option>

                                            <option value="Tidak Normal">Tidak Normal</option>

                                        </select>

                                    </td>

                                    <td><input type="text" style="width: 100%" name="gelombangPKet" maxlength="50"></td>

                                </tr>

                                <tr>

                                    <td style=""><label >d. Interval PR</label></td>

                                    <td>

                                        <select class="" style="width: 100%;background-color:#dcdcdc;height:28px;" name="intervalPr">

                                            <option value=""></option>

                                            <option value="Normal">Normal</option>

                                            <option value="Tidak Normal">Tidak Normal</option>

                                        </select>

                                    </td>

                                    <td><input  name="intervalPrKet" type="text" style="width: 100%" maxlength="50"></td>

                                </tr>

                                <tr>

                                    <td style=""><label >e. Gelombang QRS</label></td>

                                    <td>
                                        <select class="" style="width: 100%;background-color:#dcdcdc;height:28px;" name="gelombangQrs">

                                            <option value=""></option>

                                            <option value="Normal">Normal</option>

                                            <option value="Tidak Normal">Tidak Normal</option>

                                        </select>

                                    </td>

                                    <td><input name="gelombangQrsKet" type="text" style="width: 100%"></td>

                                </tr>

                                <tr>

                                    <td style=""><label >f. Segmen ST</label></td>

                                    <td>

                                        <select class="" style="width: 100%;background-color:#dcdcdc;height:28px;" name="segmenSt">

                                            <option value=""></option>

                                            <option value="Normal">Normal</option>

                                            <option value="Tidak Normal">Tidak Normal</option>

                                        </select>

                                    </td>

                                    <td><input name="segmenStKet" type="text" style="width: 100%" maxlength="50"></td>

                                </tr>

                                <tr>

                                    <td style=""><label >g. Gelombang T</label></td>

                                    <td>

                                        <select class="" style="width: 100%;background-color:#dcdcdc;height:28px;" name="gelombangT">

                                            <option value=""></option>

                                            <option value="DalamBatasNormal">Dalam Batas Normal</option>

                                            <option value="TerdapatTidakNormal">Terdapat Tidak Normal</option>

                                        </select>

                                    </td>

                                    <td><input name="gelombangTKet" type="text" style="width: 100%" maxlength="50"></td>

                                </tr>

                                <tr>

                                    <td style=""><label >h. Axis</label></td>

                                    <td>

                                        <select class="" style="width: 100%;background-color:#dcdcdc;height:28px;" name="axis">

                                            <option value=""></option>

                                            <option value="Normal">Normal</option>

                                            <option value="Tidak Normal">Tidak Normal</option>

                                        </select>

                                    </td>

                                    <td><input name="axisKet" type="text" style="width: 100%" maxlength="50"></td>

                                </tr>

                                <tr>

                                    <td style=""><label >i. Terdapat Q Patagolis</label></td>

                                    <td colspan="2">

                                        <select class="" style="width: 100%;background-color:#dcdcdc;height:28px;" name="qPatagolis">

                                            <option value=""></option>

                                            <option value="Ya">Ya</option>

                                            <option value="Tidak">Tidak</option>

                                        </select>

                                    </td>

                                </tr>

                                <tr>

                                    <td style=""><label >j. Kelainan Lain</label></td>

                                    <td colspan="2"><input name="kelainanLain" type="text" style="width: 100%"></td>

                                </tr>

                                </tbody>

                            </table>

                        </div>

                    </div>

                    <div class="col-4 mt-5">

                        <h4 class="mb-2">Hasil Interpretasi EKG</h4>

                        <h6>Kesimpulan</h6>

                        <textarea name="kesimpulan" style="resize: none;width:280px;height:250px;" form="form1"></textarea>

                    </div>

                </div>

                </div>

            </div>

            <div class="col-4" style="">

                <div class="row">

                    <div class="col-12" style="height: 680px;overflow-y:auto;background-color: #F8F9FA;">

                        <table class="table table-bordered" style="">

                            <thead>

                                <tr>

                                    <th></th>

                                    <th colspan=2 style="text-align:center">

                                        Riwayat

                                    </th>

                                </tr>

                                <tr>

                                    <th></th>

                                    <th style="text-align:center;width:45%">

                                        No EKG

                                    </th>

                                    <th style="text-align:center;width:45%">

                                        Tanggal

                                    </th>

                                </tr>

                            </thead>

                            <tbody>

                                @foreach ($riwayat as $r)

                                <tr>

                                    <td></td>

                                    <td>

                                        {{ $r->notest }}

                                    </td>

                                    <td>

                                        {{ date('d-m-Y', strtotime($r->tgltest)) }}

                                    </td>

                                </tr>

                                @endforeach

                            </tbody>

                        </table>

                    </div>

                </div>



                <div class="row">

                    <div class="col-12">

                        Diagnosa

                        <br>

                        <textarea name="diagnosa" id="" style="resize:none;width:420px;height:200px" form="form1"></textarea>

                    </div>

                </div>

            </div>

        </div>

        <div class="row mt-3 border" style="border-color: #ABADB3;height:80px">

            <div class="col-5"></div>

            <div class="col-7">

                <input type="checkbox" id="ctakN" class="m-2"><label for="ctakN"    > Cetak Nota</label>

                <Button type="submit" id="allsubmit" class="m-2"><img src="{{ asset('/img/others/simpan.png')}}" width="20" height="20">Simpan</Button>

                <Button type="reset" class="m-2"><img src="{{ asset('/img/others/cancel.png')}}" width="20" height="20">Batal</Button>

            </div>

        </div>

    </form>



    <style>

        .form2 td{

            margin: 10px;

        }

        #umur[disabled]{

            background: white;

        }
        .inputable, .inputable:focus{

            border: 0px;

            width: 100%;


        }
        
        body{
            zoom:80%
        }

    </style>

    <script>

        $(function() {

            enable_cb();

            $("#DokLuar").click(enable_cb);

        });



        function enable_cb() {

            if (this.checked) {

                $("#DokLuar1").removeAttr("disabled");

            } else {

                $("#DokLuar1").val("");

                $("#DokLuar1").attr("disabled", true);

            }

        }



        var update_select = function () {

            if ($('#pl').is(':checked')) {

                $('#disabledbtn1').attr('disabled', "disabled");

                $('#disabledbtn2').attr('disabled', "disabled");

            }

            else {

                $("#disabledbtn1").removeAttr("disabled");

                $("#disabledbtn2").removeAttr("disabled");

            }

        };

        var readonly = function () {

            if ($('#rj').is(':checked') || $('#ri').is(':checked')){

                $('#form2 input').attr('readonly', 'readonly');

                $("#form2 input").val("");

            }

            else {

                $('#form2 input').removeAttr('readonly');

            }

        };

        

        var update_label = function () {

            if ($('#rj').is(':checked')){

                $('#poli').html("Poliklinik:");

            }

            else{

                $('#poli').html("Kelas / Ruang:");

            }

        };

        $("input[type=radio]").change(update_select).change(readonly).change(update_label);



        $(function() {

        $( "#date" ).datepicker();

        });



        window.onload=function(){

            $('#date').on('change', function() {

                var dob = new Date(this.value);

                var today = new Date();

                var age = Math.floor((today-dob) / (365.25 * 24 * 60 * 60 * 1000));

                $('#umur').val(age);

            });

        }

        

    </script>
    </body>
</html>