@extends('layouts.default')

@section('title', 'Data - Jadwal')

@section('content')
<div class="pcoded-content">
    <div class="pcoded-inner-content">
        <div class="main-body">
            <div class="page-wrapper">

                <div class="page-body">
                    <div class="row">

                        <!-- tabs card start -->
                        <div class="col-sm-12">
                            <a href="{{ route('supervisor.schedule.create') }}" class="btn btn-primary mb-3"><i class="fa fa-plus mr-2"></i>Tambah Jadwal Baru</a>
                            <br>
                            <a href="{{ route('supervisor.schedule.reset') }}" class="btn btn-danger mb-3 tombol-konfirmasi" data-message="Jadwal hari ini akan direset, status ruangan menjadi belum dibersihkan, dan bukti kebersihan akan dihapus" title="Verify shop"><i class="fa fa-refresh mr-2"></i>Reset Jadwal Hari Ini</a>
                            <form id="confirm-form" action="" method="POST" class="d-none">
                                @csrf
                            </form>
                            <div class="card tabs-card">
                                <div class="card-block">
                                    <div class="table-responsive">
                                        <table class="datatable">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Nama Ruangan</th>
                                                    <th>Karyawan</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($schedules as $schedule)
                                                <tr>
                                                    <th scope="row">{{ $loop->iteration }}</th>
                                                    <td>{{ $schedule->room['name'] }}</td>
                                                    <td>{{ $schedule->user['name'] }}</td>
                                                    <td>
                                                        {{-- <a href="{{ route('supervisor.schedule.edit', $schedule->id) }}" class="btn btn-warning btn-sm" title="Edit Jadwal"><i class="fa fa-edit"></i></a> --}}
                                                        <a href="{{ route('supervisor.schedule.delete',$schedule->id) }}" class="btn btn-danger btn-sm tombol-hapus" data-text="Jadwal" title="Hapus Jadwal"><i class="fa fa-trash"></i></a>
                                                        <form id="delete-form" action="" method="POST" class="d-none">
                                                            @csrf
                                                            @method('delete')
                                                        </form>
                                                    </td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- tabs card end -->

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
