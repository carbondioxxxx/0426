
<?php
session_start();
require('lib/db_info.php');

 $id=$_GET['id'];
 $no=$_GET['no'];
 $result0=mysqli_query($conn,"select id,name,email,title,comment,ip from listt where id={$id}");
 $row=mysqli_fetch_array($result0);
 if ($_SESSION['id'] != $row['name']) {
    echo"<script>alert('Only writer can delete it.');history.back();</script>";
 }
 else {
   $del = "delete";
?>
<form action="list.php?no=0" method="post">
  <input type="text" name="id" placeholder="press 'delete' for delete.">
  <input type="submit"> </form>

<?php if(isset($_POST["id"])) {
   $str = strcmp($_POST["id"], $del);
   if ($str == 0) {
     echo "<script>alert('Delete Complete!');</script>";
   } else {
     echo "<script>alert('Plz press 'delete'.');history.back();</script>";
    }

  }} ?>
