@extends('template.template')

@section('container')

<label for="btn-group2" class="text-center text-light border rounded-bottom mr-2" style="background-color: #E1ECF7;">

    <small  class="text-dark border-bottom border-primary d-flex justify-content-center">Master Radiologi</small> 

     <div class="btn-group2" role="group" >
         <button type="button" class="btn"  onclick="window.open('{{ url('/radiologi/group') }}', 'newwindow', 'location=yes,left=200,height=400,top=180,width=1000,scrollbars=yes,status=yes');">
            <div class="text-center">
                <img src="{{ url('/img/menu/radiologi/group.png') }}" alt="" width="25" height="27">
            </div><small class="text-dark">Group</small>
        </button>

         <button type="button" class="btn" onclick="window.open('{{ url('/radiologi/item-test') }}', 'newwindow', 'location=yes,left=110,height=600,top=200,width=1500,scrollbars=yes,status=yes');">
             <div class="text-center">
                 <img src="{{ url('/img/menu/radiologi/item test.png') }}" alt="" width="25" height="27">
             </div><small class="text-dark">Item Test</small>
        </button>

         <button type="button" class="btn " onclick="window.location.href='{{ url('/radiologi/film') }}'">
             <div class="text-center">
                 <img src="{{ url('/img/menu/radiologi/film.png') }}" alt="" width="25" height="27">
             </div><small class="text-dark">Film</small>
        </button>
     </div>
 </label>

 <label for="btn-group2" class="text-center text-light border rounded-bottom mr-2" style="background-color: #E1ECF7;">

    <small  class="text-dark border-bottom border-primary d-flex justify-content-center">Pemeriksaan Radiologi</small> 

     <div class="btn-group2" role="group" >
         <button type="button" class="btn " onclick="window.open('{{ url('/radiologi/pemeriksaan-pasien') }}', 'newwindow', 'location=yes,left=110,height=600,width=1500,scrollbars=yes,status=yes');">
            <div class="text-center">
                <img src="{{ url('/img/menu/radiologi/pemeriksaan pasien.png') }}" alt="" width="25" height="27">
            </div><small class="text-dark">Pemeriksaan Pasien</small>
        </button>

        <button type="button" class="btn " onclick="window.location.href='{{ url('/radiologi/data-pemeriksaan') }}'">
             <div class="text-center">
                 <img src="{{ url('/img/menu/radiologi/data pemeriksaan.png') }}" alt="" width="25" height="27">
             </div><small class="text-dark">Data Pemeriksaan</small>
        </button>
     </div>
 </label>

 <label for="btn-group2" class="text-center text-light border rounded-bottom mr-2" style="background-color: #E1ECF7;">
    <small  class="text-dark border-bottom border-primary d-flex justify-content-center">Laporan</small> 

     <div class="btn-group2" role="group" >
        <button type="button" class="btn " onclick="window.location.href='{{ url('/radiologi/laporan-radiologi') }}     '">
            <div class="text-center">
                <img src="{{ url('/img/menu/radiologi/laporan radiologi.png') }}" alt="" width="25" height="27">
            </div><small class="text-dark">Laporan Radiologi</small>
        </button>
         
     </div>
 </label>
    
    

@endsection

@section('body')
 
    
@endsection


{{-- <div class="row p-1 pb-1">
    <div class="col-1 border-end text-center">
        <img src="{{ url('/img/others/test koneksi.png') }}" alt="" height="15" width="15">
        <small>
        @php
            if(DB::connection())
        {
        echo "Terhubung";
        }
        @endphp
        </small> 
    </div>
    <div class="col-2 border-end text-center">
        <img src="{{ url('/img/others/date_1.png') }}" alt="" height="20">
        <small>
            @php
                $mytime = Carbon\Carbon::now();
                echo $mytime->toFormattedDateString();
            @endphp 
        </small>
        
    </div>
    @auth
        <div class="col-2 border-end text-center" >
            <small>
                User Login : {{ auth()->user()->nama }}
            </small> 
        </div>
     @endauth
    
</div> --}}


