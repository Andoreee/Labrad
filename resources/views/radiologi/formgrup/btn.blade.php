<div style="background-color: #ddd;">

    <div style="background-color:#97B903;">

        <table>

            <tr>

                <td>

                    <img src="{{url('/img/menu/radiologi/group.png')}}" width="40" height="40">

                </td>

                <td>

                    <h5 style="margin-top: 6px;">Radiologis-Group</h5>

                </td>

            </tr>

            <button onclick="window.close()" type="button" class="btn-close btn-close-white ms-2 m-2" style="float:right;" aria-label="Close"></button>

        </table>

    </div>



    {{-- <form action="/radiologi/group/search" method="post">

        @csrf

        <div class="row align-items-center">

            <div class="col">

                <label>pencarian</label>

            </div>

            <div class="col-6">

                <input class="input" type="text" name="cari" value="{{old('cari')}}" style="width:100%;">

            </div>

            <div class="col-5">
                <div>
                    <button type="button" value="" onClick="window.location.reload();"> <img src="{{url('/img/others/refresh.png')}}" width="20" height="20"> refresh</button>

                    <button onclick="window.location.href='/radiologi/group/add'"><img src="{{url('/img/others/tambah.png')}}" width="20" height="20">tambah</button>

                    <button onclick="window.location.href='/radiologi/group/edit'"><img src="{{url('/img/others/ubah.png')}}" width="20" height="20">ubah</button>
        
                    <button onclick="window.location.href='/radiologi/group/delete'" role="button"><img src="{{url('/img/others/hapus.png')}}" width="20" height="20">hapus</button>
             </div>
            </div>

    </form> --}}

    <div style="background-color:#ddd;" class=" border-bottom border-dark pb-1 pt-1">
        <div class="row align-items-center">

            <div class="col-1" >
                <label class="col-form-label">Pencarian:</label>
            </div>

            <div class="col-6 ">
                <form action="/radiologi/group/search" method="post">
                    @csrf
                    <input class="input" type="text"  style="width:100%;" name="cari" value="{{ old('cari') }}">   
                </form>
            </div>
            <div class="col-5">
                <div>
                        <button onClick="window.location.reload();"><img src="{{ url('/img/others/refresh.png') }}" width="20" height="20"> refresh</button>
                        <button type="button"  onclick="window.location.href='{{ url('/radiologi/group/add') }}'"><img src="{{ url('/img/others/tambah.png') }}" width="20" height="20"> tambah</button>
                        <button  id="ubah" onclick="window.location.href='{{ url('/radiologi/group/edit') }}'"><img src="{{ url('/img/others/ubah.png') }}" width="20" height="20"> ubah</button>
                        <button  id="delete" onclick="window.location.href='{{ url('/radiologi/group/delete') }}'"><img src="{{ url('/img/others/hapus.png') }}" width="20" height="20"> hapus</button>
                        {{-- <button onclick="window.location.href='{{ url('/radiologi/group/pratinjau') }}'"><img src="{{asset('/img/others/pratinjau.png')}}" width="20" height="20">pratinjau</button> --}}
                        {{-- <form action="{{ url('/laboratorium/group') }}" method="post" class="d-inline">
                            @method('delete')
                            @csrf
                            <input type="hidden" name="id" id="iddelete">
                        <button disabled id="delete" onclick="return confirm('Hapus Data?')"><img src="{{ url('/img/others/hapus.png') }}" width="20" height="20"> hapus</button>
                        </form> --}}
                </div>
            </div>
        </div>
    </div>

</div>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

<style>

    .btn2 {

        font-family: Arial;

        color: #000;

        font-size: 15px;

        background: #f0f0f0;

        padding: 4px 11px 6px 9px;

        border: solid #000000 2px;

        text-decoration: none;

    }

</style>