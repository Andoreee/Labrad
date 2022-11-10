@extends('elektro')

@section('body')

<div>

    <div class="" style="background-color: #97B903;" >{{-- margin: -30px -125px -30px -125px; --}}

        <table>

            <tr>

                <td>

                    <img src="{{ asset('/img/menu/radiologi/film.png') }}" width="20" height="20" style="margin: 15px;">

                </td>

                <td>

                    <h5 style="margin-top: 6px">Elektrokardiogram - Film</h5>  

                </td>

            </tr>

            <a href="{{ route('ekg') }}" class="btn btn-danger mt-2" style="float: right"> <b>X</b> </a>

        </table>

    </div>

<div style="display: grid;

grid-template-columns: 80% 20%">

    <form action="{{ route('film') }}" method="GET" class="row g-3 align-items-center" id="formSearch" style="float:">

        <div class="col-1 m-3" style="margin-left: 15px;padding-top: 12px">

            <label for="search" style="margin-right: 0px;color: #800000"><b>Pencarian</b></label>

        </div>

        <div class="col-7">

            <input type="search" name="q" class="" style="width: 100%" value="{{ request('q') }}">

        </div>

        <div class="col-3">

               <button type="submit" onclick=""> {{-- window.location.reload(); --}}

                <img src="{{ asset('/img/others/refresh.png') }}" width="20" height="20">

                    Refresh

                </button>

        </div> 

        </form>

        <?php

            $value1 = "#";

            $value2 = "";

            $value3 = "";

            $disable = 'disabled';

        ?>  

        @if(ISSET($filmInput))

            @foreach ($filmInput as $a)

                @php

                    $value1 = $a->idfilm;

                    $value2 = $a->namafilm;

                    $value3 = $a->ukuran;

                @endphp

            @endforeach

            @php

                $disable = '';

            @endphp

        @endif

        {{-- <form action="{{ route('btnfilm') }}" class="row" style="padding-top: 3%" method="GET">

            <input type="hidden" name="id" value="{{$value1}}"/> --}}

            <div class="row" style="padding-top: 3%">

            <div class="col-auto">

                <a href="{{ route('btnfilm', ['id'=>'#','button'=>'create']) }}" style="text-decoration: none;">

                <button name="btn" value="tambah">

                    <img src="{{ asset('/img/others/tambah.png') }}" width="20" height="20">

                    Tambah

                </button>

                </a>

                <a href="{{ route('btnfilm', ['id'=>$value1,'button'=>'edit']) }}" style="text-decoration: none;">

                <button name="btn" value="ubah" {{ $disable }}>

                    <img src="{{ asset('/img/others/ubah.png') }}" width="20" height="20">

                    Ubah

                </button>

                </a>

                <a href="{{ route('btnfilm', ['id'=>$value1,'button'=>'delete']) }}" style="text-decoration: none;">

                <button name="btn" value="hapus" {{ $disable }}>

                    <img src="{{ asset('/img/others/hapus.png') }}" width="20" height="20">

                    Hapus

                </button>

                </a>

            </div>

    </div>

    {{-- </form> --}}

