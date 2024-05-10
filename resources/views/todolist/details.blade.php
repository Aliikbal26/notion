@extends('template.home')

@section('title', $title)

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card my-3 shadow " style="width: 40rem; border-radius: 15px; ">
                <img src="{{url('/img/baner.png')}}" class="card-img-top" alt="banner" style="border-top-left-radius: 15px; border-top-right-radius: 15px;">
                <div class="card-body">
                    <div class="row">
                        <h5 class="display-6">{{$todolist->todo}}</h5>
                    </div>
                    <div class="row">
                        <h6 class="text-muted my-3">Category :</h6>
                        <div class="row">
                            <div class="col">
                                <h6 class="text-muted my-3">Nama Category</h6>
                                <h6 class="text-muted my-3">School</h6>
                            </div>
                            <div class="col">
                                <h6 class="text-muted my-3">Nama Priority</h6>
                                <h6 class="text-muted my-3">Second</h6>
                            </div>
                        </div>
                    </div>
                    <h6 class="text-muted my-3">Description</h6>
                    <p class="card-text">{{ $todolist->description}}</p>

                </div>
            </div>
        </div>
    </div>
</div>

@endsection