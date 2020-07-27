<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        @font-face {
            font-family: 'Raleway';
            src: url({{ public_path('/fonts/Raleway-Regular.ttf') }}) format("truetype");
            /* font-weight: 400; // use the matching font-weight here ( 100, 200, 300, 400, etc).
            font-style: normal; // use the matching font-style here */
        }

        main {
            font-family: Raleway, Arial, Helvetica, sans-serif;
        }

        .user-img {
            padding: 15px;
            border: 1px solid blue;
            box-shadow: 0 0 10px blue inset;
        }

        .user-img img {
            width: 138px;
            height: 138px;
            border-radius: 20px;
        }

    </style>
</head>
<body>
    <main>
        <div class="theme-header">
            <div class="user-img">
                <img src="{{ public_path('images/resume_builder/default-user.jpg') }}" alt="">
            </div>
        </div>
    </main>
</body>
</html>