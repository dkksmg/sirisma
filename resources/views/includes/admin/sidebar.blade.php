        <div id="layoutSidenav_nav">
            <nav class="sidenav shadow-right sidenav-light">
                <div class="sidenav-menu">
                    <div class="nav accordion" id="accordionSidenav">
                        <!-- Sidenav Menu Heading (Account)-->
                        <!-- * * Note: * * Visible only on and above the sm breakpoint-->
                        <div class="sidenav-menu-heading d-sm-none">Notifikasi</div>
                        <!-- Sidenav Link (Alerts)-->
                        <!-- * * Note: * * Visible only on and above the sm breakpoint-->
                        <a class="nav-link d-sm-none" href="#!">
                            <div class="nav-link-icon"><i data-feather="bell"></i></div>
                            Permohonan
                            <span
                                class="badge bg-danger-soft text-danger ms-auto animate__animated animate__swing animate__infinite infinite">4
                                New!</span>
                        </a>
                        <!-- Sidenav Link (Messages)-->
                        <!-- * * Note: * * Visible only on and above the sm breakpoint-->
                        <a class="nav-link d-sm-none" href="#!">
                            <div class="nav-link-icon"><i data-feather="mail"></i></div>
                            Pesan
                            <span
                                class="badge bg-warning-soft text-warning ms-auto animate__animated animate__swing animate__infinite infinite">2
                                New!</span>
                        </a>
                        <!-- Sidenav Menu Heading (Core)-->
                        <div class="sidenav-menu-heading"></div>
                        <!-- Sidenav Accordion (Dashboard)-->
                        <a class="nav-link collapsed" href="{{ route('dashboard-admin') }}">
                            <div class="nav-link-icon"><i data-feather="activity"></i></div>
                            Dashboard
                        </a>
                        <!-- Sidenav Heading (Pemrohonan)-->
                        <div class="sidenav-menu-heading">Master</div>
                        <a class="nav-link collapsed" href="javascript:void(0);" data-bs-toggle="collapse"
                            data-bs-target="#collapseApps" aria-expanded="false" aria-controls="collapseApps">
                            <div class="nav-link-icon"><i class="fa-duotone fa-sitemap"></i></div>
                            Konten
                            <div class="sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="collapseApps" data-bs-parent="#accordionSidenav">
                            <nav class="sidenav-menu-nested nav accordion" id="accordionSidenavAppsMenu">
                                <a class="nav-link " href="#">
                                    FAQs
                                </a>
                                <a class="nav-link " href="#">
                                    Penelitian
                                </a>
                                <a class="nav-link" href="#">
                                    Magang
                                </a>
                            </nav>
                        </div>

                        <div class="sidenav-menu-heading">Pengguna</div>
                        <a class="nav-link collapsed" href="javascript:void(0);" data-bs-toggle="collapse"
                            data-bs-target="#users" aria-expanded="false" aria-controls="users">
                            <div class="nav-link-icon"><i class="fa-solid fa-users-medical"></i></div>
                            Users
                            <div class="sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse {{ (Request::segment(2) == 'users' ? 'show' : '' || Request::segment(2) == 'pengguna') ? 'show' : '' }}"
                            id="users" data-bs-parent="#accordionSidenav">
                            <nav class="sidenav-menu-nested nav accordion" id="accordionSidenavAppsMenu">
                                <a class="nav-link " href="{{ route('users.index') }}">
                                    Pemohon
                                </a>
                                <a class="nav-link" href="{{ route('pengguna') }}">
                                    Pengguna
                                </a>
                            </nav>
                        </div>
                    </div>
                </div>
                <!-- Sidenav Footer-->
                <div class="sidenav-footer">
                    <div class="sidenav-footer-content">
                        <div class="sidenav-footer-subtitle">Logged in as:</div>
                        <div class="sidenav-footer-title">{{ Auth::user()->name . ' | ' . Auth::user()->role }}</div>
                    </div>
                </div>
            </nav>
        </div>
