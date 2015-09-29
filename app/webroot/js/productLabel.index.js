var pageVars = {
    timeout: [],
    webroot: document.getElementById('WEBROOT').value
}

$('body').on('hidden.bs.modal', '.modal', function () {
    $(this).removeData('modal');
});

function setProductLabelDeleteFormURL(url) {
    $('#ProductLabelDeleteForm').attr('action', url);
}

$(function () {
    $('#deleteConfirm').find('button[type=submit]').on('click', function () {
        setTimeout(function () {
            ajaxPageLoader.show();
            $('#ProductLabelDeleteForm').submit();
        }, 300);
    });
});