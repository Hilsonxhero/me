<html class="dark-mode" lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="description" content="">
    <meta name="keywords" content="">
    <link rel="canonical" href="https://hilsonxhero.com" />
    <meta property="og:title" content="" />
    <meta property="og:description" content="" />
    <meta property="og:url" content="https://hilsonxhero.com" />
    <meta property="og:site_name" content="" />
    <meta property="og:brand" content="" />
    <meta property="og:locale" content="en" />

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@700&display=swap" rel="stylesheet">

    <link rel="stylesheet" media="screen" href="{{ asset('assets/css/vendor/boxicons/css/boxicons.min.css') }}" />
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    <title>hilsonxhero</title>
</head>

<body class="antialiased">
    <div id="app">
        <router-view></router-view>
    </div>

    @auth
        <script>
            window.user = {
                id: '{{ auth('sanctum')->user()->id }}',
                username: '{{ auth('sanctum')->user()->username }}',
                email: '{{ auth('sanctum')->user()->email }}',
                isVerified: {{ auth('sanctum')->user()->email_verified_at == null ? 1 : 2 }},
                isAdmin: {{ auth('sanctum')->user()->is_superuser }}
            }
        </script>
    @endauth

    <script src="{{ mix('js/app.js') }}"></script>
</body>

</html>
