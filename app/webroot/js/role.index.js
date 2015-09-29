var pageVars = {
    timeout: [],
    webroot: document.getElementById('WEBROOT').value
}

$(function () {
    if($('#isAdminRole').val() >= 0) {
        $('li.assign > i').prop('class', 'icon-ok');
        $('li.assign > i.icon-ok').css('color', '#8CBA8C');
        $('li.assign').each(function () {
            $(this).removeClass('assign');
        });
    }

    $("a.toggle-list").click(function () {
        $(this).next().slideToggle('fast');
        return false;
    });

    $('#toggleExplandBtn').on('click', function (e) {
        e.preventDefault();
        var text = $(this).text();
        text = text.toString().trim();
        var html = (text == 'Expand All' ? '<i class="glyphicon-collapse_top"></i> Collapse All' : '<i class="glyphicon-expand"></i> Expand All');
        $(this).html(html);
        (text == 'Expand All' ? $('ul.controllers, ul.actions').slideDown('fast') : $('ul.actions').slideUp('fast'))
    });

    $('#AssignPermissionIndexForm').find('a').click(function (e) {
        return false;
    });

    $("li.assign").click(function () {
        var icon = $(this).children().prop('class');
        if (icon !== 'icon-ok') {
            $(this).find('i').prop('class', 'icon-ok');
            $(this).find('input.permission').attr('value', 1);
        } else {
            $(this).find('i').prop('class', 'icon-remove-circle');
            $(this).find('input.permission').attr('value', -1);
        }
        return false;
    });
});

$(function () {
    var left = $('#group-list').width() - 10;
    $('#task-list').css({
        left: left
    });
});

$(function () {
    $('#task-nav-pill').on('click', function () {
        $('#task-list > ul.nav.nav-pills > .pull-right').show();
    });
    $('#user-nav-pill').on('click', function () {
        $('#task-list > ul.nav.nav-pills > .pull-right').hide();
    });
});

$('#AssignPermissionIndexForm').on('submit', function (e) {

    e.preventDefault();
    ajaxPageLoader.show();

    $.ajax({
        url: $(this).attr('action') + '.json',
        type: "POST",
        data: $(this).serialize(),
        cache: false,
        success: function (data) {
            clearAllTimeOut();
            ajaxPageLoader.hide();
            if (data.code === 1) {
                $('.flash.alert').find('.msg').html(data.message);
                $('.flash.alert').fadeIn('fast');
                pageVars.timeout.push(setTimeout(function () {
                    $('.flash.alert').fadeOut('fast');
                }, 3000));
            }
        },
        error: function () {
        }
    });
    return false;
});