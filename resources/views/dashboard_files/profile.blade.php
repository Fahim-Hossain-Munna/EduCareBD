@extends('layouts.dashboardmaster')

@section('content')

<div class="row">
    <div class="col">
        <div class="page-description">
            <h1>Profile Update</h1>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">Update Profile Information,</h5>
            </div>
            <div class="card-body">
                <div class="example-container">
                    <div class="example-content">
                        <form class="row g-3" action="{{ route('profile.update.info') }}" method="POST">
                            @csrf
                            <div class="col-md-6">
                                <label class="form-label">User Name</label>
                                <input type="text" class="form-control" name="name" >
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Email</label>
                                <input type="email" class="form-control" name="email" >
                            </div>
                            <div class="col-md-12">
                                <label class="form-label">Address</label>
                                <input type="text" class="form-control" name="address">
                            </div>
                            <div class="col-12">
                                <button type="submit" class="btn btn-primary">update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">Update Password,</h5>
            </div>
            <div class="card-body">
                <div class="example-container">
                    <div class="example-content">
                        <form class="row g-3" action="{{ route('update.user.password') }}" method="POST">
                            @csrf
                            <div class="col-6">
                                <label class="form-label">Old Password</label>
                                <input type="password" id="myInput" class="form-control @error('current_password') is-invalid @enderror"  name="current_password">
                                @error('current_password')
                                    <p class="text-danger mt-2">{{ $message }}</p>
                                @enderror
                                        <div class="form-check mt-2">
                                            <input class="form-check-input" type="checkbox" id="myInput10" onclick="myFunction()">
                                            <label class="form-check-label" for="myInput10">
                                                show password
                                            </label>
                                        </div>
                            </div>
                            <div class="col-6">
                                <label class="form-label">New Password</label>
                                <input type="password" id="showPass" class="form-control @error('password') is-invalid @enderror"  name="password">
                                @error('password')
                                    <p class="text-danger mt-2">{{ $message }}</p>
                                @enderror
                                <div class="form-check mt-2">
                                    <input class="form-check-input" type="checkbox" id="myshowpass" onclick="myFunctionTwo()">
                                    <label class="form-check-label" for="myshowpass">
                                        show password
                                    </label>
                                </div>
                            </div>
                            <div class="col-6">
                                <label for="inputAddress2" class="form-label">Confirm Password</label>
                                <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror" name="password_confirmation">
                                @error('password_confirmation')
                                <p class="text-danger mt-2">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="col-12">
                                <button type="submit" class="btn btn-primary">update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">Profile Picture Upload</h5>
            </div>
            <div class="image d-flex justify-content-center mt-5">
                @if (auth()->user()->user_photo)
                <img src="{{ asset('backend/uploads/user_photo') }}/{{ auth()->user()->user_photo }}" class="img-thumbnail" style="width: 200px; height:200px;">
                @else
                <img src="{{ Avatar::create(auth()->user()->name)->toBase64(); }}" style="width: 200px; height:200px;">
                @endif
            </div>
            <h5 class="d-flex justify-content-center mt-3">{{ auth()->user()->name }}</h5>
            <div class="card-body">
                <div id="dropzone" class="p-5">
                    <form action="{{ route('update.user.image') }}" method="POST" enctype="multipart/form-data" class="dropzone needsclick dz-clickable" id="demo-upload">
                        @csrf
                        <div class="dz-message needsclick p-5">
                            {{-- <button type="button" class="dz-button">Drop files here or click to upload.</button><br> --}}
                            <input type="file" class="form-control @error('user_photo') is-invalid @enderror" name="user_photo">
                            @error('user_photo')
                            <p class="text-danger mt-2">{{ $message }}</p>
                            @enderror
                            <br>
                            <span class="note needsclick">(This is just a profile uploaded zone. Selected files are <strong>will be</strong> actually image ^_^ )</span>
                            <br>
                            <hr>
                            <div class="col-12">
                                <button type="submit" class="btn btn-primary">update</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script_content')
<script>
    function myFunctionTwo() {
    var y = document.getElementById("showPass");
    if (y.type === "password") {
        y.type = "text";
    } else {
        y.type = "password";
    }
    }
    function myFunction() {
    var x = document.getElementById("myInput");
    if (x.type === "password") {
        x.type = "text";
    } else {
        x.type = "password";
    }
    }
</script>

@if (session('profile_update_info_success_msg'))
    <script>
        const Toast = Swal.mixin({
    toast: true,
    position: 'top-end',
    showConfirmButton: false,
    timer: 3000,
    timerProgressBar: true,
    didOpen: (toast) => {
      toast.addEventListener('mouseenter', Swal.stopTimer)
      toast.addEventListener('mouseleave', Swal.resumeTimer)
    }
  })

  Toast.fire({
    icon: 'success',
    title: '{{ session('profile_update_info_success_msg') }}'
  })
    </script>
@endif
@if (session('profile_update_info_empty_msg'))
    <script>
        const Toast = Swal.mixin({
    toast: true,
    position: 'top-end',
    showConfirmButton: false,
    timer: 3000,
    timerProgressBar: true,
    didOpen: (toast) => {
      toast.addEventListener('mouseenter', Swal.stopTimer)
      toast.addEventListener('mouseleave', Swal.resumeTimer)
    }
  })

  Toast.fire({
    icon: 'error',
    title: '{{ session('profile_update_info_empty_msg') }}'
  })
    </script>
@endif

@endsection

