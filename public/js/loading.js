$(window).on('unload', function(){
    unloadPopupBox();
});

$(document).ready(function() {
    $(".loading").click(function(e) {
        loadPopupBox(e);
    });

    $('#popupBoxClose').click(function() {
        unloadPopupBox();
    });

    $("a").click(function(e) {
        loadPopupBox(e);
    });
});

function unloadPopupBox() {
    $('#obscure-loading').fadeOut("slow");
}

function loadPopupBox(e) {
    var target = $(e.delegateTarget);
    if (!target.hasClass('no-loading') && !target.hasClass('page-link')) {
        $('#obscure-loading').fadeIn("slow");
    }
}

$(document).ready(function() {
    $('.barlittle').removeClass('stop');

    $('.triggerBar').click(function() {
        $('.barlittle').toggleClass('stop');
    });
});

$(document).ready(function() {
    $('form').on("submit", function(e) {
        loadPopupBox(e);
    });
});