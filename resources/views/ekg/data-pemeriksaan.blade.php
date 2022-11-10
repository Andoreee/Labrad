@extends('elektro')   


    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>

    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>


@section('body')

<div class="" style="background-color: #97B903;" >

    <table>

        <tr>

            <td>

                <img src="{{ url('/img/menu/radiologi/data pemeriksaan.png') }}" width="20" height="20" style="margin: 15px;">

            </td>

            <td>

                <h5 style="padding-top: 6px">Elektrokardiogram - Data Pemeriksaaan</h5>  

            </td>

        </tr>

        <a href="{{ route('ekg') }}" class="btn btn-danger mt-2" style="float: right"> <b>X</b> </a>

    </table>

</div>

<div class="row">{{--transform: rotate(90deg);--}}

    <aside class="col-auto" style="width:3%;">

            <button onclick="aside()" style="transform: rotate(90deg);width:500px;height:30px;position:relative;text-align:left;top:235px;right:235px;border:none;outline:none;">Klik Untuk Menyembunyikan/Menampilkan Pilihan >>></button>

    </aside>

    <div class="col-auto" style="width:22%;" id="aside">

        <div class="row" style="margin-top:5px;">

            <div class="col-3" style="">

                <label>Dari</label>

                <label>Sampai</label>

                <button style="margin: 15px 0px;padding:5px 10px;margin-top:8px" onclick="lessmonth()"><img src="{{ url('/img/others/date_2.png') }}" width="25" height="25"></button>

                <button style="margin: 6px 0px;padding:5px 10px;" onclick="lessdate()"><img src="{{ url('/img/others/date_2.png') }}" width="25" height="25"></button>

            </div>

            <div class="col-6" style="">

                <input class="inputdate" type="Date" style="width:100%;height:25px" id="from"style="font-size: 5px">

                <input class="inputdate" type="Date" style="width:100%;height:25px" id="to"> {{-- data-date-format="DD MMMM YYYY"  --}} 

                <button style="margin: 8px 0px;padding:5px 16px;width:100%" onclick="dateMonth()"><img src="{{ url('/img/others/date_1.png') }}" width="25" height="25"> Bulan ini</button>

                <button style="margin: 8px 0px;padding:5px 16px;width:100%" onclick="dateToday()"><img src="{{ url('/img/others/date_1.png') }}" width="25" height="25"> Hari ini</button>

            </div>

            <div class="col-3" style="">

                <button style="height:50px"> <img src="{{ url('/img/others/filter.png') }}" width="20" height="20"> Filter</button>

                <button style="margin: 8px 0px;padding:5px 10px;margin-top:8px" onclick="summonth()"><img src="{{ url('/img/others/date_3.png') }}" width="25" height="25"></button>

                <button style="margin: 8px 0px;padding:5px 10px" onclick="sumdate()"><img src="{{ url('/img/others/date_3.png') }}" width="25" height="25"></button>

            </div>

        </div>

        <div class="border">

            <div class="row" style="">

                <div class="col-12" style="margin-top:5px;margin-bottom:5px;">

                    <button style="text-align:left;width:100%;outline:none;border:none;" onclick="sortir();">sortir >></button>

                </div>

            </div>

            <div class="row">

                <div class="col-12" id="sortir" style="display: none;">

                    <div class="row">

                        <div class="col-1" style="margin-left: -5px;"></div>

                        <div class="col-1" style="height:200px">

                            <input type="checkbox" name="" id="perJR" style="margin-bottom: 32px">

                            <input type="checkbox" name="" id="perDP" style="margin-bottom: 32px">

                            <input type="checkbox" name="" id="perDL" style="">

                            <input type="checkbox" name="" id="perP" style="margin-bottom: 32px">

                            <input type="checkbox" name="" id="perC" style="">

                        </div>

                        <div class="col-10">

                            <label for="perJR">Per Jenis Rawat</label> <br>

                            <select name="" id="" style="height: 25px;width:80%"></option></select><br>

                            <label for="perDP">Per Dokter Pemeriksa</label> <br>

                            <input type="text" style="height: 25px;width:80%"> <br>

                            <label for="perDL">Per Dokter Luar</label> <br>

                            <label for="perP">Per Petugas</label> <br>

                            <input type="text" style="height: 25px;width:80%"> <br>

                            <label for="perC">Per Cito</label> <br>

                        </div>

                    </div>

                    <div class="row">

                        <div class="col-12 text-center"style="margin-top:-5px;">

                            <button style="margin-left:-10px;margin-bottom: 5px;"><img src="{{ url('/img/others/filter.png') }}" width="15" height="15" style="margin-right: 5px">Filter Berdasarkan Kategori</button>

                        </div>

                    </div>

                </div>

            </div>

        </div>

        <div class="row">

            <div class="col-12">

                <fieldset class="border p-2" style="border: #DCDCDC">

                    <legend class="float-none w-auto p-2" style="font-size: 15px;margin-bottom:-15px">Daftar Pemerikssaan</legend>

                    <div class="row">

                        <div class="col-12 mb-1">

                            <button style="width:100%" onclick="window.open('{{ route('pemeriksaanPasien') }}', 'newwindow', 'location=yes,left=80,height=800,top=200,width=1200,scrollbars=no,status=yes');"><img src="{{ url('/img/others/tambah.png') }}" width="20" height="20">Pemeriksaan</button>

                        </div>

                    </div>

                    <div class="row">

                        <div class="col-6">

                            <button class="mb-1" style="width:100%" disabled><img src="{{ url('/img/others/ubah.png') }}" width="20" height="20" alt="">Ubah</button>

                            <button class="mb-1" style="width:100%" disabled><img src="{{ url('') }}" width="20" height="20" alt="">Lihat Detail</button>

                            <button class="mb-1" style="width:100%"><img src="{{ url('') }}" width="20" height="20" alt="">Cetak Lable</button>

                            <button class="mb-1" style="width:100%" disabled><img src="{{ url('') }}" width="20" height="20" alt="">Cetak Nota</button>

                        </div>

                        <div class="col-6 mb-1">

                            <button class="mb-1" style="width:100%" disabled><img src="{{ url('/img/others/hapus.png') }}" width="20" height="20" alt="">Hapus</button>

                            <div style="height: 34px"></div>

                            <button class="mb-1" style="width:100%;height: 30px;font-size:14px"><img src="{{ url('') }}" width="20" height="20" alt="">Layout Detail</button>

                            <button class="mb-1" style="width:100%;height: 30px;font-size:14px" disabled><img src="{{ url('') }}" width="20" height="20" alt="">Layout Nota</button>

                        </div>

                    </div>

                </fieldset>

            </div>

        </div>

        <div class="row">

            <div class="col-12">

                <fieldset class="border p-2" style="border: #DCDCDC">

                    <legend class="float-none w-auto p-2" style="font-size: 15px;margin-bottom:-15px">Hasil Pemerikssaan</legend>

                    <div class="row">

                        <div class="col-6">

                            <button class="mb-1" style="width:100%" disabled><img src="{{ url('') }}" width="20" height="20" alt="">Ambil Hasil</button>

                            <button class="mb-1" style="width:100%"><img src="{{ url('') }}" width="20" height="20" alt="">Cetak Hasil</button>

                        </div>

                        <div class="col-6">

                            <button class="mb-1" style="width:100%;height: 30px;font-size:14px;" disabled><img src="{{ url('') }}" width="20" height="20" alt="">Hapus Hasil</button>

                            <button class="mb-1" style="width:100%;height: 30px;font-size:14px"><img src="{{ url('') }}" width="20" height="20" alt="">Layout Hasil</button>

                        </div>

                    </div>

                </fieldset>

            </div>

        </div>

        <div class="row">

            <div class="col-12">

                <fieldset class="border p-2" style="border: #DCDCDC">

                    <legend class="float-none w-auto p-2" style="font-size: 15px;margin-bottom:-15px">Laporan</legend>

                    <div class="row">

                        <div class="col-12">

                            <button class="mb-1" style="width:100%;" disabled><img src="{{ url('/img/others/pratinjau.png') }}" width="20" height="20" alt="">Cetak Laporan</button>

                        </div>

                    </div>

                </fieldset>

            </div>

        </div>

    </div>

    <div class="col-auto" style="width:75%" id="table">

        <div class="row border" style="background-color: #F0f0f0">

            <div class="col-1" style="margin-top:10px">

                <label for="search" style="margin-right: 0px;color: #800000;margin-left: 15px;margin-bottom:10px;"><b>Pencarian</b></label>

            </div>

            <div class="col-8">

                <input type="search" name="cari" class="" style="width: 100%;margin-top:7px;margin-left: 15px;" value=" {{ old('cari') }} ">

            </div>

            <div class="col-3" style="margin-top:7px;">

                <button onclick="" style="margin-left: 15px;"> {{-- window.location.reload(); --}}

                    <img src="{{ url('/img/others/refresh.png') }}" width="20" height="20">

                        Refresh

                </button>

            </div>

        </div>

        <div class="row" style="background-color:#FFFFFF;overflow-x:scroll;width:auto">{{--1020px--}}

            <div class="col-12" style="height:550px">

                <table class="table table-bordered" style="margin-left: -12px;background-color:#FFFFFF;width:1600px;">

                    <thead style="text-align: center">

                        <tr>

                            <th width=20px></th>

                            <th width=85px>No. EKG</th>

                            <th width=100px>No. Daftar</th>

                            <th width=175px>Tanggal</th>

                            <th width=109px>Jenis Rawat</th>

                            <th width=190px>Poli/Kamar</th>

                            <th width=135px>Medical Record</th>

                            <th width=250px>Nama Pasien</th>

                            <th width=120px>Tarif</th>

                            <th>Dokter Pengirim</th>

                            <th>Cito</th>

                            <th>Terbayar</th>

                            <th>Hasil</th>

                            <th>Diambil</th>

                        </tr>

                    </thead>

                    <tbody>

                        @foreach ($pemeriksaan as $a)

                        @php
                            
                            $check = '';

                            if($a->cito!='0')$check = 'checked';

                        @endphp

                        <tr>

                            <td></td>

                            <td>{{ $a->notest }}</td>

                            <td>{{ $a->nodaftar }}</td>

                            <td>{{ $a->tgltest }}</td>

                            <td>{{ $a->jenisrawat }}</td>

                            <td>@if (!empty($a->kodepoli))

                                {{ $a->kodepoli }}

                            @else

                                {{ $a->kodekamar }}

                            @endif</td>

                            <td>{{ $a->norm }}</td>

                            @if ($a->jenisrawat == 'pasien luar')

                            <td>{{ $a->namapasien }}</td>
                                
                            @else
                                
                            <td>*masih dalam perbaikan*</td>

                            @endif

                            <td>{{ $a->biaya }}</td>

                            <td>{{ $a->iddokter_kirim }}</td>

                            <td><input type="checkbox" disabled name="Cito{{ $a->notest }}" id="Cito" style="" {{ $check }}></td>

                            <td><input type="checkbox" disabled name="terbayar" id="Cito" style=""></td>

                            <td><input type="checkbox" disabled name="hasil" id="Cito" style=""></td>

                            <td></td>

                        </tr>

                        @endforeach

                    </tbody>

                </table>

            </div>

        </div>

    </div>

