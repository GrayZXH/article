<?php
		require_once('../connect.php');
		$id=$_GET['id'];
		$delsql="DELETE FROM article WHERE id=$id";
		if(mysqli_query($con,$delsql)){
			echo "<script> alert('删除文章成功');window.location.href='article.manage.php'</script>";
		}else{
			echo "<script> alert('删除文章失败');window.location.href='article.manage.php'";
		}

?>