@extends('template.template')

@section('container')


    <label for="btn-group2" class="text-center text-light border rounded" mr-2>

    <small>Data</small> 

     <div class="btn-group2 " role="group" >
         <a href="/data-master/karyawan"><button type="button" class="btn " ><div class="text-center">
             <img src="/img/menu/data/Karyawan.png" alt="" width="20" height="25">
         </div><small>Karyawan</small></button></a>
        <a href="/data-master/jabatan">
        <button type="button" class="btn">
                <div class="text-center">
                     <img src="/img/menu/data/Jabatan.png" alt="" width="20" height="25">
                </div><small>Jabatan</small></button>
        </a>
     </div>
    </label>

  
    
   

@endsection


    
