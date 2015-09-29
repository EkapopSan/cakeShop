$(function () {
    $('#ProductEditForm').validate({
        ignore: [],
        rules: {
            "data[Product][name]": {
                required: true
            },
            "data[Product][price]": {
                required: true,
                number: true,
                min: 0
            }
        },
        submitHandler: function (form) {
            $("#editConfirm").modal("show");
            $("#editConfirm").find('button[type=submit]').on('click', function () {
                form.submit();
            });
            return false;
        },
        success: function () {
        }
    });

    $('#editConfirm').on('shown.bs.modal', function () {
        $("#editConfirm").find('button[type=submit]').focus();
    })
});