$(document).ready(function() {
    $('input[type=checkbox]#manage_stock').on('change', function() {
        $('.stock_manager').hide();
        if ($(this).is(':checked')) {
            $('.stock_manager').show();
        }
    });
    $('input[type=checkbox]#manage_stock').change();
});