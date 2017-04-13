<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
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
                <div class="col-md-4 col-md-offset-1">
                    <h3>Fachschaft Biologie</h3>
                    <p>Universitätsstraße 10</p>
                    <p>78464 Konstanz</p>
                    <p>Telefon intern: 4188</p>
                    <p>E-Mail: <a href="mailto:fachschaft.biologie@uni-konstanz.de">fachschaft.biologie@uni-konstanz.de</a></p>
                    <p>Raum: <a href="https://www.fachschaft.biologie.uni-konstanz.de/ueber-uns/wo-wir-zu-finden-sind/" target="_blank">M612</a></p>
                    <!--Universitätsstraße 10
                    78464 Konstanz
                    Raum: M612-->
                </div>
                <div class="col-md-5 col-md-offset-1">
                    <h3>Über Uns</h3>
                    <p>
                        Wir, die Fachschaft Biologie, setzen uns aus Studenten verschiedener Semester zusammen, die sich für eure Interessen an der Uni einsetzten. Einerseits in dem wir euch in den verschiedensten Gremien und Räten der Universität vertreten, andererseits in dem wir eurer Meinung auch bei Professoren Gehör verleihen. Darüber hinaus stehen wir euch bei Fragen, Problemen oder Anliegen als Ansprechpartner zur Verfügung.
                    </p>
                </div>
            </div>
            <div class="top-buffer row">
                <div class="col-md-6 col-md-offset-3">
                    <hr>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 col-md-offset-4">
                    <p>
                        <a class="btn btn-social-icon btn-reddit" href="https://www.fachschaft.biologie.uni-konstanz.de/" target="_blank"><span class="glyphicon glyphicon-home"></span></a>|
                        <a class="btn btn-social-icon btn-github" href="mailto:fachschaft.biologie@uni-konstanz.de" target="_blank"><span class="glyphicon glyphicon-envelope"></span></a>|
                        <a class="btn btn-social-icon btn-facebook" href="https://www.facebook.com/FachschaftBioKonstanz" target="_blank"><span class="fa fa-facebook"></span></a>|
                        <a class="btn btn-social-icon btn-twitter" href="https://twitter.com/FsBioKn" target="_blank"><span class="fa fa-twitter"></span></a>|
                        <a class="btn btn-social-icon btn-pinterest" href="https://www.youtube.com/user/UniversitaetKonstanz" target="_blank"><span class="fa fa-youtube-play"></span></a>
                    </p>
                    <p>Autoren: Matthias Leopold & Patrick Möser <span class="glyphicon glyphicon-copyright-mark"></span> 2016</p>
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
