<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!--
    <script src="https://cdnjs.cloudflare.com/ajax/libs/socket.io/2.0.4/socket.io.js"></script>
    -->

    <title>{{ isset($title) ? $title : config('app.name', 'devports') }}</title>

    <meta name="description" content="{{isset($metaDescription) ? $metaDescription : 'devports. personal project of Daniel Koch.'}}">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <!-- Google Wemaster Tools -->
    <meta name="google-site-verification" content="jqTUkbWXUL9z1jrnFzBx8X0-GG_WzaNUyu6cv3RIHVM" />
    </head>
<body>

<div id="app">

    <div class="container">
        @guest

        @else

        @endguest

        <div class="col-md-12">

            @yield('content')

        </div>

    </div>

</div>


<!-- Scripts -->
<script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
