<?php

 require('lib/db_info.php');

 $j_id=$_POST["joinid"];
 $j_pw=$_POST['joinpw'];
 $j_pw2=$_POST['joinpw2'];
 $j_email=$_POST['joinemail'];
 $j_chkid=$_POST['chk_id2'];

 if(!($j_id && $j_pw && $j_pw2 && $j_email)){
   echo"<script>alert('Plz fill your blank.');history.back();</script>";
 }

 else if($j_chkid==0){
   echo"<script>alert('Plz confirm the id repetition.');history.back();</script>";
  }

 else if($j_pw != $j_pw2){
   echo"<script>alert('Plz confirm the password.');history.back();</script>";
 }

 else if(!strpos($j_email,'@')){
   echo"<script>alert('Plz press right email.');history.back();</script>";
 }

 else {
   $query="insert into members(logid,logpw,email) values('{$j_id}','{$j_pw}','{$j_email}')";
   $result=mysqli_query($conn, $query);
   echo "<script>alert('Join Completed.');</script>";
   echo "<meta http-equiv='refresh' content='1; URL=login.php'>";
}

?>
