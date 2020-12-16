@extends('layouts.default')

@section('title', 'Edit Jadwal')

@section('content')

<div class="pcoded-content">
    <div class="pcoded-inner-content">
        <div class="main-body">
            <div class="page-wrapper">
                <div class="page-body">
                    <div class="card tabs-card">
                        <div class="card-block">
                            <div class="container">
                                <form action="{{ route('supervisor.schedule.update',$schedule->id) }}" method="post">
                                    @csrf
                                    @method('patch')
                                    <h4 class="sub-title">Edit Jadwal </h4>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Pilih Karyawan</label>
                                        <div class="col-sm-10">
                                            <select name="cs_id" class="form-control">
                                                <option>-- Pilih --</option>
                                                @foreach($cs as $cs)
                                                <option value="{{ $cs->id }}" {{ request('cs_id') ?? $schedule->user['name'] == $cs->name ? 'selected' : '' }}>{{ $cs->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Pilih Ruangan</label>
                                        <div class="col-sm-10">
                                            <select name="room_id" class="form-control">
                                                <option>-- Pilih --</option>
                                                @foreach($rooms as $room)
                                                <option value="{{ $room->id }}" {{ request('room') ?? $schedule->room['name'] == $room->name ? 'selected' : '' }}>{{ $room->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Simpan</button>
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
