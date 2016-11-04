<?php 
      session_start();
      if (!empty($_SESSION['isLogin'])||$_SESSION['isLogin']=1){
      header('Location:article.manage.php');}
 ?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../img/favicon.ico">
    <title>登录</title>
    <!-- Bootstrap core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="../css/signin.css" rel="stylesheet">
  </head>

  <body>

    <div class="container">

      <form class="form-signin" role="form" action="doAction.php" method="post">
        <h2 class="form-signin-heading">账号登录</h2>
        <input class="form-control" name="username" placeholder="昵称" required autofocus>
        <input type="password" name="password" class="form-control" placeholder="密码" required>

<div class="input-group">
  <input type="verify" class="form-control" placeholder="验证码">
  <span class="input-group-addon"><a href="#"><img src="../img/captcha1.png"></a></span>
</div>
        <button class="btn btn-lg btn-success btn-block" type="submit">登录</button>
      </form>

    </div> <!-- /container -->


  </body>
</html>