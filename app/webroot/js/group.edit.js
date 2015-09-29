$(function () {
	$('#GroupEditForm').validate({
		ignore: [],
		rules: {
			"data[Group][name]": {
				required: true
			}
		},
		submitHandler: function (form) {

			ajaxPageLoader.show();
			var groupId = $(form).find('#GroupId').val();

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
					$('#editModal').find('.modal-body').load(pageVars.webroot + 'groups/edit/' + groupId);
					ajaxPageLoader.hide();
					$('#editModal').find('.modal-footer').find('.pull-left').html('<span class="badge badge-success hide"><i class="icon-ok-circle"></i> Updated</span>');
					$('#editModal').find('.modal-footer').find('.pull-left').find('.badge').fadeIn('fast');
					pageVars.timeout.push(setTimeout(function () {
						$('#editModal').find('.modal-footer').find('.pull-left').empty();
						$('input#GroupName').focus();
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
	        ajaxPageLoader.show();
	        location.reload();
	        //$('#main > .container-fluid').load(document.URL);
	    }
	});
});