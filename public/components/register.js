$(document).ready(function() {
    $('#person_type').on('change', function() {
        $('.physical-person-field').hide();
        $('.legal-person-field').hide();
        if (this.value == 'f') {
            $('.physical-person-field').show();
        } else {
            $('.legal-person-field').show();
        }
    });
    $('#person_type').change();
});
$(document).ready(function() {
    $('input[type=checkbox]#manage_stock').on('change', function() {
        $('.stock_manager').hide();
        if ($(this).is(':checked')) {
            $('.stock_manager').show();
        }
    });
    $('input[type=checkbox]#manage_stock').change();
});