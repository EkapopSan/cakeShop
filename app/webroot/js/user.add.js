$(function (e) {
    $('#UserAddForm').validate({
        ignore: [],
        rules: {
            "data[User][username]": "username",
            'data[User][password]': {
                required: true,
                minlength: 5,
                maxlength: 32
            },
            'data[User][passwordConfirm]': {
                required: true,
                minlength: 5,
                maxlength: 32,
                equalTo: "#UserPassword"
            }
        },
        submitHandler: function (form) {

            ajaxPageLoader.show();

            $.ajax({
                url: $(form).attr('action') + '.json',
                type: "POST",
                data: new FormData(form),
                contentType: false,
                cache: false,
                processData: false,
                success: function (data) {
                    ajaxPageLoader.hide();
                    $('#addModal').modal('hide');
                    setTimeout(function () {
                        $('#ajaxMessageModal').modal('show');
                    }, 300);
                },
                error: function () {
                }
            });
            return false;
        },
        success: function () {
        }
    });
    
    $.validator.addMethod("username", function (value, element) {
        return this.optional(element) || /^[a-zA-Z0-9._-]{5,16}$/i.test(value);
    }, "Only Text or number are 5-15 characters");

    jQuery.validator.addClassRules({
        username: {
            required: true,
            minlength: 5,
            maxlength: 15
        }
    });
});