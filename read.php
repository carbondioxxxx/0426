<?php
 ini_set("display_errors",1);
 require('lib/db_info.php');
 $id=$_GET['id'];
 $no=$_GET['no'];


?>


<html>
 <head>
 <title>White Board</title>
 </head>

 <body topmargin=0 leftmargin=0 text="#464646">
  <center>
  <?php
   $viewplus=mysqli_query($conn,"update listt set see=see+1 where id={$id}");

   $result=mysqli_query($conn,"select id,name,email,title,wdate,see,comment,ip from listt where id={$id}");
   $row=mysqli_fetch_array($result);

  ?>

  <table width=500 border=0 cellpadding=2 cellspacing=1 bgcolor="#777777">
   <tr>
    <td height=20 colspan=4 align=center bgcolor="#999999">
    <font color=white><B><?=$row['title']?></B></font>
    </td>
   </tr>
   <tr>
    <td width=50 height=20 align=center bgcolor="#EEEEEE">Writer</td>
    <td width=240 bgcolor=white><?=$row['name']?></td>

    <td width=50 height=20 align=center bgcolor="#EEEEEE">E-mail</td>
    <td width=240 bgcolor=white><?=$row['email']?></td>
   </tr>

   <tr>
    <td width=50 height=20 align=center bgcolor="#EEEEEE">Date</td>
    <td width=240 bgcolor=white><?=$row['wdate']?></td>

    <td width=50 height=20 align=center bgcolor="#EEEEEE">View</td>
    <td width=240 bgcolor=white><?=$row['see']?></td>

   </tr>
   <tr>
    <td bgcolor=white colspan=4>
     <font color=black>
      <pre><br><?=$row['comment']?><br><br></pre>
     </font>
    </td>
   </tr>

   <tr>
    <td colspan=4 bgcolor="#999999">
     <table width=100%>
      <tr>
       <td width=200 align=left height=20>
       <a href="list.php?no=<?=$no?>"><font color=white>[back]</font></a>
       <td align=right>
       <a href="edit.php?id=<?=$id?>&no=<?=$no?>"><font color=white>[Edit]</font></a>
       <a href="del_backup.php?id=<?=$id?>&no=<?=$no?>"><font color=white>[Delete]</font></a>

       </td>

       </td>
      </tr>
     </table>
    </b></font>
   </td>
   </tr>
  </table>
<?php
$sql="select * from comment_frees where co_no=co_order and b_no={$id}";
$result=mysqli_query($conn,$sql);
?>

<div id="commentView">
	<?php
		while($row=mysqli_fetch_array($result)){
			?>

		<ul class="one Depth">

				<table border=1 width=500 height=100>
					<div>
						<tr><td><span>Writer</td><td><?=$row['co_id']?></span></td><td><?=$row['wdate']?></td></tr>
						<tr><td colspan=3>
						<p><?=$row['co_content']?></p></td></tr>
						<p></p>
					</div>
			</table>

		</ul>
		</form>




<?php }
include "comment.php";
?>
</center>
</body>
</html>
