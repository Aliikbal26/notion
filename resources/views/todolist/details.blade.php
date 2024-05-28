@extends('template.home')

@section('title', $title)

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card my-3 shadow " style="width: 40rem; border-radius: 15px; ">
                <img src="{{url('/img/banner1.png')}}" class="card-img-top" alt="banner" style="border-top-left-radius: 15px; border-top-right-radius: 15px;">
                <div class="card-body">
                    <div class="row">
                        <h5 class="display-6">{{$todolist->todo}}</h5>
                    </div>
                    <div class="row">
                        <div class="col">
                            <span class="badge rounded-pill text-dark p-2" style="background-color: #cacfce;">Status : {{$todolist->status}}</span>
                        </div>
                        <div class="col">
                            <span class="badge rounded-pill  text-dark p-2" style="background-color: #39fa90;">Deadline : {{$todolist->deadline}}</span>
                        </div>
                        <div class="row">
                            <div class="col">
                                <h6 class="text-muted my-3">Nama Category</h6>
                                <h6 class="text-muted my-3">{{$todolist->category->name_category}}</h6>
                            </div>
                            <div class="col">
                                <h6 class="text-muted my-3">Nama Priority</h6>
                                <h6 class="text-muted my-3">{{$todolist->priority->name}}</h6>
                            </div>
                        </div>
                    </div>
                    <h6 class="text-muted my-3">Description</h6>
                    <p class="card-text">{{ $todolist->description}}</p>
                    <div class="row">
                        @if ($todolist->status != "Done")
                        <div class="col">
                            <form action="/todolist/{{$todolist->id}}/edit" method="GET">
                                @csrf
                                <button class="w-100 btn btn-sm btn-primary" type="submit">Edit</button>
                            </form>
                        </div>
                        <div class="col">
                            <form action="/todolist/{{$todolist->id}}/delete" method="post">
                                @csrf
                                <button class="w-100 btn btn-sm btn-danger" type="submit">Remove</button>
                            </form>
                        </div>
                        @else
                        <div class="col">
                            <form action="/todolist/{{$todolist->id}}/delete" method="post">
                                @csrf
                                <button class="w-100 btn btn-sm btn-danger" type="submit">Remove</button>
                            </form>
                        </div>

                        @endif
                    </div>
                    <td>

                    </td>
                    <td>

                    </td>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection