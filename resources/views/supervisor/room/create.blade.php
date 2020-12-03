@extends('layouts.default')

@section('title', 'Tambah Ruangan')

@section('content')
<div class="pcoded-content">
    <div class="pcoded-inner-content">
        <div class="main-body">
            <div class="page-wrapper">
                <div class="page-body">
                    <div class="card tabs-card">
                        <div class="card-block">
                            <div class="container">
                                <form action="{{ route('supervisor.room.store') }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <h4 class="sub-title">Tambah Data Ruangan</h4>
                                    <div class="form-group row">
                                        <label class="col-lg-5 col-form-label">Nama Ruangan</label>
                                        <div class="col-lg-10">
                                            <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" placeholder="Nama Ruangan" value="{{ old('name') }}">
                                            @error('name')
                                            <span class="invalid-feedback">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <button type="submit" class="btn btn-success"><i class="fa fa-plus"></i> Tambah</button>
                                        <a href="{{ route('supervisor.room.data') }}" id="back" class="btn btn-danger"><i class="fa fa-times"></i> Batal</a>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
