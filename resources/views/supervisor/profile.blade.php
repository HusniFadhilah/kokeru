@extends('layouts.default')

@section('title', 'Data - Jadwal')

@section('content')
<!DOCTYPE html>
<html lang="en">

<head>
<div class="pcoded-content">
    <div class="pcoded-inner-content">
        <div class="main-body">
            <div class="page-wrapper">

                <div class="page-body">
                    <div class="row">

                  <h3 class="mb-0">Profile</h3>
                </div>
              </div>
            </div>
            <div class="card-body bg-white border-0">
			
              <form method="POST" action="{{ route('profile.update', Auth::user()->id) }}" enctype="multipart/form-data">
              
              @csrf
			  <div class="col-12 text-center">
				<img src="clon4.jpg" alt="foto profil" width="100" height="100">				
  			  </div>					
                <h6 class="heading-small text-muted mb-4">User information</h6>
                <div class="pl-lg-4">
                  <div class="row">
                    <div class="col-lg-12">
                      <div class="form-group focused">
                        <label class="form-control-label" for="input-first-name">Nama</label>
                        <input type="text" id="input-first-name" class="form-control form-control-alternative"value="{{ old('name', Auth::user()->name) }}">
                      </div>
                    </div>
                  </div>
				  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group focused">
                        <label class="form-control-label" for="input-notelp">No. Telp</label>
                        <input type="text" id="input-notelp" class="form-control form-control-alternative"value="{{ old('phone', Auth::user()->phone) }}">
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-email">Email</label>
                        <input type="email" id="input-email" class="form-control form-control-alternative"value="{{ old('email', Auth::user()->email) }}">
                      </div>
                    </div>
                  </div>
                </div>
                <hr class="my-4">
                <div class="col-12 text-right">
                  <button class="btn btn-warning btn-sm" title="Edit Karyawan" type="submit"><i class="fa fa-edit"></i>Edit</button>
                </div>
                  </div>
                </div>
                
              </form>
            </div>
          </div>
        </div>
</div>

</body>
</html>
@endsection