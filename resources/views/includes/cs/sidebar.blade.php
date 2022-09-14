        <div id="layoutSidenav_nav">
            <nav class="sidenav shadow-right sidenav-light">
                <div class="sidenav-menu">
                    <div class="nav accordion" id="accordionSidenav">
                        <div class="sidenav-menu-heading">Notifikasi</div>
                        <a class="nav-link" href="#!">
                            <div class="nav-link-icon"><i data-feather="bell"></i></div>
                            Permohonan
                            {{-- @if ($countmessage != 0)
                                <span class="badge bg-warning-soft text-warning ms-auto">
                                    {{ $countmessage . ' New!' }}
                                </span>
                            @endif --}}
                        </a>
                        <a class="nav-link" href="#!">
                            <div class="nav-link-icon"><i data-feather="mail"></i></div>
                            Pesan
                            @if ($countmessage != 0)
                                <span class="badge bg-success-soft text-success ms-auto">
                                    {{ $countmessage . ' New!' }}
                                </span>
                            @endif
                        </a>
                        <!-- Sidenav Menu Heading (Core)-->
                        <div class="sidenav-menu-heading">Utama</div>
                        <!-- Sidenav Accordion (Dashboard)-->
                        <a class="nav-link" href="{{ route('dashboard-cs') }}">
                            <div class="nav-link-icon"><i data-feather="activity"></i></div>
                            Dashboard
                        </a>
                        <!-- Sidenav Heading (Pemrohonan)-->
                        <div class="sidenav-menu-heading">Permohonan</div>
                        <!-- Sidenav Accordion (Permohonan)-->
                        <a class="nav-link collapsed" href="javascript:void(0);" data-bs-toggle="collapse"
                            data-bs-target="#collapseApps" aria-expanded="false" aria-controls="collapseApps">
                            <div class="nav-link-icon"><i data-feather="globe"></i></div>
                            Penelitian
                            <div class="sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="collapseApps" data-bs-parent="#accordionSidenav">
                            <nav class="sidenav-menu-nested nav accordion" id="accordionSidenavAppsMenu">
                                <a class="nav-link " href="{{ route('permohonan-baru.index') }}">
                                    Baru
                                </a>
                                <a class="nav-link" href="{{ route('permohonan-terproses.index') }}">
                                    Terproses
                                </a>
                            </nav>
                        </div>
                        <!-- Sidenav Accordion (Flows)-->
                        <a class="nav-link collapsed" href="javascript:void(0);" data-bs-toggle="collapse"
                            data-bs-target="#collapseFlows" aria-expanded="false" aria-controls="collapseFlows">
                            <div class="nav-link-icon"><i data-feather="repeat"></i></div>
                            Magang
                            <div class="sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="collapseFlows" data-bs-parent="#accordionSidenav">
                            <nav class="sidenav-menu-nested nav">
                                <a class="nav-link" href="#">Baru</a>
                                <a class="nav-link" href="#">Terproses</a>
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