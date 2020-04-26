<?php
session_start();
require('lib/db_info.php');
 $id=$_GET['id'];

 $conndel="delete from listt where id={$id}";
 $result2=mysqli_query($conn,$conndel);
 echo "<script>alert('Delete Complete!');</script>";
 echo "<meta http-equiv='refresh' content='1; URL=list.php?no=0'>";
?>
