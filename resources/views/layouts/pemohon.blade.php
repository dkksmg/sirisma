<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    @include('includes.petugas.styles')
    @stack('addon-styles')
</head>

<body>
    @yield('content')
    @include('includes.petugas.script')
    @stack('addon-script')
</body>

</html>
