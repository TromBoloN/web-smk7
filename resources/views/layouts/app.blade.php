<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
    @yield('style')

    @include('imports.css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/featherlight/1.7.13/featherlight.min.css">

    <title>@yield('title') - SMKN 7 Samarinda</title>
</head>
<body>
    <header>
        @include('layouts.navbar')
    </header>

    <main>
        @yield('content')
    </main>

    <footer>
        @include('layouts.footer')
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/featherlight/1.7.13/featherlight.min.js"></script>
    <script src="{{ asset('js/navbar.js') }}"></script>
    <script src="{{ asset('js/sidebar.js') }}"></script>
    @yield('script')
</body>
</html>
