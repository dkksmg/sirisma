<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    @include('includes.admin.login.styles')
</head>

<body>
    @yield('content')
    @include('includes.admin.login.script')
</body>

</html>
