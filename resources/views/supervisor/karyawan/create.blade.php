@extends('layouts.default')

@section('title', 'Tambah Cleaning Service')

@section('content')
<div class="pcoded-content">
    <div class="pcoded-inner-content">
        <div class="main-body">
            <div class="page-wrapper">

                <div class="page-body">

                    <div class="card tabs-card">
                        <div class="card-block">
                            <div class="container">
                                <form action="{{ route('supervisor.karyawan.store') }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <h4 class="sub-title">Tambah Data Karyawan</h4>

                                    <div class="form-group row">
                                        <label class="col-lg-2 col-form-label">Nama</label>
                                        <div class="col-lg-10">
                                            <input type="hidden" name="role_id" value="{{ $role->id }}">
                                            <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" placeholder="Nama lengkap" value="{{ old('name') }}">
                                            @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-2 col-form-label">Email</label>
                                        <div class="col-lg-10">
                                            <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" placeholder="Alamat email" value="{{ old('email') }}">
                                            @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-2 col-form-label">No HP</label>
                                        <div class="col-lg-10">
                                            <input type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" placeholder="No HP" value="{{ old('phone') }}">
                                            @error('phone')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-2 col-form-label">Password</label>
                                        <div class="col-lg-10">
                                            <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Password" value="{{ old('password') }}">
                                            @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-2 col-form-label label-image">Foto Profile</label>
                                        <div class="col-lg-3">
                                            <img src="{{ asset('assets/img/user/default.jpg') }}" class="img-thumbnail img-preview">
                                        </div>
                                        <div class="col-lg-7">
                                            <input type="file" class="form-control @error('avatar') is-invalid @enderror" name="avatar" id="image" onchange="previewImg()">
                                            @error('avatar')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <button type="submit" class="btn btn-success"><i class="fa fa-plus"></i> Tambah</button>
                                        <a href="{{ route('supervisor.karyawan.data') }}" id="back" class="btn btn-danger"><i class="fa fa-times"></i> Batal</a>
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
