@extends('layouts.admin')

@section('content')
<div class="p-5 mb-4 {{ Auth::guard('admin')->check() ? (Auth::guard('admin')->user()->is_SuperAdmin == 1 ? 'bg-danger' : 'bg-info') : '' }} rounded-3">
    <div class="container-fluid py-5">
        <div class="row">
            <div class="col-12">
                @if(Auth::guard('admin')->check())
                @if(Auth::guard('admin')->user()->is_SuperAdmin == 1)
                <h2 class="display-5 fw-bold text-white"><i class="fa-solid fa-shield"></i> Welcome Administrator!</h2>
                <p class="lead text-white"><i class="fa-solid fa-arrow-right"></i> Enjoy unrestricted control of your application settings!</p>
                @elseif(Auth::guard('admin')->user()->is_SuperAdmin == 0)
                <h2 class="display-5 fw-bold text-white"><i class="fa-solid fa-shield-halved"></i> Welcome Moderator!</h2>
                <p class="lead text-white"><i class="fa-solid fa-arrow-right"></i> You have partial control over the application settings!</p>
                @endif
                @endif
            </div>
        </div>
    </div>
</div>

@endsection