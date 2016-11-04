<?php
      require_once('../connect.php');
      $sql="SELECT * FROM article ORDER BY dateline DESC";
      $query=mysqli_query($con,$sql);
      $num=mysqli_num_rows($query);
      if ($query&&$num) {
        while ($row=mysqli_fetch_assoc($query)) {
          $data[]=$row;
          //break;
        }
      }else{
        $data=array();
      };
      //print_r($data);
      foreach ($data as $key => $value) {
        echo "key:".$key."value:".$value['id'];
      }
?>
