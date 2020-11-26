@extends('layouts.auth')

@section('title', 'Login - KoKeRu')

@section('content')
<!-- Pre-loader start -->
<div class="theme-loader">
    <div class="loader-track">
        <div class="loader-bar"></div>
    </div>
</div>
<!-- Pre-loader end -->

<section class="login p-fixed d-flex text-center bg-primary common-img-bg">
    <!-- Container-fluid starts -->
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <!-- Authentication card start -->
                <div class="login-card card-block auth-body mr-auto ml-auto">
                    <form class="md-float-material" method="post" action="{{ route('login') }}">
                        @csrf
                        <div class="text-center">
                            <h2 class="text-white">KoKeRu</h2>
                        </div>
                        <div class="auth-box">
                            <div class="row m-b-20">
                                <div class="col-md-12">
                                    <h3 class="text-left txt-primary">Login untuk masuk</h3>
                                </div>
                            </div>
                            <hr class="mb-4">
                            <div class="input-group mb-3">
                                <input type="email" class="form-control @error('email') is-invalid @enderror" placeholder="Email kamu" name="email">
                            </div>
                            <small class="text-danger mb-2" role="alert">
                                @error('email')
                                <strong>{{ $message }}</strong>
                                @enderror
                            </small>
                            <div class="input-group mb-2 mt-3">
                                <input type="password" class="form-control @error('password') is-invalid @enderror" placeholder="Password" name="password">
                            </div>
                            <small class="text-danger mt-2" role="alert">
                                @error('password')
                                <strong>{{ $message }}</strong>
                                @enderror
                            </small>
                            <div class="row m-t-30">
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-primary btn-md btn-block waves-effect text-center m-b-20">Login</button>
                                </div>
                            </div>
                        </div>
                    </form>
                    <!-- end of form -->
                </div>
                <!-- Authentication card end -->
            </div>
            <!-- end of col-sm-12 -->
        </div>
        <!-- end of row -->
    </div>
    <!-- end of container-fluid -->
</section>

@endsection
