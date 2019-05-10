<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>个人页面测试</title>
</head>
<body>
<form action="dologin" method="post">
    {{ csrf_field() }}
    账号：<input type="text" name="account">
    @if ($errors->has('account'))
        <p>{{$errors->first('account')}}</p>
    @endif
    密码: <input type="password" name="password">
    <input type="submit" value="提交">
    @if ($errors->has('password'))
        <p>{{$errors->first('password')}}</p>
    @endif
</form>
</body>
</html>