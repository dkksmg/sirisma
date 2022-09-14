    <!-- ======= Header ======= -->
    <header id="header" class="header fixed-top mb-5" data-scrollto-offset="0">
        <div class="container-fluid d-flex align-items-center justify-content-between">

            <a href="{{ route('home') }}" class="logo d-flex align-items-center scrollto me-auto me-lg-0">
                <img src="{{ url('assets/img/pemkot.png') }}" height="50px" width="auto" alt="icon sirisma" />
                <h1>SIRISMA</h1>
            </a>

            <nav id="navbar" class="navbar">
                <ul>
                    <li><a class="nav-link scrollto" href="{{ route('home') }}#">Home</a></li>
                    <li><a class="nav-link scrollto" href="{{ route('home') }}#syarat">Syarat Permohonan</a></li>
                    <li><a class="nav-link scrollto" href="{{ route('home') }}#panduan">Panduan</a></li>
                    <li><a class="nav-link scrollto" href="{{ route('home') }}#faq">FAQs</a></li>
                    <li><a class="nav-link scrollto" href="{{ route('home') }}#contact">Kontak</a></li>
                    @guest()
                        <li><a class="nav-link scrollto" href="{{ route('login') }}">Login</a></li>
                        <li><a class="nav-link scrollto" href="{{ route('register') }}">Register</a></li>
                    @endguest
                    @auth()
                        @if (Auth::user()->role != 'USER')
                            <li><a class="nav-link scrollto" href="{{ route('permohonan.index') }}">Data Permohonan</a>
                            </li>
                        @else
                            <li><a class="nav-link scrollto" href="{{ route('permohonan.index') }}">Permohonan</a></li>
                        @endif
                        <li class="dropdown"><a href="#"><span>{{ salam() }},
                                    {{ Auth::user()->name }}</span> <i
                                    class="bi bi-chevron-down dropdown-indicator"></i></a>
                            <ul>
                                <li><a href="{{ url('/profile') }}">Profile</a></li>
                                <li>
                                    {{-- <a href="" class="">Keluar</a> --}}
                                    <form action="{{ route('logout') }}" method="POST">
                                        @csrf
                                        <button type="submit" class="btn-out">Keluar</button>
                                    </form>
                                </li>
                            </ul>
                        </li>
                    @endauth
                </ul>
                <i class="bi bi-list mobile-nav-toggle d-none"></i>
            </nav><!-- .navbar -->


            <a class="btn-getstarted scrollto" style="visibility: hidden">Get Started</a>


        </div>
    </header><!-- End Header -->
