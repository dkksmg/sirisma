<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @include('includes.styles')
</head>
<body>
    @include('includes.header')
    @include('includes.description')
    @yield('content')
    @include('includes.footer')
    @include('includes.script')
</body>
</html>
