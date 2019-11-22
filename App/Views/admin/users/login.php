<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
</head>
<body>
<div style="margin-left: 100px;
    margin-top: 50px;">

    <?php if($errors) {
         echo implode('<br>', $errors);
    } ?>
<form action="<?php echo url('/admin/login/submit')  ?>" method="post">
    <label for="email">Email</label>
    <input type="email" name="email" id="email" style="margin-left: 70px;height: 30px"><br><br><br>

    <label for="password">Password</label>
    <input type="password" name="password" id="password" style="margin-left: 46px;height: 30px"><br><br><br>

    <label for="rememberMe">Remember Me</label>
    <input type="checkbox" name="remember" id="rememberMe">  <br><br><br>

    <button type="submit" name="submit"  style="width: 190px;
    height: 30px;"></button>
</form>
</div>
</body>
</html>