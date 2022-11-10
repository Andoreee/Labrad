@extends('template.template')


@section('body')

        <h2 class="pb-4">Detail Karyawan</h2>

        <h5 class="mb-3 border-bottom pb-3">Nama : {{ $user->nama_user }}</h5>
        <h5 class="mb-3 border-bottom pb-3">Umur : {{ $user->umur }}</h5>
        <h5 class="mb-3 border-bottom pb-3">Alamat : {{ $user->alamat }}</h5>
        <h5 class="mb-3 border-bottom pb-3">Jabatan : {{ $user->jabatan }}</h5>

        
        <td><a class="btn btn-secondary" href="/data-master/karyawan" type="button">Kembali</a></td>

@endsection


