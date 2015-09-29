$('.box-title > .nav.nav-tabs').find('li > a').on('click', function (e) {
    var p = $(this).parent('li').get(0);
    if (!$(this).hasClass('dropdown-toggle') && $(this).attr('href') != '#' && !$(p).hasClass('pull-right')) {
        ajaxPageLoader.show();
    }
});

$('.toggle-nav').on('click', function () {
    if ($('#left').css('display') == 'block') {
        $('.box-title').css('left', '20px')
    } else {
        $('.box-title').css({
            left: '220px'
        });
    }
});