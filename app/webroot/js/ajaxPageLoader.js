var ajaxPageLoader = {
    show: function () {
        var progress = '<div class="loader-progress">';
        progress += '<div class="loader-wrapper"></div>';
        progress += '<div class="progress progress-striped active">';
        progress += '<div class="bar" style="width: 100%;"></div>';
        progress += '</div>';
        progress += '</div>';

        $('html').find('.loader-progress').remove();
        $('html').append(progress);
        var h = $('body').height();
        $('.loader-progress').height(h);
        $('.loader-progress > .loader-wrapper').height(h);
        $('.loader-progress').fadeIn('fast');
    },
    hide: function () {
        $('html').find('.loader-progress').remove();
    }
}