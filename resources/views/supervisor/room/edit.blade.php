@extends('layouts.default')

@section('title', 'Edit Cleaning Service')

@section('content')
<div class="pcoded-content">
    <div class="pcoded-inner-content">
        <div class="main-body">
            <div class="page-wrapper">

                <div class="page-body">
                    <div class="row">

                        <form action="{{ route('supervisor.room.update',$room->id) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('patch')
                            <h4 class="sub-title">Edit Data Ruangan</h4>

                            <div class="form-group row">
                                <label class="col-lg-5 col-form-label">Nama Ruangan</label>
                                <div class="col-lg-10">
                                    <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" placeholder="Nama ruangan" value="{{ old('name',$room->name) }}">
                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <button type="submit" id="edit" class="btn btn-success"><i class="fa fa-save"></i> Simpan</button>
                                <a href="{{ route('supervisor.room.data') }}" id="back" class="btn btn-danger"><i class="fa fa-times"></i> Batal</a>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
