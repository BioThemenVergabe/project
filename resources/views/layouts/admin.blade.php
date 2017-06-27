<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Wahlsystem Biologie - Adminbereich</title>

    <!-- Styles -->
    <link href="{{asset('/assets/css/application.css')}}" rel="stylesheet">
    <link href="{{asset('/assets/css/toolkit-light.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link href="{{asset('/css/style.min.css')}}" rel="stylesheet">



</head>
<body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

@include('partials.header')

@yield('content')

@include('footer')

<!-- Scripts -->
<script src="{{ asset('/js/application.min.js') }}"></script>
<script src="{{ asset('/js/functions.min.js') }}"></script>

</body>
</html>