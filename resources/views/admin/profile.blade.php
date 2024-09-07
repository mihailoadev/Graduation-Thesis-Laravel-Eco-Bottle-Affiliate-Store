@extends('layouts.admin')
@section('content')
<div class="row animated fadeInRight mt-2 align-items-stretch">

    <div class="col-md-4">
        <div class="ibox">
            <div class="ibox-title">
                <h5>Your Profile</h5>
            </div>
            <div>
                <div class="ibox-content no-padding border-left-right text-center">
                    <label for="profile_img" class="d-block mx-auto mt-3" style="cursor: pointer; width: 166px; height: 166px;">
                        <img alt="image" class="img-fluid rounded-circle" id="dpShowLabel" style="cursor: pointer; width: 166px; height: 166px;" src="{{ asset('uploads/profile/' . (Auth::guard('admin')->user()->image ? Auth::guard('admin')->user()->image : (Auth::guard('admin')->user()->is_SuperAdmin ? 'administrator.jpg' : 'moderator.jpg'))) }}">
                    </label>
                    <div class="mt-2">
                        <button type="button" id="changePictureBtn" class="btn btn-secondary mb-3"><i class="fa-solid fa-camera"></i> Change Picture</button>
                    </div>
                </div>

                <div class="ibox-content profile-content text-center">
                    @if(Auth::guard('admin')->user()->is_SuperAdmin == 1)
                    <span class="btn btn-sm btn-danger"><i class="fa-solid fa-shield"></i> Administrator</span>
                    @elseif(Auth::guard('admin')->user()->is_SuperAdmin == 0)
                    <span class="btn btn-sm btn-info"><i class="fa-solid fa-shield-halved"></i> Moderator</span>
                    @endif
                    <h3 class="pt-2"><strong>{{Auth::guard('admin')->user()->name}} </strong></h3>
                    <p>
                        <strong><i class="fa-solid fa-calendar"></i> Joined on: </strong>
                        @php
                        $datetime = \Carbon\Carbon::createFromDate(Auth::guard('admin')->user()->email_verified_at);
                        echo $datetime->format('d M Y');
                        @endphp
                    </p>
                </div>
            </div>
        </div>

    </div>
    <div class="col-md-8">
        @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Success!</strong> {{session('success')}}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @elseif(session('failure'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Error!</strong> {{session('failure')}}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif
        <div class="row">
            <div class="col-12">
                <div class="ibox ">
                    <div class="ibox-title">
                        <h5>User Details</h5>
                    </div>
                    <div class="ibox-content">
                        <form id="editProfile" autocomplete="off" action="{{route('admin.editProfile')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <input type="file" name="profile_img" id="profile_img" class="visually-hidden" accept="image/*" hidden onchange="imageName(this)">
                            <div class="row mb-3">
                                <div class="col">
                                    <label for="formGroupExampleInput" class="form-label"> <i class="fa-solid fa-user"></i> Full Name</label>
                                    <input type="text" class="form-control" placeholder="" required id="name" name="name" value="{{Auth::guard('admin')->user()->name}}">
                                </div>
                                <div class="col">
                                    <label for="formGroupExampleInput" class="form-label"> <i class="fa-solid fa-envelope"></i> Email</label>
                                    <input type="email" class="form-control" placeholder="" required id="email" name="email" value="{{Auth::guard('admin')->user()->email}}">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <button type="submit" id="formSubmitter" class="btn btn-primary float-end"><i class="fa-solid fa-pen-to-square"></i> Update</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="row">
            <div class="col-12">
                <div class="ibox ">
                    <div class="ibox-title">
                        <h5>Change Password</h5>
                    </div>
                    <div class="ibox-content">
                        <form id="editPassword" autocomplete="off" action="{{route('admin.editPassword')}}" method="post">
                            @csrf
                            <div class="row mb-2">
                                <div class="col">
                                    <label for="password" class="form-label"><i class="fa-solid fa-lock"></i> New Password</label>
                                    <input type="password" name="password" id="password" class="form-control" autocomplete="off">
                                </div>
                                <div class="col">
                                    <label for="c_password" class="form-label"><i class="fa-solid fa-square-check"></i> Confirm Password</label>
                                    <input type="password" name="c_password" id="c_password" class="form-control" autocomplete="off">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <label>
                                        <input type="checkbox" id="showPassword"> Show Password
                                    </label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <button type="submit" class="btn btn-primary float-end"><i class="fa-solid fa-key"></i> Change Password</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    function imageName(input) {
        var dpShowLabel = document.getElementById('dpShowLabel');
        console.log(input.files[0]);
        dpShowLabel.src = URL.createObjectURL(input.files[0]);
    }
</script>
<script>
    document.querySelector('#editPassword').addEventListener('submit', function(e) {
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
    $(document).ready(function() {
        $(".alert").delay(3500).slideUp(200, function() {
            $(this).alert('close');
        });
    });
</script>
@endsection