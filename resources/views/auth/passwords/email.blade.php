@extends('layouts.app')

@section('content')
<main id="main" class="mb-md-5">
    <section id="hero-static" class="hero-static">
        <div class="container">
            <div class="section-header">
                <h2>Reset Password Akun Sirisma</h2>
            </div>

        </div>

        <div class="container mb-3">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">{{ __('Reset Password') }}</div>
                        <div class="card-body">
                            @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                            @endif

                            <form method="POST" action="{{ route('password.email') }}" class="mb-4">
                                @csrf

                                <div class="row mb-3">
                                    <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Alamat Email')
                                        }}</label>

                                    <div class="col-md-6">
                                        <input id="email" type="email"
                                            class="form-control @error('email') is-invalid @enderror" name="email" <?php
                                            if(isset(Auth::user()->name)):?> value="{{ Auth::user()->email }}"
                                        <?php else: ?>
                                        value="{{ old('email') }}"
                                        <?php endif; ?> autocomplete="email"
                                        autofocus>

                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row mb-3">
                                    <label for="captcha" class="col-md-4 col-form-label text-md-end">Captcha</label>
                                    <div class="col-md-6 captcha">
                                        <span>{!! captcha_img() !!}</span>
                                        <button type="button" class="btn btn-danger" class="reload" id="reload">
                                            &#x21bb;
                                        </button>
                                    </div>
                                </div>
                                <div class="form-group row mb-3">
                                    <label for="captcha" class="col-md-4 col-form-label text-md-end">Enter
                                        Captcha</label>
                                    <div class="col-md-6">
                                        <input id="captcha" type="text"
                                            class="form-control @error('captcha') is-invalid @enderror"
                                            placeholder="Enter Captcha" name="captcha">
                                        @error('captcha')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mb-0">
                                    <div class="col-md-6 offset-md-4">
                                        <button type="submit" class="btn btn-primary">
                                            {{ __('Kirim Link Reset Password') }}
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
@endsection
@push('addon-script')
<script type="text/javascript">
    $('#reload').click(function() {
            $.ajax({
                type: 'GET',
                url: '{{ route('reloadCaptcha') }}',
                success: function(data) {
                    $(".captcha span").html(data.captcha);
                }
            });
        });
</script>
@endpush
