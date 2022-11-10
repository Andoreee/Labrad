@extends('radiologi')

@section('body')
<link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
<script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
<div>

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

            <button onclick="history.back()" type="button" class="btn-close btn-close-white bg-danger ms-2 m-2" style="float:right;" aria-label="Close"></button>



        </table>

    </div>



    <div class="container-fluid">

        <div class="row ">

            <div class="col-4">

                <div class="row">

                    <div class="dropdown mt-2">

                        <button style="width:100%;" class="btn2 dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">

                            Pilih Laporan

                        </button>

                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1" style="width: 85%;">

                            <li><a href="{{ url('/radiologi/laporan-radiologi') }}" class="dropdown-item" >Laporan Regristrasi Radioogi</a></li>

                            <li><a href="{{ url('/radiologi/laporan-kegiatan-radiologi') }}" class="dropdown-item">Laporan Kegiatan Radiologi</a></li>

                        </ul>

                    </div>

                    <form action="" class="mt-3">

                               <div class="row mb-1">
                                    <label for="datepicker" class="col-3 col-form-label">Dari</label>
                                    <div class="ui-widget col mt-1">
                                        <input id="datepicker" style="width:100%;">
                                    </div>
                                </div>
                                <div class="row mb-1">
                                    <label for="datepicker" class="col-3 col-form-label">Sampai</label>
                                    <div class="ui-widget col mt-1">
                                        <input id="datepicker2" style="width:100%;">
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

<script type="text/javascript">
    $(function() {
        $("#datepicker").datepicker();
    });
    $(function() {
        $("#datepicker2").datepicker();
    });
</script>

@endsection