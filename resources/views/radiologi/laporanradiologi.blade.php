@extends('radiologi')

@section('body')
<link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
<script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
<div >

    <div style="background-color:#97B903;">

        <table>

            <tr>

                <td>

                    <img src="{{url('/img/menu/radiologi/laporan radiologi.png')}}" width="40" style="margin: 20;">

                </td>

                <td>

                    <h5 style="margin-top: 6px;">Radiologi - Laporan::Laporan Regristrasi Radiologi</h5>

                </td>

            </tr>

            <button onclick="history.back()" type="button" class="btn-close btn-close-white  ms-2 m-2" style="float:right;" aria-label="Close"></button>





        </table>

    </div>

    <aside class="col-auto" style="background-color: #f0f0f0; width:1%;">

        <button onclick="pinggir()" style="transform: rotate(90deg);width:500px;height:30px;position:relative;text-align:left;top:235px;right:235px;border:none;outline:none;">Klik Untuk Menyembunyikan/Menampilkan Pilihan >>></button>

    </aside>

    <div class="container-fluid m-4 ">

        <div class="row" id="pinggir" style="margin-top:-4%;">

            <div class="col-4 ">

                <div class="row">

                    <div class="dropdown mt-2">

                        <button style="width:100%;" class="btn2 dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">

                            Pilih Laporan

                        </button>

                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1" style="width: 85%;">

                            <li><a href="{{ url('/radiologi/laporan-radiologi') }}" class="dropdown-item" href="#">Laporan Regristrasi Radioogi</a></li>

                            <li><a href="{{ url('/radiologi/laporan-kegiatan-radiologi') }}" class="dropdown-item">Laporan Kegiatan Radiologi</a></li>

                        </ul>

                    </div>

                    <form action="" class="mt-3">

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

                <div class="row">

                    <div class="col-2">

                        <a class="btn2  " href=""><img src="{{url('/img/others/date_2.png')}}" height="25"></a>

                    </div>

                    <div class="col">

                        <button style="width: 100%;"><img src="{{url('/img/others/date_1.png')}}" height="25"></button>

                    </div>

                    <div class="col-2">

                        <a class="btn2" href=""><img src="{{url('/img/others/date_3.png')}}" height="25"></a>

                    </div>

                </div>

                <div class="row mt-2 ">

                    <div class="col-2">

                        <a class="btn2  " href=""><img src="{{url('/img/others/date_2.png')}}" height="25"></a>

                    </div>

                    <div class="col ">

                        <button style="width: 100%;"><img src="{{url('/img/others/date_1.png')}}" height="25"></button>

                    </div>

                    <div class="col-2">

                        <a class="btn2" href=""><img src="{{url('/img/others/date_3.png')}}" height="25"></a>

                    </div>

                </div>

                <div class=" row  mt-2">

                    <div class="col">

                        <div class="accordion accordion-flush" id="accordionFlushExample">

                            <div class="accordion-item" style="width:102%;">

                                <h2 class="accordion-header" id="flush-headingOne">

                                    <button style="height:25px;" class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">

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

                                            <input type="text" name="" style="width: 90%; height:28px;">

                                            <button type="button" data-bs-toggle="modal" data-bs-target="#exampleModal"><img src="/img/others/pratinjau.png" alt="" width="15" height="15"></button>

                                        </div>

                                        <div>

                                            <input type="checkbox" name="" id="">

                                            <label for="">Per Dokter Pengirim </label><br>
                                            <input type="text" name="" style="width: 90%; height:28px;">

                                            <button type="button" data-bs-toggle="modal" data-bs-target="#exampleModal"><img src="/img/others/pratinjau.png" alt="" width="15" height="15"></button>

                                        </div>

                                        <div>

                                            <input type="checkbox" name="" id="">

                                            <label for="">Per Dokter Luar </label>

                                        </div>

                                        <div>

                                            <input type="checkbox" name="" id="">

                                            <label for="">Per Petugas </label><br>

                                            <input type="text" name="" style="width: 90%; height:28px;">

                                            <button type="button" data-bs-toggle="modal" data-bs-target="#exampleModal"><img src="/img/others/pratinjau.png" alt="" width="15" height="15"></button>

                                        </div>

                                        <div>

                                            <input type="checkbox" name="" id="">

                                            <label for="">Per Cito</label>

                                        </div>

                                        <div>

                                            <button style="width: 100%;">

                                                <img src="/img/others/filter.png" alt="" width="15" height="15">Filter Berdasarkan Kategori

                                            </button>

                                        </div>

                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>



                </div>



                <div class="row justify-content-center mt-2">

                    <button class="btn2 col-5 m-1" href=""><img src="{{url('/img/others/pratinjau.png')}}" height="25"> Pratinjau</button>

                    <button class="btn2 col-5 m-1" href=""><img src="{{url('/img/others/pratinjau.png')}}" height="25"> Pratinjau</button>

                </div>

            </div>

            <div class="col-8">



            </div>

        </div>

    </div>

</div>

<script>

    function pinggir() {

      var x = document.getElementById("pinggir");

      if (x.style.display === "none") {

        x.style.display = "block";

      } else {

        x.style.display = "none";

      }

    }

  </script>
<script type="text/javascript">
    $(function() {
        $("#datepicker").datepicker();
    });
    $(function() {
        $("#datepicker2").datepicker();
    });
</script>
@endsection