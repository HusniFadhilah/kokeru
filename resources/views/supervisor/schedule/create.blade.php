@extends('layouts.default')

@section('title', 'Tambah Jadwal')

@section('content')
<div class="pcoded-content">
    <div class="pcoded-inner-content">
        <div class="main-body">
            <div class="page-wrapper">
                <div class="page-body">
                    <div class="card tabs-card">
                        <div class="card-block">
                            <div class="container">
                                <form action="{{ route('supervisor.schedule.store') }}" method="post">
                                    @csrf
                                    <h4 class="sub-title">Tambah Data Ruangan</h4>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Pilih Karyawan</label>
                                        <div class="col-sm-10">
                                            <select name="cs_id" class="form-control @error('cs_id') is-invalid @enderror">
                                                <option>-- Pilih --</option>
                                                @foreach($cs as $cs)
                                                <option value="{{ $cs->id }}">{{ $cs->name}}</option>
                                                @endforeach
                                            </select>
                                            @error('cs_id')
                                            <span class="invalid-feedback">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Pilih Ruangan</label>
                                        <div class="col-sm-10">
                                            <select name="room_id" class="form-control @error('room_id') is-invalid @enderror">
                                                <option>-- Pilih --</option>
                                                @foreach($rooms as $room)
                                                <option value="{{ $room->id }}">{{ $room->name}}</option>
                                                @endforeach
                                            </select>
                                            @error('room_id')
                                            <span class="invalid-feedback">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <button type="submit" class="btn btn-success"><i class="fa fa-plus"></i> Tambah</button>
                                        <a href="{{ route('supervisor.schedule.data') }}" id="back" class="btn btn-danger"><i class="fa fa-times"></i> Batal</a>
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
