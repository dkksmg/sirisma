@extends('layouts.backend')
@section('title', 'ADMIN')
@push('addon-styles')
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
    <link href="{{ url('backend/css/styles.css') }}" rel="stylesheet" />
    {{-- <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css"> --}}
    <style>
        /* @import url("https://fonts.googleapis.com/css2?family=Source+Sans+Pro:wght@300&display=swap"); */

        .time-status {
            font-size: 11px;
            font-family: "Courier New", Courier, monospace;
        }

        ul.timeline-3 {
            list-style-type: none;
            position: relative;
        }

        ul.timeline-3:before {
            content: " ";
            background: #d4d9df;
            display: inline-block;
            position: absolute;
            left: 29px;
            width: 2px;
            height: 100%;
            z-index: 400;
        }

        ul.timeline-3>li {
            margin: 20px 0;
            padding-left: 20px;
        }

        ul.timeline-3>li:before {
            content: " ";
            background: white;
            display: inline-block;
            position: absolute;
            border-radius: 50%;
            border: 3px solid #22c0e8;
            left: 20px;
            width: 20px;
            height: 20px;
            z-index: 400;
        }
    </style>
@endpush
@section('content')
    <div id="layoutSidenav_content">
        <main class="mb-5">
            <header class="page-header page-header-dark bg-gradient-primary-to-secondary pb-10">
                <div class="container-xl px-4">
                    <div class="page-header-content pt-4">
                        <div class="row align-items-center justify-content-between">
                            <div class="col-auto mt-4">
                                <h1 class="page-header-title">
                                    <div class="page-header-icon"><i data-feather="filter"></i></div>
                                    Akun Users
                                </h1>
                            </div>
                        </div>
                    </div>
                </div>
            </header>
            <!-- Main page content-->
            <div class="container-xl px-4 mt-n10">
                <div class="card mb-4">
                    <div class="card-header">Data Users</div>
                    <div class="card-body">
                        <table id="datatablesSimple">
                            <thead>
                                <tr>
                                    <th class="text-center" class="text-center">Nama</th>
                                    <th class="text-center">Email</th>
                                    <th class="text-center">Email Verified At</th>
                                    <th class="text-center">Foto Profil</th>
                                    <th class="text-center">Role</th>
                                    <th class="text-center">Created At</th>
                                    <th class="text-center">Updated At</th>
                                    <th class="text-center">Deleted At</th>
                                    <th class="text-center">Last Changed By</th>
                                    <th class="text-center">Log</th>
                                    <th class="text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th class="text-center">Nama</th>
                                    <th class="text-center">Email</th>
                                    <th class="text-center">Email Verified At</th>
                                    <th class="text-center">Foto Profil</th>
                                    <th class="text-center">Role</th>
                                    <th class="text-center">Created At</th>
                                    <th class="text-center">Updated At</th>
                                    <th class="text-center">Deleted At</th>
                                    <th class="text-center">Last Changed By</th>
                                    <th class="text-center">Log</th>
                                    <th class="text-center">Aksi</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                @foreach ($userPemohon as $user)
                                    <tr>
                                        <td class="text-center">
                                            {{ $user->name }}
                                        </td>
                                        <td class="text-center">
                                            {{ $user->email }}
                                        </td>
                                        <td class="text-center">
                                            @if ($user->email_verified_at == null)
                                                -
                                            @else
                                                {{ $user->email_verified_at }}
                                            @endif
                                        </td>
                                        <td class="text-center">
                                            <img class="img-fluid" src="{{ Storage::url($user->foto_profile) }}"
                                                onerror="this.onerror=null; this.src='{{ url('backend/assets/img/illustrations/profiles/profile-2.png') }}'"
                                                alt="Profil Image" width="50px" height="50px" />
                                        </td>
                                        <td class="text-center">
                                            {{ $user->role }}
                                        </td>
                                        <td class="text-center">
                                            {{ $user->created_at }}
                                        </td>
                                        <td class="text-center">
                                            {{ $user->updated_at }}
                                        </td>
                                        <td class="text-center">
                                            @if ($user->deleted_at == null)
                                                -
                                            @else
                                                {{ $user->deleted_at }}
                                            @endif
                                        </td>
                                        <td class="text-center">
                                            @if (!empty($user->lastchangedone->nama_pengubah))
                                                <span data-bs-toggle="modal"
                                                    data-bs-target="#changeModal{{ $user->id }}">{{ $user->lastchangedone->nama_pengubah }}</span>
                                            @else
                                                -
                                            @endif
                                        </td>
                                        <td class="text-center">
                                        </td>
                                        <td class="text-center">
                                            <table>
                                                <tbody>
                                                    <tr>
                                                        @if ($user->deleted_at == null)
                                                            @if ($user->email_verified_at == null)
                                                                <td>
                                                                    <a href="#"
                                                                        title="Request Email Verifikasi Akun {{ $user->name }}"
                                                                        class="btn btn-sm btn-block btn-outline-cyan"><i
                                                                            class="fa-regular fa-badge-check"></i></a>
                                                                    {{-- <a href="#"
                                                                    title="Verifikasi Akun {{ $user->name }}"
                                                                    class="btn btn-sm btn-block btn-cyan-soft"><i
                                                                        class="fa-regular fa-badge-check"></i></a> --}}
                                                                </td>
                                                                <td>
                                                                    <div class="dropdown">
                                                                        <button
                                                                            class="btn btn-secondary btn-sm dropdown-toggle"
                                                                            type="button" id="dropdownMenuButton1"
                                                                            data-bs-toggle="dropdown" aria-expanded="false">
                                                                            <i class="fa-solid fa-bars"></i></button>
                                                                        </button>
                                                                        <ul class="dropdown-menu"
                                                                            aria-labelledby="dropdownMenuButton1">
                                                                            <li>
                                                                                <form class="dropdown-item"
                                                                                    action="{{ route('verif-email', $user->id) }}"
                                                                                    method="POST"
                                                                                    title="Verifikasi Email Akun {{ $user->name }}">
                                                                                    @csrf
                                                                                    @method('PUT')
                                                                                    <button type="submit"
                                                                                        style="border:none;padding:0;background:none;">
                                                                                        Verifikasi
                                                                                        Email</button>
                                                                                </form>
                                                                            </li>
                                                                        </ul>
                                                                    </div>
                                                                </td>
                                                            @endif
                                                        @endif
                                                    </tr>
                                                    <tr>
                                                        @if ($user->deleted_at == null)
                                                            <td>
                                                                <a href="#"
                                                                    title="Request Email Lupa Password Akun {{ $user->name }}"
                                                                    class="btn btn-sm btn-block btn-outline-indigo"><i
                                                                        class="fa-regular fa-lock"></i></a>

                                                            </td>
                                                            <td>
                                                                <button type="button"
                                                                    title="Edit Akun {{ $user->name }}"class="btn btn-sm btn-block btn-warning"
                                                                    data-bs-toggle="modal"
                                                                    data-bs-target="#staticBackdrop{{ $user->id }}">
                                                                    <i class="fa-solid fa-pencil"></i>
                                                                </button>
                                                            </td>
                                                            <td>
                                                                <form action="{{ route('users.destroy', $user->id) }}"
                                                                    method="POST" title="Hapus Akun {{ $user->name }}">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <button type="submit"
                                                                        class="btn btn-sm btn-block btn-danger"><i
                                                                            class="fa-solid fa-trash"></i></button>
                                                                </form>
                                                            </td>
                                                        @else
                                                            <td>
                                                                <form action="{{ route('restore-user', $user->id) }}"
                                                                    method="POST"
                                                                    title="Restore Akun {{ $user->name }}">
                                                                    @csrf
                                                                    @method('GET')
                                                                    <button type="submit"
                                                                        class="btn btn-sm btn-block btn-dark"><i
                                                                            class="fa-solid fa-trash-undo"></i></button>
                                                                </form>
                                                            </td>
                                                        @endif

                                                    </tr>
                                                </tbody>
                                            </table>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </main>
        @include('includes.cs.footer')
    </div>
    @foreach ($userPemohon as $user)
        <!-- Modal -->
        <div class="modal fade" id="staticBackdrop{{ $user->id }}" data-bs-backdrop="static"
            data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form action="{{ route('users.update', $user->id) }}" class="form-horizontal" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="staticBackdropLabel">Data Akun {{ $user->name }}</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="mb-3 row">
                                <label for="staticEmail" class="col-sm-2 col-form-label">Nama</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="staticEmail"
                                        value="{{ $user->name }}" name="nama_lengkap">
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="role" class="col-sm-2 col-form-label">Email</label>
                                <div class="col-sm-10">
                                    <input type="email" class="form-control" id="inputPassword"
                                        value="{{ $user->email }}" name="email">
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="role" class="col-sm-2 col-form-label">Role</label>
                                <div class="col-sm-10">
                                    <select class="form-select" aria-label="Default select example" id="role"
                                        name="role">
                                        <option value="">- Pilih Role -</option>
                                        <option value="USER" {{ $user->role == 'USER' ? 'selected' : '' }}
                                            {{ $user->role != 'USER' ? 'disabled' : '' }}>USER</option>
                                        <option value="CS" {{ $user->role == 'CS' ? 'selected' : '' }}
                                            {{ $user->role == 'USER' ? 'disabled' : '' }}>CS</option>
                                        <option value="KABID" {{ $user->role == 'KABID' ? 'selected' : '' }}
                                            {{ $user->role == 'USER' ? 'disabled' : '' }}>KABID</option>
                                        <option value="KASI" {{ $user->role == 'KASI' ? 'selected' : '' }}
                                            {{ $user->role == 'USER' ? 'disabled' : '' }}>KASI</option>
                                        <option value="PETUGAS" {{ $user->role == 'PETUGAS' ? 'selected' : '' }}
                                            {{ $user->role == 'USER' ? 'disabled' : '' }}>PETUGAS
                                        </option>
                                        <option value="SUPERADMIN" {{ $user->role == 'SUPERADMIN' ? 'selected' : '' }}
                                            {{ $user->role == 'USER' ? 'disabled' : '' }}>
                                            SUPERADMIN</option>
                                    </select>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="role" class="col-sm-2 col-form-label">Foto Profil</label>
                                <div class="col-sm-10">
                                    <figure>
                                        <img @if (empty($user->foto_profile)) src="{{ url('backend/assets/img/illustrations/profiles/profile-2.png') }}"
                                    @else src="{{ Storage::url($user->foto_profile) }}" @endif
                                            alt="avatar"
                                            class="rounded mx-auto d-block rounded mx-auto d-blockrounded-circle img-fluid img-thumbnail"
                                            width="200px" height="auto"
                                            onerror="this.onerror=null; this.src='{{ url('backend/assets/img/illustrations/profiles/profile-2.png') }}'" />
                                        @if (empty($user->foto_profile))
                                            <figcaption class="text-center">No Photo</figcaption>
                                        @endif
                                    </figure>
                                    <input type="file" class="form-control" id="foto" name="imageprofile"
                                        accept="image/png, image/jpeg,image/jpg" />
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="modal fade" id="changeModal{{ $user->id }}" tabindex="-1"
            aria-labelledby="changeModal{{ $user->id }}" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Last Change Akun {{ $user->name }}</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="col-md-12 ">
                            <div class="row d-flex justify-content-center">
                                @foreach ($user->lastchanged as $last)
                                    <div class="card mt-2 mx-2" style="width:22rem;">
                                        <div class="card-body">
                                            <h5 class="card-title">{{ $last->aksi_dilakukan }}</h5>
                                            <p class="card-text">
                                                {{ $last->rincian }}
                                            </p>
                                            <a href="#" class="btn btn-primary">
                                                Modified By {{ $last->nama_pengubah . ', ' . $last->role }}</a>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    @endforeach

@endsection
@push('addon-script')
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
    <script src="{{ url('backend/js/datatables/datatables-simple-demo.js') }}"></script>

    <script>
        var ds = document.getElementsByClassName('textarea')
        for (var i = 0; i < ds.length; i++) {
            (`${ds[i]}`).html().trim()
        }
    </script>
@endpush
