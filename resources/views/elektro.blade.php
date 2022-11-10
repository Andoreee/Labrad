@extends('template.template')

@section('container')
    
<label for="btn-group2" class="text-center text-light border rounded-bottom" style="background-color: #E1ECF7;">

        <small  class="text-dark border-bottom border-primary d-flex justify-content-center">Master Laboratorium</small> 

        <div class="btn-group1" role="group">
            
            
               <button type="button" class="btn" onclick="window.open('{{ route('grup') }}', 'newwindow', 'location=yes,left=300,height=485,top=100,width=700,scrollbars=no,status=yes');">  
                    <div class="text-center">
                        <img src="{{ url('/img/menu/lab/group.png') }}" alt="" width="25" height="27">
                    </div><small class="text-dark">Group</small>
                </button>
            

               
                <button type="button" class="btn" onclick="window.open('{{ route('subGrup') }}', 'newwindow', 'location=yes,left=300,height=485,top=100,width=700,scrollbars=no,status=yes');">
                    <div class="text-center">
                        <img src="{{ url('/img/menu/lab/sub group.png') }}" alt="" width="25" height="27">
                    </div><small class="text-dark">Sub Group</small>
                </button>
           

               <button type="button" class="btn" onclick="window.open('{{ route('itemTest') }}', 'newwindow', 'location=yes,left=300,height=485,top=100,width=700,scrollbars=no,status=yes');">
                    <div class="text-center">
                        <img src="{{ url('/img/menu/lab/data item test.png') }}" alt="" width="25" height="27">
                    </div><small class="text-dark">Item Tes</small>
                </button>

               <button type="button" class="btn" onclick="window.location.href='{{ route('film') }}'">
                    <div class="text-center">
                        <img src="{{ url('/img/menu/radiologi/film.png') }}" alt="" width="25" height="27">
                    </div><small class="text-dark">Film</small>
                </button>
        </div>

           
    </label>


    <label for="btn-group2" class="text-center text-light border rounded-bottom" style="background-color: #E1ECF7;">

       <small  class="text-dark border-bottom border-primary d-flex justify-content-center">Pemeriksaan Elektrokardiogram</small> 

        <div class="btn-group2" role="group" >
           <button type="button" class="btn" onclick="window.open('{{ route('pemeriksaanPasien') }}', 'newwindow', 'location=yes,left=80,height=800,top=200,width=1200,scrollbars=no,status=yes');"><div class="text-center">
                <img src="{{ url('/img/menu/lab/pemeriksaan pasien.png') }}" alt="" width="25" height="27">
            </div><small class="text-dark">Pemeriksaan Pasien</small></button>
           <button type="button" class="btn" onclick="window.location.href='{{ route('dataPemeriksaan') }}'">
                <div class="text-center">
                    <img src="{{ url('/img/menu/lab/data pemeriksaan.png') }}" alt="" width="25" height="27">
                </div><small class="text-dark">Data Pemeriksaan</small></button>
        </div>
    </label>

    
  


@endsection

@section('body')
   

    
@endsection

@section('foot')
<div class="row p-1 pb-1">
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
        {{-- ||
        <small>
            @php
                $mytime = Carbon\Carbon::now();
                echo $mytime->toTimeString();
            @endphp 
        </small> --}}
    </div>
    @auth
        <div class="col-2 border-end text-center" >
            <small>
                User Login : {{ auth()->user()->nama }}
            </small> 
        </div>
     @endauth
    
</div>
@endsection