var pageVars = {
    hasUserUpdate: false,
    timeout: [],
    webroot: document.getElementById('WEBROOT').value
}

function setUserDeleteFormURL(url) {
    $('#UserDeleteForm').attr('action', url);
}

$('body').on('hidden.bs.modal', '.modal', function () {
    $(this).removeData('modal');
});

$(function () {
    $('#ajaxMessageModal').on('hide.bs.modal', function (event) {
        $('#main > .container-fluid').load(pageVars.webroot + 'users/index');
    });
});

$(function () {
    $('#deleteConfirm').find('button[type=submit]').on('click', function () {
        setTimeout(function () {
            ajaxPageLoader.show();
            $('#UserDeleteForm').submit();
        }, 300);
    });
});

$(function () {
    $('.modal').on('show.bs.modal', function (event) {
        var idx = $('.modal:visible').length;
        $(this).css('z-index', 1050 + (10 * idx));
    });
    $('.modal').on('shown.bs.modal', function (event) {
        var idx = ($('.modal:visible').length) - 1; // raise backdrop after animation.
        $('.modal-backdrop').not('.stacked').css('z-index', 1049 + (10 * idx));
        $('.modal-backdrop').not('.stacked').addClass('stacked');
    });
});