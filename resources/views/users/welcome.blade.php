@extends('template.home')

@section('title', $title)

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card my-3 " style="width: 55rem; border-radius: 15px;">
                <img src="{{url('/img/Banner.png')}}" class="card-img-top" alt="banner" style="border-top-left-radius: 15px; border-top-right-radius: 15px;">
                <div class="card-body">
                    <h1 class="display-5 text-bold">{{$pelatihan}}</h1>
                    <h2 class="text-muted">{{$tema}}</h2>
                    <hr>
                    <h5 class="card-title">{{$name}}</h5>
                    <p class="card-text">{{$age}}</p>
                    <p class="lead">
                        {{$about}}
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .card:hover {
        border: 2px solid #007bff;
        /* Warna dan ukuran border */
    }
</style>
@endsection