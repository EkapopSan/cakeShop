var pageVars = {
    hasUserUpdate: false,
    timeout: [],
    webroot: document.getElementById('WEBROOT').value
}

$(function () {
    clearAllTimeOut();
});

function setGroupDeleteFormURL(url) {
    $('#GroupDeleteForm').attr('action', url);
}

$('body').on('hidden.bs.modal', '.modal', function () {
    $(this).removeData('modal');
});

$(function () {
    $('#deleteConfirm').find('button[type=submit]').on('click', function () {
        setTimeout(function () {
            ajaxPageLoader.show();
            $('#GroupDeleteForm').submit();
        }, 300);
    });
});