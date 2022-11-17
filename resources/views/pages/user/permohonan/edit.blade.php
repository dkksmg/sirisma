@extends('layouts.app')
@push('addon-styles')
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/gijgo@1.9.13/css/gijgo.min.css" />
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    {{-- <link href="{{ url('backend/css/styles.css') }}" rel="stylesheet" /> --}}
    @livewireStyles
@endpush
@section('content')
    <main id="hero-static" class="hero-static">
        <div class="container">
            <div class="section-header">
                <h2>Ubah Permohonan</h2>
            </div>
        </div>
        <div class="container">
            <div class="row justify-content-md-start">
                <div class="col-12 col-md-12 col-lg-12">
                    <div class="container px-5 my-5">
                        @livewire('permohonan.edit', ['id_app' => $app->id_application])
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
@push('addon-script')
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/gijgo@1.9.13/js/gijgo.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script type="text/javascript" src="{{ url('assets/js/function.js') }}"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('.js-example-basic-multiple').select2({
                placeholder: "Pilih Lokasi",
                allowClear: true,
                multiple: true
            });
        });

        function alertPemohon() {
            alert('Data Pemohon ke-1 dapat diubah melalui halaman profile');
        }
    </script>
    @livewireScripts
@endpush
