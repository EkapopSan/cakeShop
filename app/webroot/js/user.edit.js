$(function () {
    $('#UserEditForm').validate({
        ignore: [],
        rules: {
            "data[User][username]": "username",
        },
        submitHandler: function (form) {

            ajaxPageLoader.show();
            var userId = $(form).find('#UserId').val();

            $.ajax({
                url: $(form).attr('action'),
                type: "POST",
                data: new FormData(form),
                contentType: false,
                cache: false,
                processData: false,
                success: function (data) {
                    clearAllTimeOut();
                    pageVars.hasUserUpdate = true;
                    $('#editModal').find('.modal-body').load(pageVars.webroot + 'users/edit/' + userId);
                    $('#editModal').find('.modal-footer').find('.pull-left').html('<span class="badge badge-success hide"><i class="icon-ok-circle"></i> Updated</span>');
                    $('#editModal').find('.modal-footer').find('.pull-left').find('.badge').fadeIn('fast');
                    ajaxPageLoader.hide();
                    pageVars.timeout.push(setTimeout(function () {
                        $('#editModal').find('.modal-footer').find('.pull-left').empty();
                    }, 2000));
                },
                error: function () {
                }
            });
            return false;
        },
        success: function () {
        }
    });

    $('body').on('hidden.bs.modal', '#editModal', function (event) {
        if (pageVars.hasUserUpdate) {
            $('#main > .container-fluid').load(document.URL);
        }
    });
});

$(function () {
	jQuery.validator.setDefaults({
		debug: false
	});
	$.validator.addMethod("email", function (value, element) {
		return this.optional(element) || /^[a-zA-Z0-9._-]+@[a-zA-Z0-9-]+\.[a-zA-Z.]{2,5}$/i.test(value);
	}, "Please enter a valid email address.");

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