@php
use Carbon\Carbon;
@endphp
@extends('template.home')

@section('title', $title)

@section('content')
<div class="container">
    <div class="row my-3">
        <div class="col">
            <h1>Hello <span class="display-5 text-primary">{{$name->name}}</span> !</h1>
            <h1 class="display-5 text-bold">Organize Your Day with Our <span class="display-4 text-primary">Notion App</span> </h1>
        </div>
    </div>
    <div class="row justify-content-center">

        <a href="/todolist" class="text-end">See more</a>
        <hr>
        @foreach ($todolist as $value)
        <div class="col-md-4 col-sm-4 mb-3">
            <div class="card my-3 " style="width: 22rem; height:23rem; border-radius: 15px;">
                <img src="{{url('/img/banner1.png')}}" class="card-img-top" alt="banner" style="border-top-left-radius: 15px; border-top-right-radius: 15px;">
                <div class="card-body">
                    <h5 class="card-title">{{substr($value['todo'],0,35)}}{{ strlen($value['todo']) > 35 ? '...' : ''}}</h5>
                    <p class=" text-secondary" style="font-size: small;">Created : {{Carbon::parse($value['created_at'])->format('d F Y') }}</p>
                    <p class="text-secondary" style="font-size: medium;">{{ substr($value['description'], 0, 80) }}{{ strlen($value['description']) > 80 ? '...' : '' }}</p>
                    <footer>
                        <form action="/todolist/{{$value['id']}}/details" method="GET">
                            @csrf
                            <button class="btn btn-sm btn-primary" type="submit">See Details</button>
                        </form>
                    </footer>
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