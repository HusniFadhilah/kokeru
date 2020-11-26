@extends('layouts.default')

@section('title', 'Edit Cleaning Service')

@section('content')
<div class="pcoded-content">
    <div class="pcoded-inner-content">
        <div class="main-body">
            <div class="page-wrapper">

                <div class="page-body">
                    <div class="row">

                        <form action="" method="post">
                            @csrf
                            @method('patch')
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Nama *</label>
                                        <input type="text" name="name" value="{{ old('name', $user->name) }}" class="form-control  @error('name') is-invalid @enderror">
                                        @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Email *</label>
                                        <input type="email" name="email" value="{{ old('email', $user->email) }}" class="form-control  @error('email') is-invalid @enderror">
                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="file_gambar" class="col-lg-3 col-form-label">
                                    Foto Profil<br>
                                    @error('avatar')
                                    <small class="text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </small>
                                    @enderror
                                </label>
                                <div class="col-lg-4 mb-2">
                                    @isset($user->avatar)<img src="{{ asset($user->avatar) }}" class="img-thumbnail img-preview">@else<img src="{{ asset('assets/img/user/default.jpg') }}" class="img-thumbnail img-preview"> @endisset
                                </div>
                                <div class="col-lg-5">
                                    <div class="custom-file @error('avatar') is-invalid @enderror">
                                        <input type="file" id="picture_path" name="avatar" onchange="previewImg()">
                                        <label class="custom-file-label" for="picture_path">Pilih gambar</label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <button type="submit" id="edit" class="btn btn-success"><i class="fa fa-save"></i> Simpan</button>
                                <a href="{{ route('supervisor.cs') }}" id="back" class="btn btn-danger"><i class="fa fa-times"></i> Batal</a>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
