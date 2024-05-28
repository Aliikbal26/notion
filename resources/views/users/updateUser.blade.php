@extends('template.home')

@section('title', 'Edit Profile')

@section('content')
<h2 class="text-center my-3">Edit Profile</h2>
<div class="registration-form">
    <form class="shadow" method="POST" action="/user/{{$user->id}}/updateProfile">
        @csrf
        @method('PUT')
        <div class="form-icon mx-auto">
            <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor" class="bi bi-person-fill text-center" viewBox="0 0 16 16">
                <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6" />
            </svg>
        </div>
        <div class="form-group">
            <input type="text" name="name" class="form-control item" id="username" placeholder="Full Name">
        </div>
        <!-- <div class="form-group">
            <input type="password" class="form-control item" id="password" placeholder="Password">
        </div> -->
        <!-- <div class="form-group">
            <input type="text" name="password" class="form-control item" id="email" placeholder="Email">
        </div> -->

        <div class="form-group d-grid gap-2  mx-auto">
            <button type="submit" class="btn btn-primary create-account">Save</button>
        </div>
    </form>
</div>
<script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>




@endsection