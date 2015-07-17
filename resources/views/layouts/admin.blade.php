<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="An application for managing DNS and mailboxes">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin - @yield('title', 'Panel Administrador')</title>

    <link href="https://fonts.googleapis.com/css?family=Roboto:regular,bold,italic,thin,light,bolditalic,black,medium&amp;lang=en" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="{{ elixir('css/app.css') }}">
    <link rel="stylesheet" href="{{ elixir('css/admin.css') }}">
</head>
<body>
    <div class="admin-layout mdl-layout mdl-js-layout mdl-layout--fixed-drawer mdl-layout--fixed-header">
        <header class="admin-header mdl-layout__header mdl-color--white mdl-color--grey-100 mdl-color-text--grey-600">
            <div class="mdl-layout__header-row">
                <span class="mdl-layout-title">Home</span>
                <div class="mdl-layout-spacer"></div>
                <button class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--icon" id="hdrbtn">
                    <i class="material-icons">more_vert</i>
                </button>
                <ul class="mdl-menu mdl-js-menu mdl-js-ripple-effect mdl-menu--bottom-right" for="hdrbtn">
                    <li class="mdl-menu__item">
                        <a href="/auth/logout">Logout</a>
                    </li>
                </ul>
            </div>
        </header>
        <div class="admin-drawer mdl-layout__drawer mdl-color--blue-grey-900 mdl-color-text--blue-grey-50">
            <header class="admin-drawer-header">
                <img src="/images/avatars/avatar{{ $avatarId }}.png" class="admin-avatar">
                <div class="admin-avatar-dropdown">
                    <span>{{ Auth::user()->email }}</span>
                </div>
            </header>
            <nav class="admin-navigation mdl-navigation mdl-color--blue-grey-800">
                <a class="mdl-navigation__link" href="/home">
                    <i class="mdl-color-text--blue-grey-400 material-icons">home</i>Home
                </a>
                <a class="mdl-navigation__link" href="{{action("PowerdnsDomainController@index")}}">
                    <i class="mdl-color-text--blue-grey-400 material-icons">device_hub</i>DNS
                </a>
                <a class="mdl-navigation__link" href="{{action("PostfixDomainController@index")}}">
                    <i class="mdl-color-text--blue-grey-400 material-icons">email</i>Mailboxes
                </a>
            </nav>
        </div>
        <main class="mdl-layout__content mdl-color--grey-100 content-wrapper">
            @yield('content')
        </main>
    </div>
    <script src="{{ elixir('js/scripts.js') }}"></script>
    @yield('footer')
</body>
</html>
