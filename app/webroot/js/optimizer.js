function clearAllTimeOut() {
    for (i = 0; i < pageVars.timeout.length; i++) {
        clearTimeout(pageVars.timeout[i]);
    }
}

function setBoxTitleWidth() {
    //var w = $('#main').find('.box-title').parent('.box').width();
    //$('#main').find('.box-title').width(w);
}

function initialFlashState() {
    $('.flash.alert').fadeIn('fast');
    setTimeout(function () { $('.flash.alert').hide().remove(); }, 5000);
}

$(function () {
    setBoxTitleWidth();
    initialFlashState();
});

//Set Position of content [.box-content ::: #main > .container-fluid > .row-fluid > .box > .box-content]
$(function () {
    $('#main > .container-fluid > .row-fluid > .box > .box-content').css({
        top: $('#main > .container-fluid > .row-fluid > .box > .box-title').outerHeight() + 3
    });
});