@extends('radiologi')
@section('body')

@include('/radiologi/formfilm/btn')

<div class="container-fluid">

    <div class="row">



        <div class="col-8 mt-3">

            <table class="table table-hover table-light table-bordered">

                <thead class="sticky-top">

                    <tr>

                        <th>Nama Film</th>

                        <th>Ukuran</th>

                    </tr>

                </thead>

                <tbody>

                    @foreach($data as $film)

                    <tr>

                        <td><a style="border:none;" class="btn">{{ $film->namafilm }}</a></td>

                        <td><a style="border:none;" class="btn">{{ $film->ukuran }}</a></td>

                    </tr>

                    @endforeach

                </tbody>

            </table>

        </div>

        <div class="col-4 mt-3">

            <form action="/pkl/radiologi/film/add" method="post">

                @csrf

                <div class="m-2">

                    <label for="">Nama Film :</label>

                    <input type="text" name="namafilm" style="width: 100%;">

                </div>

                <div class="m-2">

                    <label for="">Ukuran :</label>

                    <input type="text" name="ukuran" style="width: 100%;">

                </div>

                <div class="m-2" style="float:right">

                    <button><img src="{{asset('/img/others/cancel.png')}}" width="20" height="20"></button>

                </div>

                <div class="m-2" style="float:right">

                    <button><img src="{{asset('/img/others/ok.png')}}" width="20" height="20"></button>

                </div>

            </form>

        </div>

    </div>

</div>

@endsection