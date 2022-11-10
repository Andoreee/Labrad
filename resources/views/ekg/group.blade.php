<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>LABRAD TRY | Elektorkardiagram</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>
<body style="background-color: #F0F0F0;">
<div class="" style="overflow-x:hidden">
    <div class="" style="background-color: #97B903;" >
        <table>
            <tr>
                <td>
                    <img src="{{ asset('/img/menu/lab/group.png') }}" width="20" height="20" style="margin: 15px;">
                </td>
                <td>
                    <h5 style="padding-top: 6px">Elektrokardiogram - Group</h5>  
                </td>
            </tr>
            <a href="javascript:void(0)" onclick="window.close()" class="btn btn-danger mt-2" style="float: right"> <b>X</b> </a>
        </table>
    </div>
    {{-- <div style="padding-bottom:50px;"></div> --}}
    {{-- <div style="display: grid;
                grid-template-columns: 80% 20%"> --}}
    <div class="row justify-content-between">
        <div class="col-sm-8">
            <form action="{{ route('grup') }}" method="get" class="row g-3 align-items-center" id="formSearch" style="float:">
                {{-- <div class="row g-3 align-items-center" style=""> --}}
                <div class="col-2 m-3" style="margin-left: 15px;padding-top: 12px">
                    <label for="search" style="margin-right: 0px;color: #800000"><b>Pencarian</b></label>
                </div>
                <div class="col-6 col-auto">
                    <input type="search" name="q" class="" style="width: 110%;margin-left:-20px" value="{{ request('q') }}" maxlength="30">
                </div>
                <div class="col-3">
                    <button type="submit" onclick=""> {{-- window.location.reload(); --}}
                        <img src="{{ asset('/img/others/refresh.png') }}" width="20" height="20">
                            Refresh
                    </button>
                </div> 
            </form>
        </div>
        {{-- <form action="{{ route('btn') }}" class="row" style="padding-top: 3%" method="post"> --}}
        <div class="col-sm-auto">
            <div class="row" style="padding-top: 3%">
                {{-- @csrf --}}
                <input type="hidden" name="id"
                    @if(ISSET($id))
                        value="{{$id}}"
                        @php
                            $idG = $id;
                        @endphp
                    @else
                        @php
                            $idG = '#';
                        @endphp
                    @endif
                />
                <input type="hidden" name="name"
                    @if(ISSET($groupInput))
                        value="{{ $groupInput->grup }}"
                        @php
                            $disable = '';
                        @endphp
                    @else
                        @php
                            $disable = 'disabled';
                        @endphp
                    @endif 
                />
                <div class="col-auto" style="">
                    <a href="{{ route('btn', ['id' => '#', 'button' => 'create']) }}" style="text-decoration: none;">
                        <button name="btn" value="tambah">
                            <img src="{{ asset('/img/others/tambah.png') }}" width="20" height="20">
                                Tambah
                        </button>
                    </a>

                    <a href="{{ route('btn', ['id' => $idG, 'button' => 'edit']) }}" style="text-decoration: none;">
                        <button name="btn" value="ubah" {{ $disable }}>
                            <img src="{{ asset('/img/others/ubah.png') }}" width="20" height="20">
                                Ubah
                        </button>
                    </a>

                    <a href="{{ route('btn', ['id' => $idG, 'button' => 'delete']) }}" style="text-decoration: none;">
                        <button name="btn" value="hapus" {{ $disable }}>
                            <img src="{{ asset('/img/others/hapus.png') }}" width="20" height="20">
                                Hapus
                        </button>
                    </a>
                </div>
            </div>
        </div>
    </div>
    
    @php

                $idgrup = '';

                $grup = '';

            @endphp

            @if (isset($groupInput))

                @php

                    $idgrup = $id;

                    $grup = $groupInput->grup;

                @endphp

            @endif

            @if (isset($name))

                @php

                    $idgrup = $idg;

                    $grup = $name;

                @endphp

            @endif

    <div class="row">

        <div class="col-8" style="overflow-y:scroll;overflow-x:hidden;height: 500px">

            @if (isset($error))

                <div class="alert alert-danger" role="alert">

                    {{ $error }}

                </div>

            @endif

            <Table class="table table-bordered" style="background-color: #ffffff;margin-left:2%">

                <thead class="border-light" style="background-color:white;">

                    <tr>

                        <th>

                            Elektrokardiogram Group

                        </th>

                    </tr>

                </thead>

                <tbody style="">

                    @foreach ( $group as $a)

                    <form action="{{ route('showG', ['id' => $a->idgrup]) }}" method="post">

                        @csrf

                        <tr>

                            <td>

                                <button class="tdcss" id="td{{$a->idgrup}}">

                                @if (is_null($a->grup))

                                <i style="color: rgb(163, 163, 163)">NULL</i>

                                @else

                                {{ $a->grup }}

                                @endif   

                                </button>

                                <script>

                                    var id = @json($a->idgrup);

                                    var idg = @json($idgrup);

                                    var dis = @json($disable);

                                    if(dis != 'disabled'){

                                        if(id == idg){
                                            
                                            document.getElementById("td"+id).focus();
                                        
                                        }

                                    }

                                </script>

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

                    @case(1)

                        <form action="{{ route('createG') }}" method="post">

                            @csrf

                            <div class="m-2">

                                <input type="hidden" name="id" value="">

                                <label>Group</label><br>

                                <input type="text" name="grup" id="input" style="width: 100%" value="" maxlength="30" required autofocus>

                            </div> 

                            <button type="reset" class=m-2 style="float: right"><img src="{{ asset('/img/others/cancel.png') }}" width="20" height="20"></button>

                            <button type="submit" class=m-2 style="float: right"><img src="{{ asset('/img/others/ok.png') }}" width="20" height="20"></button>

                        </form>

                        @break

                    @case(2)

                        <form action="{{ route('editG', ['id'=>$idgrup]) }}" method="post">

                            @csrf

                            @method('put')

                            <div class="m-2">

                                <input type="hidden" name="id" value="{{ $idgrup }}">

                                <label>Group</label><br>

                                <input type="text" name="grup" onfocus="this.select();" id="input" style="width: 100%" value="{{ $grup }}" maxlength="30" required autofocus>

                            </div> 

                            <button type="reset" class=m-2 style="float: right"><img src="{{ asset('/img/others/cancel.png') }}" width="20" height="20"></button>

                            <button type="submit" class=m-2 style="float: right"><img src="{{ asset('/img/others/ok.png') }}" width="20" height="20"></button>

                        </form>

                        @break

                    @case(3)

                        <form action="{{ route('deleteG',['id'=>$idgrup]) }}" method="post">

                            @csrf

                            @method('delete')

                            <div class="m-2">

                                <input type="hidden" name="id" value="{{ $idgrup }}">

                                <label>Group</label><br>

                                <input disabled type="text" name="grup" id="input" style="width: 100%" value="{{ $grup }}">

                            </div>

                            <p style="text-align: right;margin-right:10px"><i>Yakin ingin  menghapus data diatas?</i></p>

                            <button name="hapus" value="false" class=m-2 style="float: right"><img src="{{ asset('/img/others/cancel.png') }}" width="20" height="20"></button>

                            <button name="hapus" value="true" class=m-2 style="float: right"><img src="{{ asset('/img/others/ok.png') }}" width="20" height="20"></button>

                        </form>

                    @break

                    @default

                        <form action="#" method="post">

                            @csrf

                            <div class="m-2">

                                <input type="hidden" name="id" value="">

                                <label>Group</label><br>

                                <input disabled type="text" name="grup" id="input" style="width: 100%" value="Error: Button tidak ditemukan">

                            </div>

                            <button disabled type="reset" class=m-2 style="float: right"><img src="{{ asset('/img/others/cancel.png') }}" width="20" height="20"></button>

                            <button disabled type="submit" class=m-2 style="float: right"><img src="{{ asset('/img/others/ok.png') }}" width="20" height="20"></button>

                        </form>

                        @break

                @endswitch

            @else

            @if ($grup=='')

                <form action="{{ route('createG') }}" method="post">

                    @csrf

                    <div class="m-2">

                        <input type="hidden" name="id" value="">

                        <label>Group</label><br>

                        <input type="text" name="grup" id="input" style="width: 100%" value="" required autofocus>

                        @error('grup')

                        <br>

                        <small class="error text-danger">{{ $message }}</small>

                        @enderror

                    </div>

                    <button type="reset" class=m-2 style="float: right"><img src="{{ asset('/img/others/cancel.png') }}" width="20" height="20"></button>

                    <button type="submit" class=m-2 style="float: right"><img src="{{ asset('/img/others/ok.png') }}" width="20" height="20"></button>

                </form>

            </div>

        </div>

            @else

            <form action="" method="post">

                @csrf

                <div class="m-2">

                    <input type="hidden" name="id" value="">

                    <label>Group</label><br>

                    <input readonly type="text" name="grup" id="input" style="width: 100%" value="{{ $grup }}" required>

                </div> 

                <button disabled type="reset" class=m-2 style="float: right"><img src="{{ asset('/img/others/cancel.png') }}" width="20" height="20"></button>

                <button disabled type="submit" class=m-2 style="float: right"><img src="{{ asset('/img/others/ok.png') }}" width="20" height="20"></button>

                @if ($grup != '')

                    <script>

                        window.onload = function() {

                            document.getElementById('inputchange').addEventListener('keyup', function(event) {

                                        window.location.href = "{{ route('btn', ['id' => $idgrup, 'button' => 'edit']) }}"

                            });

                        };

                    </script>
                    
                @endif

            </form>

        </div>

    </div>

            @endif

@endif

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
        min-width:700px;
    }


</style>
</body>
</html>