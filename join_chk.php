<?php
 require('lib/db_info.php');
 $id=$_GET['userid'];
 $query="select logid from members where logid='{$id}'";
 $result=mysqli_query($conn,$query);
 $row=mysqli_fetch_array($result);
?>


<script>
 var row=<?= json_encode($row) ?>;
// console.log(row);
 if(row!=null){
 parent.document.getElementById("chk_id2").value="0";
 parent.alert("This ID is already used.");
 }
 else{
 parent.document.getElementById("chk_id2").value="1";
 parent.alert("You can use this ID.");
 }
</script>
