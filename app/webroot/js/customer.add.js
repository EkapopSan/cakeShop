$(function () {
    $('#CustomerAddForm').validate({
        ignore: [],
        rules: {
            'data[Customer][first_name]': {
                required: true,
                maxlength: 100
            },
            'data[Customer][last_name]': {
                maxlength: 100
            },
            'data[Customer][company_name]': {
                maxlength: 100
            },
            'data[Customer][tax_id]': {
                number: true,
                minlength: 13,
                maxlength: 13
            },
            'data[Customer][credit_term]': {
                number: true,
                required: true,
                min: 0
            },
            'data[CustomerTelephone][0][number]': {
                required: true,
                maxlength: 100
            },
            'data[CustomerAddress][0][address_name]': {
                required: true,
                maxlength: 255
            },
            'data[CustomerAddress][0][address]': {
                required: true,
                maxlength: 1024
            },
            'data[CustomerAddress][0][zip]': {
                required: true,
                minlength: 5,
                maxlength: 5
            },
            'data[CustomerAddress][0][city_id]': {
                min: 1,
                max: 77
            },
            'data[Customer][credit_term]': {
                min: 0
            }
        },
        submitHandler: function (form) {

            ajaxPageLoader.show();

            $.ajax({
                url: $(form).attr('action') + '.json',
                type: "POST",
                data: $(form).serialize(),
                dataType: 'json',
                success: function (data) {
                    location.reload();
                    // ajaxPageLoader.hide();
                    // var msg = '<span class="badge badge-success hide"><i class="icon-ok-circle"></i> Successfully</span>';
                    // $('#addModal').find('.modal-footer').find('.pull-left').html(msg);
                    // $('#addModal').find('.modal-footer').find('.pull-left').find('.badge').fadeIn('fast');
                    // pageVars.hasUserUpdate = true;
                    // clearAllTimeOut();
                    // pageVars.timeout.push(setTimeout(function () {
                    //     $('#addModal').find('.modal-footer').find('.pull-left').empty();
                    // }, 3000));
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