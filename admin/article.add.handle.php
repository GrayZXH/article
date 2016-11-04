<?php
	require_once('../connect.php');
	if ((isset($_POST['title'])&&(!empty($_POST['title'])))) {
			/*echo "<script>alert('标题不能为空');window.location.href='article.add.php'</script>";*/
		$title=$_POST['title'];
		$author=$_POST['author'];
		$content=$_POST['content'];
		$description=$_POST['description'];
		$dateline=time();

		$sql="INSERT INTO article(title,author,description,content,dateline) VALUES('$title','$author','$description','$content','$dateline')";
		//print_r($sql);
	if(mysqli_query($con,$sql)){
		echo "<script>alert('发布文章成功');window.location.href='article.add.php';</script>";
	}else{
		echo "<script>alert('发布失败');window.location.href='article.add.php';</script>";
	}
	}else{
		echo "<script>alert('标题不能为空');window.location.href='article.add.php'</script>";
}

?>