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