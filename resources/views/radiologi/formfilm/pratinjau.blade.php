<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>LABRAD TRY | RADIOLOGI DATA FILM</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
</head>

<body>

    <div class="text-center">
        <h5>KLINIK PRATAMA RAWAT INAP GRIYA SARAS</h5>
        <h4>BULOS KULON 999/666 BULOSHARJO Telp 69696</h4>
    </div>
    <div class="mt-5 text-center">
        <h3>RADIOLOGI - FILM</h3>
    </div>
    <table class="table table-bordered table-sm">
        <thead>
            <th>no</th>
            <th>Nama Film</th>
            <th>Ukuran</th>
        </thead>
        <tbody class="text-center">
            @php $i=1 @endphp
            @foreach($data as $show)
            <tr>
                <td style="width: 20px;">{{ $i++}}</td>
                <td>{{$show->namafilm}}</td>
                <td>{{$show->ukuran}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>