<html class="dark-modee" lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" media="screen" href="{{asset('assets/css/vendor/boxicons/css/boxicons.min.css')}}" />
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    <title>Laravel</title>
</head>

<body class="antialiased">
    <div id="app">
        <router-view></router-view>
    </div>

    @auth
    <script>
        window.user = {
                id: '{{auth('sanctum')->user()->id}}',
                username: '{{auth('sanctum')->user()->username}}',
                email: '{{auth('sanctum')->user()->email}}',
                isVerified: {{auth('sanctum')->user()->email_verified_at == null ? 1 :2}},
                isAdmin: {{auth('sanctum')->user()->is_superuser}}
            }
    </script>
    @endauth

    <script src="{{ mix('js/app.js') }}"></script>
</body>

</html>
