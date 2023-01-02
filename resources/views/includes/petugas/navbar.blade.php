<nav class="topnav navbar navbar-expand shadow justify-content-between justify-content-sm-start navbar-light bg-white"
    id="sidenavAccordion">
    <!-- Sidenav Toggle Button-->
    <button class="btn btn-icon btn-transparent-dark order-1 order-lg-0 me-2 ms-lg-2 me-lg-0" id="sidebarToggle"><i
            data-feather="menu"></i></button>
    <a class="navbar-brand pe-3 ps-4 ps-lg-2" href="{{ route('petugas.dashboard') }}">
        {{-- <img src="{{ url('assets/img/pemkot.png') }}" height="50px" width="auto" alt="icon sirisma" /> --}}
        SIRISMA</a>
    <!-- Navbar Items-->
    <ul class="navbar-nav align-items-center ms-auto">
        <!-- Alerts Dropdown-->
        <li class="nav-item dropdown no-caret d-none d-sm-block me-3 dropdown-notifications">
            <a class="btn btn-icon btn-transparent-dark dropdown-toggle" id="navbarDropdownAlerts"
                href="javascript:void(0);" role="button" data-bs-toggle="dropdown" aria-haspopup="true"
                aria-expanded="false">
                @if ($penelitianBaruSidebar >= 1)
                    <i class="fa-solid fa-bell-on animate__animated animate__heartBeat animate__infinite infinite"
                        style="color: red"></i>
                @else
                    <i class="fa-solid fa-bell"></i>
                @endif
            </a>
            <div class="dropdown-menu dropdown-menu-end border-0 shadow animated--fade-in-up"
                aria-labelledby="navbarDropdownAlerts">
                <h6 class="dropdown-header dropdown-notifications-header">
                    <i class="me-2" data-feather="bell"></i>
                    Alerts Center
                </h6>
                @foreach ($penelitianBaru as $penelitian)
                    <a class="dropdown-item dropdown-notifications-item"
                        href="{{ route('petugas.penelitian-baru') }}#permohonan{{ $penelitian->id_application }}">
                        <div class="dropdown-notifications-item-icon"><i data-feather="activity"></i></div>
                        <div class="dropdown-notifications-item-content">
                            <div class="dropdown-notifications-item-content-details">
                                {{ \Carbon\Carbon::create($penelitian->created_at)->translatedFormat('d F Y H:i:s') . ' | ' . \Carbon\Carbon::createFromTimeStamp(strtotime($penelitian->created_at))->diffForHumans() }}
                            </div>
                            <div class="dropdown-notifications-item-content-text">{{ $penelitian->name }}</div>
                            <div class="dropdown-notifications-item-content-text">{{ $penelitian->keperluan }}</div>
                        </div>
                    </a>
                @endforeach
                <a class="dropdown-item dropdown-notifications-footer"
                    href="{{ route('petugas.penelitian-baru') }}">View All Alerts</a>
            </div>
        </li>
        <!-- Messages Dropdown-->
        <li class="nav-item dropdown no-caret d-none d-sm-block me-3 dropdown-notifications">
            <a class="btn btn-icon btn-transparent-dark dropdown-toggle" id="navbarDropdownMessages"
                href="javascript:void(0);" role="button" data-bs-toggle="dropdown" aria-haspopup="true"
                aria-expanded="false">
                @if ($countmessage >= 1)
                    <i class="fa-solid fa-envelope-dot animate__animated animate__heartBeat animate__infinite infinite"
                        style="color: orange"></i>
                @else
                    <i class="fa-solid fa-envelope"></i>
                @endif
            </a>
            <div class="dropdown-menu dropdown-menu-end border-0 shadow animated--fade-in-up"
                aria-labelledby="navbarDropdownMessages">
                <h6 class="dropdown-header dropdown-notifications-header">
                    <i class="me-2" data-feather="mail"></i>
                    Message Center
                </h6>
                @foreach ($messages as $message)
                    <a class="dropdown-item dropdown-notifications-item" href="#!">
                        <img class="dropdown-notifications-item-img"
                            src="{{ url('backend/assets/img/illustrations/profiles/profile-2.png') }}" />
                        <div class="dropdown-notifications-item-content">
                            <div class="dropdown-notifications-item-content-text">{{ $message->subject_kontak }}</div>
                            <div class="dropdown-notifications-item-content-text">{{ $message->pesan }}</div>
                            <div class="dropdown-notifications-item-content-details">
                                {{ $message->nama_lengkap . ' . ' . $message->created_at->diffForHumans() }} </div>
                        </div>
                    </a>
                @endforeach
                <a class="dropdown-item dropdown-notifications-footer" href="#!">Read All Messages</a>
            </div>
        </li>
        <!-- User Dropdown-->
        <li class="nav-item dropdown no-caret dropdown-user me-3 mx-5 me-lg-4">
            <a class="btn btn-icon btn-transparent-dark dropdown-toggle" id="navbarDropdownUserImage"
                href="javascript:void(0);" role="button" data-bs-toggle="dropdown" aria-haspopup="true"
                aria-expanded="false">
                <img class="img-fluid" src="{{ Storage::url($dataUser->foto_profile) }}"
                    onerror="this.onerror=null; this.src='{{ url('backend/assets/img/illustrations/profiles/profile-2.png') }}'"
                    alt="Profil Image" width="50px" height="50px" />
            </a>
            <div class="dropdown-menu dropdown-menu-end border-0 shadow animated--fade-in-up"
                aria-labelledby="navbarDropdownUserImage">
                <h6 class="dropdown-header d-flex align-items-center">
                    <img class="dropdown-user-img" src="{{ Storage::url($dataUser->foto_profile) }}"
                        onerror="this.onerror=null; this.src='{{ url('backend/assets/img/illustrations/profiles/profile-2.png') }}'"
                        alt="Profil Image" width="100px" height="50px" />
                    <div class="dropdown-user-details">
                        <div class="dropdown-user-details-name">{{ Auth::user()->name }}</div>
                        <div class="dropdown-user-details-email">{{ Auth::user()->email }}</div>
                    </div>
                </h6>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="{{ route('petugas.profile') }}">
                    <div class="dropdown-item-icon"><i data-feather="settings"></i></div>
                    Profil
                </a>
                <button type="button" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                    <div class="dropdown-item-icon">
                        <i data-feather="log-out"></i>
                    </div>
                    Keluar
                </button>
            </div>
        </li>
    </ul>
</nav>
<!-- Logout Modal-->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Yakin ingin Keluar ?</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">Pilih "Keluar" di bawah ini jika Anda ingin untuk mengakhiri sesi Anda saat
                ini.
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-danger">Keluar</button>
                </form>
            </div>
        </div>
    </div>
</div>
