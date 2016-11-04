<?php
      require_once('../connect.php');
      session_start();
      if (empty($_SESSION['isLogin'])||$_SESSION['isLogin']!=1){
      header('Location:login.php');
    }
      if (isset($_GET['id'])) {
        $id=$_GET['id'];
        $query=mysqli_query($con,"SELECT * FROM article WHERE id=$id");
        $data=mysqli_fetch_assoc($query);
      } else{
        header('Location:article.manage.php');
      }
?>
<!DOCTYPE html>
<html lang="cmn-Hans-CN">
<head>
  <meta charset="UTF-8">
<title>无标题文档</title>
<style type="text/css">
body {
  margin-left: 0px;
  margin-top: 0px;
  margin-right: 0px;
  margin-bottom: 0px;
}
</style>
</head>
<body>
<table width="100%" height="520" border="0" cellpadding="8" cellspacing="1" bgcolor="#000000">
  <tr>
    <td height="89" colspan="2" bgcolor="#FFFF99"><strong>后台管理系统</strong></td>
  </tr>
  <tr>
    <td width="213" height="287" align="left" valign="top" bgcolor="#FFFF99">
    <p><a href="article.add.php">发布文章</a></p>
    <p><a href="article.manage.php">管理文章</a></p>
    </td>
    <td width="854" valign="top" bgcolor="#FFFFFF">
    <form id="form1" name="form1" method="post" action="article.modify.handle.php">
      <input type="hidden" name="id" value="<?php echo $data['id'];?>" />
      <table width="590" border="0" cellpadding="8" cellspacing="1">
        <tr>
          <td colspan="2" align="center">修改文章</td>
          </tr>
        <tr>
          <td width="119">标题</td>
          <td width="437"><label for="title"></label>
            <input type="text" name="title" id="title" value="<?php echo $data['title']; ?>"/></td>
        </tr>
        <tr>
          <td>作者</td>
          <td><input type="text" name="author" id="author"  value="<?php echo $data['author'] ?>"/></td>
        </tr>
        <tr>
          <td>简介</td>
          <td><label for="description"></label>
            <textarea name="description" id="description" cols="60" rows="5"><?php echo $data['description'] ?></textarea></td>
        </tr>
        <tr>
          <td>内容</td>
          <td><textarea name="content" cols="60" rows="20" id="content"><?php echo $data['content'] ?></textarea></td>
        </tr>
        <tr>
          <td colspan="2" align="right"><input type="submit" name="button" id="button" value="提交" /></td>
          </tr>
      </table>
    </form></td>
  </tr>
  <tr>
    <td colspan="2" bgcolor="#FFFF99"><strong>版权所有</strong></td>
  </tr>
</table>
</body>
</html>