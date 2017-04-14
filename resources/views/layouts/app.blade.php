<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name') }}</title>

    <!-- Styles -->
    <link href="{{asset('/assets/css/application.css')}}" rel="stylesheet">
    <link href="{{asset('/assets/css/toolkit-light.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link href="{{asset('/css/style.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="/css/bootstrap-social.css">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

    @yield('css')

    <!-- Scripts -->
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>
</head>
<body>

    @yield('content')

    <footer>
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <label>Impressum</label>
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-6">
                                <address>
                                    <h5>Fachschaft Biologie</h5>
                                    <p>Universitätsstraße 10</p>
                                    <p>78464 Konstanz</p>
                                    <p>Telefon intern: 4188</p>
<!--                                    <p>E-Mail: <a href="mailto:fachschaft.biologie@uni-konstanz.de">fachschaft.biologie@uni-konstanz.de</a></p> -->
                                    <p>Raum: <a href="https://www.fachschaft.biologie.uni-konstanz.de/ueber-uns/wo-wir-zu-finden-sind/" target="_blank">M612</a></p>
                                </address>
                            </div>
                            <div class="col-md-6">
                                <h5>Autoren</h5>
                                <address>
                                    Mathias Leopold

                                    Patrick M&ouml;ser
                                </address>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-5">
                    <label>&Uuml;ber uns</label>
                    <p>
                        Wir, die Fachschaft Biologie, setzen uns aus Studenten verschiedener Semester zusammen, die sich für eure Interessen an der Uni einsetzten. Einerseits in dem wir euch in den verschiedensten Gremien und R&auml;ten der Universit&auml;t vertreten, andererseits in dem wir eurer Meinung auch bei Professoren Geh&ouml;r verleihen. Dar&uuml;ber hinaus stehen wir euch bei Fragen, Problemen oder Anliegen als Ansprechpartner zur Verf&uuml;gung.
                    </p>
                </div>
                <div class="col-md-3">
                    <ul class="nav nav-bordered nav-stacked">
                        <li><a href="https://www.fachschaft.biologie.uni-konstanz.de/" class="icon icon-home" target="_blank"> Fachschaft</a></li>
                        <li><a href="mailto:fachschaft.biologie@uni-konstanz.de" class="icon icon-mail" target="_blank"> Mail schreiben</a></li>
                        <li class="nav-divider"></li>
                        <li><a href="https://www.facebook.com/FachschaftBioKonstanz" class="icon icon-facebook" target="_blank"> Facebook</a></li>
                        <li><a href="https://twitter.com/FsBioKn" class="icon icon-twitter" target="_blank"> Twitter</a></li>
                        <li><a href="https://www.youtube.com/user/UniversitaetKonstanz" class="icon icon-youtube" target="_blank"> YouTube</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>

    <!-- Scripts -->
    <script src="/js/app.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <script src="{{ asset('js/application.js') }}"></script>


    @yield('JS')

</body>
</html>
