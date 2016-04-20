<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}"/>

    <!-- Styles -->
    <link href="{{ asset('/css/app.bundle.css') }}" type="text/css" rel="stylesheet">
    <link href="{{ asset('/css/app.css') }}" type="text/css" rel="stylesheet">
    {{-- <link href="{{ elixir('css/app.css') }}" rel="stylesheet"> --}}

    <!-- Scripts -->
    <script src="{{ asset('/js/app.bundle.js') }}" type="text/javascript"></script>
    <script src="{{ asset('/js/app.js') }}" type="text/javascript"></script>
    {{-- <script src="{{ elixir('js/app.js') }}"></script> --}}

    @yield('header_scripts')

    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <title>@yield('title')</title>
</head>
<body style="padding-top: 70px;">

<nav class="navbar navbar-default navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false">
                <span class="sr-only">Меню</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="{{ route('index') }}">Laravel CMS</a>
        </div>
        <div class="collapse navbar-collapse" id="navbar">
            <ul class="nav navbar-nav">
                <li><a href="{{ route('page.show', 'o-kompanii') }}">О компании</a></li>
                <li><a href="{{ route('page.show', 'kontakty') }}">Контакты</a></li>
                <li><a href="{{ route('articles') }}">Статьи</a></li>
                <li><a href="{{ route('news') }}">Новости</a></li>
                <li><a href="{{ route('galleries') }}">Фотогалерея</a></li>
                <li><a href="{{ route('feedback') }}">Обратная связь</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="{{ url('login') }}">Вход</a></li>
                <li><a href="{{ url('register') }}">Регистрация</a></li>
            </ul>
        </div>
    </div>
</nav>

@yield('slides')

<section id="main">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-4">
                <p class="lead">Каталог</p>
                @include('partials._categories')
            </div>
            <div class="col-lg-9 col-md-8">
                @yield('content')
            </div>
        </div>
    </div>
</section>

<footer>
    <div class="container">
        <div class="row">
            <div class="copyright">копирайт</div>
        </div>
        <div class="row">
            <ul>
                <li><a href="{{ route('index') }}">Главная</a></li>
                <li><a href="{{ route('page.show', 'o-kompanii') }}">О компании</a></li>
                <li><a href="{{ route('page.show', 'kontakty') }}">Контакты</a></li>
            </ul>
        </div>
    </div>
</footer>

@include('partials._callback')
@include('partials._flash')
@yield('footer_scripts')
@include('partials._metrika')
</body>
</html>