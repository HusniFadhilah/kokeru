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
                            <div class="card tabs-card">
                                <div class="card-block">
                                    <div class="table-responsive">
                                        <table class="table datatable">
                                            <tr>
                                                <th>No</th>
                                                <th>Nama Ruangan</th>
                                                <th>Karyawan</th>
                                                <th>Action</th>
                                            </tr>
                                            @foreach($schedules as $schedule)
                                            <tr>
                                                <th scope="row">{{ $loop->iteration }}</th>
                                                <td>{{ $schedule->room['name'] }}</td>
                                                <td>{{ $schedule->user['name'] }}</td>
                                                <td>
                                                    {{-- <a href="{{ route('supervisor.schedule.edit', $schedule->id) }}" class="btn btn-warning btn-sm" title="Edit Ruangan"><i class="fa fa-edit"></i></a> --}}
                                                    {{-- <a href="{{ route('supervisor.schedule.delete',$schedule->id) }}" class="btn btn-danger btn-sm tombol-hapus" data-text="Ruangan" title="Hapus Ruangan"><i class="fa fa-trash"></i></a> --}}
                                                    <form id="delete-form" action="" method="POST" class="d-none">
                                                        @csrf
                                                        @method('delete')
                                                    </form>
                                                </td>
                                            </tr>
                                            @endforeach
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
