@extends('layouts.app')
@push('addon-styles')
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/gijgo@1.9.13/css/gijgo.min.css" />
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
                <div class="col-md-12">
                    <div class="container px-5 my-5">
                        @livewire('edit-application')
                    </div>
                </div>
            </div>
        </div>
        </div>
    </main>
@endsection
@push('addon-script')
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/gijgo@1.9.13/js/gijgo.min.js"></script>
    <script type="text/javascript">
        $('textarea#keperluan_pemohon').html($('textarea#keperluan_pemohon').html().trim());
        $('textarea#judul_penelitian').html($('textarea#judul_penelitian').html().trim());
        $(function() {
            $('#datepicker-one').datepicker({
                header: true,
                modal: true,
                footer: true,
                keyboardNavigation: true,
                showOtherMonths: true,
                format: 'dd/mm/yyyy',
                uiLibrary: 'bootstrap4',
                icons: {
                    rightIcon: '<i class="fa-solid fa-calendar-days"></i>'
                }
            });
            $('#datepicker-two').datepicker({
                header: true,
                modal: true,
                footer: true,
                keyboardNavigation: true,
                showOtherMonths: true,
                format: 'dd/mm/yyyy',
                uiLibrary: 'bootstrap4',
                icons: {
                    rightIcon: '<i class="fa-solid fa-calendar-days"></i>'
                }
            });
        });
    </script>
    @livewireScripts
@endpush
