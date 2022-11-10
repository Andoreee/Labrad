<div style="overflow:hidden;">
    <div style="background-color: #ddd;">
        <div style="background-color:#198754;">
            <table>
                <tr>
                    <td>
                        <img src="/img/menu/radiologi/group.png" width="40">
                    </td>
                    <td>
                        <h5 style="margin-top: 6px;">Radiologis-Group</h5>
                    </td>
                </tr>
                <button onclick="window.close()" type="button" class="btn-close btn-close-white ms-2 m-2" style="float:right;" aria-label="Close"></button>
            </table>
        </div>

        <form action="" method="get">
            @csrf
            <div class="row align-items-center">
                <div class="col-1" style="margin-left: 15px;">
                    <label class="col-form-label">pencarian</label>
                </div>
                <div class="col-5">
                    <input class="input" type="text" name="" value="" style="width:100%;">
                </div>
                <div class="col-auto">
                    <button type="submit" value=""> <img src="/img/others/ok.png" width="20" height="20">pilih</button>
                </div>
        </form>
        <div class="col-auto">
            <div class="col-auto">
                <a class="btn2" href="/radiologi/group/add"><img src="/img/others/tambah.png" width="20" height="20" style="padding: 2px;">tambah</a>
                <a class="btn2" href="/radiologi/group/edit"><img src="/img/others/ubah.png" width="20" height="20" style="padding: 2px;">ubah</a>
                <a href="/radiologi/group/delete" class="btn2" role="button" aria-disabled="true"><img src="/img/others/hapus.png" width="20" height="20" style="padding: 2px;">hapus</a>
                <a href="/radiologi/group/pratinjau" class="btn2" role="button" aria-disabled="true"><img src="/img/others/pratinjau.png" width="20" height="20" style="padding: 2px;">pratinjau</a>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-8 mt-3">
                <div class="overflow-auto" style="height: 17rem;">
                    <table class="table table-hover table-light table-bordered">
                        <thead class="sticky-top">
                            <tr>
                                <th>Radiologi Group</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($data as $grup)
                            <tr>
                                <td> <a class="btn" style="border:none;" href="/radiologi/item-test/popup/{{$grup->idgrup}}"> {{ $grup->grup }}</a></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="col-4 mt-3">
                <form action="/radiologi/item-test/edit" method="get">
                    @csrf
                    <div class="m-2">
                        <label for="">Group :</label>
                        <input type="text" readonly name="grup" style="width: 100%;outline:none;" value="{{$data2->grup}}">
                        <input type="text" name="idgrup" value="{{$data2->idgrup}}" hidden>
                    </div>
                    <div class="m-2" style="float:right">
                        <button type="submit"><img src="/img/others/cancel.png" width="20" height="20"></button>
                    </div>
                    <div class="m-2" style="float:right">
                        <button type="submit"><img src="/img/others/ok.png" width="20" height="20"></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<style>
    .btn2 {
        font-family: Arial;
        color: #000;
        font-size: 15px;
        background: #f0f0f0;
        padding: 4px 11px 6px 9px;
        border: solid #000000 2px;
        text-decoration: none;
    }
</style>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">