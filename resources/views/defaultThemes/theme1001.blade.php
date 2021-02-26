<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="csrf-token" content="{{ csrf_token() }}">
    {{--<link href="/css/themes/theme1001.css" rel="stylesheet">--}}
    <title>civ.ie</title>
    <link href="/css/themes/theme1001.css" rel="stylesheet">
    <link rel="icon" href="/images/welcome_landing_page/logo/civie_logo_res-01.png" type="image/x-icon">
</head>
<body>

<div class="theme1001-container">

    @include('defaultThemes.Default.themeBase')

</div>

<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script type="text/javascript" src="/js/themes/theme1001.js"></script>

</body>
</html>

