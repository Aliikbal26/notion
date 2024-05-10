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

    <div class="row align-items-center g-lg-5 py-3">
        <div class="col-md-10 mx-auto col-lg-7">
            <form class="p-3 p-md-3 border rounded-3 bg-light" method="post" action="/todolist">
                @csrf
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" name="todo" placeholder="todo">
                    <label for="todo">Todo</label>
                </div>
                <div class="form-floating mb-3">
                    <!-- <input type="text" class="form-control" name="description" placeholder="description"> -->
                    <textarea class="form-control" id="description" rows="3" name="description" placeholder="Description"></textarea>
                    <label for="description">Description</label>
                </div>
                <div class="form-floating mb-3">
                    <select name="priority" class="form-control" id="priority">
                        @foreach ($priority as $value)
                        <option value="{{$value->id}}">{{$value->name}}</option>
                        @endforeach
                    </select>
                    <label for="priority">Priority with selects</label>
                </div>
                <div class="form-floating mb-3">
                    <select name="category" class="form-control" id="category">
                        @foreach ($category as $value)
                        <option value="{{$value->id}}">{{$value->name_category}}</option>
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
                                <span class="badge bg-success">{{$todo['status']}}</span>
                            </td>
                            <td>{{$todo['deadline']}}</td>
                            <td>{{$todo['priority']['name']}}</td>
                            <td>{{$todo['category']['name_category']}}</td>
                            <td>
                                <form action="/todolist/{{$todo['id']}}/edit" method="GET">
                                    @csrf
                                    <button class="w-100 btn btn-md btn-primary" type="submit">Edit</button>
                                </form>
                            </td>
                            <td>
                                <form action="/todolist/{{$todo['id']}}/delete" method="post">
                                    @csrf
                                    <button class="w-100 btn btn-md btn-danger" type="submit">Remove</button>
                                </form>
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