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
