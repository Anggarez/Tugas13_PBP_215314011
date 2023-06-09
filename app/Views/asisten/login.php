<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
</head>
<body>
    <form action="/asisten/check" method="post">
        <?= csrf_field() ?>
        Username : <input type="text" name="usr" /><br>
        Password : <input type="text" name="pwd" /><br>
        <input type="submit" name= "submit" value="login">
    </form>
</body>
</html>