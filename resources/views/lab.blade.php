@extends('template.template')

@section('container')
    
    <label for="btn-group" class="text-center text-light border rounded">

         <small>Master Laboratorium</small> 

        <div class="btn-group1" role="group">
            <button type="button" class="btn ">  
                <div class="text-center">
                    <img src="/img/menu/lab/group.png" alt="" width="20" height="25">
                </div><small>Group</small></button>
            <button type="button" class="btn ">
                <div class="text-center">
                    <img src="/img/menu/lab/sub group.png" alt="" width="20" height="25">
                </div><small>Sub Group</small></button>
             <button type="button" class="btn ">
                <div class="text-center">
                    <img src="/img/menu/lab/data item test.png" alt="" width="20" height="25">
                </div><small>Data Item Tes</small>t</button>
        </div>

           
    </label>


    <label for="btn-group2" class="text-center text-light border rounded" mr-2>

       <small>Pemeriksaan Laboratorium</small> 

        <div class="btn-group2" role="group" >
            <button type="button" class="btn "><div class="text-center">
                <img src="img/menu/lab/pemeriksaan pasien.png" alt="" width="20" height="25">
            </div><small>Pemeriksaan Pasien</small></button>
            <button type="button" class="btn ">
                <div class="text-center">
                    <img src="img/menu/lab/data pemeriksaan.png" alt="" width="20" height="25">
                </div><small>Data Pemeriksaan</small></button>
        </div>
    </label>


    <label for="btn-group3" class="text-center text-light border rounded">

        <small>Laporan</small>

        <div class="btn-group3" role="group" >
            <button type="button" class="btn ">
                <div class="text-center">
                    <img src="img/menu/lab/laporan laboratorium.png" alt="" width="20" height="25">
                </div><small>Laporan Laboratorium</small></button>
           
        </div>
    </label>
    
  

  

   

@endsection

@section('name')
     <h1>
        Laboratorium
    </h1>
@endsection