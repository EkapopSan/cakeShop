$("form").on('submit', function () {
    var isValid = $(this).valid();
    if (this.hasChildNodes('.nav.nav-tabs')) {
        var validator = $(this).validate();
        $(this).find("input").each(function () {
            if (!validator.element(this)) {
                isValid = false;
                $('a[href=#' + $(this).closest('.tab-pane:not(.active)').attr('id') + ']').tab('show');
                return false;
            }
        });
    }
    if (isValid) {
        // do stuff
    }
});