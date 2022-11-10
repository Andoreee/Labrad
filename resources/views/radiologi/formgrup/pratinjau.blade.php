<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>LABRAD TRY | RADIOLOGI DATA GROUP</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
</head>

<body>

    <div class="text-center">
        <h5>
            <font size='5 face=' Tahoma'>KLINIK PRATAMA RAWAT INAP GRIYA SARAS</font>
        </h5>
        <h4>
            <font size='4' face='Tahoma'>BULOS KULON 999/666 BULOSHARJO Telp 69696<br><br></font>
        </h4>
    </div>
    <div class="mt-5 text-center">
        <h3>
            <font size='5' face='Tahoma'>RADIOLOGI - GROUP</font>
        </h3>
    </div>
    <table class="table table-bordered table-sm">
        <thead>
            <th>no</th>
            <th>Grup pemeriksaan radiologi</th>
        </thead>
        <tbody>
            @php $i=1 @endphp
            @foreach($data as $show)
            <tr>
                <td style="width: 20px;">{{ $i++}}</td>
                <td>{{$show->grup}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>