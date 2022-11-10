@extends('template.template')



@section('container')



<label for="btn-group2" class="text-center text-light border rounded" >



    <small>Master Elektrodiagram</small> 



     <div class="btn-group2" role="group" >
            <button type="button" class="btn" onclick="window.open('{{ route('grup') }}', 'newwindow', 'location=yes,left=300,height=485,top=100,width=700,scrollbars=no,status=yes');"">  
                <div class="text-center">
                    <img src="{{ url('/img/menu/lab/group.png') }}" alt="" width="25" height="27">
                </div><small class="text-dark">Group</small>
            </button>
        

         <a href="{{ route('subGrup') }}">

         <button type="button" class="btn ">

            <div class="text-center">

                <img src="{{ asset('/img/menu/lab/sub group.png') }}" alt="" width="20" height="25">

            </div><small>Sub Group</small></button></a>

            <a href="{{ route('itemTest') }}">

         <button type="button" class="btn ">

             <div class="text-center">

                 <img src="{{ asset('/img/menu/radiologi/item test.png') }}" alt="" width="20" height="25">

             </div><small>Item Test</small></button></a>

             <a href="{{ route('film') }}">

         <button type="button" class="btn ">

             <div class="text-center">

                 <img src="{{ asset('/img/menu/radiologi/film.png') }}" alt="" width="20" height="25">

             </div><small>Film</small></button></a>

     </div>

 </label>   



 <label for="btn-group2" class="text-center text-light border rounded" >



    <small>Pemeriksaan Elektrokardiogram</small> 



     <div class="btn-group2" role="group" >

        <a href="{{ route('pemeriksaanPasien') }}">

         <button type="button" class="btn "><div class="text-center">

             <img src="{{ asset('/img/menu/radiologi/pemeriksaan pasien.png') }}" alt="" width="20" height="25">

         </div><small>Pemeriksaan Pasien</small></button></a>

         <a href="{{ route('dataPemeriksaan') }}">

         <button type="button" class="btn ">

             <div class="text-center">

                 <img src="{{ asset('/img/menu/radiologi/data pemeriksaan.png') }}" alt="" width="20" height="25">

             </div><small>Data Pemeriksaan</small></button></a>

     </div>

 </label>

    

    



@endsection



@section('body')

    <h1>

        Elektrokardiogram

    </h1>

    

@endsection



