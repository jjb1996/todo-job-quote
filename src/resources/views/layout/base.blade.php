<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>TODO</title>
    @yield('base.scripts')
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@300&display=swap" rel="stylesheet">
</head>
<body>
    <nav>
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <img src="{{ Vite::asset('assets/logo.png') }}">
                </div>
            </div>
        </div>
    </nav>
    <main>
        <div class="container">
            <div class="row">
                @if(Session::has('status'))
                    <div class="alert alert-{{Session::get('status')['type']}}">
                        {{Session::get('status')['message']}}
                    </div>
                @endif
                @yield('base.content')
            </div>
        </div>
    </main>

</body>

<footer>
    <p class="text-center my-5 text-muted">
        <small>Copyright &copy; {{ date('Y') }} All Rights Reserved</small>
    </p>
</footer>
</html>
