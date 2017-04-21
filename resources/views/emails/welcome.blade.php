<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="jmunGb3tzhxnvLv5PLvRlngXqbHWC4CZQhuMwWXP">

    <title>Laravel</title>

    <!-- Styles -->
    <link href="http://phplib.local.com/css/app.css" rel="stylesheet">

    <!-- Scripts -->
    <script>
        window.Laravel = {"csrfToken":"jmunGb3tzhxnvLv5PLvRlngXqbHWC4CZQhuMwWXP"}    </script>
</head>
<body>
<div id="app">
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Hi，{{ $user->name }}
                    </div>
                    <div class="panel-body">
                        This is your own Phplib.
                        <br>
                        您的登录邮箱是：{{ $user->email }}，点击 <a href="http://phplib.local.com" target="_blank">登录</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Scripts -->
<script src="/js/app.js"></script>
</body>
</html>
