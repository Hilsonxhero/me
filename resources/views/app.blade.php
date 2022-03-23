<html class="dark-modee" lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link
    rel="stylesheet"
    media="screen"
    href="{{asset('assets/css/vendor/boxicons/css/boxicons.min.css')}}"
  />
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    <title>Laravel</title>
</head>

<body class="antialiased">
    <div id="app">
        <router-view></router-view>
    </div>
    <script src="{{ mix('js/app.js') }}"></script>
</body>

</html>
