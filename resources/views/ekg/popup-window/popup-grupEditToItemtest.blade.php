<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>LABRAD TRY | {{ $title }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
  </head>
  <body style="overflow: hidden">
    <div class="" style="margin-top: 0px;overflow:hidden;">
        <div class="" style="background-color: #ddd">
            <div class="" style="background-color: #97B903" >
                <table>
                    <tr>
                        <td>
                            <img src="{{ asset('/img/menu/ekg/item test.png') }}" width="20" height="20" style="margin: 5px;">
                        </td>
                        <td>
                            <h5 style="padding-top: 6px">Elektrokardiogram - Group</h5>  
                        </td>
                    </tr>
                </table>
            </div>
            @php
                $value1 = 'x';
                @endphp
                @if ($ids != 'x')
                @php
                    $value1 = $ids;
                    $value = '';
                @endphp
                @endif
                @isset($_GET['nm'])
                    @php
                        $value = $_GET['nm'];
                    @endphp
                @endisset
            <div class="row">
                <div class="col-2 mt-4" style="margin-left: 15px">
                    <label for="search" style="margin-right: 0px">Pilihan</label>
                </div>
                <div class="col-7 mt-4">
                    <input readonly type="search" name="cari" class="" style="width: 100%" 
                    @isset($_GET['nm'])
                    value="{{$_GET['nm']}}"
                    @endisset
                    />
                </div>
                <div class="col-2 mt-2 mb-1">
                    @if (ISSET($_GET['idG']))
                            @if ($value1 == 'x')
                                {{-- <button onclick="window.parent.location.href='{{ route('btnIT', ['id' => 'add', 'sendG' => $_GET['idG'], 'button' => 'create']) }}'"> --}}
                                    <button onclick="parent.sendGroup('{{ $_GET['idG'] }}', '{{ $value }}');window.parent.closeModal1();">
                            @else
                                <button onclick="parent.sendGroup('{{ $_GET['idG'] }}', '{{ $value }}');window.parent.closeModal2();">
                            @endif
                        @else
                        <button onclick="">
                        @endif
                        <img src="{{ asset('/img/others/ok.png') }}" width="20" height="20">
                        Pilih
                    </button>
                </div>
            </div>
            <div class="col-8" style="overflow-y: auto;overflow-x:hidden;height: 290px;width:450px">
            <table class="table table-bordered" style="background-color: #ffffff;margin:2%">
                <thead>
                    <tr>
                        <th>
                            Group
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ( $group as $a)
                    <tr>
                        <td>
                                <button onclick="a('{{ $a->idgrup }}', '{{ $a->grup }}')" class="tdcss" id="td{{$a->idgrup}}">
                                @if (is_null($a->grup))
                                <i style="color: rgb(163, 163, 163)">NULL</i>
                                @else
                                {{ $a->grup }}
                                @endif   
                                </button>
                                <script>
                                    function a(a, b){
                                        var value1 = @json($value1);
                                        window.location.href='{{ route("windowsIT", ["id" => $value1]) }}?nm='+b+'&idG='+a;
                                    }
                                </script>
                        </td>
                    </tr>
                    @endforeach  
                </tbody>
            </table>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
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
            zoom:67%;
        }
    </style>
</body>
</html>