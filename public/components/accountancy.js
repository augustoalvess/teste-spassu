$(document).ready(function() {
    $('#crt_id').on('change', function() {
        $('.crt-3-data').hide();
        $('.crt-1-data').hide();
        if (this.value == '3') {
            $('.crt-3-data').show();
        } else {
            $('.crt-1-data').show();
        }
    });
    $('#crt_id').change();
});