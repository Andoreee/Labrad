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
        {{-- POP UP MULAI--}}

        @php

            $id = '#';

            $idGrp = '#';

            $value = "";

            $value0 = "";

            $value1 = "";

            $value2 = "";

            $value3 = "";

            $idG = '';

            $grup = '';



        @endphp

        @isset($idsg)

            @php

                $id = $idsg;

                $idGrp = $idgrp;

            @endphp

        @endisset

        @if(ISSET($subGroupInput))

                @php

                    $value = $subGroupInput->idsubgrup;

                    $value0 = $subGroupInput->idgrup;

                    $value1 = $subGroupInput->EkgGrup->grup;

                    $value2 = $subGroupInput->kodesubgrup;

                    $value3 = $subGroupInput->subgrup;

                    $disable = '';

                @endphp

        @else

            @php

                $disable = 'disabled';

            @endphp

        @endif

        @isset($valueinput)

            @php

                    $value = $valueinput->idsubgrup;

                    $value0 = $valueinput->idgrup;

                    $value1 = $valueinput->EkgGrup->grup;

                    $value2 = $valueinput->kodesubgrup;

                    $value3 = $valueinput->subgrup;

            @endphp

        @endisset

        @isset($sendG)

            @php

                $idG = $sendidG;

                $grup = $sendG;

            @endphp

        @endisset

        @isset($valueinputtanpagrup)

            @php

                    $value = $valueinputtanpagrup->idsubgrup;

                    $value0 = $sendidG;

                    $value1 = $sendG;

                    $value2 = $valueinputtanpagrup->kodesubgrup;

                    $value3 = $valueinputtanpagrup->subgrup;

            @endphp

        @endisset

        @if ($value=='')

            @php

                $popup = 'add';

            @endphp

        @endif

        @isset($createValueinput)

            @php

                $value0 = $createValueinput->idgrup;

                $value1 = $createValueinput->grup;

            @endphp

        @endisset

        @if (ISSET($popup))

                @switch($popup)

                    @case('add')

                        <div class="modal fade" id="popupG" tabindex="-1" aria-labelledby="popupGLabel" aria-hidden="true">

                            <div class="modal-dialog">

                                <div class="modal-content" >

                                    <div class="modal-body">

                                        <iframe src="{{ route('windowsedit.subgrup', ['id' => 'x']) }}" frameborder="0" width="460" height="400">

                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button></iframe>

                                    </div>

                                </div>

                            </div>

                        </div>

                        @break

                    @case('update')

                        <div class="modal fade" id="popupGedit" tabindex="-1" aria-labelledby="popupGLabel" aria-hidden="true">

                            <div class="modal-dialog">

                                <div class="modal-content" >

                                    <div class="modal-body">

                                        <iframe src="{{ route('windowsedit.subgrup', ['id' => $value]) }}" frameborder="0" width="460" height="400">

                                        </iframe>{{-- edit?id='.$value.'&grup='.$value1.'&kdSG='.$value2.'&SG='.$value3.'--}}

                                    </div>

                                </div>

                            </div>

                        </div>

                        @break

                    @default

                @endswitch

        @endif

<div>

 <div class="" style="background-color: #97B903;" >{{-- margin: -30px -125px -30px -125px; --}}

    <table>

        <tr>

            <td>

                <img src="{{ asset('/img/menu/lab/sub group.png') }}" width="20" height="20" style="margin: 15px;">

            </td>

            <td>

                <h5 style="margin-top: 6px">Elektrokardiogram - Sub Group</h5>  

            </td>

        </tr>

        <a href="javascript:void(0)" onclick="window.close()" class="btn btn-danger mt-2" style="float: right"> <b>X</b> </a>

    </table>

</div>

