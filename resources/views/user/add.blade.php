<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>添加用户</title>
</head>
<body>
    <form method="post" action="{{ url('user/update/submit') }}">
        <table>
            <tr>
                <td>用户名</td>
                <td><input type="text" name="username" value=""></td>
            </tr>
            <tr>
                <td>密码</td>
                <td><input type="password" name="password" value=""></td>
            </tr>
        </table>
        {{ csrf_field() }}
        <input type="submit" value="提交">
        <input type="button" value="用户列表" onclick="window.location.href='{{url('user/list')}}'">
    </form>
</body>
</html>