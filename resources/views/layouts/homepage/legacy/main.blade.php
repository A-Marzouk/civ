<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link href="/css/homepage/main.css" rel="preload" as="style">
    <link href="/css/homepage/main.css" rel="stylesheet">


    <title>civ.ie</title>
    <link rel="icon" href="/images/welcome_landing_page/logo/civie_logo_reficon.png" type="image/x-icon">

</head>
<body style="margin: 0 !important;">
    @yield('content')

    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script type="text/javascript" src="/js/homepage/main.js"></script>
</body>
</html>
