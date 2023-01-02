@extends('layouts.backend')
@section('title', 'Admin')
@section('content')
    <div id="layoutSidenav_content">
        <main>
            <header class="page-header page-header-compact page-header-light border-bottom bg-white mb-4">
                <div class="container-xl px-4">
                    <div class="page-header-content">
                        <div class="row align-items-center justify-content-between pt-3">
                            <div class="col-auto mb-3">
                                <h1 class="page-header-title">
                                    <div class="page-header-icon"><i data-feather="user"></i></div>
                                    Account Settings - Profile
                                </h1>
                            </div>
                        </div>
                    </div>
                </div>
            </header>
            <!-- Main page content-->
            <div class="container-xl px-4 mt-4">
                <!-- Account page navigation-->
                <nav class="nav nav-borders">
                    <a class="nav-link active ms-0" href="">Profile</a>
                </nav>
                <hr class="mt-0 mb-4" />
                <form action={{ route('profile-admin.update', $dataUser->id) }} enctype="multipart/form-data"
                    method="post">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-xl-4">
                            <!-- Profile picture card-->
                            <div class="card mb-4 mb-xl-0">

                                <div class="card-header">Profile Picture</div>
                                <div class="card-body text-center">
                                    <!-- Profile picture image-->
                                    <img class="img-account-profile rounded-circle mb-2"
                                        src="{{ Storage::url($dataUser->foto_profile) }}"
                                        onerror="this.onerror=null; this.src='{{ url('backend/assets/img/illustrations/profiles/profile-2.png') }}'"
                                        alt="Profil Image" />
                                    <!-- Profile picture help block-->
                                    <div class="small font-italic text-muted mb-4">JPG or PNG no larger than 3 MB</div>
                                    @error('imageprofile')
                                        <div class="invalid-feedback" role="alert">{{ $message }}</div>
                                    @enderror
                                    <!-- Profile picture upload button-->

                                    <div class="card mb-4 mb-xl-0 mt-3">
                                        <input class="btn btn-primary" type="file" name="imageprofile"
                                            accept="image/png, image/jpeg" />
                                    </div>
                                </div>
                            </div>
                            <div class="card mb-4 mb-xl-0 mt-3">
                                <a class="btn btn-danger" href="{{ route('password.request') }}">Change Password</a>
                            </div>
                        </div>
                        <div class="col-xl-8">
                            <!-- Account details card-->
                            <div class="card mb-4">
                                <div class="card-header">Account Details</div>
                                <div class="card-body">
                                    <!-- Form Row-->
                                    <div class="row gx-3 mb-3">
                                        <div class="col-md-12">
                                            <label class="small mb-1" for="inputFirstName">Nama Lengkap</label>
                                            <input class="form-control @error('nama_lengkap') is-invalid @enderror"
                                                id="inputFirstName" type="text" placeholder="Enter your full name"
                                                value="{{ $dataUser->name }}" name="nama_lengkap" />
                                            @error('nama_lengkap')
                                                <div class="invalid-feedback" role="alert">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <!-- Form Group (email address)-->
                                    <div class="mb-3">
                                        <label class="small mb-1" for="inputEmailAddress">Email address</label>
                                        <input class="form-control @error('email') is-invalid @enderror"
                                            id="inputEmailAddress" type="email" placeholder="Enter your email address"
                                            value="{{ $dataUser->email }}" name="email" />
                                        @error('email')
                                            <div class="invalid-feedback" role="alert">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <!-- Form Row-->
                                    <div class="row gx-3 mb-3">
                                        <div class="col-md-6">
                                            <label class="small mb-1" for="inputBirthday">Role</label>
                                            <input class="form-control" id="inputBirthday" type="text"
                                                value="{{ $dataUser->role }}" readonly disabled />
                                        </div>
                                    </div>
                                    <!-- Save changes button-->
                                    <button class="btn btn-primary" type="submit">Save changes</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </main>
        @include('includes.cs.footer')
    </div>
@endsection
@push('addon-script')
@endpush
