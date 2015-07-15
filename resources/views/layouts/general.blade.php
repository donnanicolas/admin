<!doctype html>

<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="A front-end template that helps you build fast, modern mobile web apps.">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin - @yield('title', 'Bienvenido')</title>

    <link href="https://fonts.googleapis.com/css?family=Roboto:regular,bold,italic,thin,light,bolditalic,black,medium&amp;lang=en" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="{{ elixir('css/app.css') }}">
    <link rel="stylesheet" href="{{ elixir('css/general.css') }}">
</head>
<body>
    <div class="general mdl-layout mdl-js-layout has-drawer is-upgraded">
        <main class="mdl-layout__content">
            <div class="general__posts mdl-grid">
                @yield('content')
            </div>
            <footer class="mdl-mini-footer">
                <div class="mdl-mini-footer--left-section">
                    <button class="mdl-mini-footer--social-btn social-btn social-btn__twitter"></button>
                    <button class="mdl-mini-footer--social-btn social-btn social-btn__blogger"></button>
                    <button class="mdl-mini-footer--social-btn social-btn social-btn__gplus"></button>
                </div>
                <div class="mdl-mini-footer--right-section">
                    <button class="mdl-mini-footer--social-btn social-btn__share"><i class="material-icons">share</i></button>
                </div>
            </footer>
        </main>
        <div class="mdl-layout__obfuscator"></div>
    </div>
    <script src="{{ elixir('js/scripts.js') }}"></script>
    @yield('footer')
</body>
</html>
