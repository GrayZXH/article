<?php
      header('content-type:text/html;charset=utf-8');
      session_start();
      if (empty($_SESSION['isLogin'])||$_SESSION['isLogin']!=1){
      header('Location:login.php');
    }
      require_once('./page.class.php');
      require_once('../connect.php');

      $countSQL="SELECT COUNT(*) FROM article";
      $num_query=mysqli_query($con,$countSQL);
      $rs=mysqli_fetch_array($num_query);
      $count=$rs[0];//所有数据条数
      $pagesize=10;
      $pagenum=ceil($count/$pagesize);
      $page=(isset($_GET['page'])&&($_GET['page'])<=$pagenum)?$_GET['page']:1;
      
      $sql="SELECT * FROM article ORDER BY dateline DESC LIMIT ".($page-1)*$pagesize.",".$pagesize;
      $query=mysqli_query($con,$sql);
      if ($query&&mysqli_num_rows($query)) {
        while ($row=mysqli_fetch_assoc($query)) {
            $item[]=$row;
        }
      }else{
        $item=array();
      }
?>


<!DOCTYPE html>
<html lang="cmn-Hans-CN">
<head>
  <meta charset="UTF-8">
  <title>Document</title>
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
    <td width="156" height="287" align="left" valign="top" bgcolor="#FFFF99">
    <p>欢迎您<?php echo $_SESSION['username'] ?></p>
    <p><a href="article.add.php">发布文章</a></p>
    <p><a href="article.manage.php">管理文章</a></p>
    <p><a href="logout.php">退出登录</a></p>
    </td>
    <td width="837" valign="top" bgcolor="#FFFFFF">
    <table width="743" border="0" cellpadding="8" cellspacing="1" bgcolor="#000000">
      <tr>
        <td colspan="3" align="center" bgcolor="#FFFFFF">文章管理列表</td>
        </tr>
      <tr>
        <td width="37" bgcolor="#FFFFFF">编号</td>
        <td width="552" bgcolor="#FFFFFF">标题</td>
        <td width="150" bgcolor="#FFFFFF">操作</td>
      </tr>
    <?php
        if (!empty($item)) {
          foreach ($item as $value) {
    ?>
      <tr>
        <td bgcolor="#FFFFFF">&nbsp;<?php echo $value['id']?></td>
        <td bgcolor="#FFFFFF">&nbsp;<?php echo $value['title']?></td>
        <td bgcolor="#FFFFFF"><a href="article.del.handle.php?id=<?php echo $value['id']?>">删除</a> 
        <a href="article.modify.php?id=<?php echo $value['id']?>">修改</a>
        <a href="../article.show.php?id=<?php echo $value['id']?>">查看</a>
        </td>
      </tr>
      <?php
         }
        }
      ?>
    </table>

    <?php  

      $pages=new PageClass($page,$count,$pagesize,'article.manage.php?page={page}');
      $pages->write();

    ?>

    </td>
  </tr>
  <tr>
    <td colspan="2" bgcolor="#FFFF99"><strong>版权所有</strong></td>
  </tr>
</table>
</body>
</html>