<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="/css/app.css" rel="stylesheet">
    <title>civ.ie</title>
    <link rel="icon" href="/images/welcome_landing_page/logo/civie_logo_res-01.png" type="image/x-icon">
</head>
<body >
    <div id="resumeTheme1001">
        <resume-theme-1001 @if(isset($user)) :user="{{$user}}" @endif :is_preview="{{$is_preview}}"></resume-theme-1001>
    </div>

    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script type="text/javascript" src="/js/app.js"></script>

</body>
</html>

