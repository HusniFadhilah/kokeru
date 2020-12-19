<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Kebersihan</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
    <div class="container-fluid">
        <div class="text-center title">
            <h4>
                Laporan Harian Kebersihan dan Kerapihan Ruangan<br>Gedung Bersama Maju<br>
                Hari {{ Date::hari($date) }} Tanggal {{ Date::indo_date($date) }}
            </h4>
            <div class="row">
                <div class="col-align-center">
                    <small>
                        &lt;&lt;Tanggal Cetak {{ Date::indo_date(now()) }} Pukul {{ Date::pukul(now()) }}&gt;&gt;
                    </small>
                </div>
                @if($status != '')
                <div class="float-right">
                    <small>
                        <span class="mb-1">Status:</span>
                        <span class="badge badge-{{ $status == 1 ? 'success' : 'danger' }}">{{ $status == 1 ? 'SUDAH' : 'BELUM' }}</span>
                    </small>
                </div>
                @endif
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                @if(count($reports) > 0)
                <table class="table" border="1">
                    <thead>
                        <tr style="text-align: center;background-color: gray;">
                            <th scope=" col">No</th>
                            <th scope="col">Ruang</th>
                            <th scope="col">Nama CS</th>
                            <th scope="col">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($reports as $report)
                        <tr style="text-align: center;">
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td>{{ $report->room['name'] }}</td>
                            <td>{{ $report->user['name'] }}</td>
                            <td>{{ $report->status==0? "BELUM":"SUDAH" }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                @else
                <div class="col-12">
                    <div class="btn btn-block alert alert-dark" role="alert">
                        Belum ada data
                    </div>
                </div>
                @endif
            </div>
        </div>
        <div class="row">
            <div class="col-align-right">
                <div class="float-right">
                    <h5>Approval</h5>
                    <p>ttd</p>
                    <h5>{{ $supervisor }}</h5>
                    <h5>Manajer</h5>
                </div>
            </div>
        </div>
    </div>

</body>

</html>
