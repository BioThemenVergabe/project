<header>
    <div class="container">
        <div class="row">
            <nav class="pull-right">
                <div class="btn-group" role="group" aria-label="...">
                    @yield('links')
                    @include('partials.lang')
                    <a href="/logout" class="btn btn-danger btn-sm icon icon-log-out"></a>
                </div>
            </nav>
            <label id="logo">{{ config('app.name') }}</label>
        </div>
    </div>
</header>