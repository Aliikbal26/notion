@extends('template.home')

@section('title', $title)

@section('content')
<!-- start -->

@if(session('success'))
<div class="row justify-content-center">
    <div class="col-md-5">
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Success !</strong> {{ session('success') }}.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    </div>
</div>
@endif
<h4 class="text-center mt-3">Profile {{$user->name}}</h4>
<div class="registration-form ">
    <form method="get" action="/user/{{$user->id}}/updateProfile" class="shadow">
        @csrf
        <div class="form-icon mx-auto">
            <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor" class="bi bi-person-fill text-center" viewBox="0 0 16 16">
                <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6" />
            </svg>
        </div>
        <div class="form-group">
            <input type="text" class="form-control item" name="user" id="email" placeholder="{{$user->name}}" disabled>
        </div>
        <div class="form-group">
            <input type="password" class="form-control item" name="password" id="password" placeholder="{{$user->email}}" disabled>
        </div>
        <div class="form-group d-grid gap-2  mx-auto">
            <button type="submit" class="btn btn-primary create-account">Edit</button>
        </div>
    </form>
</div>
<!-- end -->
@endsection