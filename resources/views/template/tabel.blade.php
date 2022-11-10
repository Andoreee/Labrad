<table class="table table-bordered">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Nama</th>
            <th scope="col">Umur</th>
            <th scope="col">Alamat</th>
        </tr>
    </thead>

    <div>
        <tr>
            <th scope="row">{{ $user->id }}</th>
            <td>{{ $user->nama_user }}</td>
            <td> {{ $user->umur }}</td>
            <td>{{ $user->alamat }}</td>
            <td><a class="btn btn-secondary" href="/data-master/karyawan" type="button">Kembali</a></td>
        </tr>
        
    </div>
        
 </table>