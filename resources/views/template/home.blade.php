<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>@yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <style>
        .nav-link.active {
            font-weight: bold;
        }
    </style>
</head>

<body>
    <section id="navbar">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container">
                <div class="navbar-brand mx-auto">Notion App</div>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                    <div class="navbar-nav mx-auto">
                        <a class="nav-link" aria-current="page" href="/home">Home</a>
                        <a class="nav-link" href="/todolist">Add Todo</a>
                        <a class="nav-link" href="/category">Add Category</a>
                        <a class="nav-link" href="/priority">Add Priority</a>
                    </div>
                    <div class="navbar-nav">
                        <form method="post" action="/logout">
                            @csrf
                            <button class="btn btn-md btn-danger" type="submit">Sign Out</button>
                        </form>
                    </div>
                </div>
            </div>
        </nav>
    </section>

    @yield('content')

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            // Mendapatkan path halaman saat ini
            var currentPath = window.location.pathname;

            // Menambahkan kelas "active" pada nav-link yang sesuai dengan halaman saat ini
            $('.navbar-nav a').each(function() {
                var navLinkPath = $(this).attr('href');

                if (navLinkPath === currentPath) {
                    $(this).addClass('active');
                }
            });
        });
    </script>
</body>

</html>