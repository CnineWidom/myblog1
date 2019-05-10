<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @section('script')
    <script src="https://cdn.staticfile.org/jquery/1.10.2/jquery.min.js"></script>
    @show
    <title>@yield('title')</title>
</head>
    <body>
    <div style="width: 100%;height: 40px;background-color:#25cdeb;margin-top: 0px;">
        @if ($user != null)
            <p style="display: inline;float: right">欢迎：{{$user}}</p>
            <a href="">退出</a>
        @else <a href="dologin">登录</a>
        @endif
        <p style="float: right">头像<img style="height: 40px;width: 40px;" src="{{$image}}"  alt=""></p>
    </div>
    @section('sidebar')
        <p>这是主页栏</p>
    @show
    <div class="conitner">
        @yield('content')
    </div>

    <div class="footer">
        <p style="color: #cccccc;font-size: 12px;text-align: center">相关信息请联系相关人员</p>
    </div>
    </body>
</html>
