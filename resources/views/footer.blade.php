<footer>
    <div class="container">
        <div class="row">
            <div class="col-xs-12" id="footerContact">
                <ul class="nav nav-bordered">
                    <li><a href="https://www.fachschaft.biologie.uni-konstanz.de/" class="icon icon-home" target="_blank"> @lang('footer.faculty')</a></li>
                    <li><a href="mailto:{{ config('mail.username') }}" class="icon icon-mail" data-action="mailContact"> @lang('footer.mail')</a></li>
                    <!--<li><a href="mailto:fachschaft.biologie@uni-konstanz.de" class="icon icon-mail" target="_blank"> @lang('footer.mail')</a></li>-->
                    <li class="nav-divider"></li>
                    <li><a href="https://www.facebook.com/FachschaftBioKonstanz" class="icon icon-facebook" target="_blank"> Facebook</a></li>
                    <li><a href="https://twitter.com/FsBioKn" class="icon icon-twitter" target="_blank"> Twitter</a></li>
                    <li><a href="https://www.youtube.com/user/UniversitaetKonstanz" class="icon icon-youtube" target="_blank"> YouTube</a></li>
                </ul>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12">
                <div class="hr-divider-heading"></div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-7">
                <label>@lang('footer.impress')</label>
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-8 no-padding">
                            <address>
                                <label>@lang('footer.representative')</label>
                                <p>Universitätsstraße 10</p>
                                <p>78464 Konstanz</p>
                                <p>@lang('footer.phone'): 4188</p>
                                <p>@lang('fields.mailB'): {{ config('mail.username') }}</p>
                                <p>@lang('fields.room'): <a href="https://www.fachschaft.biologie.uni-konstanz.de/ueber-uns/wo-wir-zu-finden-sind/" target="_blank">M612</a></p>
                            </address>
                        </div>
                        <div class="col-md-4 no-padding">
                            <label>@lang('footer.authors')</label>
                            <div class="row">
                                <address class="col-xs-6 col-md-12">
                                    Mathias Leopold<br>
                                </address>
                                <address class="col-xs-6 col-md-12">
                                    Patrick M&ouml;ser
                                </address>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-5">
                <label>@lang('footer.whois')</label>
                <p>@lang('footer.introduction')</p>
            </div>
        </div>
    </div>
</footer>