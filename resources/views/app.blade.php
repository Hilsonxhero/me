<html class="dark-modee" lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="#">
    <meta name="description" content="مشاهده روزمه و نمونه کارهای امیرحسین وطن دوست">
    <meta name="keywords"
        content="hilsonxhero,xhero, hilsonxhero cv , امیرحسین وطن دوست , رزومه امیرحسین وطن دوست , طراحی وب توسعه نرم افزار">
    <link rel="canonical" href="https://hilsonxhero.com" />
    <meta property="og:title" content="درباره امیرحسین وطن دوست" />
    <meta property="og:description" content="مشاهده رزومه و نمونه کارهای امیرحسین وطن دوست" />
    <meta property="og:url" content="https://hilsonxhero.com" />
    <meta property="og:site_name" content="hilsonxhero" />
    <meta property="og:brand" content="hilsonxhero" />
    <meta property="og:locale" content="en" />
{{-- 
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin> --}}
    {{-- <link href="https://fonts.googleapis.com/css2?family=Koulen&family=Roboto+Condensed&family=Water+Brush&display=swap"
        rel="stylesheet"> --}}
    <link rel="stylesheet" media="screen" href="{{ asset('assets/css/vendor/boxicons/css/boxicons.min.css') }}" />
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    <title>hilsonxhero - امیر حسین وطن دوست</title>
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

    <!-- Global site tag (gtag.js) - Google Analytics -->
    {{-- <script async src="https://www.googletagmanager.com/gtag/js?id=G-1Q2LFGBXPJ"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }

        gtag('js', new Date());

        gtag('config', 'G-1Q2LFGBXPJ');
    </script> --}}
</body>

</html>
