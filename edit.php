<?php

session_start();

 require('lib/db_info.php');
$id=$_GET['id'];
$no=$_GET['no'];
$result=mysqli_query($conn,"select id,name,email,title,comment,ip from listt where id={$id}");
$row=mysqli_fetch_array($result);

?>
<script>
 var id=<?= json_encode($_SESSION['id']) ?>;
 console.log(id);
 var ids=<?= json_encode($row['name']) ?>;
 console.log(ids);
 var idss=<?= json_encode($row['ip']) ?>;
 console.log(idss);
</script>
<?php
if ( $_SESSION['id'] != $row['name']) {
   echo"<script>alert('Only writer can edit it.');history.back();</script>";
}

?>



<html>
<head>
<title>White Board</title>
</head>
<body topmargin=0 leftmargin=0>

<center>
<br>

<?php //post방식으로 update.php에 보내기?>

<form action="update.php?id=<?php echo $id; ?>" method=post>

<table width=580 border=0 cellpadding=2 cellspacing=1 bgcolor="#777777">

<tr>
 <td height=20 align=center bgcolor="#999999">
 <font color=white><B>Edit</B></font>
 </td>
</tr>
<tr>
 <td bgcolor=white>&nbsp;
 <table>

   <tr>
    <td width=60 align=middle>ID</td>
    <td align=left><input type="text" name="id" size=60 maxlength=35 value="<?php echo $row['id'];?>" readonly>
    </td>
   </tr>

 <tr>
  <td width=60 align=middle>Title</td>
  <td align=left><input type="text" name="title" size=60 maxlength=35 value="<?php echo $row['title'];?>">
  </td>
 </tr>

 <tr>
  <td width=60 align=middle>Description</td>
  <td align=left><TEXTAREA name="comment" cols=64 rows=15><?php echo $row['comment'];?></TEXTAREA>
  </td>
 </tr>
 <tr>
  <td colspan=10 align=center>
  <input type=submit value="Submit">
  &nbsp;&nbsp;&nbsp;
  <input type=reset value="Rewrite">
  &nbsp;&nbsp;&nbsp;
  <input type=button value="Cancel" onclick="history.back()">
  </td>
 </tr>
 </table>
 </td>
 </tr>
 </table>
 <input type="hidden" name="no" value="<?php echo $no;?>">
</form>
</center>
</body>
</html>
