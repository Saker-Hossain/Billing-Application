<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>All Bill</title>
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">

    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>
    <link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" />
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
</head>

<body>
    <div class="container">
        @yield('content')
    </div>


    {{-- <script src="{{ asset('js/jquery-3.6.0.min.js') }}"></script> --}}

</body>
@yield('js-scripts')

</html>
