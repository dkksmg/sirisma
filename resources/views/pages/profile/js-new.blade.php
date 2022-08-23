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
                $.ajax({
                    type: 'POST',
                    url: "{{ route('getkotakab') }}",
                    data: {
                        id_provinsi: id_provinsi,
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
                $.ajax({
                    type: 'POST',
                    url: "{{ route('getkotakab') }}",
                    data: {
                        id_provinsi: id_provinsi,
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
                var id_kota = $('#kotakab_ktp').val();
                $.ajax({
                    type: 'POST',
                    url: "{{ route('getkecamatan') }}",
                    data: {
                        id_kota: id_kota,
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
                var id_kota = $('#kotakab_domisili').val();
                $.ajax({
                    type: 'POST',
                    url: "{{ route('getkecamatan') }}",
                    data: {
                        id_kota: id_kota,
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
                $.ajax({
                    type: 'POST',
                    url: "{{ route('getkeldesa') }}",
                    data: {
                        id_kecamatan: id_kec,
                    },
                    async: true,
                    dataType: 'json',
                    success: function(data) {
                        $("#keldesa_ktp").html(data);
                    }
                })
            });
            $('#kecamatan_domisili').change(function() {
                var id_kecamatan = $('#kecamatan_domisili').find(":selected").val();
                $.ajax({
                    type: 'POST',
                    url: "{{ route('getkeldesa') }}",
                    data: {
                        id_kecamatan: id_kecamatan,
                    },
                    async: true,
                    dataType: 'json',
                    success: function(data) {
                        $("#keldesa_domisili").html(data);
                    }
                })
            });

        });


    });
</script>
