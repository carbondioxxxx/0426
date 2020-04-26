
<?php
session_start();
require('lib/db_info.php');

 $id=$_GET['id'];
 $no=$_GET['no'];
 $result0=mysqli_query($conn,"select id,name,email,title,comment,ip from listt where id={$id}");
 $row=mysqli_fetch_array($result0);
 $delete = "delete";
 $delete2 = "delete";
 if ($_SESSION['id'] != $row['name']) {
    echo"<script>alert('Only writer can delete it.');history.back();</script>";
 }
 else {
?>

<script>
var userInput = confirm('Delete?'+"");

if (userInput == true) {
location.href="del_process.php?id=<?=$id?>";
}
else {
  history.back();
}
</script>
<?php }?>
