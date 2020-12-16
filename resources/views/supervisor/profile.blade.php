@extends('layouts.default')

@section('title', 'Edit Profile')

@section('content')
<div class="pcoded-content">
    <div class="pcoded-inner-content">
        <div class="main-body">
            <div class="page-wrapper">

                <div class="page-body">
                    <div class="row">

                        <form action="{{ route('profile.update', Auth::user()->id) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('PATCH')
                            <h4 class="sub-title">Edit Profile</h4>

                            <div class="form-group row">
                                <label class="col-lg-2 col-form-label label-image">Foto Profile</label>
                                <div class="col-lg-3">
                                    <img src="{{ url('/storage').('/'.Auth::user()->avatar) }}" class="img-thumbnail img-preview">
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

                            <div class="form-group row">
                                <label class="col-lg-2 col-form-label">Nama</label>
                                <div class="col-lg-10">
                                    <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" placeholder="Nama lengkap" value="{{ old('name', Auth::user()->name) }}">
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
                                    <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" placeholder="Alamat email" value="{{ old('email', Auth::user()->email) }}">
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
                                    <input type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" placeholder="No HP" value="{{ old('phone', Auth::user()->phone) }}">
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
                                        <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Password" value="{{ old('password'), Auth::user()->password }}">
                                        @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>


                            <div class="form-group">
                                <button type="submit" id="edit" class="btn btn-success"><i class="fa fa-save"></i> Simpan</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
