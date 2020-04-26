<?php
 session_start();

 require('lib/db_info.php');

 $max_thread_result=mysqli_query($conn,"select max(thread) from listt");
 $max_thread_fetch=mysqli_fetch_array($max_thread_result);

 $name=$_POST['name'];
 $email=$_POST['email'];

 $title=$_POST['title'];
 $comment=$_POST['comment'];
 $REMOTE_ADDR=$_SERVER["REMOTE_ADDR"];
 if (!($title&&$comment)) {
    echo"<script>alert('Plz fill in the blank.');history.back();</script>";
 }
 else {
 $max_thread=ceil($max_thread_fetch[0]/1000)*1000+1000;


 $query="insert into listt(thread,depth,name,email,title,see,wdate,ip,comment) values($max_thread,0,'$name','$email','$title',0,now(),'$REMOTE_ADDR','$comment')";

 $result=mysqli_query($conn,$query);

 echo "<meta http-equiv='refresh' content='1; URL=list.php?no=0'>";
 }
 ?>
