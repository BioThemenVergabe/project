function calcSum() {
    var sum = 0;
    $('[data-target=range]').each(function () {
        sum += parseInt($(this).html());
    })
    $('#sum').html(sum);
    return sum;
}

function getHidden(arg) {
    var $ret = null;
    $('input[type=hidden]').each(function () {
        if ($(this).attr('name') == arg)
            $ret = $(this);
    });
    return $ret;
}

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

function checkWahlValues(values, sum) {

    var size = values.length;
    var min = 0;
    for (var i = 0; i < (size - 1); i++) {
        min += (10 - i);
    }

    $('#minRating').html(min);

    if (parseInt(sum) < parseInt(min))
        return false;
    return true;
}

$(function () {

    if (sessionStorage.getItem('modal') != "") {
        var a = sessionStorage.getItem('modal');
        $('#' + a).modal();
        sessionStorage.removeItem('modal');
        $('form:not([name="' + a + '"])').find('.has-error').removeClass('has-error');
    }

    var accepted = getCookie('cookieAccepted');

    if (accepted != 1) {
        $('#cookieMessage.modal').modal({
            keyboard: false,
            backdrop: 'static'
        });
    }

    $('.copyOf').on('input change', function () {
        if (parseInt($(this).val()) > $(this).attr('max'))
            $(this).val(parseInt($(this).attr('max')));
        var ag = $(this).parents('tr').data('row');
        $('#' + ag).val(parseInt($(this).val()));
        $('tr[data-row=' + ag + ']').find('[data-target=range]').html($(this).val());
        $('[data-row-copy=' + ag + ']').find('input[data-copy]').val(parseInt($(this).val()));
        calcSum();
    });

    $('a[data-action]').on('click', function (e) {
        e.preventDefault();
        $('#' + $(this).data('action')).modal();
    });

    $('[type=reset]').click(function (e) {
        $(this).closest('form').get(0).reset();
        var sum = 0;
        $('[data-target=range]').each(function () {
            $(this).html(function () {
                return $(this).parents('tr').find('input[type=range]').val();
            });
            $(this).parents('tr').find('input.copyOf').val(parseInt($(this).html()));
            sum += parseInt($(this).html());
            $('#sum').html(sum);
        });
    });

    calcSum();

    $('.copyOf').attr('value', function () {
        return $('#' + $(this).parents('tr').data('row')).val();
    });

    $('[data-toggle="popover"]').popover();
    $('.dropdown-toggle').dropdown();

    $('#logo').on('click', function () {
        window.location.href = $(location).attr('protocol') + "//" + $(location).attr('hostname') + ":" + $(location).attr('port') + "/redirect";
    });

    $('#accept[data-dismiss]').on('click', function () {
        var d = new Date();
        d.setTime(d.getTime() + (365 * 24 * 60 * 60 * 1000));
        var expires = "expires=" + d.toUTCString();
        document.cookie = "cookieAccepted=1;" + expires + ";path=/";
    });

    $('form[name=wahl] input[type=submit]').on('click', function (e) {
        var values = $('.ag-values');

        val = new Array();

        $.each(values, function (value) {
            val.push(values[value].value);
            values[value].value = parseInt(values[value].value);
            alert(values[value].value);
        });

        val.sort(function (a, b) {
            return a - b
        });
        val.reverse();

        if (!checkWahlValues(val, calcSum())) {
            e.preventDefault();
            $('#errorMsg').modal();
        }
    });

    $('input:required').on('input change', function () {
        if ($(this).val() != "") {
            $(this).parent().removeClass('has-error');
            $(this).parent().addClass('has-success');
        } else {
            $(this).parent().removeClass('has-success');
            $(this).parent().addClass('has-error');
        }
    })

    $('form[name] input[type=submit]').on('click', function (e) {
        e.preventDefault();
        sessionStorage.setItem('modal', $(this).parents('form').attr('name'));
        $(this).parents('form').submit();
    });

    $('form[name=register] [type="password"][name*="password"]').on('keyup', function () {
        var t;
        switch ($(this).attr('name')) {
            case "password":
                t = $(this).parents('form').find('input[name=password_confirmation]');
                break;
            case "password_confirmation":
                t = $(this).parents('form').find('input[name=password]');
                break;
        }
        if (t.val() != $(this).val()) {
            $('.has-success').removeClass('has-success');
            t.parent().addClass('has-error');
            $(this).parent().addClass('has-error');
        } else {
            $('.has-error').removeClass('has-error');
            t.parent().addClass('has-success');
            $(this).parent().addClass('has-success');
        }
    });

    $('form[name=edit] [type="password"][name*="password"]').on('change', function () {
        var t;
        switch ($(this).attr('name')) {
            case "password":
                t = $(this).parents('form').find('input[name=password_confirmation]');
                break;
            case "password_confirmation":
                t = $(this).parents('form').find('input[name=password]');
                break;
        }
        if (t.val() != $(this).val() || $(this).val().length < 8) {
            $('.has-success').removeClass('has-success');
            t.parent().addClass('has-error');
            $(this).parent().addClass('has-error');
        } else {
            $('.has-error').removeClass('has-error');
            t.parent().addClass('has-success');
            $(this).parent().addClass('has-success');
        }
    });

    $('form[name=edit] [type=submit]').on('click', function (e) {
        e.preventDefault();

    });

    var z = 1;
    $('#sortableRatings, #listRating').children('div').not('#noRating').each(function () {
        $(this).attr('data-content', z++);
    });

    $('#mailContact').find('input[type=submit]').on('click', function (e) {
        e.preventDefault();
        var $form = $(this).parents('form');
        var $formTpl = $form.html();
        var $data = $form.find('input');
        var $post = {
            'message': $form.find('textarea').val()
        };

        $('form').not('[data-name='+$form.attr('data-name')+']').find('.has-error').html("Hallo");

        $data.each(function () {
            $post[$(this).attr('name')] = $(this).val();
        });

        $.ajax({
            type: $form.attr('method'),
            url: $form.attr('action'),
            data: $post,
            beforeSend: function (xhr) {
                $form.find('.modal-body').html('<div class="row"><div class="col-xs-4 col-xs-offset-4"><div class="progress"><div class="progress-bar progress-bar-info progress-bar-striped active" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width:100%"></div></div></div></div>');
            },
            success: function (data) {
                $('.has-error').removeClass('has-error');
                $('.help-block').remove();
                if (data.success == true) {
                    var $tpl = '<div class="bs-callout bs-info" id="noRating"><h4>' + getHidden('mailSuccess').val() + '</h4></div>';
                    $form.find('.modal-body').html($tpl);
                    $form.find('input[type=submit]').addClass('hidden');
                    $form.find('input[type=button]').removeClass('hidden');

                    $btn = $form.find('input[type=button]');
                    $btn.on('click', function () {
                        $(this).parents('.modal').modal('toggle');
//                        setTimeout(function() {
//                            $form.html($formTpl);
//                            $form.find('input[type=submit]').removeClass('hidden');
//                            $form.find('input[type=button]').addClass('hidden');
//                        }, 1000);
                    });
                } else if (data.success == false) {
                    $form.html($formTpl);
                    $.each(data.errors, function () {
                        var $e = $form.find('[name=' + this.split(" ")[0] + ']');
                        $e.parents('.form-group').addClass('has-error');
                        $e.parent().remove('span');
                        $e.parent().append('<span class="help-block"><strong>' + this + '</strong></span>');
                    });
                }
            }
        });
    });

});

