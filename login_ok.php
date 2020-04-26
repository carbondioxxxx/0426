<?php
 session_start();
 require('lib/db_info.php');
 $logid=$_POST['id'];
 $logpw=$_POST['pw'];


 $query="select logid,email from members where logid='$logid' && logpw='$logpw'";

 $result=mysqli_query($conn,$query);
 $row=mysqli_fetch_array($result);

 if(!$row){
  echo "<script>alert('Plz check ID or Password.');history.back();</script>";
 }
 else{
 $_SESSION['id']=$logid;
 $_SESSION['email']=$row['email'];

 echo "<meta http-equiv='refresh' content='1; URL=list.php?no=0'>";
 }

?>
