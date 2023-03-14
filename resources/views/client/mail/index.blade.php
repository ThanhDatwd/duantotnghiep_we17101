<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h3>{{$token}}</h3>
    <a href="{{route('clientverify-email',["token"=>$token])}}">Xác nhận qua link</a>
    <form action="{{route('clientregister')}}" method="post">
        <input type="text" name="email">
        <input type="text" name="username">
        <input type="text" name="password">
        <button class="btn btn-success" type="submit">Xác nhận</button>
    </form>
</body>
</html>