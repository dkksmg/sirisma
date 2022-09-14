@extends('layouts.auth')

@section('content')
    <main id="main" class="mb-md-5">
        <section id="hero-static" class="hero-static">
            <div class="container">
                <div class="section-header">
                    <h2>Verifikasi Alamat Email</h2>
                </div>
            </div>
            <div class="container mt-3 mb-5">
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-header">{{ __('Verifikasi Alamat Email Anda') }}</div>

                            <div class="card-body">
                                @if (session('resent'))
                                    <div class="alert alert-success" role="alert">
                                        {{ __('Tautan verifikasi email yang baru telah dikirim ke alamat email Anda.') }}
                                    </div>
                                @endif

                                {{ __('Sebelum melanjutkan silakan verifikasi email Anda yang telah terdaftar, harap periksa email Anda pada inbox/junk/spam.') }}
                                {{ __('Jika anda tidak menerima email verifikasi') }},
                                <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                                    @csrf
                                    <button type="submit"
                                        class="btn btn-link p-0 m-0 align-baseline">{{ __('klik disini') }}</button>
                                </form>
                                {{ __('untuk mendapatkan email verifikasi yang baru.') }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection
