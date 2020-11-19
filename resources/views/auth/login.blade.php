@extends('layouts.auth')

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
                    <form class="md-float-material">
                        <div class="text-center">
                            <h2 class="text-white">KoKeRu</h2>
                        </div>
                        <div class="auth-box">
                            <div class="row m-b-20">
                                <div class="col-md-12">
                                    <h3 class="text-left txt-primary">Sign In</h3>
                                </div>
                            </div>
                            <hr class="mb-4">
                            <div class="input-group">
                                <input type="email" class="form-control" placeholder="Your Email Address">
                                <span class="md-line"></span>
                            </div>
                            <div class="input-group">
                                <input type="password" class="form-control" placeholder="Password">
                                <span class="md-line"></span>
                            </div>
                            <div class="row m-t-30">
                                <div class="col-md-12">
                                    <button type="button" class="btn btn-primary btn-md btn-block waves-effect text-center m-b-20">Sign in</button>
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
