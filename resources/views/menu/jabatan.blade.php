@extends('template.template')

@section('container')

<label for="btn-group2" class="text-center text-light border rounded" mr-2>

    <small>Data</small> 

     <div class="btn-group2 " role="group" >
         <a href="/data-master/karyawan"><button type="button" class="btn " ><div class="text-center">
             <img src="/img/menu/data/Karyawan.png" alt="" width="20" height="25">
         </div><small>Karyawan</small></button></a>
         <a href="/data-master/jabatan">
            <button type="button" class="btn btn-outline-secondary {{ ($title) === "Jabatan" ? 'active' : '' }}">
             <div class="text-center">
                 <img src="/img/menu/data/Jabatan.png" alt="" width="20" height="25">
             </div><small>Jabatan</small></button>
        </a>
     </div>
</label>
    
@endsection

@section('body')

<h1>
    Jabatan Karyawan
</h1>
    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
            <a href="/data-master">
                <button class="btn btn-danger">
                    X
                </button>
            </a>
    </div>

<table class="table table-bordered table-sm">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Nama</th>
            <th scope="col">Jabatan</th>
        </tr>
    </thead>


@foreach ($users as $user)

    <div>
        <tr>
            <th scope="row">{{ $user->id }}</th>
            <td>{{ $user->nama_user }}</td>
            <td> {{ $user->jabatan }}</td>
            <td><a class="btn btn-secondary btn-sm" href="/data/{{ $user->jabatan }}" type="button">Detail</a></td>
        </tr>
        
    </div>
        
     
    
@endforeach

 </table>
    
@endsection