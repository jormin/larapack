<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="/css/app.css" rel="stylesheet">
    <link href="https://cdn.bootcss.com/font-awesome/4.7.0/css/font-awesome.css" rel="stylesheet">

    @stack('styles')
    <style>
        .follow-wrap{
            padding-top: 30px;
        }
        .table{
            word-break:break-all; word-wrap:break-all;
        }
        .footer{
            padding: 30px;
        }
    </style>
    <!-- Scripts -->
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ url('/') }}">
                        {{ config('app.name', 'Laravel') }}
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        <li class="@if(Route::currentRouteName() == 'country') active @endif">
                            <a href="{{ route('country') }}">
                                国家
                            </a>
                        </li>
                        <li class="@if(Route::currentRouteName() == 'agent') active @endif">
                            <a href="{{ route('agent') }}">
                                UA
                            </a>
                        </li>
                        <li class="@if(Route::currentRouteName() == 'ddoc') active @endif">
                            <a href="{{ route('ddoc') }}">
                                数据字典
                            </a>
                        </li>
                        <li class="@if(Route::currentRouteName() == 'pinyin.index') active @endif">
                            <a href="{{ route('pinyin.index') }}">
                                拼音
                            </a>
                        </li>
                        <li class="@if(Route::currentRouteName() == 'emails.index') active @endif">
                            <a href="{{ route('emails.index') }}">
                                邮件
                            </a>
                        </li>
                        <li class="@if(Route::currentRouteName() == 'cars.index') active @endif">
                            <a href="{{ route('cars.index') }}">
                                汽车
                            </a>
                        </li>
                        <li class="@if(Route::currentRouteName() == 'logs') active @endif">
                            <a href="{{ route('logs') }}">
                                日志
                            </a>
                        </li>
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @if (Auth::guest())
                            <li><a href="{{ url('/login') }}">登录</a></li>
                            <li><a href="{{ url('/register') }}">注册</a></li>
                        @else
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a href="{{ route('user.follow') }}">
                                            关注
                                        </a>
                                    </li>
                                    <li class="divider"></li>
                                    <li>
                                        <a href="{{ url('/logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            退出
                                        </a>

                                        <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
        </nav>

        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    @include('errors._success')
                    @include('errors._errors')
                </div>
            </div>
        </div>

        @yield('content')
    </div>

    @include('common.footer')

    <!-- Scripts -->
    <script src="/js/app.js"></script>
    @stack('scripts')
</body>
</html>
