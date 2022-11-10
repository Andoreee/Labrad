

@extends('template.template')

@section('container')
   
   @endsection

@section('body')

    <h2>{{ $post->tittle }}</h2>
    <p>Postingan oleh {{ $post->pengguna->nama_user }} dalam kategori {{ $post->kategori->nama }}</p>
    <h5>Tipe :{{ $post->type }}</h5>
    {!! $post->body !!}

    <div>
        <a href="/panduan"> kembali </a>
    </div>
    
    
@endsection