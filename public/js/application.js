function calcSum() {
    var sum = 0;
    $('[data-target=range]').each(function() {
        sum += parseInt($(this).html());
    })
    $('#sum').html(sum);
}

$(function() {

    $('[data-target=range]').html(function() {
        return $(this).parents('tr').find('input[type=range]').val();
    });

    $('[type=range]').on('input change', function() {
       var ag = $(this).attr('id');
        $(this).parents('tr').find('[data-target=range]').html($(this).val());
        $('tr[data-row='+ag+']').find('.copyOf').val(parseInt($(this).val()));
        $('[data-row-copy='+ag+']').find('input[data-copy]').val(parseInt($(this).val()));
       calcSum();
    });

    $('[type=range][data-copy]').on('input change', function() {
        var ag = $(this).data('copy');
        $('#'+ag).val($(this).val());
        $('tr[data-row='+ag+']').find('[data-target=range]').html($(this).val());
        $('tr[data-row='+ag+']').find('.copyOf').val(parseInt($(this).val()));
        calcSum();
    });

    $('.copyOf').on('input change', function() {
        if(parseInt($(this).val()) > $(this).attr('max'))
            $(this).val(parseInt($(this).attr('max')));
        var ag = $(this).parents('tr').data('row');
        $('#'+ag).val(parseInt($(this).val()));
        $('tr[data-row='+ag+']').find('[data-target=range]').html($(this).val());
        $('[data-row-copy='+ag+']').find('input[data-copy]').val(parseInt($(this).val()));
        calcSum();
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
            $(this).parents('tr').find('input.copyOf').val(parseInt($(this).html()));
            sum += parseInt($(this).html());
            $('#sum').html(sum);
        });
    });

    calcSum();

    $('.copyOf').attr('value',function() {
        return $('#'+$(this).parents('tr').data('row')).val();
    });

    $('[data-toggle="popover"]').popover();
    $('.dropdown-toggle').dropdown();

    $('#logo').on('click', function() {
        window.location.href = $(location).attr('protocol')+"//"+$(location).attr('hostname')+":"+$(location).attr('port')+"/redirect";
    });

    $('[data-dismiss]').on('click', function() {
        var target = $('#'+$(this).data('dismiss'));
        target.addClass('hidden');
        if(target.hasClass('hidden')){
            var d = new Date();
            d.setTime(d.getTime() + (365*24*60*60*1000));
            var expires = "expires="+ d.toUTCString();
            document.cookie = "cookieAccepted=1;" + expires + ";path=/";

            $('[type=submit].disabled, .btn-link.disabled').removeClass('disabled').attr('disabled',false);

        }
    });

    var accepted = getCookie('cookieAccepted');

    if(accepted == 1) {
        $('#cookieWarning').addClass('hidden');
    } else {
        $('[type=submit],.btn-link').addClass('disabled').attr('disabled',true);
    }

});

function getCookie(cname) {
    var name = cname + "=";
    var ca = document.cookie.split(';');
    for (var i = 0; i < ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0) == ' ') {
            c = c.substring(1);
        }
        if (c.indexOf(name) == 0) {
            return c.substring(name.length, c.length);
        }
    }
    return "";
}