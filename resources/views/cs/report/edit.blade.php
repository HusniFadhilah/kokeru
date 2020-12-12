@extends('layouts.default')

@section('title', 'Upload Task')

@section('content')
<div class="pcoded-content">
    <div class="pcoded-inner-content">
        <div class="main-body">
            <div class="page-wrapper">

                <div class="page-body">

                    <div class="card tabs-card">
                        <div class="card-block">
                            <div class="container">
                                <h4 class="sub-title">Tambah Foto atau Video Kebersihan</h4>
                                <p>Ruangan: <b>{{ $report->room['name'] }}</b></p>
                                @if($errors->any())
                                <div class="card borderless-card">
                                    <div class="card-block danger-breadcrumb">
                                        <ul>
                                            @foreach($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                                @endif
                                <form action="{{ route('cs.report.update', $report->id) }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    @method('patch')
                                    <div class="form-group row">
                                        <label class="col-lg-2 col-form-label label-image">Foto Bukti</label>
                                        <div class="col-lg-10">
                                            <input type="file" class="form-control @error('foto[]') is-invalid @enderror" name="foto[]" id="file-input" multiple>
                                        </div>
                                        <div class="col-lg-2"></div>
                                        <div class="col-lg-10">
                                            <div id="preview" class="mt-2"></div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-2 col-form-label label-image">Video Bukti</label>
                                        <div class="col-lg-10">
                                            <input type="file" class="form-control @error('video') is-invalid @enderror" name="video" id="video" accept="video/*">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-2"></div>
                                        <div class="col-lg-10">
                                            <video width="400" controls>
                                                <source src="mov_bbb.mp4" id="video_here">
                                                Your browser does not support HTML5 video.
                                            </video>
                                        </div>
                                    </div>
                                    <div class="form-group mt-4">
                                        <button type="submit" class="btn btn-success"><i class="fa fa-plus"></i> Tambah</button>
                                        <a href="{{ route('cs.report.data') }}" id="back" class="btn btn-danger"><i class="fa fa-times"></i> Batal</a>
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
