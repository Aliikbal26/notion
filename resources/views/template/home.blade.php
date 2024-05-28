<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>@yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <style>
        .nav-link.active {
            font-family: "M PLUS Rounded 1c", sans-serif;
            font-weight: bold;
        }

        body {
            font-family: "M PLUS Rounded 1c", sans-serif;
            font-weight: 400;
            font-style: normal;
        }


        @import url('https://fonts.googleapis.com/css2?family=M+PLUS+Rounded+1c&display=swap');
    </style>
    <link rel="stylesheet" href="{{url('/assets/css/form.css')}}">
</head>

<body>
    <section id="navbar">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container">
                <div class="navbar-brand mx-auto">
                    <h1>N<svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-alexa" viewBox="0 0 16 16">
                            <path d="M7.996 0A8 8 0 0 0 0 8a8 8 0 0 0 6.93 7.93v-1.613a1.06 1.06 0 0 0-.717-1.008A5.6 5.6 0 0 1 2.4 7.865 5.58 5.58 0 0 1 8.054 2.4a5.6 5.6 0 0 1 5.535 5.81l-.002.046-.012.192-.005.061a5 5 0 0 1-.033.284l-.01.068c-.685 4.516-6.564 7.054-6.596 7.068A7.998 7.998 0 0 0 15.992 8 8 8 0 0 0 7.996.001Z" />
                        </svg>ti<svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-alexa" viewBox="0 0 16 16">
                            <path d="M7.996 0A8 8 0 0 0 0 8a8 8 0 0 0 6.93 7.93v-1.613a1.06 1.06 0 0 0-.717-1.008A5.6 5.6 0 0 1 2.4 7.865 5.58 5.58 0 0 1 8.054 2.4a5.6 5.6 0 0 1 5.535 5.81l-.002.046-.012.192-.005.061a5 5 0 0 1-.033.284l-.01.068c-.685 4.516-6.564 7.054-6.596 7.068A7.998 7.998 0 0 0 15.992 8 8 8 0 0 0 7.996.001Z" />
                        </svg>n App</h1>
                </div>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                    <div class="navbar-nav mx-auto">
                        <a class="nav-link" aria-current="page" href="/home">Home</a>
                        <a class="nav-link" href="/todolist">Add Todo</a>
                        <a class="nav-link" href="/category">Add Category</a>
                        <a class="nav-link" href="/priority">Add Priority</a>
                        <a class="nav-link d-lg-none" href="/profile">Profile</a>
                    </div>
                    <div class="navbar-nav ">
                        <a href="/profile" class="px-3 d-none d-lg-inline">
                            <svg xmlns="http://www.w3.org/2000/svg" width="29" height="29s" fill="currentColor" class="bi bi-person-circle " viewBox="0 0 16 16">
                                <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0" />
                                <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8m8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1" />
                            </svg>
                        </a>
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

    <script src="https://kit.fontawesome.com/b52e485231.js" crossorigin="anonymous"></script>
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