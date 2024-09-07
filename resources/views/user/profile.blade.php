@extends('layouts.app')

@section('content')


<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0">Profile</h4>
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                        <li class="breadcrumb-item active">Profile</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-md-10 col-lg-8">
                <div class="card">
                    <div class="card-header d-flex align-items-center">
                        <h4 class="card-title mb-0 flex-grow-1">My Profile</h4>
                        <span class="float-end btn btn-sm btn-info"><i class="fa-solid fa-user"></i> User</span>
                    </div><!-- end card header -->
                    <div class="card-body">
                        @if (session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>Success!</strong> {{session('success')}}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                        @endif
                        @if(session('error'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong>Error!</strong> {{ session('error') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                        @endif
                        <form action="{{ route('editProfile') }}" method="post" enctype="multipart/form-data" id="editProfile">
                            @csrf
                            <div class="row mb-4">
                                <div class="col-12 text-center">
                                    <div class="avatar-upload">
                                        <label for="profile_img" style="cursor: pointer;">
                                            <img alt="image" class="img-fluid rounded-circle" id="dpShowLabel" style="width: 150px; height: 150px;" src="{{ asset('uploads/profile/' . (Auth::user()->image ? Auth::user()->image : 'avatar.jpg')) }}">
                                        </label>
                                        <input type="file" name="image" id="profile_img" class="visually-hidden" accept="image/*" hidden onchange="imageName(this)">
                                    </div>
                                    <p></p>
                                    <h3><strong>{{ Auth::user()->name}} </strong></h3>
                                    <p>
                                        <strong><i class="fa-solid fa-calendar"></i> Joined on: </strong>
                                        @php
                                        $datetime = \Carbon\Carbon::createFromDate(Auth::user()->email_verified_at);
                                        echo $datetime->format('d M Y');
                                        @endphp
                                    </p>
                                    <div class="row mb-2">
                                        <div class="col-12 text-center">
                                            <button type="button" id="changePictureBtn" class="btn btn-secondary mt-2"><i class="fa-solid fa-camera"></i> Change Picture</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-12">
                                    <div class="form-group">
                                        <i class="fa-solid fa-user"></i> <label for="name">Name</label>
                                        <input type="text" class="form-control" id="name" name="name" required value="{{ Auth()->user()->name }}">
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-12">
                                    <div class="form-group">
                                        <i class="fa-solid fa-envelope"></i> <label for="email">Email</label>
                                        <input type="email" class="form-control" id="email" name="email" required value="{{ Auth()->user()->email }}">
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-12">
                                    <div class="form-group">
                                        <i class="fa-solid fa-location-dot"></i> <label for="address">Address</label>
                                        <input type="text" class="form-control" id="address" name="address" required value="{{ Auth()->user()->address }}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 text-end">
                                    <button type="submit" class="btn btn-primary" style="width: 100px;"><i class="fa-solid fa-pen-to-square"></i> Update</button>
                                </div>
                            </div>
                        </form>

                        <!-- Change Password Form -->
                        <hr class="my-4">
                        <div class="card-title mb-3">Change Password</div>
                        <form id="editPassword" autocomplete="off" action="{{route('editPassword')}}" method="post">
                            @csrf
                            <div class="row">
                                <div class="col-12 col-md-6 mb-3">
                                    <label for="password" class="form-label"><i class="fa-solid fa-lock"></i> New Password</label>
                                    <input type="password" name="password" id="password" class="form-control" autocomplete="off">
                                </div>
                                <div class="col-12 col-md-6 mb-3">
                                    <label for="c_password" class="form-label"><i class="fa-solid fa-square-check"></i> Confirm Password</label>
                                    <input type="password" name="c_password" id="c_password" class="form-control" autocomplete="off">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-12">
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" id="showPassword">
                                        <label class="form-check-label" for="showPassword"> Show Password</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 text-end">
                                    <button type="submit" class="btn btn-primary"><i class="fa-solid fa-key"></i> Change Password</button>
                                </div>
                            </div>
                        </form>
                    </div><!-- end card-body -->
                </div><!-- end card -->
            </div><!-- end col -->
        </div><!-- end row -->
    </div><!-- end container -->
</div>

<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<script>
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#dpShowLabel').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }

    $("#profile_img").change(function() {
        readURL(this);
    });

    document.getElementById('changePictureBtn').addEventListener('click', function() {
        document.getElementById('profile_img').click();
    });
</script>

<script>
    document.querySelector('#editProfile').addEventListener('submit', function(e) {
        if (!validatePassword()) {
            e.preventDefault();
        }
    });

    // Get the password input elements
    var passwordInput = document.getElementById('password');
    var cPasswordInput = document.getElementById('c_password');

    // Get the show password checkbox
    var showPasswordCheckbox = document.getElementById('showPassword');

    // Add an event listener to the checkbox
    showPasswordCheckbox.addEventListener('change', function() {
        // Determine whether to show or hide the password based on the checkbox state
        var passwordType = this.checked ? 'text' : 'password';

        // Set the password input types accordingly
        passwordInput.type = passwordType;
        cPasswordInput.type = passwordType;
    });
</script>

<script>
    $(document).ready(function() {
        $(".alert").delay(3500).slideUp(200, function() {
            $(this).alert('close');
        });
    });
</script>
@endsection