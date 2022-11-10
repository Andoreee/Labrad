<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
@extends('template.popup')
@include('/radiologi/formgrup/btn')

@section('body')
    
<div class="container-fluid">

    <div class="row">



        <div class="col-8 mt-3">

            <div class="overflow-auto" style="height: 12rem;">

                <table class="table table-hover table-light table-bordered">

                    <thead>

                        <tr>

                            <th>Radiologi Group</th>

                        </tr>

                    </thead>

                    <tbody>

                        @foreach($data as $grup)

                        <tr>

                            <td>{{$grup->grup}}</td>

                        </tr>

                        @endforeach

                    </tbody>

                </table>

            </div>

        </div>

        <div class="col-4 mt-3">

            <form action="{{ url('/radiologi/group/add') }}" method="post">

                @csrf

                <div class="m-2">

                    <label for="">Group :</label>

                    <input type="text" name="grup" style="width: 100%;">

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

