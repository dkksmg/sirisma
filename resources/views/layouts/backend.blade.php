<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

@if (Auth::user()->role == 'CS')

    <head>
        @include('includes.cs.styles')
        @stack('addon-styles')
    </head>

    <body class="nav-fixed">
        @include('includes.cs.navbar')
        <div id="layoutSidenav">
            @include('includes.cs.sidebar')
            @yield('content')
        </div>
        @include('includes.cs.script')
        @stack('addon-script')
        @include('sweetalert::alert')
    </body>
@elseif (Auth::user()->role == 'KABID')

    <head>
        @include('includes.kabid.styles')
        @stack('addon-styles')
    </head>

    <body class="nav-fixed">
        @include('includes.kabid.navbar')
        <div id="layoutSidenav">
            @include('includes.kabid.sidebar')
            @yield('content')
        </div>
        @include('includes.kabid.script')
        @stack('addon-script')
        @include('sweetalert::alert')
    </body>
@elseif (Auth::user()->role == 'KASI')

    <head>
        @include('includes.kasi.styles')
        @stack('addon-styles')
    </head>

    <body class="nav-fixed">
        @include('includes.kasi.navbar')
        <div id="layoutSidenav">
            @include('includes.kasi.sidebar')
            @yield('content')
        </div>
        @include('includes.kasi.script')
        @stack('addon-script')
        @include('sweetalert::alert')
    </body>
@elseif (Auth::user()->role == 'PETUGAS')

    <head>
        @include('includes.petugas.styles')
        @stack('addon-styles')
    </head>

    <body class="nav-fixed">
        @include('includes.petugas.navbar')
        <div id="layoutSidenav">
            @include('includes.petugas.sidebar')
            @yield('content')
        </div>
        @include('includes.petugas.script')
        @stack('addon-script')
        @include('sweetalert::alert')
    </body>
@elseif (Auth::user()->role == 'SUPERADMIN')

    <head>
        @include('includes.admin.styles')
        @stack('addon-styles')
    </head>

    <body class="nav-fixed">
        @include('includes.admin.navbar')
        <div id="layoutSidenav">
            @include('includes.admin.sidebar')
            @yield('content')
        </div>
        @include('includes.admin.script')
        @stack('addon-script')
        @include('sweetalert::alert')
    </body>
@endif

</html>
