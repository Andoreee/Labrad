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

@php

//item-test

    $value1 = "#";

    $value2 = "";

    $value3 = "";

    $value4 = "";

    $value5 = "";

    $value6 = "";

    $value7 = "";

    $value8 = "";

    $value9 = "";

    $value10 = "#";

//biaya

    $biaya1 = array(0,0,0,0,0,0,0);

@endphp

@if(ISSET($itemInput))

    @foreach ($itemInput as $a)

        @php

            $value1 = $a->iditemekg;

            $value2 = $a->namaitem;

            $value3 = $a->biaya_rawatjalan;

            $value4 = $a->biaya_pasienluar;

            $value5 = $a->dokterbaca_lk;

            $value6 = $a->dokterbaca_pr;

            $value7 = $a->tgledit;

            $value8 = $a->idklaim;

            $value9 = $a->grup;

            $value10 = $a->idgrup;

            $disable = '';

        @endphp

    @endforeach

@else

    @php

        $disable = 'disabled';

    @endphp

@endif

@if ($value1 == '#')

    @php

        $popup = 'add';

    @endphp

@endif

@if (ISSET($biaya))

    @php

        $a=0;

    @endphp

        @foreach ($biaya as $x)

            @php

                $biaya1[$a]=$x->biaya;

                $a++;

            @endphp

        @endforeach

@endif

@isset($sendG)

    @php

        $value9 = $sendG->grup;

        $value10 = $sendG->idgrup;

    @endphp

@endisset

@isset($popup)

    @switch($popup)

        @case('add')

        <div class="modal fade" id="popupGtIT" tabindex="-1" aria-labelledby="popupGLabel" aria-hidden="true">

            <div class="modal-dialog">

                <div class="modal-content" >

                    <div class="modal-body">

                        <iframe src="{{ route('windowsIT', ['id' => 'x']) }}" frameborder="0" width="460" height="400">

                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button></iframe>

                    </div>

                </div>

            </div>

        </div>

        @break

        @case('edit')

        <div class="modal fade" id="popupGtITE" tabindex="-1" aria-labelledby="popupGLabel" aria-hidden="true">

            <div class="modal-dialog">

                <div class="modal-content">

                    <div class="modal-body">

                        <iframe src="{{ route('windowsIT', ['id' => $value1]) }}" frameborder="0" width="460" height="400">

                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button></iframe>

                    </div>

                </div>

            </div>

        </div>

        @break

        @default

            

    @endswitch

@endisset





<div>

 <div class="" style="background-color: #97B903;" >{{-- margin: -30px -125px -30px -125px; --}}

    <table>

        <tr>

            <td>

                <img src="{{ asset('/img/menu/lab/data item test.png') }}" width="20" height="20" style="margin: 15px;">

            </td>

            <td>

                <h5 style="margin-top: 6px">Elektrokardiogram - Item Test</h5>

            </td>

        </tr>

    </table>

</div>



<div style="display: grid;

grid-template-columns: 70% 30%">

    <form action="{{ route('windowsPP') }}" method="get" class="row g-3 align-items-center" id="formSearch" style="float:">

    {{-- <div class="row g-3 align-items-center" style=""> --}} 

        <div class="col-1 m-3" style="margin-left: 15px;padding-top: 12px">

            <label for="search" style="margin-right: 0px;color: #800000"><b>Pencarian</b></label>

        </div>

        <div class="col-7">

            <input type="search" name="q" class="" style="width: 100%" value="@if ($value2!=""){{ $value2 }}
            @else{{ request('q') }}
            @endif"/>

        </div>

        <div class="col-3">

            <button type="submit" onclick=""> {{-- window.location.reload(); --}}

                <img src="{{ asset('/img/others/refresh.png') }}" width="20" height="20">

                    Refresh

            </button>

            <button type="button" onclick="parent.sendItemTest('{{ $value1 }}', '{{ $value2 }}', '{{ $value3 }}', '{{ $value4 }}');window.parent.closeModal();window.parent.changetozero();"  {{ $disable }}> {{-- window.location.reload(); --}}

                <img src="{{ asset('/img/others/ok.png') }}" width="20" height="20">

                    Pilih

            </button>

        </div> 

    </form>

            <div class="row" style="padding-top: 3%">

                <div class="col-auto">

                    <a href="{{ route('btnITPP', ['id' => '#', 'sendG' => '#', 'button' => 'create']) }}" style="text-decoration: none;">

                    <button name="btn" value="tambah" disabled>

                        <img src="{{ asset('/img/others/tambah.png') }}" width="20" height="20">

                        Tambah

                    </button>

                    </a>

                    <a href="{{ route('btnITPP', ['id' => $value1, 'sendG' => $value10, 'button' => 'edit']) }}" style="text-decoration: none;">

                    <button name="btn" value="ubah" disabled>

                        <img src="{{ asset('/img/others/ubah.png') }}" width="20" height="20">

                        Ubah

                    </button>

                    </a>

                    <a href="{{ route('btnITPP', ['id' => $value1, 'sendG' => $value10, 'button' => 'delete']) }}" style="text-decoration: none;">

                    <button name="btn" value="hapus" disabled>

                        <img src="{{ asset('/img/others/hapus.png') }}" width="20" height="20">

                        Hapus

                    </button>

                    </a>

                </div>

    </div>

