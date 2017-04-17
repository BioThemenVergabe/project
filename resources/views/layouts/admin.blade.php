<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Wahlsystem Biologie - Adminbereich</title>

    <!-- Styles -->
    <link href="{{asset('/assets/css/application.css')}}" rel="stylesheet">
    <link href="{{asset('/assets/css/toolkit-light.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link href="{{asset('/css/style.css')}}" rel="stylesheet">



</head>
<body>
<nav class="navbar navbar-default">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="/">Wahlsystem Biologie</a>
        </div>
        <div class="navbar-collapse">
            <ul class="nav navbar-nav navbar-right">
                @yield('links')
                <li><a href="#"><span class="glyphicon glyphicon-log-out" aria-hidden="true"></span></a></li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>

@yield('content')

@include('footer')

<!-- Scripts -->
<script src="/js/app.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="{{ asset('/js/functions.js') }}"></script>

</body>
</html>