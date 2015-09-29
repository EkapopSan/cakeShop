var pageVars = {
    timeout: [],
    webroot: document.getElementById('WEBROOT').value
}

$('body').on('hidden.bs.modal', '.modal', function () {
    $(this).removeData('modal');
});

function setManufacturerDeleteFormURL(url) {
    $('#ManufacturerDeleteForm').attr('action', url);
}

$(function () {
    $('#deleteConfirm').find('button[type=submit]').on('click', function () {
        setTimeout(function () {
            ajaxPageLoader.show();
            $('#ManufacturerDeleteForm').submit();
        }, 300);
    });
});