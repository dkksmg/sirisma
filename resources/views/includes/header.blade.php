    <!-- ======= Header ======= -->
    <header id="header" class="header fixed-top mb-5" data-scrollto-offset="0">
        <div class="container-fluid d-flex align-items-center justify-content-between">

            <a href="{{ route('home') }}" class="logo d-flex align-items-center scrollto me-auto me-lg-0">
                <img src="{{ url('assets/img/pemkot.png') }}" height="50px" width="auto" alt="icon sirisma" />
                <h1>SIRISMA</h1>
            </a>

            <nav id="navbar" class="navbar">
                <ul>
                    <li><a class="nav-link scrollto" href="{{ url('/') }}#">Home</a></li>
                    <li><a class="nav-link scrollto" href="{{ url('/') }}#syarat">Syarat Permohonan</a></li>
                    <li><a class="nav-link scrollto" href="{{ url('/') }}#faq">FAQs</a></li>
                    <li><a class="nav-link scrollto" href="{{ url('/') }}#tata-cara">Tata Cara</a></li>
                    <li><a class="nav-link scrollto" href="{{ url('/') }}#contact">Kontak</a></li>
                    @auth
                        <li><a class="nav-link scrollto" href="{{ route('permohonan') }}">Permohonan</a></li>
                    @endauth
                    @guest()
                        <li><a class="nav-link scrollto" href="{{ route('login') }}">Login</a></li>
                        <li><a class="nav-link scrollto" href="{{ route('register') }}">Register</a></li>
                    @endguest
                </ul>
                <i class="bi bi-list mobile-nav-toggle d-none"></i>
            </nav><!-- .navbar -->


            <a class="btn-getstarted scrollto" style="visibility: hidden">Get Started</a>
            @auth()
                <nav class="navbar scrollto" id="navbar" role="navigation">
                    <ul class="">

                        <li class="dropdown"><a href="#"><span>Hi, {{ Auth::user()->name }}</span> <i
                                    class="bi bi-chevron-down dropdown-indicator"></i></a>
                            <ul>
                                <li><a href="{{ url('/profile') }}">Profile</a></li>
                                <li>
                                    <form action="{{ route('logout') }}" method="POST" class=" dropdown-item">
                                        @csrf
                                        <button type="submit" class="btn-out">Keluar</button>
                                    </form>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </nav>
            @endauth

        </div>
    </header><!-- End Header -->
