
function addMoreNumber() {
    var count = $('input.CustomerTelephoneNumber').size();
    var id = count;
    var $html = '<div class="wrapper">';
        $html += '<div class="input text">';
        $html += '<input name="data[CustomerTelephone][' + id + '][number]" class="CustomerTelephoneNumber" maxlength="45" type="text" id="CustomerTelephone' + id + 'Number" />';
        $html += '</div>';
        $html += '<select name="data[CustomerTelephone][' + id + '][type]" id="CustomerTelephone' + id + 'Type" class="valid">';
        $html += '<option value="telephone" selected="selected">Telephone</option>';
        $html += '<option value="fax">Fax</option>';
        $html += '<option value="mobile">Mobile</option>';
        $html += '</select>';
        $html += '<a role="button" class="btn btn-default" onclick="removeNewNumber(this);"><i class="icon icon-remove"></i></a>';
        $html += '</div>';
    $(".number-list").append($html);
    return false;
}

function removeNewNumber(element) {
    $(element).parent().remove();
    return false;
}


$(function () {
    $('#CustomerEditForm').validate({
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
            form.submit();
        },
        success: function () {
        }
    });

    $('input').iCheck({
        checkboxClass: 'icheckbox_minimal-blue',
        radioClass: 'iradio_minimal-blue'
    });
});