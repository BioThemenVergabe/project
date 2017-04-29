







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

    $('[type=range][data-copy]').on('input change', function() {
       var copyOf = $(this).data('copy');
       $(this).parents('tbody').find('[data-target='+copyOf+'] .copyOf').val(parseInt($(this).val()));
       $(this).parents('tbody').find('[type=range][name='+$(this).data('copy')+']').val(parseInt($(this).val()));

        //TODO Berechnen der Summe bei änderungen der kopie.

    });

    $('.copyOf').on('input change', function() {
        $('[data-copy='+$(this).attr('id')+']').val($(this).val());
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
            var val = $(this).parents('tr').find('[type=range]').val();

            // TODO Bei Reset den Standardwert der Inputrange einfügen
            //$(this).parents('tbody').find('[data-target='+$(this).parents('tr').data('copy')+'] .copyOf').val(parseInt(val));

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
        window.location.href = $(location).attr('protocol')+"//"+$(location).attr('hostname')+":"+$(location).attr('port')+"/home";
    });

});
