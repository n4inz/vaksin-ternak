<!DOCTYPE html>
<html>
<head>
	<title>Laporan Vaksinnsi Hewan Ternak Kab. Sidrap</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
	<style type="text/css">
		table tr td,
		table tr th{
			font-size: 9pt;
		}
	</style>
	<center>
		<h5>Laporan Vaksinasi Hewan Ternak Kab. Sidrap</h4>
		<h6><a target="_blank" href="http://vaksin-ternak.navbar.my.id">www.vaksin-ternak.navbar.my.id/</a></h5>
	</center>
 
	<table class='table table-bordered'>
		<thead>
			<tr>
				<th>No</th>
				<th>Tanggal selesai</th>
				<th>Kecamatan</th>
				<th>Desa</th>
				<th>Jumlah Pendaftar</th>
				<th>Jumlah Sapi</th>
				<th>Status</th>
			</tr>
		</thead>
		<tbody>
			@foreach ($laporan as $item )
				<tr>
					<td>{{ $loop->iteration }}</td>
					<td>{{ $item->updated_at }}</td>
					<td>{{ $item->kecamatan->kecamatan ?? '' }}</td>
					<td>{{ $item->desa->desa ?? '' }}</td>
					<td>{{ $item->pendaftaran_vaksin_count }}</td>
					<td>{{ $item->pendaftaran_vaksin_sum_jumlah_hewan }}</td>
					<td>
						<span style="color: green;">Selesai</span>
					</td>
				</tr>
			@endforeach
			
		</tbody>
	</table>
 
</body>
</html>