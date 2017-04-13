$(function() {

    $('a[data-action]').on('click', function(e) {
        e.preventDefault();
        $('#'+$(this).data('action')).modal();
    });

    $('[type=password]').keyup(function(e) {
        var parent = $(this).parents('.form-group');
        var sbmt = $(this).parents('form').find('[type=submit]');
        if($(this).val().length < 8) {
            if(!parent.hasClass('has-error'));
            parent.addClass('has-error');
            if(!sbmt.hasClass('disabled'))
                sbmt.addClass('disabled');
        } else {
            if(parent.hasClass('has-error'))
                parent.removeClass('has-error');
            if(sbmt.hasClass('disabled'))
                sbmt.removeClass('disabled');
        }
    });

    $('[data-toggle="popover"]').popover();

    $('.dropdown-toggle').dropdown();

});
