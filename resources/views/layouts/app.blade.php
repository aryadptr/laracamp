<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    @include('includes.meta')

    <!-- Bootstrap CSS -->
    @include('includes.style')

    <title>@yield('title') | Laracamp</title>
</head>

<body>

    {{-- Navbar --}}
    @include('includes.navbar')

    @yield('content')

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    @include('includes.script')
</body>

</html>