{{-- <div style="display: grid;

grid-template-columns: 80% 20%"> --}}
<div class="row">
    <div class="col-8">

        <form action="{{ route('subGrup') }}" method="get" class="row g-3 align-items-center" id="formSearch" style="float:">

        <div class="col-2 m-3" style="margin-left: 15px;padding-top: 12px">

            <label for="search" style="margin-right: 0px;color: #800000"><b>Pencarian</b></label>

        </div>

        <div class="col-6">

            <input type="search" name="q" class="" style="width: 110%;margin-left:-20px" value="{{ request('q') }}" maxlength="31">

        </div>

        <div class="col-3">

            <button type="submit" onclick=""> {{-- window.location.reload(); --}}

                <img src="{{ asset('/img/others/refresh.png') }}" width="20" height="20">

                    Refresh

            </button>

        </div> 

    </form>
    </div>

    {{-- <form action="{{ route('btnSG') }}" class="row" style="padding-top: 3%" method="GET">

        @csrf --}}
        <div class="col-4">
        <div class="row" style="padding-top: 3%">

        <div class="col-auto">

            <input type="hidden" name="idSG" value="{{$value}}">

            <a href="{{ route('btnSG', ['id' => '#', 'sendG' => '#', 'button' => 'create']) }}"  style="text-decoration: none;">

                <button name="btn" value="tambah">

                    <img src="{{ asset('/img/others/tambah.png') }}" width="20" height="20">

                    Tambah

                </button>

            </a>

            <a href="{{ route('btnSG', ['id' => $id, 'sendG' => $idGrp, 'button' => 'edit']) }}"  style="text-decoration: none;">

                <button name="btn" value="ubah" {{ $disable }}>

                    <img src="{{ asset('/img/others/ubah.png') }}" width="20" height="20">

                    Ubah

                </button>

            </a>

            <a href="{{ route('btnSG', ['id' => $id, 'sendG' => $idGrp, 'button' => 'delete']) }}"  style="text-decoration: none;">

                <button name="btn" value="hapus" {{ $disable }}>

                    <img src="{{ asset('/img/others/hapus.png') }}" width="20" height="20">

                    Hapus

                </button>

            </a>

        </div>

        </div>

    </div>

</div>

    <div class="row">

        <div class="col-8" style="overflow-y: scroll;overflow-x:hidden;height: 500px">

            <Table class="table table-bordered" style="background-color: #ffffff;margin-left:2%">

                <thead class="sticky-top border-light" style="background-color:white;">

                    <tr>

                        <th>

                            No

                        </th>

                        <th>

                            Grup

                        </th>

                        <th>

                            Kode Subgroup

                        </th>

                        <th>

                            Sub Group

                        </th>

                    </tr>

                </thead>

                <tbody>

                    @php

                        $noid = 1;

                    @endphp

                    @foreach ($subGroup as $a)

                    <form action="{{ route('showSG', ['id' => $a->idsubgrup,'idg' => $a->idgrup]) }}" method="post">

                        @csrf

                            <tr>

                                <td>

                                    <button class="tdcss" id="td{{$a->idsubgrup}}">

                                        {{$noid++}}

                                    </button>

                                </td>

                                <td>

                                    <button class="tdcss" id="td{{$a->idsubgrup}}">

                                        {{$a->EkgGrup->grup}}

                                    </button>

                                </td>

                                <td>

                                    <button class="tdcss" id="td{{$a->idsubgrup}}">

                                        @if (is_null($a->kodesubgrup))

                                        <i style="color: rgb(163, 163, 163)">NULL</i>

                                        @else

                                            {{$a->kodesubgrup}}

                                        @endif                                        

                                    </button>

                                </td>

                                <td>

                                    <button class="tdcss" id="td{{$a->idsubgrup}}">

                                        @if (is_null($a->subgrup))

                                            <i style="color: rgb(163, 163, 163)">NULL</i>

                                        @else

                                            {{$a->subgrup}}

                                        @endif 

                                    </button>

                                </td>

                        </tr>

                    </form>

                    @endforeach

                </tbody>

            </Table>

        </div>

        <div class="col-4">

            @if (ISSET($btn))

                @switch($btn)

                    @case('1')

                        <form action="{{ route('createSG') }}" method="post">

                            @csrf

                            <div class="m-2">

                                <input type=hidden value="{{ old('idG', $value0) }}" name="idG" id="sendIdG">

                                <label>Group</label><br>

                                <input class="readonly" required type="text" name="grup" id="sendGroup" style="width: 70%" value="{{ old('grup',$value1) }}" maxlength="30">

                                <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#popupG" class="abtn" style="width: 35px; float:right;margin-right: 40px"><img class="mb-1" src="{{ asset('/img/others/pratinjau.png') }}" width="20" height="20"></a>

                                @error('idG')

                                <br>

                                <small class="error text-danger">{{ $message }}</small>

                                @enderror

                            </div>

                                <div class="m-2">

                                <label>Kode Sub Group</label><br>

                                <input required type="text" name="kodeSG" class="" style="width: 70%" value="{{ old('kodeSG') }}" maxlength=10>

                                @error('kodeSG')

                                <br>

                                <small class="error text-danger">{{ $message }}</small>

                                @enderror

                                </div>

                            <div class="m-2">

                                <label>Sub Group</label><br>

                                <input required type="text" name="sG" class="" style="width: 70%" value="{{ old('sG') }}" maxlength=30>

                                @error('sG')

                                <br>

                                <small class="error text-danger">{{ $message }}</small>

                                @enderror

                            </div>      

                                <button type=reset class=m-2 style="float: right"><img src="{{ asset('/img/others/cancel.png') }}" width="20" height="20"></button>

                                <button type=submit class=m-2 style="float: right"><img src="{{ asset('/img/others/ok.png') }}" width="20" height="20"></button>

                        </form>

                        @break

                    @case('2')

                        <form action="{{ route('editSG',['id'=>$value,'idG'=>$value0]) }}" method="post">

                            @csrf

                            @method('put')

                            <div class="m-2">

                                <input type=hidden value="{{ old('idG',$value0) }}" name="idG" id="sendIdG">

                                <input type=hidden value="{{ $value }}" name="idSG">

                                <label>Group</label><br>

                                <input class="readonly" required type="text" name="grup" id="sendGroup" style="width: 70%" value="{{ old('grup', $value1) }}" maxlength=30>

                                <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#popupGedit" class="abtn" style="width: 35px; float:right;margin-right: 40px"><img class="mb-1" src="{{ asset('/img/others/pratinjau.png') }}" width="20" height="20"></a>

                                @error('idG')

                                    <br><small class="error text-danger">{{ $message }}</small>

                                @enderror

                            </div>

                            <div class="m-2">

                                <label>Kode Sub Group</label><br>

                                <input required type="text" name="kodeSG" class="" style="width: 70%" value="{{ old('kodeSG', $value2) }}" maxlength=10>

                                @error('kodeSG')

                                <br>

                                <small class="error text-danger">{{ $message }}</small>

                                @enderror

                            </div>

                            <div class="m-2">

                                <label>Sub Group</label><br>

                                <input  required type="text" name="sG" class="" style="width: 70%" value="{{ old('sG', $value3) }}" maxlength=30>

                                @error('sG')

                                    <br><small class="error text-danger">{{ $message }}</small>

                                @enderror

                            </div>      

                                <button type=reset class=m-2 style="float: right"><img src="{{ asset('/img/others/cancel.png') }}" width="20" height="20"></button>

                                <button type=submit class=m-2 style="float: right"><img src="{{ asset('/img/others/ok.png') }}" width="20" height="20"></button>

                        </form>

                        @break

                    @case('3')

                        <form action="{{ route('deleteSG', ['id' => $value, 'idG' => $value0]) }}" method="post">

                            @csrf

                            @method('delete')

                            <div class="m-2">

                                <input type=hidden value="{{ $value0 }}" name="idG" id="sendIdG">

                                <input type=hidden value="{{ $value }}" name="idSG">

                                <label>Group</label><br>

                                <input disabled type="text" name="grup" id="sendGroup" style="width: 70%" value="{{ $value1 }}" required>

                                <a disabled href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#popupGedit" class="abtn" style="width: 35px; float:right;margin-right: 40px"><img class="mb-1" src="{{ asset('/img/others/pratinjau.png') }}" width="20" height="20"></a>

                            </div>

                                <div class="m-2">

                                <label>Kode Sub Group</label><br>

                                <input disabled type="text" name="kodeSG" class="" style="width: 70%" value="{{ $value2 }}">

                                </div>

                            <div class="m-2">

                                <label>Sub Group</label><br>

                                <input disabled type="text" name="sG" class="" style="width: 70%" value="{{ $value3 }}">

                            </div>      

                                <p style="text-align: right;margin-right:10px"><i>Yakin ingin  menghapus data diatas?</i></p>    

                                <button name=hapus value=false class=m-2 style="float: right"><img src="{{ asset('/img/others/cancel.png') }}" width="20" height="20"></button>

                                <button  name=hapus value=true class=m-2 style="float: right"><img src="{{ asset('/img/others/ok.png') }}" width="20" height="20"></button>

                        </form>

                        @break

                    @default

                        <i>ERROR : BUTTON TIDAK DITEMUKAN</i>

                        @break

                @endswitch

            @else

            @if ($value == '')

            <form action="{{ route('createSG') }}" method="post">

                @csrf

                <div class="m-2">

                    <input type=hidden value="{{ old('idG', $value0) }}" name="idG" id="sendIdG">

                    <label>Group</label><br>

                    <input class="readonly" required type="text" name="grup" id="sendGroup" style="width: 70%" value="{{ old('grup',$value1) }}" maxlength="30">

                    <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#popupG" class="abtn" style="width: 35px; float:right;margin-right: 40px"><img class="mb-1" src="{{ asset('/img/others/pratinjau.png') }}" width="20" height="20"></a>

                    @error('idG')

                    <br>

                    <small class="error text-danger">{{ $message }}</small>

                    @enderror

                </div>

                    <div class="m-2">

                    <label>Kode Sub Group</label><br>

                    <input required type="text" name="kodeSG" class="" style="width: 70%" value="{{ old('kodeSG') }}" maxlength=10>

                    @error('kodeSG')

                    <br>

                    <small class="error text-danger">{{ $message }}</small>

                    @enderror

                    </div>

                <div class="m-2">

                    <label>Sub Group</label><br>

                    <input required type="text" name="sG" class="" style="width: 70%" value="{{ old('sG') }}" maxlength=30>

                    @error('sG')

                    <br>

                    <small class="error text-danger">{{ $message }}</small>

                    @enderror

                </div>      

                    <button type=reset class=m-2 style="float: right"><img src="{{ asset('/img/others/cancel.png') }}" width="20" height="20"></button>

                    <button type=submit class=m-2 style="float: right"><img src="{{ asset('/img/others/ok.png') }}" width="20" height="20"></button>

            </form>

            @else

                <div class="m-2">

                    <label>Group</label><br>

                    <input readonly type="text" class="" style="width: 70%" value="{{ $value1 }}">

                    <button disabled style=""><img class="mb-1" src="{{ asset('/img/others/pratinjau.png') }}" width="20" height="20"></button>

                </div>

                <div class="m-2">

                    <label>Kode Sub Group</label><br>

                    <input readonly type="text" class="" style="width: 70%" value="{{ $value2 }}">

                </div>

                <div class="m-2">

                    <label>Sub Group</label><br>

                    <input readonly type="text" class="" style="width: 70%" value="{{ $value3 }}">

                </div>      

                <button disabled class=m-2 style="float: right"><img src="{{ asset('/img/others/cancel.png') }}" width="20" height="20"></button>

                <button disabled class=m-2 style="float: right"><img src="{{ asset('/img/others/ok.png') }}" width="20" height="20"></button>

            @endif

            

            @endif

        </div>

    </div>

</div>

</div>

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
    body{
        zoom: 80%;
        background-color: #F0F0F0;
        overflow-x: hidden;
    }
</style>

<script>

    $(".readonly").on('keydown paste focus mousedown', function(e){

        if(e.keyCode != 9) // ignore tab

            e.preventDefault();

    });

    window.closeModal1 = function(){
        $('#popupG').modal('hide');
    };
    window.closeModal2 = function(){
        $('#popupGedit').modal('hide');
    };

    function sendGroup(id, grup){
        document.getElementById('sendIdG').value=id;
        document.getElementById('sendGroup').value=grup;
    }

</script>
</body>
</html>