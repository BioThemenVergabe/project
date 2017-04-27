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

    $('[type=reset]').click(function(e) {
        $(this).closest('form').get(0).reset();
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

    $('#logo').on('click', function() {
        window.location.href = $(location).attr('protocol')+"//"+$(location).attr('hostname')+":"+$(location).attr('port')+"/dashboard";
    });

});
