<?php
		require_once('config.php');
		$con=mysqli_connect(HOST,USERNAME,PASSWORD);
		if (!$con) {
			die("数据库连接错误:". mysqli_connect_error());
		}
		if (!(mysqli_select_db($con,"info"))){
			echo "数据库连接错误！";
		}
?>