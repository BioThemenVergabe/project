    <div class="btn-group">
        <button class="btn btn-default btn-sm dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <span class="lang lang-{{ session('locale') }}">@lang('lang.'.session('locale'))</span> <span class="caret"></span>
        </button>
        <ul class="dropdown-menu dropdown-menu-right">
            <li><a href="/lang/de" class="lang lang-de">@lang('lang.de')</a></li>
            <li><a href="/lang/en" class="lang lang-en">@lang('lang.en')</a></li>
        </ul>
    </div>