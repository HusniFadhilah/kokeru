@extends('layouts.default')

@section('title', 'Data - Cleaning Service')

@section('content')
<div class="pcoded-content">
    <div class="pcoded-inner-content">
        <div class="main-body">
            <div class="page-wrapper">

                <div class="page-body">
                    <div class="row">

                        <!-- tabs card start -->
                        <div class="col-sm-12">
                            <div class="card tabs-card">
                                <div class="card-block p-0">


                                    <div class="table-responsive">
                                        <table class="table datatable">
                                            <tr>
                                                <th>No</th>
                                                <th>Nama</th>
                                                <th>Avatar</th>
                                                <th>Action</th>
                                            </tr>
                                            @foreach($users as $user)
                                            <tr>
                                                <th scope="row">{{ $loop->iteration }}</th>
                                                <td>{{ $user->name }}</td>
                                                <td>@isset($user->avatar)<img src="{{ asset('storage/'.$user->avatar) }}" style="max-width:80px">@endisset</td>
                                                <td>
                                                    <a href="{{ route('supervisor.cs.edit', $user->id) }}" class="btn btn-warning btn-sm" title="Edit CS"><i class="fa fa-edit"></i></a>
                                                    <a href="{{ route('supervisor.cs.delete',$user->id) }}" class="btn btn-danger btn-sm tombol-hapus" data-text="Karyawan" title="Delete CS"><i class="fa fa-trash"></i></a>
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
