@extends('layouts.app')

@section('content')

    <section class="container-fluid">
        <div class="row">
            <div class="col-xs-12 col-md-6 col-md-offset-3">
                <div class="panel">
                    @include('panels.heading')
                    <div class="panel-body">
                        @include('auth.forms.login')
                    </div>
                </div>
            </div>
        </div>

    </section>

    <section class="container">

        <h1>Willkommen</h1>
        <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa.
            Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec,
            pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec,
            vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede
            mollis pretium. Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus.
            Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis,
            feugiat a, tellus. Phasellus viverra nulla ut metus varius laoreet. Quisque rutrum. Aenean imperdiet.
            Etiam ultricies nisi vel augue. Curabitur ullamcorper ultricies nisi. Nam eget dui. Etiam rhoncus. Maecenas tempus,
            tellus eget condimentum rhoncus, sem quam semper libero, sit amet adipiscing sem neque sed ipsum. Nam quam nunc,
            blandit vel, luctus pulvinar, hendrerit id, lorem. Maecenas nec odio et ante tincidunt tempus. Donec vitae sapien ut
            libero venenatis faucibus. Nullam quis ante. Etiam sit amet orci eget eros faucibus tincidunt. Duis leo. Sed fringilla
            mauris sit amet nibh. Donec sodales sagittis magna. Sed consequat, leo eget bibendum sodales, augue velit cursus nunc!</p>

    </section>

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

@include('modals.forgot')
@include('modals.register')

@endsection

