<?php   require('lib/db_info.php');

    $bno=$_POST['bno']; //글번호
    $no=$_POST['no'];
    $cold=$_POST['cold'];	//작성자 이름
    $coCentent=$_POST['coContent'];


    $query="insert into comment_frees values(null,'{$bno}',null,'{$coCentent}','{$cold}',now())";
    $result=mysqli_query($conn,$query);

    $coNO=mysqli_insert_id($conn);
    $sql="update comment_frees set co_order=co_no where co_no={$coNO}"; $result=mysqli_query($conn,$sql);

    if($result){
       echo "<meta http-equiv='refresh' content='1; URL=read.php?id=$bno&no=$no'>";}?>
