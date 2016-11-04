<?php
		header('content-type:text/html;charset=utf-8');
		$username=$_POST['username'];
		$password=$_POST['password'];
		$link=mysqli_connect('localhost','root','ADMIN','user');
		$username=mysqli_real_escape_string($link,$username);
		$sql="SELECT id FROM admin WHERE username='{$username}' AND password='{$password}'";
		$result=mysqli_query($link,$sql);
		if ($result && mysqli_affected_rows($link)==1) {
			session_start();
			$_SESSION['username']=$username;
			$_SESSION['isLogin']=1;
			header("Location:article.manage.php");
		}else{
			header("Location:login.php");
		}

?>