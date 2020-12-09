@extends('layouts.default')

@section('title', 'Dashboard - Cleaning Service')

@section('content')
<div class="pcoded-content">
    <div class="pcoded-inner-content">
        <div class="main-body">
            <div class="page-wrapper">

                <div class="page-body">
                    <div class="row">

                        <div class="col-sm-12">
                            <a href="{{ route('cs.task.create') }}" class="btn btn-primary mb-3"><i class="fa fa-plus mr-2"></i>Tambah Jadwal Baru</a>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
