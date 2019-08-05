<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{--<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    --}}<title>Document</title>
</head>
<body>
<form action="{{route('check-login')}}" method="POST">
    <fieldset style="width: 200px;margin: 0 auto">
        <legend>Login</legend>
        <table>
            <tr>
                <th>Email:</th>
                <th><input type="text" name="email"></th>
            </tr>
            <tr>
                <th>Password:</th>
                <th><input type="password" name="password"></th>
            </tr>
        </table>
        <div style="width: 100%;text-align: right;margin-top: 10px;">
            {{csrf_field()}}
        <input type="submit">
        </div>


    </fieldset>
</form>


</body>
</html>
