@extends('template.template')
@section('container')
@include('radiologi.menu')
@endsection

@section('body')
<div style="background-color: #ddd;">
    <div style="background-color:#198754;">
        <table>
            <tr>
                <td>
                    <img src="/img/menu/radiologi/laporan radiologi.png" width="40" style="margin: 20;">
                </td>
                <td>
                    <h5 style="margin-top: 6px;">Radiologi - Laporan::Laporan Regristrasi Radiologi</h5>
                </td>
            </tr>
            <button onclick="history.back()" type="button" class="btn-close btn-close-white  ms-2 m-2" style="float:right;" aria-label="Close"></button>


        </table>
    </div>

    <div class="container-fluid">
        <div class="row ">

            <div class="col-4 ">
                <p>
                    <button class="a btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="#collapseWidthExample" aria-expanded="false" aria-controls="collapseWidthExample">
                        Toggle width collapse
                    </button>
                </p>
                <div style="min-height: 120px;">
                    <div class="collapse collapse-horizontal" id="collapseWidthExample">
                        <div class="card card-body" style="width: 300px;">
                            This is some placeholder content for a horizontal collapse. It's hidden by default and shown when triggered.
                        </div>
                    </div>
                </div>

            </div>
            <div class="col-8">

            </div>
        </div>
    </div>
</div>
<style>
    button.a {
        background-color: yellow;
        display: inline-block;
        transform: rotate(90deg);
        margin-top: px;
        margin-left: px;
    }
</style>
@endsection