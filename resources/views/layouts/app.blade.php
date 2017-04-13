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
    <link href="{{asset('/assets/css/application.css')}}" rel="stylesheet">
    <link href="{{asset('/assets/css/toolkit-light.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link href="{{asset('/css/style.css')}}" rel="stylesheet">

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
                    <label>Footer</label>
                </div>
                <div class="col-md-6">
                    <ul class="nav nav-bordered nav-stacked">
                        <li><a href="#" class="icon icon-facebook"> Facebook</a></li>
                        <li><a href="#" class="icon icon-twitter"> Twitter</a></li>
                        <li><a href="#" class="icon icon-google-plus"> Google+</a></li>
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
