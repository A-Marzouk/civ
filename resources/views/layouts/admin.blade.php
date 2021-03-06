<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="/css/app-vuetify.css" rel="stylesheet">


    <title>Resume builder</title>
    <link rel="icon" href="/images/welcome_landing_page/logo/civie_logo_res-01.png" type="image/x-icon">
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

</head>
<body>
    @yield('content')

    <div class="flying-notification" id="flyingNotification" style="bottom: 70px;">
        <div style="display: flex; align-items: center; justify-content: center; width: 100%">
            <img src="" id="flyingNotificationIconSrc" alt="notification modal">
            <div class="text" id="flyingNotificationText"></div>
        </div>
    </div>

    <div class="flying-notification delete" id="flyingNotificationDelete" style="bottom: 70px;">
        <div style="display: flex; align-items: center; justify-content: center; width: 100%">
            <img src="/images/resume_builder/delete-icon-red.png" alt="notification modal">
            <div class="text">Deleted</div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script type="text/javascript" src="/js/app.js"></script>
</body>
</html>
