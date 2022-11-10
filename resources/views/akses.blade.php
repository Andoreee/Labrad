@extends('template.template')

@section('container')

<label for="btn-group2" class="text-center text-light border rounded mr-2" >

    <small>Login User</small> 

     <div class="btn-group2" role="group" >
        <a href=" " role="button" class="btn  "><div class="text-center">
            <img src="img/menu/akses/Login.png" alt="" width="20" height="25">
        </div><small>Login</small></a>
        <button type="button" class="btn ">
             <div class="text-center">
                <img src="img/menu/akses/Logout.png" alt="" width="20" height="25">
        </div><small>Logout</small></button>
     </div>
 </label>


  <label for="btn-group2" class="text-center text-light border rounded mr-2" >

    <small>Data Pengguna</small> 

     <div class="btn-group2" role="group" >
         <button type="button" class="btn "><div class="text-center">
             <img src="img/menu/akses/Level Pengguna.png" alt="" width="20" height="25">
         </div><small>Level Pengguna</small></button>
         <button type="button" class="btn ">
             <div class="text-center">
             <img src="img/menu/akses/Pengguna.png" alt="" width="20" height="25">   
             </div><small>Pengguna</small></button>
         <button type="button" class="btn ">
             <div class="text-center">
             <img src="img/menu/akses/Ganti Password.png" alt="" width="20" height="25">    
             </div><small>Ganti Password</small></button>
     </div>
 </label>


  <label for="btn-group2" class="text-center text-light border rounded mr-2" >

    <small>Pengaturan</small> 

     <div class="btn-group2" role="group" >
         <button type="button" class="btn "><div class="text-center">
             <img src="img/menu/akses/Program.png" alt="" width="20" height="25">
         </div><small>Program</small></button>
         <button type="button" class="btn ">
             <div class="text-center">
             <img src="/img/menu/akses/Database.png" alt="" width="20" height="25">
             </div><small>Database</small></button>
     </div>
 </label>

 
  <label for="btn-group2" class="text-center text-light border rounded mr-2" >
 
        <small>Keluar</small>

     <div class="btn-group2" role="group" >
         <button type="button" class="btn "><div class="text-center">
             <img src="/img/menu/akses/Keluar.png" alt="" width="20" height="25">
         </div>Keluar</button>
     </div>
 </label>

    
   

@endsection

@section('body')
     <h1>
        Akses Pengguna
    </h1>
@endsection