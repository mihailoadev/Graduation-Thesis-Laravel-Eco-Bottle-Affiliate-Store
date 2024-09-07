{{-- resources/views/admin/users/view.blade.php --}}
@extends('layouts.admin')


@section('content')


<div class="row">
    <div class="col-lg-12">
        <div class="ibox">
            <div class="ibox-title d-flex justify-content-between align-items-center">
                <h5>User Details</h5>
                <a class="btn btn-primary" href="{{ route('admin.users') }}" style="margin-right:-72px;"><i class="fa fa-arrow-left"></i> All Users</a>
            </div>
            <div class="ibox-content">
                @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Success!</strong> {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @elseif(session('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Error!</strong> {{ session('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @endif

                <form action="{{ route('admin.editUserProfile') }}" method="post" id="editUserProfile" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="id" value="{{ $user->id }}">
                    @csrf
                    <div class="row mb-3">
                        <div class="col-md-3 text-center">
                            <div class="form-group mt-4">
                                <label for="editImage" style="cursor: pointer;" class="form-label">
                                    <img id="imageView" src="{{ asset('uploads/profile/' . ($user->image ?? 'avatar.jpg')) }}" class="img-fluid rounded-circle" style="width: 200px; height: 200px;" alt="Image View">
                                    <input type="file" name="image" id="profile_img" class="visually-hidden" accept="image/*" hidden onchange="imageName(this)">
                                </label>
                                <div class="mt-2">
                                    <button type="button" id="changePictureBtn" class="btn btn-secondary"><i class="fa-solid fa-camera"></i> Change Picture</button>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-9">
                            <div class="form-group mb-3">
                                <label for="name" class="form-label"><i class="fa-solid fa-user"></i> Name</label>
                                <input type="text" class="form-control" name="name" id="name" value="{{ old('name', $user->name) }}" required />
                            </div>
                            <div class="form-group mb-3">
                                <label for="email" class="form-label"><i class="fa-solid fa-envelope"></i> Email</label>
                                <input type="text" class="form-control" name="email" id="email" value="{{ old('email', $user->email) }}" required />
                            </div>
                            <div class="form-group mb-3">
                                <label for="address" class="form-label"><i class="fa-solid fa-location-dot"></i> Address</label>
                                <input type="text" class="form-control" name="address" id="address" value="{{ old('address', $user->address) }}" required />
                            </div>
                            @php
                            $referral_code = str_replace(route('register', ['referral_token' => '']), '', route('register', ['referral_token' => $user->referral_code]));
                            @endphp
                            <div class="form-group mb-3">
                                <label for="referral_code" class="form-label"><i class="fa-solid fa-code-fork"></i> Referral Code</label>
                                <input type="text" class="form-control" name="referral_code" disabled id="referral_code" value="{{ $referral_code }}" required />
                            </div>
                            <div class="row">
                                <div class="col text-end">
                                    <button type="submit" class="btn btn-primary"><i class="fa-solid fa-pen-to-square"></i> Update</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
                <hr>
                <h4>Change Password</h4>

                <!-- Change Password Form -->
                <form id="editUserPassword" autocomplete="off" action="{{ route('admin.editUserPassword') }}" method="post" class="mt-4">
                    @csrf
                    <input type="hidden" name="id" value="{{ $user->id }}">
                    <div class="row mb-3">
                        <div class="col-md-6 mb-3">
                            <label for="password" class="form-label"><i class="fa-solid fa-lock"></i> New Password</label>
                            <input type="password" name="password" id="password" class="form-control" autocomplete="off" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="c_password" class="form-label"><i class="fa-solid fa-square-check"></i> Confirm Password</label>
                            <input type="password" name="password_confirmation" id="c_password" class="form-control" autocomplete="off" required>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label>
                                <input type="checkbox" id="showPassword"> Show Password
                            </label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col text-end">
                            <button type="submit" class="btn btn-primary"><i class="fa-solid fa-key"></i> Change Password</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="ibox">
            <div class="ibox-title d-flex justify-content-between align-items-center">
                <h5>Affiliate Tree</h5>
                <a class="btn btn-primary" onclick="capture()" style="margin-right:-72px;">
                    <i class="fa-solid fa-download"></i> Download Tree (.jpg)
                </a>
            </div>
            <div class="ibox-content" id="tree_canvas">
                {!! admin_tree_builder($user->id) !!}
            </div>
        </div>
    </div>
</div>
<script src="https://html2canvas.hertzen.com/dist/html2canvas.min.js"></script>

<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<script>
    function capture() {
        const captureElement = document.querySelector('#tree_canvas')
        html2canvas(captureElement)
            .then(canvas => {
                canvas.style.display = 'none'
                document.body.appendChild(canvas)
                return canvas
            })
            .then(canvas => {
                const image = canvas.toDataURL('image/jpg')
                const a = document.createElement('a')
                a.setAttribute('download', 'tree.jpg')
                a.setAttribute('href', image)
                a.click()
                canvas.remove()
            })
    }
</script>

<script>
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#imageView').attr('src', e.target.result); // Update #imageView
            }
            reader.readAsDataURL(input.files[0]);
        }
    }

    $("#profile_img").change(function() {
        readURL(this); // Invoke readURL function when input changes
    });

    document.getElementById('changePictureBtn').addEventListener('click', function() {
        document.getElementById('profile_img').click();
    });
</script>

<script>
    document.querySelector('#editUserProfile').addEventListener('submit', function(e) {
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