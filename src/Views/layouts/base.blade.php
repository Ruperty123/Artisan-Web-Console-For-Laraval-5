<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Console: @yield('title')</title>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,600' rel='stylesheet' type='text/css'>
    <link href="{{ asset('vendor/tzepifan/artisan-web-console/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/tzepifan/artisan-web-console/css/main.css') }}" rel="stylesheet">
</head>
<body>
    <script type="text/javascript">
        window.common         = {};
        window.common._token  = '{{csrf_token()}}';
        window.common.run_url = '{{url(config('artisan-web-console.routes_prefix').'/run')}}';
    </script>
    @yield('body')
    <script src="{{ asset('vendor/tzepifan/artisan-web-console/js/jquery-1.11.3.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('vendor/tzepifan/artisan-web-console/js/bootstrap.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('vendor/tzepifan/artisan-web-console/js/common.js') }}" type="text/javascript"></script>
    <script src="{{ asset('vendor/tzepifan/artisan-web-console/js/main.js') }}" type="text/javascript"></script>
</body>
</html>
