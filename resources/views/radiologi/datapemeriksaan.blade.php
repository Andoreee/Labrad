@extends('radiologi')

@section('body')
<link href="https://repo.rachmat.id/jquery-ui-1.12.1/jquery-ui.css" rel="stylesheet">
<script type="text/javascript" src="https://repo.rachmat.id/jquery-1.12.4.js"></script>
<script type="text/javascript" src="https://repo.rachmat.id/jquery-ui-1.12.1/jquery-ui.js"></script>
<div>

    <div style="background-color:#97B903;">

        <table>

            <tr>

                <td>
                    <img src="{{asset('/img/menu/radiologi/data pemeriksaan.png')}}" width="40" style="margin: 15;">

                </td>

                <td>

                    <h5 style="margin-top: 6px;">Radiologi-Data Pemeriksaan pasien</h5>

                </td>

            </tr>

            <button onclick="history.back()" type="button" class="btn-close btn-close-white  ms-2 m-2" style="float:right;" aria-label="Close"></button>



        </table>

    </div>

    <aside class="col-auto" style="background-color: #f0f0f0; width:1%;">

        <button onclick="asideRAD()" style="transform: rotate(90deg);width:500px;height:30px;position:relative;text-align:left;top:235px;right:235px;border:none;outline:none;">Klik Untuk Menyembunyikan/Menampilkan Pilihan >>></button>

    </aside>

    <div class="container-fluid mb-3">

        <div class="row" style="margin-top:-2%;">



            <div class="col-3 mt-2 m-4" id="aside">

                <div class="row">

                    <div class="col-10">

                        <div>

                             <form>
                                <div class="row mb-1">
                                    <label for="datepicker" class="col-3 col-form-label">Dari</label>
                                    <div class="ui-widget col mt-1">
                                        <input autocomplete="off" id="datepicker" style="width:100%;">
                                    </div>
                                </div>
                                <div class="row mb-1">
                                    <label for="datepicker" class="col-3 col-form-label">Sampai</label>
                                    <div class="ui-widget col mt-1">
                                        <input autocomplete="off" id="datepicker2" style="width:100%;">
                                    </div>
                                </div>
                            </form>
                        </div>

                    </div>

                    <div class="col-2 p-1">

                        <table class="mt-2">

                            <thead>

                                <tr>

                                    <th></th>

                                    <th></th>

                                </tr>

                            </thead>

                            <tbody>

                                <tr>

                                    <td rowspan="2"><button><img src="{{asset('/img/others/filter.png')}}" alt="" width="25">Filter</button></td>

                                </tr>

                            </tbody>

                        </table>

                    </div>

                </div>



                <div class="row">

                    <div class="col-2">

                        <a class="btn2  " href=""><img src="{{asset('/img/others/date_2.png')}}" height="15"></a>

                    </div>

                    <div class="col">

                        <button style="width: 108%;"><img src="{{asset('/img/others/date_1.png')}}" height="15"></button>

                    </div>

                    <div class="col-2">

                        <a class="btn2" href=""><img src="{{asset('/img/others/date_3.png')}}" height="15"></a>

                    </div>

                </div>

                <div class="row mt-2 ">

                    <div class="col-2">

                        <a class="btn2  " href=""><img src="{{asset('/img/others/date_2.png')}}" height="15"></a>

                    </div>

                    <div class="col">

                        <button style="width: 108%;"><img src="{{asset('/img/others/date_1.png')}}" height="15"></button>

                    </div>

                    <div class="col-2">

                        <a class="btn2" href=""><img src="{{asset('/img/others/date_3.png')}}" height="15"></a>

                    </div>

                </div>



                <div class="row mt-2">

                    <div class="col">

                        <div class="accordion accordion-flush" id="accordionFlushExample">

                            <div class="accordion-item" style="width:104%;">

                                <h2 class="accordion-header" id="flush-headingOne">

                                    <button style="height:25px; " class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">

                                        Sortir>>

                                    </button>

                                </h2>

                                <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">

                                    <div class="accordion-body">

                                        <div>

                                            <input type="checkbox" name="" id="">

                                            <label for="">Per Jenis Rawat </label>

                                            <input type="text" name="" style="width: 100%; height:28px;">

                                        </div>

                                        <div>

                                            <input type="checkbox" name="" id="">

                                            <label for="">Per Dokter Pemeriksaan </label><br>

                                            <input type="text" name="" style="width: 86%; height:28px;">

                                            <button type="button" data-bs-toggle="modal" data-bs-target="#exampleModal"><img src="{{asset('/img/others/pratinjau.png')}}" alt="" width="15" height="15"></button>

                                        </div>

                                        <div>

                                            <input type="checkbox" name="" id="">

                                            <label for="">Per Dokter Pengirim </label><br>

                                            <input type="text" name="" style="width: 86%; height:28px;">

                                            <button type="button" data-bs-toggle="modal" data-bs-target="#exampleModal"><img src="{{asset('/img/others/pratinjau.png')}}" alt="" width="15" height="15"></button>

                                        </div>

                                        <div>

                                            <input type="checkbox" name="" id="">

                                            <label for="">Per Dokter Luar </label>

                                        </div>

                                        <div>

                                            <input type="checkbox" name="" id="">

                                            <label for="">Per Petugas </label><br>

                                            <input type="text" name="" style="width: 86%; height:28px;">

                                            <button type="button" data-bs-toggle="modal" data-bs-target="#exampleModal"><img src="{{asset('/img/others/pratinjau.png')}}" alt="" width="15" height="15"></button>

                                        </div>

                                        <div>

                                            <input type="checkbox" name="" id="">

                                            <label for="">Per Cito</label>

                                        </div>

                                        <div>

                                            <button style="width: 100%;">

                                                <img src="{{asset('/img/others/filter.png')}}" alt="" width="15" height="15">Filter Berdasarkan Kategori

                                            </button>

                                        </div>

                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>





                <div class="row">

                    <div class="col">

                        <fieldset class="border border-secondary p-2" style="height:1px; width:104%;">

                            <legend class="float-none w-auto p2 fs-6">

                                Daftar Pemeriksaan

                            </legend>

                        </fieldset>

                        <div class="mt-1">



                            <button style="width:104%;" onclick="window.open('/pkl/radiologi/pemeriksaan-pasien', 'newwindow', 'location=yes,left=110,height=600,width=1300,scrollbars=yes,status=yes');"><img src="{{asset('/img/others/tambah.png')}}" alt="" width="20"> Tambah</button>

                        </div>

                    </div>

                </div>

                <div class="row mt-2">

                    <div class="col-6">

                        <button style="width:108%;"><img src="{{asset('/img/others/ubah.png')}}" alt="" width="20"> Ubah</button>

                    </div>

                    <div class="col-6">

                        <button style="width:108%;"><img src="{{asset('/img/others/hapus.png')}}" alt="" width="20">Hapus</button>

                    </div>

                </div>

                <div class="row mt-2">

                    <div class="col-6">

                        <button style="width:108%;"><img src="{{asset('/img/others/tambah.png')}}" alt="" width="20"> Lihat Detail</button>

                    </div>

                </div>

                <div class="row mt-2">

                    <div class="col-6">

                        <button style="width:108%;"><img src="{{asset('/img/others/tambah.png')}}" alt="" width="20"> Cetak Label</button>

                    </div>

                    <div class="col-6">

                        <button style="width:108%;"><img src="{{asset('/img/others/tambah.png')}}" alt="" width="20"> Layout Label</button>

                    </div>

                </div>

                <div class="row mt-2">

                    <div class="col-6">

                        <button style="width:108%;"><img src="{{asset('/img/others/tambah.png')}}" alt="" width="20"> Cetak Nota</button>

                    </div>

                    <div class="col-6">

                        <button style="width:108%;"><img src="{{asset('/img/others/tambah.png')}}" alt="" width="20"> Layout Nota</button>

                    </div>

                </div>



                <div class="row mt-2">

                    <div class="col">

                        <fieldset class="border border-secondary p-2" style="height:1px; width:104%;">

                            <legend class="float-none w-auto p2 fs-6">

                                Hasil Pemeriksaan

                            </legend>

                        </fieldset>

                        <div class="mt-1">

                            <button style="width:104%;"><img src="{{asset('/img/others/tambah.png')}}" alt="" width="20"> Tambah</button>

                        </div>

                    </div>

                </div>

                <div class="row mt-2">

                    <div class="col-6">

                        <button style="width:108%;"><img src="{{asset('/img/others/tambah.png')}}" alt="" width="20"> Ambil Hasil</button>

                    </div>

                    <div class="col-6">

                        <button style="width:108%;"><img src="{{asset('/img/others/hapus.png')}}" alt="" width="20"> Hapus Hasil</button>

                    </div>

                </div>

                <div class="row mt-2">

                    <div class="col-6">

                        <button style="width:108%;"><img src="{{asset('/img/others/tambah.png')}}" alt="" width="20"> Cetak Hasil</button>

                    </div>

                    <div class="col-6">

                        <button style="width:108%;"><img src="{{asset('/img/others/hapus.png')}}" alt="" width="20"> Layout Hasil</button>

                    </div>

                </div>



                <div class="row mt-2">

                    <div class="col">

                        <fieldset class="border border-secondary p-2" style="height:1px; width:104%;">

                            <legend class="float-none w-auto p2 fs-6">

                                Laporan

                            </legend>

                        </fieldset>

                        <div class="mt-1">

                            <button style="width:104%;"><img src="{{asset('/img/others/pratinjau.png')}}" alt="" width="20"> Cetak Laporan</button>

                        </div>

                    </div>

                </div>



            </div>

            <div class="col-8 mt-2 m-4" id="table">

                <form action="/radiologi/data-pemeriksaan/search" method="post">

                    @csrf

                    <div class="row align-items-center ">

                        <div class="col-1" style="margin-left: 15px;">

                            <label class="col-form-label">Pencarian</label>

                        </div>

                        <div class="col-9">

                            <input class="input" type="text" name="cari" value="{{old('cari')}}" style="width:100%;">

                        </div>

                        <div class="col">

                            <button type="submit" value="cari" onClick="window.location.reload();"> <img src="{{asset('/img/others/refresh.png')}}" width="20" height="20"> refresh</button>

                        </div>

                    </div>

                </form>

                <div class="overflow-scroll table-responsive mt-1 " >

                    <table class="table table-bordered table-light " style="width:1450px; max-height:650px;">

                        <thead style="position: sticky; top:0;">

                            <tr>

                                <th style="width: 2px;"></th>

                                <th>No.Rad</th>

                                <th>No.Daftar</th>

                                <th>Tanggal</th>

                                <th>JenisRawat</th>

                                <th>Poli/Kamar</th>

                                <th>MedicalRecord</th>

                                <th>NamaPasien</th>

                                <th>Tarif</th>

                                <th>Cito</th>

                                <th>Terbayar</th>

                                <th>Hasil</th>

                                <th>DokterPengirim</th>

                                <th>Diambil</th>

                            </tr>

                        </thead>

                        <tbody>

                            @foreach($data as $t)

                            <tr>

                                <td  > </td>

                                <td  >{{ $t->notest }}</td>

                                <td  >{{ $t->nodaftar }}</td>

                                <td  >{{ $t->tgltest }}</td>

                                <td >{{ $t->jenisrawat }}</td>

                                <td >@if(!empty($t->kodepoli))

                                    {{ $t->kodepoli}}

                                    @else

                                    {{$t->kodekamar}}

                                    @endif

                                </td>

                                <td >{{ $t->norm }}</td>

                                <td >{{App\Models\pasienluar::getpasien($t->notest)}}</td>

                                <td {{ App\Models\testdetail::getdetail($t->notest) }}</td>

                                <td >{{ $t->cito}}</td>

                                <td {{ $t->terbayar }}</td>

                                <td >{{ $t->diagnosa}}</td>

                                <td >{{ $t->iddokter_kirim }}</td>

                                <td >{{ $t->tglambil }}</td>

                            </tr>

                            @endforeach

                        </tbody>

                    </table>

                </div>

            </div>

        </div>

    </div>

</div>

<script type="text/javascript">
    $(function() {
        $("#datepicker").datepicker();
    });
    $(function() {
        $("#datepicker2").datepicker();
    });
</script>

@endsection