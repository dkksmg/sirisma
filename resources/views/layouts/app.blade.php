<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    @include('includes.styles')
</head>

<body>
    @include('includes.header')
    @yield('content')
    @include('includes.footer')
    @include('includes.script')
    @stack('addon-script')
</body>

</html>
