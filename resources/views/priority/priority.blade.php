@extends('template.home')

@section('title', $title)

@section('content')
<div class="container col-xl-10 col-xxl-8 px-4 py-5">

    @if(isset($error))
    <div class="row">
        <div class="alert alert-danger" role="alert">
            {{$error}}
        </div>
    </div>
    @endif

    <div class="row align-items-center g-lg-5 py-5">
        <div class="col-md-10 mx-auto col-lg-5">
            <form class="p-4 p-md-5 border rounded-3 bg-light" method="post" action="/priority">
                @csrf
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" name="name" placeholder="name">
                    <label for="name">Name Priority</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" name="description" placeholder="description">
                    <label for="description">Description</label>

                </div>
                <button class="w-100 btn btn-lg btn-primary" type="submit">Add Priority</button>
            </form>
        </div>
    </div>
    <div class="row align-items-right g-lg-5 py-5">
        <div class="mx-auto">
            <form id="deleteForm" method="post" style="display: none">

            </form>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Name Priority</th>
                        <th scope="col">Description</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($priority as $index=>$value)
                    <tr>
                        <th scope="row">{{$index + 1}}</th>
                        <td>{{$value['name']}}</td>
                        <td>{{$value['description']}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection