<div class="text-center mt-4">
    <h4>
        Laporan Harian Kebersihan dan Kerapihan Ruangan Gedung Bersama Maju
    </h4>
    <h4>
        Hari {{ Date::hari($date) }}
        Tanggal {{ Date::indo_date($date) }}
    </h4>
    <p>
        &lt;&lt; Tanggal Cetak {{ Date::indo_date(now()) }} Pukul {{ Date::pukul(now()) }} WIB &gt;&gt;
    </p>
</div>
<table>
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
<p>Approval</p>
<p>&lt;&lt;ttd&gt;&gt;</p>
<p>{{ $supervisor }}</p>
<p>Manajer</p>
