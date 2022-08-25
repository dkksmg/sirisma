<script type="text/javascript">
    $('textarea#alamat_ktp').html($('textarea#alamat_ktp').html().trim());
    $('textarea#alamat_domisili').html($('textarea#alamat_domisili').html().trim());
    $(function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $(function() {
            $('#provinsi_ktp').change(function() {
                var id_provinsi = $('#provinsi_ktp').val();
                var id_kota = "{{ $data->kotakab_ktp }}";
                $.ajax({
                    type: 'POST',
                    url: "{{ route('getkotakab') }}",
                    data: {
                        id_provinsi: id_provinsi,
                        id_kota: id_kota,
                    },
                    async: true,
                    dataType: 'json',
                    success: function(data) {
                        $("#kotakab_ktp").html(data);
                        $('#kecamatan_ktp').html('')
                        $('#keldesa_ktp').html('')
                    }
                })
            });
            $('#provinsi_domisili').change(function() {
                var id_provinsi = $('#provinsi_domisili').val();
                var id_kota = "{{ $data->kotakab_domisili }}";
                $.ajax({
                    type: 'POST',
                    url: "{{ route('getkotakab') }}",
                    data: {
                        id_provinsi: id_provinsi,
                        id_kota: id_kota,
                    },
                    async: true,
                    dataType: 'json',
                    success: function(data) {
                        $("#kotakab_domisili").html(data);
                        $('#kecamatan_domisili').html('')
                        $('#keldesa_domisili').html('')
                    }
                })
            });
            $('#kotakab_ktp').change(function() {
                var id_kotakab = $('#kotakab_ktp').val();
                if (id_kotakab == null) {
                    var id_kota = "{{ $data->kotakab_ktp }}";
                } else {
                    var id_kota = id_kotakab;
                }
                var id_kecamatan = "{{ $data->kecamatan_ktp }}"
                $.ajax({
                    type: 'POST',
                    url: "{{ route('getkecamatan') }}",
                    data: {
                        id_kota: id_kota,
                        id_kecamatan: id_kecamatan,
                    },
                    async: true,
                    dataType: 'json',
                    success: function(data) {
                        $("#kecamatan_ktp").html(data);
                        $('#keldesa_ktp').html('')
                    }
                })
            });
            $('#kotakab_domisili').change(function() {
                var id_kotakab = $('#kotakab_domisili').val();
                if (id_kotakab == null) {
                    var id_kota = "{{ $data->kotakab_domisili }}";
                } else {
                    var id_kota = id_kotakab;
                }
                var id_kecamatan = "{{ $data->kecamatan_domisili }}"
                $.ajax({
                    type: 'POST',
                    url: "{{ route('getkecamatan') }}",
                    data: {
                        id_kota: id_kota,
                        id_kecamatan: id_kecamatan,
                    },
                    async: true,
                    dataType: 'json',
                    success: function(data) {
                        $("#kecamatan_domisili").html(data);
                        $('#keldesa_domisili').html('')
                    }
                })
            });
            $('#kecamatan_ktp').change(function() {
                var id_kec = $('#kecamatan_ktp').find(":selected").val();
                if (id_kec == null) {
                    var id_kecamatan = "{{ $data->kecamatan_ktp }}";
                } else {
                    var id_kecamatan = id_kec;
                }
                var id_keldesa = "{{ $data->kelurahan_ktp }}";
                $.ajax({
                    type: 'POST',
                    url: "{{ route('getkeldesa') }}",
                    data: {
                        id_kecamatan: id_kecamatan,
                        id_keldesa: id_keldesa
                    },
                    async: true,
                    dataType: 'json',
                    success: function(data) {
                        $("#keldesa_ktp").html(data);
                    }
                })
            });
            $('#kecamatan_domisili').change(function() {
                var id_kec = $('#kecamatan_domisili').find(":selected").val();
                if (id_kec == null) {
                    var id_kecamatan = "{{ $data->kecamatan_domisili }}";
                } else {
                    var id_kecamatan = id_kec;
                }
                var id_keldesa = "{{ $data->kelurahan_domisili }}";
                $.ajax({
                    type: 'POST',
                    url: "{{ route('getkeldesa') }}",
                    data: {
                        id_kecamatan: id_kecamatan,
                        id_keldesa: id_keldesa
                    },
                    async: true,
                    dataType: 'json',
                    success: function(data) {
                        $("#keldesa_domisili").html(data);
                    }
                })
            });

            var id_pemohon = {{ Auth::user()->id }}
            $.ajax({
                url: "{{ route('getdataedit') }}",
                method: 'POST',
                data: {
                    id_pemohon: id_pemohon
                },
                dataType: 'json',
                success: function(response) {
                    $('[name="provinsi_ktp"]').val(response.provinsi_ktp).trigger('change');
                    $('[name="kotakab_ktp"]').val(response.kotakab_ktp).trigger('change');
                    $('[name="kecamatan_ktp"]').val(response.kecamatan_ktp).trigger(
                        'change');
                    $('[name="keldesa_ktp"]').val(response.kelurahan_ktp).trigger('change');
                    $('[name="provinsi_domisili"]').val(response.provinsi_domisili).trigger(
                        'change');
                    $('[name="kotakab_domisili"]').val(response.kotakab_domisili).trigger(
                        'change');
                    $('[name="kecamatan_domisili"]').val(response.kecamatan_domisili)
                        .trigger(
                            'change');
                    $('[name="keldesa_domisili"]').val(response.kelurahan_domisili).trigger(
                        'change');
                }
            })

        });


    });
</script>
