<h5>Laporan Harian Kebersihan dan Kerapihan Ruangan Gedung Bersama Maju</h5>
{{-- <h4>Hari {{$waktu_tugas}}</h4>
<p>&lt;&lt;Tanggal Cetak {{$tanggal}} Jam {{$waktu}} WIB&gt;&gt;</p> --}}
<table>
    <caption>Monthly savings</caption>
    <thead>
        <tr>
            <th scope=" col">No</th>
            <th scope="col">Ruang</th>
            <th scope="col">Nama CS</th>
            <th scope="col">Status</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($reports as $report)
        <tr>
            <th scope="row">{{ $loop->iteration }}</th>
            <td>{{ $report->room['name'] }}</td>
            <td>{{ $report->user['name'] }}</td>
            <td>{{ $report->status==0? "BELUM":"SUDAH" }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
