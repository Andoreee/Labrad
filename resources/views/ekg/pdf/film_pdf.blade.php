<!DOCTYPE html>
<html>
<head>
	<title>LABRAD TRY | Elektrokardiogram Data Film</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
	<style type="text/css">
		table tr td,
		table tr th{
			font-size: 9pt;
		}
		#footerright { 
            position: fixed;
			float: left;
            right: 0px; 
            bottom: 0px; 
            text-align: center;
            border-top: 1px solid black;
        }
		#footer { 
            position: fixed; 
            right: 0px; 
            bottom: 0px; 
            text-align: center;
            border-top: 1px solid black;
        }
        #footer .page:after { 
            content: counter(page, decimal); 
        }
        @page { 
            margin: 20px 30px 40px 50px; 
        }
	</style>
    	<div id="footerright">
            <p class="tgl">Tgl cetak <?php echo date("d/m/y h:i:s A", strtotime(' + 7  hours'));?></p>
        </div>
        <div id="footer">
            <p class="page">Page </p>
        </div>
	<center>
		<h5>Rumah Sakit Umum Rizki Amilia Medika</h5>
		<h6 class="mb-4">Jl. Brosot-Wates Km. 5 Jogahan Bumirejo Lendah Kulon Progo Telp 085100494522</h6>
		<h4>Elektrokardiogram - Film</h4>
	<table class='table table-bordered'>
		<thead>
			<tr>
				<th style="width: 20px">No</th>
				<th>Nama Film</th>
                <th>Ukuran</th>
			</tr>
		</thead>
		<tbody>
			@php $i=1 @endphp
			@foreach($film as $p)
			<tr>
				<td>
					{{ $i++ }}
				</td>
				<td>
					@if (is_null($p->namafilm))
					<i style="color: rgb(163, 163, 163)">NULL</i>
					@else
					{{$p->namafilm}}
					@endif
				</td>
                <td>
                    {{$p->ukuran}}
                </td>
			</tr>
			@endforeach
		</tbody>
	</table>
</center>
</body>
</html>