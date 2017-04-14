$(function() {

    $('[data-target=range]').html(function() {
        return $(this).parents('tr').find('input[type=range]').val();
    });

    $('[type=range]').on('input change', function() {
       $(this).parents('tr').find('[data-target=range]').html($(this).val());
       var sum = 0;
       $('[data-target=range]').each(function() {
           sum += parseInt($(this).html());
       })
        $('#sum').html(sum);
    });

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

    $('[type=reset]').click(function() {
        var sum = 0;
        $('[data-target=range]').each(function() {
           $(this).html(function() {
               return $(this).parents('tr').find('input[type=range]').val();
           });
            sum += parseInt($(this).html());
            $('#sum').html(sum);
        });
    });

    var sum = 0;
    $('[data-target=range]').each(function() {
        sum += parseInt($(this).html());
        $('#sum').html(sum);
    });

    $('[data-toggle="popover"]').popover();
    $('.dropdown-toggle').dropdown();

});
