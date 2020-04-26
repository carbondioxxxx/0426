<?php
session_start();
 require('lib/db_info.php');

 $title=$_POST['title'];
 $comment=$_POST['comment'];
 $id=$_POST['id'];
 $no=$_POST['no'];
?>

 <script>
  var pass=<?= json_encode($id) ?>;
  console.log(pass);
 </script>

 <?php
  $query="update listt set title='{$title}',comment='{$comment}' where id={$id}";
  $result=mysqli_query($conn,$query);
  echo "<script>alert('Modify Success');</script>";
  echo "<meta http-equiv='refresh' content='1; URL=read.php?id={$id}&no={$no}'>";
?>
