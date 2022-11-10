
@extends('template.template')

@section('container')

<label for="btn-group2" class="text-center text-light border rounded" mr-2>

    <small>Panduan Aplikasi</small> 

     <div class="btn-group2" role="group" >
         <button type="button" class="btn"><div class="text-center">
             <img src="img/menu/panduan/tentang program.png" alt="" width="20" height="25">
         </div><small>Tentang Program</small></button>
       
     </div>
 </label>
    
    

@endsection

@section('body')
    <h1>
        Panduan
    </h1>

    @foreach ($posting as $post)
    <article class="mb-5 border-bottom pb-4" >
        <h2><a href="/panduan/{{ $post->url }}">{{ $post->tittle }}</a></h2>
        <p>Postingan oleh {{ $post->pengguna->nama_user }} dalam kategori {{ $post->kategori->nama }} </p>
        <p>tipe postingan : {{ $post->type }}</p>
        <p>{{ $post->preview }}</p>
        <a href="/panduan/{{ $post->url }}">read more</a>
    </article>

    
        
    @endforeach
    
@endsection