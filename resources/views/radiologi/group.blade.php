@extends('template.popup')
@include('/radiologi/formgrup/btn')

@section('body') 
    <div class="container-fluid">

        <div class="row">

            <div class="col-8 mt-3">

                <div class="overflow-auto" style="height: 12rem;">

                    <table class="table table-hover table-light table-bordered">

                        <thead class="sticky-top">

                            <tr>

                                <th>Radiologi Group</th>

                            </tr>

                        </thead>

                        <tbody>

                            @foreach($data as $grup)

                            <tr>

                            <td><a style="border:none;"  class="btn"> {{$grup->grup}}</a></td>

                            </tr>

                            @endforeach

                        </tbody>

                    </table>

                </div>

            </div>

            <div class="col-4 mt-3">

                <form action="" method="">

                    @csrf

                    <div class="m-2">

                        <label for="">Group :</label>

                        <input type="text" name="" style="width: 100%;" disabled>

                    </div>

                    <div class="m-2" style="float:right">

                        <button type="button"><img src="{{asset('/img/others/cancel.png')}}" width="20" height="20" disabled></button>

                    </div>

                    <div class="m-2" style="float:right">

                        <button type="button"><img src="{{asset('/img/others/ok.png')}}" width="20" height="20" disabled></button>

                    </div>

                </form>

            </div>

        </div>

    </div>
@endsection