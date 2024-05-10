@extends('template.home')

@section('title', 'Halaman Utama')

@section('content')
<h2 class="text-center mt-5 my-3">Ini adalah halaman Update Todo</h2>
<div class="col-md-10 mx-auto col-lg-5">
    <form class="p-4 p-md-5 border rounded-3 bg-light" method="POST" action="/todolist/{{$todo->id}}/edit">
        @csrf
        @method('PUT') <!-- Menambahkan method PUT -->

        <div class="form-floating mb-3">
            <input type="text" class="form-control" name="todo" placeholder="todo" value="{{$todo->todo}}">
            <label for="todo">Todo</label>
        </div>
        <div class="form-floating mb-3">
            <input type="text" class="form-control" name="status" placeholder="status" value="{{$todo->status}}">
            <label for="status">Status</label>
        </div>
        <div class="form-floating mb-3">
            <input type="text" class="form-control" name="description" placeholder="description" value="{{$todo->description}}">
            <label for="description">Description</label>
        </div>
        <div class="form-floating mb-3">
            <select name="priority" class="form-control" id="priority">
                @foreach ($priorities as $priority)
                <option value="{{$priority->id}}" {{$todo->priority_id == $priority->id ? 'selected' : ''}}>{{$priority->name}}</option>
                @endforeach
            </select>
            <label for="priority">Priority</label>
        </div>
        <div class="form-floating mb-3">
            <select name="category" class="form-control" id="category">
                @foreach ($categories as $category)
                <option value="{{$category->id}}" {{$todo->category_id == $category->id ? 'selected' : ''}}>{{$category->name_category}}</option>
                @endforeach
            </select>
            <label for="category">Category</label>
        </div>
        <div class="form-floating mb-3">
            <input type="date" class="form-control" name="deadline" placeholder="deadline" value="{{$todo->deadline}}">
            <label for="deadline">Deadline</label>
        </div>
        <button class="w-100 btn btn-lg btn-primary" type="submit">Update Todo</button>
    </form>

</div>


@endsection