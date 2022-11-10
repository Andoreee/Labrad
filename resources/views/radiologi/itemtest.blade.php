@extends('template.popup')


@include('/radiologi/formitem/btn')

@section('body')
<div class="container-fluid">

    <div class="row">

        <div class="col-8 mt-3 ">

            <div class=" overflow-auto" style="height:28rem;">

                <table class="table table-hover table-light table-bordered " style="text-align: center; width:850px;">

                    <thead class="sticky-top">

                        <tr>

                            <th rowspan="2" style="vertical-align:middle;">Grub</th>

                            <th rowspan="2" style="vertical-align:middle;">Item</th>

                            <th colspan="2">Biaya</th>

                            <th rowspan="2" style="vertical-align:middle;">E-klaim BPJs</th>

                        </tr>

                        <tr>

                            <th>rawat jalan</th>

                            <th>pasien luar</th>

                        </tr>

                    </thead>

                    <tbody>



                        @foreach($data as $r)



                        <tr>

                            <td>

                                <a class="btn" style="border:none;" disabled>{{App\Models\grup::getGrup($r->idgrup)}}</a>

                            </td>

                            <td>

                                <a class="btn" style="border:none;" disabled>{{ $r->namaitem}}</a>

                            </td>

                            <td>

                                <a class="btn" style="border:none;" disabled>{{ $r->biaya_rawatjalan }}</a>

                            </td>

                            <td>

                                <a class="btn" style="border:none;" disabled>{{ $r->biaya_pasienluar }}</a>

                            </td>

                            <td>

                                <a class="btn" style="border:none;" disabled>{{App\Models\klaim::getKlaim($r->idklaim)}}</a>

                            </td>

                        </tr>

                        @endforeach

                    </tbody>

                </table>

            </div>

            <div class="col mt-2">

                <b>

                    Format Pembacaaan Dokter

                </b>

                <div id="yy">

                    <div class="mt-1">

                        <button type="button" style="border:none;" id="l">

                            <a>laki-laki</a>

                        </button>

                        <span>|</span>

                        <button type="button" style="border:none;" id="p">

                            <a>perempuan</a>

                        </button>

                    </div>

                    <div class="mt-1">

                        <textarea name="" readonly id="mytextarea" cols="30" rows="10" style="resize: none; width:100%;"></textarea>

                    </div>

                </div>

            </div>

        </div>

        <div class="col-4 mt-3">

            <div class="m-2">

                <label for="">Nama Item:</label><br>

                <input type="text" name="" style="width: 100%;" readonly>

            </div>

            <div class="m-2">

                <label for="">Group :</label>

                <select disabled name="" class="form-select form-select-sm" aria-label=".form-select-sm example">

                    <option value="" selected></option>

                    <option value=""></options>

                </select>

            </div>

            <div class="m-2">

                <label for="">Biaya Rawat Jalan :</label><br>

                <input type="text" name="" style="width: 100%;" readonly>

            </div>

            <div class="m-2">

                <label for="">Biaya Pasien Luar :</label><br>

                <input type="text" name="" style="width: 100%;" readonly>

            </div>

            <div class="m-2">

                <label for="">Biaya Rawat Inap</label><br>

                <table class="table table-hover table-light table-bordered ">

                    <thead>

                        <tr>

                            <th style="width:4% ;"></th>

                            <th>Kelas</th>

                            <th>Biaya</th>

                        </tr>

                    </thead>

                    <tbody>

                        <tr>

                            <td></td>

                            <td></td>

                            <td></td>

                        </tr>

                    </tbody>

                </table>

            </div>

            <div class="m-2">

                <label for="">E-Klaim BPJS :</label>

                <select class="form-select form-select-sm" aria-label=".form-select-sm example" disabled>

                    <option selected></option>

                    @foreach($klaim as $k)

                    <option>{{ $k->nama }}</options>

                        @endforeach

                </select>

            </div>

            <div class="m-2" style="float:right">

                <button><img src="{{asset('/img/others/cancel.png')}}" width="20" height="20" disabled></button>

            </div>

            <div class="m-2" style="float:right">

                <button><img src="{{asset('/img/others/ok.png')}}" width="20" height="20" disabled></button>

            </div>

        </div>

    </div>



</div>
