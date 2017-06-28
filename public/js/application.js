/**
 * get all hidden input fields.
 * This is necessary, since we have already translated everything in our lang directory.
 *
 * @author Patrick Moeser
 * @param arg
 * @returns {*}
 */
function getHidden(arg) {
    var $ret = null;
    $('input[type=hidden]').each(function () {
        if ($(this).attr('name') == arg)
            $ret = $(this);
    });
    return $ret;
}

/**
 * Gets the <code>name</code>-Cookie
 *
 * @param cname
 * @returns {*}
 */
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

$(function () {

    /**
     * if the user has already submitted a form from a modal, it will be shown when errors occured.
     */
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

    /**
     * Binds all a-elements with a data-action attribute.
     * There should be a modal with the id-value fitting to the dat-action-value.
     */
    $('a[data-action]').on('click', function (e) {
        e.preventDefault();
        $('#' + $(this).data('action')).modal();
    });

    /**
     * init popover() and .dropdown() from bootstrap.
     */
    $('[data-toggle="popover"]').popover();
    $('.dropdown-toggle').dropdown();

    /**
     * onClickEventListener for a click on the logo.
     * This is necessary, because we would get validation errors if we use an a-tag.
     */
    $('#logo').on('click', function () {
        window.location.href = $(location).attr('protocol') + "//" + $(location).attr('hostname') + ":" + $(location).attr('port') + "/redirect";
    });

    /**
     * If the user visits the web-app the first time, he will be shown our cookie message.
     * He has to accept these terms to be able to use our application.
     */
    $('#accept[data-dismiss]').on('click', function () {
        var d = new Date();
        d.setTime(d.getTime() + (365 * 24 * 60 * 60 * 1000));
        var expires = "expires=" + d.toUTCString();
        document.cookie = "cookieAccepted=1;" + expires + ";path=/";
    });

    /**
     * A visual display when a user enters a value in a required input-field.
     */
    $('input:required').on('input change', function () {
        if ($(this).val() != "") {
            $(this).parent().removeClass('has-error');
            $(this).parent().addClass('has-success');
        } else {
            $(this).parent().removeClass('has-success');
            $(this).parent().addClass('has-error');
        }
    })

    /**
     * If a user submitts a form we store the current modal in the sessionstorage.
     * If an error occurs, he will be shown that modal with the fitting error messages.
     */
    $('form[name] input[type=submit]').on('click', function (e) {
        e.preventDefault();
        sessionStorage.setItem('modal', $(this).parents('form').attr('name'));
        $(this).parents('form').submit();
    });

    /**
     * Checks if the value of the inputfield password equals password_confirmation.
     */
    $('form[name=edit] [type="password"][name*="password"], form[name=register] [type="password"][name*="password"]').on('keyup', function () {
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

    $('form[name=edit] [type=submit]').on('click', function (e) {
        e.preventDefault();
    });

    /**
     * Sends the contact-form using ajax to the given e-mail.
     */
    $('#mailContact').find('input[type=submit]').on('click', function (e) {
        e.preventDefault();
        var $form = $(this).closest('form');

        $form.find('.help-block').remove();

        var $formTpl = $form.clone(true);
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
                    var $tpl = '<div class="bs-callout bs-info"><h4>' + getHidden('mailSuccess').val() + '</h4></div>';
                    $form.find('.modal-body').html($tpl);
                    $form.find('input[type=submit]').addClass('hidden');
                    $form.find('input[type=button]').removeClass('hidden');

                    $btn = $form.find('input[type=button]');
                    $btn.on('click', function () {
                        $(this).closest('.modal').modal('toggle');
                        setTimeout(function() {
                            $form.replaceWith($formTpl);
                            $form.find('input[type=submit]').removeClass('hidden');
                            $form.find('input[type=button]').addClass('hidden');
                        }, 1000);
                    });
                } else if (data.success == false) {
                    $form.html($formTpl);
                    $.each(data.errors, function () {
                        var $e = $form.find('[name=' + this.split(" ")[0] + ']');
                        $e.parents('.form-group').addClass('has-error');
                        $e.parent().append('<span class="help-block"><strong>' + this + '</strong></span>');
                    });
                }
            }
        });
    });

});