</div>

{{-- <div class="overflow" style="overflow-y:scroll;overflow-x:hidden;height:372px"> --}}

    <div class="row">

        <div class="col-8">

            <div style="overflow-y: auto;height: 330px;overflow-x:hidden">

            <Table class="table table-bordered align-middle" style="background-color: #ffffff;text-align: center;vertical-align: midle;margin-left:2%">

                <thead class="sticky-top border-light" style="background-color:white;">

                <tr>

                    <th rowspan="2" style="vertical-align: middle;">

                        Group

                    </th>

                    <th rowspan="2" style="vertical-align: middle;">

                        Nama Item

                    </th>

                    <th colspan="2">

                        Biaya

                    </th>

                    <th rowspan="2" style="vertical-align: middle;">

                        E-Klaim BPJS

                    </th>

                </tr>

                <tr>

                    <th>

                        Rawat Jalan

                    </th>

                    <th>

                        Pasien Luar

                    </th>

                </tr>

                </thead>

                <tbody  >

                @foreach ($item as $a)

                <form action="{{ route('showITPP',['id'=>$a->iditemekg,'idg'=>$a->idgrup]) }}" method="post">

                @csrf

                <tr align="left">

                    <td>

                        <button class="tdcss" id="td{{$a->iditemekg}}">

                            {{ $a->grup}}

                        </button>

                    </td>

                    <td>

                        <button class="tdcss" id="td{{$a->iditemekg}}">

                            {{ $a->namaitem}}

                        </button>

                    </td>

                    <td>

                        <button class="tdcss" id="td{{$a->iditemekg}}">

                            {{ $a->biaya_rawatjalan}}

                        </button>

                    </td>

                    <td>

                        <button class="tdcss" id="td{{$a->iditemekg}}">

                            {{ $a->biaya_pasienluar}}

                        </button>

                    </td>

                    <td>

                        <button class="tdcss" id="td{{$a->iditemekg}}">

                            {{ $a->nama }}

                        </button>

                    </td>

                    <script>

                        function a(a,b){

                            // window.location.href='/ekg/item-test/'+a+'/'+b;

                            // onclick="a( '{{ $a->iditemekg }}', '{{ $a->idgrup }}' )""

                        }

                    </script>

                </tr>

            </form>

                @endforeach

            </tbody>

            </Table>

        </div>

        {{-- <fieldset class="border p-2">

            <legend  class="w-auto"><b>Format Hasil Pembacaan Dokter</b></legend>

         </fieldset> --}}

         @if (ISSET($btn))

             @switch($btn)

                @case('1')

                 <form action="{{ route('createITPP') }}" method=post name=formIT id=formIT>

                    @csrf

                    <div style="margin-left: 2%">

                                <fieldset class="border p-2" style="border: #DCDCDC">

                                <legend  class="float-none w-auto p-2" style="font-size: 20px;margin-bottom:-10px;"><b>Format Hasil Pembacaan Dokter</b></legend>

                                <div class="row">

                                    <div class="col-auto" style="width: 120px;margin-left: 2%;">

                                <button type=button class="btnfh1" style="outline: none;" onclick="btn(2)" id="btn1">

                                    Laki - Laki

                                </button>

                                    </div>

                                    <div class="col-1" style="width:0px;border-right: 1px solid #ddd;border-left: 1px solid #ddd;"></div>

                                    <div class="col-auto">

                                <button type=button class="btnfh2" onclick="btn(1)" id="btn2">

                                    Perempuan

                                </button>

                                    </div>

                                <textarea form="formIT" id="lk" class="m-2" name="komenLK" style="resize: none;width:840px;height:200px;display:block"></textarea>

                                <textarea form="formIT" id="pr" class="m-2" name="komenPR" style="resize: none;width:840px;height:200px;display:none"></textarea>

                                </fieldset>

                            </div>

                            </div>

                            <script>

                                var btn1 = document.getElementById("btn1");

                                var btn2 = document.getElementById("btn2");

                                var e = document.getElementById("lk");

                                var f = document.getElementById("pr");

                                function btn(btn){

                                    if(btn==2){

                                        btn1.classList.add("btnfh1");

                                        btn1.classList.remove("btnfh2");

                                        btn2.classList.remove("btnfh1");

                                        btn2.classList.add("btnfh2");

                                        e.style.display = "block";

                                        f.style.display = "none";

                                    }

                                    else{

                                        btn1.classList.add("btnfh2");

                                        btn1.classList.remove("btnfh1");

                                        btn2.classList.remove("btnfh2");

                                        btn2.classList.add("btnfh1");

                                        f.style.display = "block";

                                        e.style.display = "none";

                                    }

                                }

                            </script>

                            <div class="col-4">

                                <div class="m-2">

                                    <label>Nama Item</label><br>

                                    <input type="text" class="" style="width: 100%;" name=name value="{{ old('name') }}" maxlength=50>

                                </div>

                                <div class="m-2">

                                    <input type=hidden name=idG value='{{ $value10 }}'>

                                    <label>Group</label><br>

                                    <input required  onkeydown="return false;" type="text" class="" style="width: 85%;" name=grup value="{{ $value9 }}">

                                    <button data-bs-toggle="modal" data-bs-target="#popupGtIT" type=button style=""><img class="mb-1" src="{{ asset('/img/others/pratinjau.png') }}" width="20" height="20"></button>

                                </div>

                                <div class="m-2">

                                    <label>Biaya Rawat Jalan</label><br>

                                    <input type="Number" class="" style="width: 100%;" name=biayaRJ value="0" max=2147483647>

                                </div> 

                                <div class="m-2">

                                    <label>Biaya Pasien Luar</label><br>

                                    <input type="Number" class="" style="width: 100%;" name=biayaPL value="0" max=2147483647>

                                </div> 

                                <div class="m-2">

                                    <label>Biaya Rawat Inap</label><br>

                                    <table class="table table-sm table-bordered border" style="border-block-color: #ddd">

                                        <thead>

                                            <tr>

                                                <th width=30px bgcolor="#ddd">

                                                </th>

                                                <th>

                                                    Kelas

                                                </th>

                                                <th>

                                                    Biaya

                                                </th>

                                            </tr>

                                        </thead>

                                        <tbody style="background-color: white;">

                                            <tr>

                                                <td>

                                                </td>

                                                <td>

                                                    VVIP

                                                </td>

                                                <td>

                                                    <input type="number" name="kelas1" class="inputable" value="0" max=2147483647>

                                                </td>

                                            </tr>

                                            <tr>

                                                <td>

                                                </td>

                                                <td>

                                                    VIP

                                                </td>

                                                <td>

                                                    <input type="number" name="kelas2" class="inputable" value="0" max=2147483647>

                                                </td>

                                            </tr>

                                            <tr>

                                                <td>

                                                </td>

                                                <td>

                                                    Kelas I

                                                </td>

                                                <td>

                                                    <input type="number" name="kelas3" class="inputable" value="0" max=2147483647>

                                                </td>

                                            </tr>

                                            <tr>

                                                <td>

                                                </td>

                                                <td>

                                                    Kelas II

                                                </td>

                                                <td>

                                                    <input type="number" name="kelas4" class="inputable" value="0" max=2147483647>

                                                </td>

                                            </tr>

                                            <tr>

                                                <td>

                                                </td>

                                                <td>

                                                    Kelas III

                                                </td>

                                                <td>

                                                    <input type="number" name="kelas5" class="inputable" value="0" max=2147483647>

                                                </td>

                                            </tr>

                                            <tr>

                                                <td>

                                                </td>

                                                <td>

                                                    HCU

                                                </td>

                                                <td>

                                                    <input type="number" name="kelas6" class="inputable" value="0" max=2147483647>

                                                </td>

                                            </tr>

                                            <tr>

                                                <td>

                                                </td>

                                                <td>

                                                    ISOLASI

                                                </td>

                                                <td>

                                                    <input type="number" name="kelas7" class="inputable" value="0" max=2147483647>

                                                </td>

                                            </tr>

                                        </tbody>

                                    </table>

                                </div> 

                                <div class="m-2">

                                    <label>E-Klaim BPJS</label><br>

                                    <select name=eklaim class="" style="width: 100%;">

                                        @foreach ($eklaim as $e)

                                        @php

                                            $select= '';

                                        @endphp

                                        @if ($e->idklaim==$value8)

                                            @php

                                                $select = 'selected';

                                            @endphp

                                        @endif

                                        <option {{$select}} value="{{$e->idklaim}}">{{$e->nama}}</option>

                                        @endforeach

                                    </select>

                                </div> 

                                <button type=reset class=m-2 style="float: right"><img src="{{ asset('/img/others/cancel.png') }}" width="20" height="20"></button>

                                <button type=submit class=m-2 style="float: right"><img src="{{ asset('/img/others/ok.png') }}" width="20" height="20"></button>

                            </div>

                            </form>

                        </div>

                @break

                @case('2')

                    <form action="{{ route('editITPP', ['id' => $value1, 'idg' => $value10]) }}" method=post name=formIT id=formIT>

                    @csrf

                    @method('put')

                    <div style="margin-left: 2%">

                                <fieldset class="border p-2" style="border: #DCDCDC">

                                <legend  class="float-none w-auto p-2" style="font-size: 20px;margin-bottom:-10px;"><b>Format Hasil Pembacaan Dokter</b></legend>

                                <div class="row">

                                    <div class="col-auto" style="width: 120px;margin-left: 2%;">

                                <button type=button class="btnfh1" style="outline: none;" onclick="btn(2)" id="btn1">

                                    Laki - Laki

                                </button>

                                    </div>

                                    <div class="col-1" style="width:0px;border-right: 1px solid #ddd;border-left: 1px solid #ddd;"></div>

                                    <div class="col-auto">

                                <button type=button class="btnfh2" onclick="btn(1)" id="btn2">

                                    Perempuan

                                </button>

                                    </div>

                                <textarea form="formIT" id="lk" class="m-2" name="komenLK" style="resize: none;width:840px;height:200px;display:block">{{ $value5 }}</textarea>

                                <textarea form="formIT" id="pr" class="m-2" name="komenPR" style="resize: none;width:840px;height:200px;display:none">{{ $value6 }}</textarea>

                                </fieldset>

                            </div>

                            </div>

                            <script>

                                var btn1 = document.getElementById("btn1");

                                var btn2 = document.getElementById("btn2");

                                var e = document.getElementById("lk");

                                var f = document.getElementById("pr");

                                function btn(btn){

                                    if(btn==2){

                                        btn1.classList.add("btnfh1");

                                        btn1.classList.remove("btnfh2");

                                        btn2.classList.remove("btnfh1");

                                        btn2.classList.add("btnfh2");

                                        e.style.display = "block";

                                        f.style.display = "none";

                                    }

                                    else{

                                        btn1.classList.add("btnfh2");

                                        btn1.classList.remove("btnfh1");

                                        btn2.classList.remove("btnfh2");

                                        btn2.classList.add("btnfh1");

                                        f.style.display = "block";

                                        e.style.display = "none";

                                    }

                                }

                            </script>

                            <div class="col-4">

                                <div class="m-2">

                                <input type=hidden name=id value='{{ $value1 }}'>

                                    <label>Nama Item</label><br>

                                    <input type="text" class="" style="width: 100%;" name=name value="{{ $value2 }}" maxlength=50>

                                </div>

                                <div class="m-2">

                                    <input type=hidden name=idG value='{{ $value10 }}'>

                                    <label>Group</label><br>

                                    <input readonly type="text" class="" style="width: 85%;" name=grup value="{{ $value9 }}">

                                    <button data-bs-toggle="modal" data-bs-target="#popupGtITE" type=button style=""><img class="mb-1" src="{{ asset('/img/others/pratinjau.png') }}" width="20" height="20"></button>

                                </div>

                                <div class="m-2">

                                    <label>Biaya Rawat Jalan</label><br>

                                    <input type="Number" class="" style="width: 100%;" name=biayaRJ value="{{ $value3 }}" max=2147483647>

                                </div> 

                                <div class="m-2">

                                    <label>Biaya Pasien Luar</label><br>

                                    <input type="Number" class="" style="width: 100%;" name=biayaPL value="{{ $value4 }}" max=2147483647>

                                </div> 

                                <div class="m-2">

                                    <label>Biaya Rawat Inap</label><br>

                                    <table class="table table-sm table-bordered border" style="border-block-color: #ddd">

                                        <thead>

                                            <tr>

                                                <th width=30px bgcolor="#ddd">

                                                </th>

                                                <th>

                                                    Kelas

                                                </th>

                                                <th>

                                                    Biaya

                                                </th>

                                            </tr>

                                        </thead>

                                        <tbody style="background-color: white;">

                                            <tr>

                                                <td>

                                                </td>

                                                <td>

                                                    VVIP

                                                </td>

                                                <td>

                                                    <input type="number" name="kelas1" class="inputable" value="{{$biaya1[0]}}" max=2147483647>

                                                </td>

                                            </tr>

                                            <tr>

                                                <td>

                                                </td>

                                                <td>

                                                    VIP

                                                </td>

                                                <td>

                                                    <input type="number" name="kelas2" class="inputable" value="{{$biaya1[1]}}" max=2147483647>

                                                </td>

                                            </tr>

                                            <tr>

                                                <td>

                                                </td>

                                                <td>

                                                    Kelas I

                                                </td>

                                                <td>

                                                    <input type="number" name="kelas3" class="inputable" value="{{$biaya1[2]}}" max=2147483647>

                                                </td>

                                            </tr>

                                                <td>

                                                </td>

                                                <td>

                                                    Kelas II

                                                </td>

                                                <td>

                                                    <input type="number" name="kelas4" class="inputable" value="{{$biaya1[3]}}" max=2147483647>

                                                </td>

                                            </tr>

                                            <tr>

                                                <td>

                                                </td>

                                                <td>

                                                    Kelas III

                                                </td>

                                                <td>

                                                    <input type="number" name="kelas5" class="inputable" value="{{$biaya1[4]}}" max=2147483647>

                                                </td>

                                            </tr>

                                            <tr>

                                                <td>

                                                </td>

                                                <td>

                                                    HCU

                                                </td>

                                                <td>

                                                    <input type="number" name="kelas6" class="inputable" value="{{$biaya1[5]}}" max=2147483647>

                                                </td>

                                            </tr>

                                            <tr>

                                                <td>

                                                </td>

                                                <td>

                                                    ISOLASI

                                                </td>

                                                <td>

                                                    <input type="number" name="kelas7" class="inputable" value="{{$biaya1[6]}}" max=2147483647>

                                                </td>

                                            </tr>

                                        </tbody>

                                    </table>

                                </div> 

                                <div class="m-2">

                                    <label>E-Klaim BPJS</label><br>

                                    <select name=eklaim class="" style="width: 100%;">

                                        @foreach ($eklaim as $e)

                                        @php

                                            $select= '';

                                        @endphp

                                        @if ($e->idklaim==$value8)

                                            @php

                                                $select = 'selected';

                                            @endphp

                                        @endif

                                        <option {{$select}} value="{{$e->idklaim}}">{{$e->nama}}</option>

                                        @endforeach

                                    </select>

                                </div> 

                                <button type=reset class=m-2 style="float: right"><img src="{{ asset('/img/others/cancel.png') }}" width="20" height="20"></button>

                                <button type=submit class=m-2 style="float: right"><img src="{{ asset('/img/others/ok.png') }}" width="20" height="20"></button>

                            </div>

                            </form>

                        </div>

                @break

                @case('3')

                    <form action="{{ route('deleteITPP', ['id' => $value1, 'idg' => $value10]) }}" method=post name=formIT id=formIT>

                    @csrf

                    @method('delete')

                    <div style="margin-left: 2%">

                                <fieldset class="border p-2" style="border: #DCDCDC">

                                <legend  class="float-none w-auto p-2" style="font-size: 20px;margin-bottom:-10px;"><b>Format Hasil Pembacaan Dokter</b></legend>

                                <div class="row">

                                    <div class="col-auto" style="width: 120px;margin-left: 2%;">

                                <button type=button class="btnfh1" style="outline: none;" onclick="btn(2)" id="btn1">

                                    Laki - Laki

                                </button>

                                    </div>

                                    <div class="col-1" style="width:0px;border-right: 1px solid #ddd;border-left: 1px solid #ddd;"></div>

                                    <div class="col-auto">

                                <button type=button class="btnfh2" onclick="btn(1)" id="btn2">

                                    Perempuan

                                </button>

                                    </div>

                                <textarea disabled form="formIT" id="lk" class="m-2" name="komenLK" style="resize: none;width:840px;height:200px;display:block">{{ $value5 }}</textarea>

                                <textarea disabled form="formIT" id="pr" class="m-2" name="komenPR" style="resize: none;width:840px;height:200px;display:none">{{ $value6 }}</textarea>

                                </fieldset>

                            </div>

                            </div>

                            <script>

                                var btn1 = document.getElementById("btn1");

                                var btn2 = document.getElementById("btn2");

                                var e = document.getElementById("lk");

                                var f = document.getElementById("pr");

                                function btn(btn){

                                    if(btn==2){

                                        btn1.classList.add("btnfh1");

                                        btn1.classList.remove("btnfh2");

                                        btn2.classList.remove("btnfh1");

                                        btn2.classList.add("btnfh2");

                                        e.style.display = "block";

                                        f.style.display = "none";

                                    }

                                    else{

                                        btn1.classList.add("btnfh2");

                                        btn1.classList.remove("btnfh1");

                                        btn2.classList.remove("btnfh2");

                                        btn2.classList.add("btnfh1");

                                        f.style.display = "block";

                                        e.style.display = "none";

                                    }

                                }

                            </script>

                            <div class="col-4">

                                <div class="m-2">

                                <input type=hidden name=id value='{{ $value1 }}'>

                                    <label>Nama Item</label><br>

                                    <input disabled type="text" class="" style="width: 100%;" name=name value="{{ $value2 }}" maxlength=50>

                                </div>

                                <div class="m-2">

                                    <input type=hidden name=idG value='{{ $value10 }}'>

                                    <label>Group</label><br>

                                    <input disabled readonly type="text" class="" style="width: 85%;" name=grup value="{{ $value9 }}">

                                    <button disabled data-bs-toggle="modal" data-bs-target="#popupGtITE" type=button style=""><img class="mb-1" src="{{ asset('/img/others/pratinjau.png') }}" width="20" height="20"></button>

                                </div>

                                <div class="m-2">

                                    <label>Biaya Rawat Jalan</label><br>

                                    <input disabled type="Number" class="" style="width: 100%;" name=biayaRJ value="{{ $value3 }}" max=2147483647>

                                </div> 

                                <div class="m-2">

                                    <label>Biaya Pasien Luar</label><br>

                                    <input disabled type="Number" class="" style="width: 100%;" name=biayaPL value="{{ $value4 }}" max=2147483647>

                                </div> 

                                <div class="m-2">

                                    <label>Biaya Rawat Inap</label><br>

                                    <table class="table table-sm table-bordered border" style="border-block-color: #ddd">

                                        <thead>

                                            <tr>

                                                <th width=30px bgcolor="#ddd">

                                                </th>

                                                <th>

                                                    Kelas

                                                </th>

                                                <th>

                                                    Biaya

                                                </th>

                                            </tr>

                                        </thead>

                                        <tbody style="background-color: white;">

                                            <tr>

                                                <td>

                                                </td>

                                                <td>

                                                    VVIP

                                                </td>

                                                <td>

                                                    <input disabled disabled type="number" name="kelas1" class="inputable" value="{{$biaya1[0]}}" max=2147483647>

                                                </td>

                                            </tr>

                                            <tr>

                                                <td>

                                                </td>

                                                <td>

                                                    VIP

                                                </td>

                                                <td>

                                                    <input disabled type="number" name="kelas2" class="inputable" value="{{$biaya1[1]}}" max=2147483647>

                                                </td>

                                            </tr>

                                            <tr>

                                                <td>

                                                </td>

                                                <td>

                                                    Kelas I

                                                </td>

                                                <td>

                                                    <input disabled type="number" name="kelas3" class="inputable" value="{{$biaya1[2]}}" max=2147483647>

                                                </td>

                                            </tr>

                                                <td>

                                                </td>

                                                <td>

                                                    Kelas II

                                                </td>

                                                <td>

                                                    <input disabled type="number" name="kelas4" class="inputable" value="{{$biaya1[3]}}" max=2147483647>

                                                </td>

                                            </tr>

                                            <tr>

                                                <td>

                                                </td>

                                                <td>

                                                    Kelas III

                                                </td>

                                                <td>

                                                    <input disabled type="number" name="kelas5" class="inputable" value="{{$biaya1[4]}}" max=2147483647>

                                                </td>

                                            </tr>

                                            <tr>

                                                <td>

                                                </td>

                                                <td>

                                                    HCU

                                                </td>

                                                <td>

                                                    <input disabled type="number" name="kelas6" class="inputable" value="{{$biaya1[5]}}" max=2147483647>

                                                </td>

                                            </tr>

                                            <tr>

                                                <td>

                                                </td>

                                                <td>

                                                    ISOLASI

                                                </td>

                                                <td>

                                                    <input disabled type="number" name="kelas7" class="inputable" value="{{$biaya1[6]}}" max=2147483647>

                                                </td>

                                            </tr>

                                        </tbody>

                                    </table>

                                </div> 

                                <div class="m-2">

                                    <label>E-Klaim BPJS</label><br>

                                    <select disabled name=eklaim class="" style="width: 100%;">

                                        @foreach ($eklaim as $e)

                                        @php

                                            $select= '';

                                        @endphp

                                        @if ($e->idklaim==$value8)

                                            @php

                                                $select = 'selected';

                                            @endphp

                                        @endif

                                        <option {{$select}} value="{{$e->idklaim}}">{{$e->nama}}</option>

                                        @endforeach

                                    </select>

                                </div> 

                                <p style="text-align: right;margin-right:10px"><i>Yakin ingin  menghapus data diatas?</i></p>   

                                <button autofocus name=hapus value=false class=m-2 style="float: right"><img src="{{ asset('/img/others/cancel.png') }}" width="20" height="20"></button>

                                <button name=hapus value=true class=m-2 style="float: right"><img src="{{ asset('/img/others/ok.png') }}" width="20" height="20"></button>

                            </div>

                            </form>

                        </div>

                @break

                @default

                     

             @endswitch

         @else

         @if ($value1 == '#')

            <form action="{{ route('createITPP') }}" method=post name=formIT id=formIT>

            @csrf

            <div style="margin-left: 2%">

                        <fieldset class="border p-2" style="border: #DCDCDC">

                        <legend  class="float-none w-auto p-2" style="font-size: 20px;margin-bottom:-10px;"><b>Format Hasil Pembacaan Dokter</b></legend>

                        <div class="row">

                            <div class="col-auto" style="width: 120px;margin-left: 2%;">

                        <button type=button class="btnfh1" style="outline: none;" onclick="btn(2)" id="btn1">

                            Laki - Laki

                        </button>

                            </div>

                            <div class="col-1" style="width:0px;border-right: 1px solid #ddd;border-left: 1px solid #ddd;"></div>

                            <div class="col-auto">

                        <button type=button class="btnfh2" onclick="btn(1)" id="btn2">

                            Perempuan

                        </button>

                            </div>

                        <textarea form="formIT" id="lk" class="m-2" name="komenLK" style="resize: none;width:840px;height:200px;display:block"></textarea>

                        <textarea form="formIT" id="pr" class="m-2" name="komenPR" style="resize: none;width:840px;height:200px;display:none"></textarea>

                        </fieldset>

                    </div>

                    </div>

                    <script>

                        var btn1 = document.getElementById("btn1");

                        var btn2 = document.getElementById("btn2");

                        var e = document.getElementById("lk");

                        var f = document.getElementById("pr");

                        function btn(btn){

                            if(btn==2){

                                btn1.classList.add("btnfh1");

                                btn1.classList.remove("btnfh2");

                                btn2.classList.remove("btnfh1");

                                btn2.classList.add("btnfh2");

                                e.style.display = "block";

                                f.style.display = "none";

                            }

                            else{

                                btn1.classList.add("btnfh2");

                                btn1.classList.remove("btnfh1");

                                btn2.classList.remove("btnfh2");

                                btn2.classList.add("btnfh1");

                                f.style.display = "block";

                                e.style.display = "none";

                            }

                        }

                    </script>

                    <div class="col-4">

                        <div class="m-2">

                            <label>Nama Item</label><br>

                            <input type="text" class="" style="width: 100%;" name=name value="{{ old('name') }}" maxlength=50>

                        </div>

                        <div class="m-2">

                            <input type=hidden name=idG value='{{ $value10 }}'>

                            <label>Group</label><br>

                            <input required  onkeydown="return false;" type="text" class="" style="width: 85%;" name=grup value="{{ $value9 }}">

                            <button data-bs-toggle="modal" data-bs-target="#popupGtIT" type=button style=""><img class="mb-1" src="{{ asset('/img/others/pratinjau.png') }}" width="20" height="20"></button>

                        </div>

                        <div class="m-2">

                            <label>Biaya Rawat Jalan</label><br>

                            <input type="Number" class="" style="width: 100%;" name=biayaRJ value="0" max=2147483647>

                        </div> 

                        <div class="m-2">

                            <label>Biaya Pasien Luar</label><br>

                            <input type="Number" class="" style="width: 100%;" name=biayaPL value="0" max=2147483647>

                        </div> 

                        <div class="m-2">

                            <label>Biaya Rawat Inap</label><br>

                            <table class="table table-sm table-bordered border" style="border-block-color: #ddd">

                                <thead>

                                    <tr>

                                        <th width=30px bgcolor="#ddd">

                                        </th>

                                        <th>

                                            Kelas

                                        </th>

                                        <th>

                                            Biaya

                                        </th>

                                    </tr>

                                </thead>

                                <tbody style="background-color: white;">

                                    <tr>

                                        <td>

                                        </td>

                                        <td>

                                            VVIP

                                        </td>

                                        <td>

                                            <input type="number" name="kelas1" class="inputable" value="0" max=2147483647>

                                        </td>

                                    </tr>

                                    <tr>

                                        <td>

                                        </td>

                                        <td>

                                            VIP

                                        </td>

                                        <td>

                                            <input type="number" name="kelas2" class="inputable" value="0" max=2147483647>

                                        </td>

                                    </tr>

                                    <tr>

                                        <td>

                                        </td>

                                        <td>

                                            Kelas I

                                        </td>

                                        <td>

                                            <input type="number" name="kelas3" class="inputable" value="0" max=2147483647>

                                        </td>

                                    </tr>

                                    <tr>

                                        <td>

                                        </td>

                                        <td>

                                            Kelas II

                                        </td>

                                        <td>

                                            <input type="number" name="kelas4" class="inputable" value="0" max=2147483647>

                                        </td>

                                    </tr>

                                    <tr>

                                        <td>

                                        </td>

                                        <td>

                                            Kelas III

                                        </td>

                                        <td>

                                            <input type="number" name="kelas5" class="inputable" value="0" max=2147483647>

                                        </td>

                                    </tr>

                                    <tr>

                                        <td>

                                        </td>

                                        <td>

                                            HCU

                                        </td>

                                        <td>

                                            <input type="number" name="kelas6" class="inputable" value="0" max=2147483647>

                                        </td>

                                    </tr>

                                    <tr>

                                        <td>

                                        </td>

                                        <td>

                                            ISOLASI

                                        </td>

                                        <td>

                                            <input type="number" name="kelas7" class="inputable" value="0" max=2147483647>

                                        </td>

                                    </tr>

                                </tbody>

                            </table>

                        </div> 

                        <div class="m-2">

                            <label>E-Klaim BPJS</label><br>

                            <select name=eklaim class="" style="width: 100%;">

                                @foreach ($eklaim as $e)

                                @php

                                    $select= '';

                                @endphp

                                @if ($e->idklaim==$value8)

                                    @php

                                        $select = 'selected';

                                    @endphp

                                @endif

                                <option {{$select}} value="{{$e->idklaim}}">{{$e->nama}}</option>

                                @endforeach

                            </select>

                        </div> 

                        <button type=reset class=m-2 style="float: right"><img src="{{ asset('/img/others/cancel.png') }}" width="20" height="20"></button>

                        <button disabled type=submit class=m-2 style="float: right"><img src="{{ asset('/img/others/ok.png') }}" width="20" height="20"></button>

                    </div>

                    </form>

                </div>

         @else

                <div style="margin-left: 2%">

                    <fieldset class="border p-2" style="border: #DCDCDC">

                    <legend  class="float-none w-auto p-2" style="font-size: 20px;margin-bottom:-10px;"><b>Format Hasil Pembacaan Dokter</b></legend>

                    <div class="row">

                        <div class="col-auto" style="width: 120px;margin-left: 2%;">

                    <button class="btnfh1" style="outline: none;" onclick="btn(2)" id="btn1">

                        Laki - Laki

                    </button>

                        </div>

                        <div class="col-1" style="width:0px;border-right: 1px solid #ddd;border-left: 1px solid #ddd;"></div>

                        <div class="col-auto">

                    <button class="btnfh2" onclick="btn(1)" id="btn2">

                        Perempuan

                    </button>

                        </div>

                    <textarea readonly id="lk" class="m-2" name="comment" style="resize: none;width:840px;height:200px;display:block">{{$value5}}</textarea>

                    <textarea readonly id="pr" class="m-2" name="comment" style="resize: none;width:840px;height:200px;display:none">{{$value6}}</textarea>

                    </fieldset>

                </div>

                </div>

                <script>

                    var btn1 = document.getElementById("btn1");

                    var btn2 = document.getElementById("btn2");

                    var e = document.getElementById("lk");

                    var f = document.getElementById("pr");

                    function btn(btns){

                        if(btns==2){

                            btn1.classList.add("btnfh1");

                            btn1.classList.remove("btnfh2");

                            btn2.classList.remove("btnfh1");

                            btn2.classList.add("btnfh2");

                            e.style.display = 'block';

                            f.style.display = 'none';

                        }

                        else{

                            btn1.classList.add("btnfh2");

                            btn1.classList.remove("btnfh1");

                            btn2.classList.remove("btnfh2");

                            btn2.classList.add("btnfh1");

                            f.style.display = 'block';

                            e.style.display = 'none';

                        }

                    }

                </script>

                <div class="col-4">

                    <div class="m-2">

                        <label>Nama Item</label><br>

                        <input readonly type="text" class="" style="width: 100%;" value="{{$value2}}">

                    </div>

                    <div class="m-2">

                        <label>Group</label><br>

                        <input readonly type="text" class="" style="width: 85%;" value="{{$value9}}">

                        <button disabled style=""><img class="mb-1" src="{{ asset('/img/others/pratinjau.png') }}" width="20" height="20"></button>

                    </div>

                    <div class="m-2">

                        <label>Biaya Rawat Jalan</label><br>

                        <input readonly type="Number" class="" style="width: 100%;" value="{{$value3}}">

                    </div> 

                    <div class="m-2">

                        <label>Biaya Pasien Luar</label><br>

                        <input readonly type="Number" class="" style="width: 100%;" value="{{$value4}}">

                    </div> 

                    <div class="m-2">

                        <label>Biaya Rawat Inap</label><br>

            {{-- style="border: 1px solid black;border-collapse: collapse;" --}}

                        <table class="table table-sm table-bordered border" style="border-block-color: #ddd">

                            <thead>

                                <tr>

                                    <th width=30px bgcolor="#ddd">

                                    </th>

                                    <th>

                                        Kelas

                                    </th>

                                    <th>

                                        Biaya

                                    </th>

                                </tr>

                            </thead>

                            <tbody style="background-color: white;">

                                @if (ISSET($biaya))

                                    @foreach ($biaya as $b)

                                        <tr>

                                            <td></td>

                                            <td>

                                                @switch($b->kodekelas)

                                                    @case(1)

                                                        VVIP

                                                        @break

                                                    @case(2)

                                                        VIP

                                                        @break

                                                    @case(3)

                                                        Kelas I

                                                        @break

                                                    @case(4)

                                                        Kelas II

                                                        @break

                                                    @case(5)

                                                        Kelas III

                                                        @break

                                                    @case(6)

                                                        HCU

                                                        @break

                                                    @case(7)

                                                        ISOLASI

                                                        @break

                                                    @default

                                                        ERROR::INVAILID KODEKELAS

                                                @endswitch

                                            </td>

                                            <td>

                                                <input readonly type="number" name="biayarawat{{$b->kodekelas}}" class="inputable" value="{{$b->biaya}}">

                                            </td>

                                        </tr>

                                    @endforeach

                                @else

                                <tr>

                                    <td>

                                    </td>

                                    <td>

                                        VVIP

                                    </td>

                                    <td>

                                        <input readonly type="number" name="" class="inputable" value="0">

                                    </td>

                                </tr>

                                <tr>

                                    <td>

                                    </td>

                                    <td>

                                        VIP

                                    </td>

                                    <td>

                                        <input readonly type="number" name="" class="inputable" value="0">

                                    </td>

                                </tr>

                                <tr>

                                    <td>

                                    </td>

                                    <td>

                                        Kelas I

                                    </td>

                                    <td>

                                        <input readonly type="number" name="" class="inputable" value="0">

                                    </td>

                                </tr>

                                <tr>

                                    <td>

                                    </td>

                                    <td>

                                        Kelas II

                                    </td>

                                    <td>

                                        <input readonly type="number" name="" class="inputable" value="0">

                                    </td>

                                </tr>

                                <tr>

                                    <td>

                                    </td>

                                    <td>

                                        Kelas III

                                    </td>

                                    <td>

                                        <input readonly type="number" name="" class="inputable" value="0">

                                    </td>

                                </tr>

                                <tr>

                                    <td>

                                    </td>

                                    <td>

                                        HCU

                                    </td>

                                    <td>

                                        <input readonly type="number" name="" class="inputable" value="0">

                                    </td>

                                </tr>

                                <tr>

                                    <td>

                                    </td>

                                    <td>

                                        ISOLASI

                                    </td>

                                    <td>

                                        <input readonly type="number" name="" class="inputable" value="0">

                                    </td>

                                </tr>

                                @endif

                            </tbody>

                        </table>

                    </div> 

                    <div class="m-2">

                        <label>E-Klaim BPJS</label><br>

                        <select disabled class="" style="width: 100%;">

                            @foreach ($eklaim as $e)

                            @php

                                $select= '';

                            @endphp

                            @if ($e->idklaim==$value8)

                                @php

                                    $select = 'selected';

                                @endphp

                            @endif

                            <option {{$select}} value="{{$e->idklaim}}">{{$e->nama}}</option>

                            @endforeach

                        </select>

                    </div> 

                    <button disabled class=m-2 style="float: right"><img src="{{ asset('/img/others/cancel.png') }}" width="20" height="20"></button>

                    <button disabled class=m-2 style="float: right"><img src="{{ asset('/img/others/ok.png') }}" width="20" height="20"></button>

                </div>''

            </div>

         @endif

    @endif

</div>

</div>

{{-- </div> --}}

<style>

    .abtn,.abtn:hover{

        display: block;

        background: #F0F0F0;

        padding: 1px;

        text-align: center;

        color: #000;

        text-decoration: none;

        width: 120px;

        border: solid black 2px

    }

    .tdcss{

        background-color: #ffffff;

        border: none;

        color: #000;

        text-align: left;

        text-decoration: none;

        display: inline-block;

        cursor: pointer;

        width: 100%;

    }

    .tdcss:focus,.tdcss:active{

        background-color: #0078D7;

        color: #ffffff;

    }

    .inputable, .inputable:focus{

        border: 0px;

        width: 100%

    }

    .btnfh2{

        outline: none;

        border: none

    }

    .btnfh1{

        outline: none;

        border-right: 1px solid #000;

        border-bottom: 1px solid #000;

        background-color: #ffffff;

    }
    body{
        zoom:67%;
        background-color: #F0F0F0;
        overflow-x: hidden;
    }

</style>

</body>
</html>


