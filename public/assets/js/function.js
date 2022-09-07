
$(document).ready(function() {
    $('.js-example-basic-multiple').select2({
        placeholder: "Pilih Lokasi",
        allowClear: true
    });
});
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
    $('#datepicker-three').datepicker({
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
