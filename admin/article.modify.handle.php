<?php
		require_once('../connect.php');
		if (!(isset($_POST['title'])&&(!empty($_POST['title'])))) {
			echo "<script>alert('标题不能为空');window.location.href='article.add.php'</script>";
		}
		$id=$_POST['id'];
		$title=$_POST['title'];
		$author=$_POST['author'];
		$content=$_POST['content'];
		$description=$_POST['description'];
		$dateline=time();

		$updatesql="UPDATE article SET title='$title',author='$author',description='$description',content='$content',dateline='$dateline' WHERE id='$id'";
		//print_r($sql);
			if(mysqli_query($con,$updatesql)){
		echo "<script>alert('文章修改成功');window.location.href='article.manage.php';</script>";
	}else{
		echo "<script>alert('文章修改失败');window.location.href='article.manage.php';</script>";
	}

?>