<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-color-mode="auto" data-light-theme="light"
      data-dark-theme="dark">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <title>{{ config('app.name') }}</title>

    @livewireStyles
</head>
<body>

<div class="Header">
    <div class="Header-item">
        <a href="#" class="Header-link f4 d-flex flex-items-center">
            <img class="mr-2" height="24" src="{{ asset('images/logo.svg') }}" alt="{{ config('app.name') }}"/>
            <span>Бастион</span>
        </a>
    </div>
    <div class="Header-item Header-item--full">
        <div class="Header-item">
            <a href="{{ route('server.index') }}" class="Header-link">Список серверов</a>
        </div>
        <div class="Header-item">
            <a href="{{ route('user.index') }}" class="Header-link">Пользователи</a>
        </div>
    </div>
    <div class="Header-item mr-0">
        <details class="dropdown details-reset details-overlay d-inline-block">
            <summary aria-haspopup="true">
                <img class="avatar avatar-5 mr-2" alt="jonrohan" src="https://github.com/jonrohan.png?v=3&s=48"/>
            </summary>

            <ul class="dropdown-menu dropdown-menu-sw">
                <li><a class="dropdown-item" href="#">Профиль</a></li>
            </ul>
        </details>
    </div>
</div>

<div class="px-5 py-3">
    @yield('content')
</div>

<div class="footer container-xl p-responsive">
    <div
        class="position-relative d-flex flex-row-reverse flex-lg-row flex-wrap flex-lg-nowrap flex-justify-center flex-lg-justify-between pt-6 pb-2 mt-6 f6 color-text-secondary border-top color-border-secondary ">
        <ul class="list-style-none d-flex flex-wrap col-12 col-lg-5 flex-justify-center flex-lg-justify-between mb-2 mb-lg-0">
            <li class="mr-3 mr-lg-0">© {{ date('Y') }} Bastion.</li>
        </ul>
    </div>
    <div class="d-flex flex-justify-center pb-6">
        <span class="f6 color-text-tertiary"></span>
    </div>
</div>

@livewireScripts
<script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
<script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
