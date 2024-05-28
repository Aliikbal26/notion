@php
use Carbon\Carbon;
@endphp
@extends('template.home')

@section('title', $title)

@section('content')
<div class="container col-xl-10 col-xxl-8 px-4 py-5">
    <h2 class="text-center">Tambah Todo List</h2>
    @if(isset($error))
    <div class="row">
        <div class="alert alert-danger" role="alert">
            {{$error}}
        </div>
    </div>
    @endif
    @if(session('success'))
    <div class="row justify-content-center">
        <div class="col-md-7">
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Success !</strong> {{ session('success') }}.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        </div>
    </div>
    @endif
    <div class="row align-items-center g-lg-5 py-3">
        <div class="col-md-10 mx-auto col-lg-7">
            <form class="p-3 p-md-3 border rounded-3 bg-light" method="post" action="/todolist">
                @csrf
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" name="todo" placeholder="todo">
                    <label for="todo">Todo</label>
                </div>
                <div class="form-floating mb-3">
                    <textarea class="form-control" id="description" rows="3" name="description" placeholder="Description"></textarea>
                    <label for="description">Description</label>
                </div>
                <div class="form-floating mb-3">
                    <select name="priority" class="form-control" id="priority">
                        @foreach ($priority as $value)
                        <option value="{{$value['id']}}">{{$value['name']}}</option>
                        @endforeach
                    </select>
                    <label for="priority">Priority with selects</label>
                </div>
                <div class="form-floating mb-3">
                    <select name="category" class="form-control" id="category">
                        @foreach ($category as $value)
                        <option value="{{$value['id']}}">{{$value['name_category']}}</option>
                        @endforeach
                    </select>
                    <label for="category">Category with selects</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="date" class="form-control" name="deadline" placeholder="deadline">
                    <label for="deadline">Deadline</label>
                </div>
                <button class="w-100 btn btn-lg btn-primary" type="submit">Add Todo</button>
            </form>
        </div>
    </div>
    <div class="row align-items-right g-lg-5 py-5">
        <div class="mx-auto">
            <form id="deleteForm" method="post" style="display: none">

            </form>
            <div class="table-responsive-md">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Todo</th>
                            <th scope="col">Status</th>
                            <th scope="col">Deadline</th>
                            <th scope="col">Priority</th>
                            <th scope="col">Category</th>
                            <th scope="col"></th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($todolist as $index=>$todo)
                        <tr>
                            <th scope="row">{{$index + 1}}</th>
                            <td>{{$todo['todo']}}</td>
                            <td>
                                @if($todo['status'] == "On Progress")
                                <span class="badge bg-warning">{{$todo['status']}}</span>
                                @elseif($todo['status'] == "Failed")
                                <span class="badge bg-danger">{{$todo['status']}}</span>
                                @else
                                <span class="badge bg-success">{{$todo['status']}}</span>
                                @endif
                            </td>
                            <td>{{$todo['deadline']}}</td>
                            <td>{{$todo['priority']['name']}}</td>
                            <td>{{$todo['category']['name_category']}}</td>
                            <td>
                                <form action="/todolist/{{$todo['id']}}/details" method="GET">
                                    @csrf
                                    <button class="w-100 btn btn-sm btn-primary" type="submit">Details</button>
                                </form>
                            </td>
                            <td>
                                @if ($todo['status'] == "Done")
                                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-check-circle success text-center" viewBox="0 0 16 16">
                                    <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16" />
                                    <path d="m10.97 4.97-.02.022-3.473 4.425-2.093-2.094a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-1.071-1.05" />
                                </svg>
                                @elseif($todo['status'] == "Failed")
                                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-x-circle" viewBox="0 0 16 16">
                                    <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16" />
                                    <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708" />
                                </svg>
                                @else
                                <form action="/todolist/{{$todo['id']}}/status" method="post">
                                    @csrf
                                    <button class="w-100 btn btn-sm btn-success" name="status" value="Done" type="submit">Done</button>
                                </form>
                                @endif
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection