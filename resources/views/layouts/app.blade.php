<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    @include('includes.styles')
    @stack('addon-styles')
</head>

<body>
    @include('includes.header')
    @yield('content')
    @include('includes.footer')
    @include('includes.script')
    @stack('addon-script')
    {{-- @include('sweetalert::alert') --}}
</body>

</html>
