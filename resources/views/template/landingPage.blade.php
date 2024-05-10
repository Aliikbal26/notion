@extends('template.home')

@section('title', $title)

@section('content')
<div class="container">
    <div class="row my-3">
        <div class="col">
            <h1>Selamat Datang Ali Ikbal</h1>
        </div>
    </div>
    <div class="row">
        @foreach ($todolist as $value)
        <div class="col-md-4 mb-2">
            <div class="card my-3 " style="width: 22rem; height:21rem; border-radius: 15px;">
                <img src="{{url('/img/baner.png')}}" class="card-img-top" alt="banner" style="border-top-left-radius: 15px; border-top-right-radius: 15px;">
                <div class="card-body">
                    <h5 class="card-title">{{substr($value['todo'],0,35)}}{{ strlen($value['todo']) > 35 ? '...' : ''}}</h5>
                    <p class="card-text">{{ substr($value['description'], 0, 70) }}{{ strlen($value['description']) > 70 ? '...' : '' }}</p>
                    <form action="/todolist/{{$value['id']}}/details" method="GET">
                        @csrf
                        <button class="btn btn-sm btn-primary" type="submit">See Details</button>
                    </form>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>

<style>
    .card:hover {
        border: 2px solid #007bff;
        /* Warna dan ukuran border */
    }
</style>
@endsection