@extends('layouts.app')
@extends('layouts.navbar')

@section('title', 'Reports')

@section('content')
	<div class="container">
		<center>
			<h4>Export Laporan Kebersihan Ruangan Kokeru</h4>
			<p>Hari {{ Date::hari(now()) }} {{ Date::tanggal(now()) }} {{ Date::Bulan(now()) }} {{ Date::tahun(now()) }} jam {{ Date::pukul(now()) }} WIB</p>
		</center>
		
		<a href="/report/export_excel" class="btn btn-success my-3" target="_blank">EXPORT EXCEL</a>
		
		<table class='table table-bordered'>
			<thead>
				<tr>
					<th>No</th>
					<th>Ruang</th>
					<th>Nama CS</th>
					<th>Status</th>
				</tr>
			</thead>
			<tbody>
				@php $i=1 @endphp
				@foreach($reports_today as $r)
				<tr>
					<td>{{ $i++ }}</td>
					<td>{{$r->room['name']}}</td>
					<td>{{$r->user['name']}}</td>
					<td>{{$r->status==0? "BELUM":"SUDAH"}}</td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>

</body>
</html>