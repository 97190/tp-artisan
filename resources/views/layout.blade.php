<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Application TP Artisant</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>
<body>
<header>
    <nav class="navbar navbar-light bg-light">
        <div class="container-fluid">
                <a class="navbar-brand" href="/">
                    <img src="{{ asset('images/logo.png') }}" alt="logo" width="40" height="30" class="d-inline-block align-text-top ">
                    Artisant
                </a>
                <ul class="navbar-nav me-auto ">
                    <li class="nav-item ml-3">
                        <a class="nav-link"  href="/dashboard">Dashboard</a>
                    </li>
                    <li class="nav-item ml-3">
                        <a class="nav-link"  href="/contact-us">Contactez-nous</a>
                    </li>
                </ul>
            </div>
    </nav>
</header>
<div class="container">
    @yield('content')
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>
</html>