</div>

{{-- <style>

    .inputdate {

    position: relative;

    width: 150px; height: 20px;

    color: white;

    }



    .inputdate:before {

        position: absolute;

        top: 3px; left: 5px;

        content: attr(data-date);

        display: inline-block;

        color: black;

        font-size: 11px;

    }



    .inputdate::-webkit-datetime-edit, .inputdate::-webkit-inner-spin-button, .inputdate::-webkit-clear-button {

        display: none;

    }



    .inputdate::-webkit-calendar-picker-indicator {

        position: absolute;

        top: 3px;

        right: 0;

        color: black;

        opacity: 1;

    }

</style> --}}

<script>

    function sortir() {

      var x = document.getElementById("sortir");

      if (x.style.display === "none") {

        x.style.display = "block";

      } else {

        x.style.display = "none";

      }

    }

    function aside() {

      var x = document.getElementById("aside");

      var y = document.getElementById('table');

      if (x.style.display === "none") {

        x.style.display = "block";

        y.style.width = "75%";

      } else {

        x.style.display = "none";

        y.style.width = "97%";

      }

    }


    var d = new Date();

    d.setDate(1);

    document.getElementById('from').valueAsDate = d;

    d.setMonth(d.getMonth()+1);

    d.setDate(0);

    document.getElementById('to').valueAsDate = d;


    // $(".inputdate").on("change", function() {

    //     this.setAttribute(

    //         "data-date",

    //         moment(this.value, "YYYY-MM-DD")

    //         .format( this.getAttribute("data-date-format") )

    //     )

    // }).trigger("change")

    function dateToday(){

        document.getElementById('from').valueAsDate = new Date();

        document.getElementById('to').valueAsDate = new Date();

    }

    function dateMonth(){

        var d = new Date();

        d.setDate(1);

        document.getElementById('from').valueAsDate = d;

        d.setMonth(d.getMonth()+1);

        d.setDate(0);

        document.getElementById('to').valueAsDate = d;

    }

    function sumdate(){

        var d = document.getElementById('from').valueAsDate;

        var e = document.getElementById('to').valueAsDate;

        d.setDate(d.getDate()+1);

        e.setDate(e.getDate()+1);

        document.getElementById('from').valueAsDate = d;

        document.getElementById('to').valueAsDate = e;

    }
    
    function lessdate(){

        var d = document.getElementById('from').valueAsDate;

        var e = document.getElementById('to').valueAsDate;

        d.setDate(d.getDate()-1);

        e.setDate(e.getDate()-1);

        document.getElementById('from').valueAsDate = d;

        document.getElementById('to').valueAsDate = e;

    }


    function summonth(){

        var d = document.getElementById('from').valueAsDate;

        var e = document.getElementById('to').valueAsDate;

        d.setMonth(d.getMonth()+1);

        e.setMonth(e.getMonth()+1);

        document.getElementById('from').valueAsDate = d;

        document.getElementById('to').valueAsDate = e;

        }
    
    function lessmonth(){

        var d = document.getElementById('from').valueAsDate;

        var e = document.getElementById('to').valueAsDate;

        d.setMonth(d.getMonth()-1);

        e.setMonth(e.getMonth()-1);

        document.getElementById('from').valueAsDate = d;

        document.getElementById('to').valueAsDate = e;

    }


    </script>

@endsection