</div>

    <div class="row">

        <div class="col-8" style="overflow-y: scroll;overflow-x:hidden;height: 370px">

            <Table class="table table-bordered" style="background-color: #ffffff;margin-left:2%">

                <thead class="sticky-top border-light" style="background-color:white;">

                <tr>

                <th>

                    Nama Film

                </th>

                <th>

                    Ukuran

                </th>

                </tr>

                </thead>

                <tbody>

                    @foreach ($film as $a)                    

                        <tr>

                            <td>

                                <button onclick="a( '{{ $a->idfilm }}' )" class="tdcss" id="td{{$a->idfilm}}">

                                @if (is_null($a->namafilm))

                                    <i style="color: rgb(163, 163, 163)">NULL</i>

                                @else

                                    {{$a->namafilm}}

                                @endif  

                            </td>

                            <td>

                                <button onclick="a( '{{ $a->idfilm }}' )" class="tdcss" id="td{{$a->idfilm}}">

                                {{$a->ukuran}}

                            </td>

                            <script>

                                function a(a){

                                    window.location.href='{{ url('/ekg/film') }}/'+a+'/#td'+a;

                                }

                            </script>

                        </tr>

                    @endforeach

                </tbody>

            </Table>

        </div>

        <div class="col-4">

            @if (ISSET($btn))

                @switch($btn)

                    @case(1)

                        <form action="{{ route('createF') }}" method="post">

                            @csrf

                            <div class="m-2">

                                <label>Nama Film</label><br>

                                <input required name="name" type="text" class="" style="width: 100%" value="{{ old('name') }}" maxlength=20>

                            </div>

                            <div class="m-2">

                                <label>Ukuran</label><br>

                                <input name="ukuran" type="number" class="" style="width: 100%" value="{{ old('ukuran') }}" max=2147483647>

                            </div>  

                            <button type="reset" class=m-2 style="float: right"><img src="{{ asset('/img/others/cancel.png') }}" width="20" height="20"></button>

                            <button type="submit" class=m-2 style="float: right"><img src="{{ asset('/img/others/ok.png') }}" width="20" height="20"></button>

                        </form>

                        @break

                    @case(2)

                        <form action="{{ route('editF', ['id' => $value1]) }}" method="post">

                            @csrf

                            @method('put')

                            <input type="hidden" name="id" value="{{ old('id', $value1) }}">

                            <div class="m-2">

                                <label>Nama Film</label><br>

                                <input required name="name" type="text" autofocus onfocus="this.select();" class="" style="width: 100%" value="{{ old('name', $value2) }}" maxlength=20>

                            </div>

                            <div class="m-2">

                                <label>Ukuran</label><br>

                                <input name="ukuran" type="number" class="" style="width: 100%" value="{{ old('ukuran', $value3) }}" max=2147483647>

                            </div>  

                            <button type="reset" class=m-2 style="float: right"><img src="{{ asset('/img/others/cancel.png') }}" width="20" height="20"></button>

                            <button type="submit" class=m-2 style="float: right"><img src="{{ asset('/img/others/ok.png') }}" width="20" height="20"></button>

                        </form>

                        @break

                    @case(3)

                        <form action="{{ route('deleteF',['id' => $value1]) }}" method="post">

                            @csrf

                            @method('delete')

                            <input type="hidden" name="id" value="{{ old('id', $value1) }}">

                            <div class="m-2">

                                <label>Nama Film</label><br>

                                <input disabled name="name" type="text" class="" style="width: 100%" value="{{ old('name', $value2) }}">

                            </div>

                            <div class="m-2">

                                <label>Ukuran</label><br>

                                <input disabled name="ukuran" type="number" class="" style="width: 100%" value="{{ old('ukuran', $value3) }}">

                            </div> 

                            <p style="text-align: right;margin-right:10px"><i>Yakin ingin  menghapus data diatas?</i></p>

                            <button name="hapus" value="false" class=m-2 style="float: right"><img src="{{ asset('/img/others/cancel.png') }}" width="20" height="20"></button>

                            <button name="hapus" value="true" class=m-2 style="float: right"><img src="{{ asset('/img/others/ok.png') }}" width="20" height="20"></button>

                        </form>

                        @break

                    @default

                    <i>ERROR : BUTTON TIDAK DITEMUKAN</i>

                @endswitch

            @else

                @if ($value1 == '#')

                    <form action="{{ route('createF') }}" method="post">

                        @csrf

                        <div class="m-2">

                            <label>Nama Film</label><br>

                            <input required name="name" type="text" class="" style="width: 100%" value="{{ old('name') }}" maxlength=20>

                        </div>

                        <div class="m-2">

                            <label>Ukuran</label><br>

                            <input name="ukuran" type="number" class="" style="width: 100%" value="{{ old('ukuran') }}"  max=2147483647>

                        </div>  

                        <button type="reset" class=m-2 style="float: right"><img src="{{ asset('/img/others/cancel.png') }}" width="20" height="20"></button>

                        <button type="submit" class=m-2 style="float: right"><img src="{{ asset('/img/others/ok.png') }}" width="20" height="20"></button>

                    </form>

                @else

                    <div class="m-2">

                        <label>Nama Film</label><br>

                        <input readonly type="text" class="" style="width: 100%" value="{{$value2}}">

                    </div>

                    <div class="m-2">

                        <label>Ukuran</label><br>

                        <input readonly type="text" class="" style="width: 100%" value="{{$value3}}">

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

</style>

@endsection