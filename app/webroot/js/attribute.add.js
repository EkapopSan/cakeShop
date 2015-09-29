$(function () {
    $('#AttributeAddForm').validate({
        ignore: [],
        rules: {
            'data[Attribute][name]': {
                required: true,
                maxlength: 100
            }
        },
        submitHandler: function (form) {

            ajaxPageLoader.show();
            $('input#AttributeName').blur();

            $.ajax({
                url: $(form).attr('action') + '.json',
                type: "POST",
                data: $(form).serialize(),
                dataType: 'json',
                success: function (data) {
                    ajaxPageLoader.hide();
                    $('#addModal').find('.modal-footer').find('.pull-left').html('<span class="badge badge-success hide"><i class="icon-ok-circle"></i> Successfully</span>');
                    $('#addModal').find('.modal-footer').find('.pull-left').find('.badge').fadeIn('fast');
                    pageVars.hasUserUpdate = true;
                    clearAllTimeOut();
                    pageVars.timeout.push(setTimeout(function () {
                        $('#addModal').find('.modal-footer').find('.pull-left').empty();
                    }, 3000));
                },
                error: function () {
                }
            });
            return false;
        },
        success: function () {
        }
    });

    $('body').on('hidden.bs.modal', '#addModal', function (event) {
        if (pageVars.hasUserUpdate) {
            ajaxPageLoader.show();
            location.reload();
            //$('#main > .container-fluid').load(document.URL);
        }
    });
});