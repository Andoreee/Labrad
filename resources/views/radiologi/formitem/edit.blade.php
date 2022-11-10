@extends('template.popup')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>


@include('/radiologi/formitem/btn')

@section('body')
    

<div class="container-fluid">

    <div class="row">

        <div class="col-8 mt-3 ">

            @if(session('error'))

            <div class="alert alert-danger">

                @foreach(session('error') as $error )

                <p>{{$error}}</p>

                @endforeach

            </div>

            @endif

            <div class=" overflow-auto" style="height:28rem;">

                <table class="table  table-hover table-light table-bordered " style="text-align: center;width:850px;">

                    <thead class="sticky-top">

                        <tr>

                            <th rowspan="2" style="vertical-align:middle;">Grub</th>

                            <th rowspan="2" style="vertical-align:middle;">Item</th>

                            <th colspan="2">Biaya</th>

                            <th rowspan="2" style="vertical-align:middle;">E-klaim BPJs</th>

                        </tr>

                        <tr>

                            <th>rawat jalan</th>

                            <th>pasien luar</th>

                        </tr>

                    </thead>

                    <tbody>



                        @foreach($data as $r)


                        
                        <tr>

                            <td>

                                <a class="btn" style="border:none;"  href="{{ url('/radiologi/item-test/edit') }}/{{ $r->iditemrad }}">{{App\Models\grup::getGrup($r->idgrup)}}</a>

                            </td>

                            <td>

                                <a class="btn" style="border:none;"  href="{{ url('/radiologi/item-test/edit') }}/{{ $r->iditemrad }}">{{ $r->namaitem}}</a>

                            </td>

                            <td>

                                <a class="btn" style="border:none;"  href="{{ url('/radiologi/item-test/edit') }}/{{ $r->iditemrad }}">{{ $r->biaya_rawatjalan }}</a>

                            </td>

                            <td>

                                <a class="btn" style="border:none;"  href="{{ url('/radiologi/item-test/edit') }}/{{ $r->iditemrad }}">{{ $r->biaya_pasienluar }}</a>

                            </td>

                            <td>

                                <a class="btn" style="border:none;"  href="{{ url('/radiologi/item-test/edit') }}/{{ $r->iditemrad }}">{{App\Models\klaim::getKlaim($r->idklaim)}}</a>

                            </td>

                        </tr>

                        @endforeach

                    </tbody>

                </table>

            </div>

            <form action="" method="POST">

                @csrf

                <div class="col mt-2">

                    <b>

                        Format Pembacaaan Dokter

                    </b>

                    <div>



                        <div class="mt-1">

                            <button type="button" style="border:none;background-color:#ddd;" id="l">

                                <a>laki-laki</a>

                            </button>

                            <span>|</span>

                            <button type="button" style="border:none;" id="p">

                                <a>perempuan</a>

                            </button>

                        </div>

                        <div class=" mt-1">

                            <textarea name="dokterbaca_pr" id="pr" cols="30" rows="10" style="resize: none; width:100%; outline:none; display:none; ">{{$data2->dokterbaca_pr}}</textarea>

                            <textarea name="dokterbaca_lk" id="lk" cols="30" rows="10" style="resize: none; width:100%; outline:none; display:content;">{{$data2->dokterbaca_lk}}</textarea>

                        </div>

                    </div>

                </div>



        </div>

        <div class="col-4 mt-3">



            <div class="m-2">

                <label for="">Nama Item:</label><br>

                <input type="text" name="namaitem" value="{{ $data2->namaitem }}" style="width: 100%;">

            </div>

            <div class="m-2">

                <label for="">Group :</label>

                <select name="idgrup" class="form-select form-select-sm" aria-label=".form-select-sm example">

                    <option value="{{App\Models\grup::getid($data2->idgrup)}}" selected>{{App\Models\grup::getgrup($data2->idgrup)}}</option>

                    @foreach($grup as $g)

                    <option value="{{App\Models\grup::getid($g->idgrup)}} ">{{$g->grup}}</options>

                        @endforeach

                </select>

            </div>

            <div class="m-2">

                <label for="">Biaya Rawat Jalan :</label><br>

                <input type="text" name="biaya_rawatjalan" value="{{ $data2->biaya_rawatjalan }}" style="width: 100%;">

            </div>

            <div class="m-2">

                <label for="">Biaya Pasien Luar :</label><br>

                <input type="text" name="biaya_pasienluar" value="{{ $data2->biaya_pasienluar }}" style="width: 100%;">

            </div>

            <div class="m-2">

                <label for="">Biaya Rawat Inap</label><br>

                <table class="table table-hover table-light table-bordered ">

                    <thead>

                        <tr>

                            <th style="width:4% ;"></th>

                            <th>Kelas</th>

                            <th>Biaya</th>

                        </tr>

                    </thead>

                    <tbody>

                        <tr>

                            <td></td>

                            <td></td>

                            <td></td>

                        </tr>

                    </tbody>

                </table>

            </div>

            <div class="m-2">

                <label for="">E-Klaim BPJS :</label>

                <select name="idklaim" class="form-select form-select-sm" aria-label=".form-select-sm example">

                    <option value="{{App\Models\klaim::getid($data2->idklaim)}}" selected>{{App\Models\klaim::getKlaim($data2->idklaim)}}</option>

                    @foreach($klaim as $k)

                    <option value="{{App\Models\klaim::getid($k->idklaim)}} ">{{$k->nama}}</options>

                        @endforeach

                </select>

            </div>







            <div class="m-2" style="float:right">

                <button><img src="{{asset('/img/others/cancel.png')}}" width="20" height="20"></button>

            </div>

            <div class="m-2" style="float:right">

                <button type="submit"><img src="{{asset('/img/others/ok.png')}}" width="20" height="20"></button>

            </div>

            </form>

        </div>

    </div>

   

</div>

<script>

    var pr = document.getElementById("pr");

    var lk = document.getElementById("lk");

    $(document).ready(function() {

        var message = @json($data2 -> dokterbaca_lk);

        $("#l").click(function() {

            $("#lk").val(message);

            $("#l").css("background-color", "ddd");

            $("#p").css("background-color", "");

            pr.style.display = 'none';

            lk.style.display = 'block';



        });

    });

    $(document).ready(function() {

        var message = @json($data2 -> dokterbaca_pr);;

        $("#p").click(function() {

            $("#pr").val(message);

            $("#l").css("background-color", "");

            $("#p").css("background-color", "ddd");

            pr.style.display = 'block';

            lk.style.display = 'none';



        });

    });

</script>

@endsection