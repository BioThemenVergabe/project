<header>
    <div class="container">
        <div class="row">
            <nav class="pull-right">
                <div class="btn-group" role="group" aria-label="...">
                    @yield('links')
                    @include('partials.lang')
                    <a href="/logout" title="@lang('fields.signout')" class="btn btn-danger btn-sm icon icon-log-out"></a>
                </div>
            </nav>
            <label id="logo"><a href="{{ url('/redirect') }}"><span class="hidden-xs hidden-sm">{{ config('app.name') }}</span>&nbsp;</a></label>
        </div>
    </div>
</header>