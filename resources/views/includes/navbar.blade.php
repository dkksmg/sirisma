<div class="d-flex flex-column flex-md-row align-items-center pb-3 mb-4 border-bottom">
    <a href="/" class="d-flex align-items-center text-dark text-decoration-none">
        <img src="{{ url('assets/img/pemkot.png') }}" height="50px" width="auto" alt="icon sirisma" /> <span
            class="fs-4">SIRISMA</span>
    </a>

    <nav class="d-inline-flex mt-2 mt-md-0 ms-md-auto">
        <a class="me-3 py-2 text-dark text-decoration-none" href="{{ route('home') }}">Home</a>
        <a class="me-3 py-2 text-dark text-decoration-none" href="{{ route('kontak') }}">Kontak</a>
        @auth()
            <a class="me-3 py-2 text-dark text-decoration-none" href="{{ route('permohonan') }}">Permohonan</a>
            <div class="dropdown">
                <a class="ml-5 me-3 py-2 text-dark text-decoration-none dropdown-toggle" type="button"
                    data-bs-toggle="dropdown" aria-expanded="false">
                    Hai, {{ Auth::user()->name }}
                </a>
                <ul class="dropdown-menu">
                    <li>
                        <form action="{{ route('logout') }}" method="POST" class=" dropdown-item">
                            @csrf
                            <button class="btn-out">Keluar</button>
                        </form>
                    </li>
                </ul>
            </div>
        @endauth

        @guest()
            <a class="me-3 py-2 text-dark text-decoration-none" href="{{ route('login') }}">Login</a>
            <a class="me-3 py-2 text-dark text-decoration-none" href="{{ route('register') }}">Register</a>
        @endguest
    </nav>
</div>

{{-- <div class="container">
    <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
        <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 text-dark text-decoration-none">
            <svg class="bi me-2" width="40" height="32" role="img" aria-label="Bootstrap">
                <use xlink:href="#bootstrap" /></svg>
        </a>

        <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
            <li><a href="#" class="nav-link px-2 link-secondary">Overview</a></li>
            <li><a href="#" class="nav-link px-2 link-dark">Inventory</a></li>
            <li><a href="#" class="nav-link px-2 link-dark">Customers</a></li>
            <li><a href="#" class="nav-link px-2 link-dark">Products</a></li>
        </ul>

        <form class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3" role="search">
            <input type="search" class="form-control" placeholder="Search..." aria-label="Search">
        </form>

        <div class="dropdown text-end">
            <a href="#" class="d-block link-dark text-decoration-none dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                <img src="https://github.com/mdo.png" alt="mdo" width="32" height="32" class="rounded-circle">
            </a>
            <ul class="dropdown-menu text-small">
                <li><a class="dropdown-item" href="#">New project...</a></li>
                <li><a class="dropdown-item" href="#">Settings</a></li>
                <li><a class="dropdown-item" href="#">Profile</a></li>
                <li>
                    <hr class="dropdown-divider">
                </li>
                <li><a class="dropdown-item" href="#">Sign out</a></li>
            </ul>
        </div>
    </div>
</div> --}}
