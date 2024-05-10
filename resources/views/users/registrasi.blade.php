<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>{{$title}}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</head>

<body>
    <div class="container col-xl-10 col-xxl-8 px-4 py-5">
        <div class="row justify-content-center g-lg-5">
            <div class="col-lg-5">
                @if(session('success'))
                <div class="row">
                    <div class="alert alert-success" role="alert">
                        {{ session('success') }}
                    </div>
                </div>
                @endif
                @if(isset($error))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Error!</strong> {{$error}}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @endif
            </div>
        </div>

        <div class="row align-items-center g-lg-5 py-2">
            <h1 class="text-center">Create At Account</h1>
            <div class="col-md-10 mx-auto col-lg-5">
                <form class="p-4 p-md-5 border rounded-3 bg-light" method="post" action="/registrasi">
                    @csrf
                    <div class="form-floating mb-3">
                        <input name="name" type="text" class="form-control" id="name" placeholder="id">
                        <label for="name">Name</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input name="email" type="text" class="form-control" id="email" placeholder="id">
                        <label for="email">Email</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input name="password" type="password" class="form-control" id="password" placeholder="password">
                        <label for="password">Password</label>
                    </div>
                    <button class="w-100 btn btn-lg btn-primary" type="submit">Registrasi</button>
                    <div class="row text-center mt-3">
                        <span class="item-center"><a href="/login">Sign In</a></span>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>