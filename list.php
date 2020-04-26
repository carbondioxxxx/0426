<?php

session_start();
require('lib/db_info.php');

	$no=($_GET['no'])?$_GET['no']:0;
	$page_size=10;
	$page_list_size=10;
	if(!$no||$no<0)$no=0;
	$query="select id,thread,depth,name,email,title,comment,DATE_FORMAT(wdate,'%Y-%m-%d') as wdate, see,cmt_cnt,filename from listt order by thread desc limit {$no},{$page_size}";



	$result=mysqli_query($conn,$query);
	$result_count=mysqli_query($conn,"select count(*) from listt");
	$result_row=mysqli_fetch_array($result_count);
	$total_row=$result_row[0];

	if($total_row<=0)$total_row=0;
	$total_page=floor(($total_row-1)/$page_size);
	$current_page=floor($no/$page_size);

	if(!$_SESSION['id']){
		echo "<script>alert('Login first.');</script>";
		echo "<meta http-equiv='refresh' content='1; URL=login.php'>";
	}

?>



<html>
	<head>
		<title>White Board</title>
	</head>
	<body topmargine=0 leftmargine=0 text="#464646">
<center>
	Welcome <?=$_SESSION['id']?> (<?=$_SESSION['email']?>).<br>
		<br>
	<p>
	<table width=580 border=0 collpadding=2 cellspacing=1 bgcolor="#777777">

		<tr height=20 bgcolor="#999999">

			<td width=30 align=center>

				<font color=white>Num</font>

			</td>

			<td width=370 align=center>

				<font color=white>Title</font>

			</td>

			<td width=50 align=center>

				<font color=white>Writer</font>

			</td>

			<td width=100 align=center>

				<font color=white>date</font>

			</td>

			<td width=40 align=center>

				<font color=white>view</font>

			</td>

		</tr>

		<?php
			while($row=mysqli_fetch_array($result)){
		?>
			<tr>

				<td height=20 bgcolor=white align=center>

					<a href="read.php?id=<?=$row['id']?>&no=<?=$no?>"><?=$row['id']?></a>

				</td>

				<td height=20 bgcolor=white>&nbsp;

					<?php if($row['depth']>0) echo "<img src='image/dot.jpg' height=1 width=".$row['depth']*7 .">"; ?>

					<a href="read.php?id=<?=$row['id']?>&no=<?=$no?>"><?php if($row['filename']){echo "<img src='file.png' width=25 height=25>";}?>

					<?=strip_tags($row['title'],'<b><i>')?><?php if($row['cmt_cnt']>0){echo $row[cmt_cnt];}?></a>

				</td>

				<td align=center height=20 bgcolor=white>

					<font color=black>

						<a href="mailto:<?=$row['email']?>"><?=$row['name']?></a>

					</font>

				</td>

				<td align=center height=20 bgcolor=white>

					<font color=black><?=$row['wdate']?></font>

				</td>

				<td align=center height=20 bgcolor=white>

					<font color=black><?=$row['see']?></font>

				</td>

				</tr>



		<?php

			}

		?>



			</table>

			<table border=0>

				<tr>

					<td width=600 height=20 align=center rowspan=4>

						<font color=gray>

						&nbsp;

						<?php

							$start_page=(int)($current_page/$page_list_size)*$page_list_size;

							$end_page=$start_page+$page_list_size-1;

							if($total_page<$end_page)$end_page=$total_page;

							if($start_page>=$page_list_size){

								$prev_list=($start_page-1)*$page_size;

								echo "a href=$_SERVER[PHP_SELF]?no=$prev_list>[prev]</a>";

							}

							for($i=$start_page;$i<=$end_page;$i++){

								$page=$page_size*$i;

								$page_num=$i+1;









             							if($no!=$page){

									echo "<a href=list.php?no=$page>";

									}



								echo "$page_num ";

								if($no!=$page){

									echo "</a>";



								}

							}

							if($total_page>$end_page){

								$next_list=($end_page+1)*$page_size;

								echo "<a href=list.php?no=$next_list> [next]</a>";





							}

						?>



			</font>

			</td>

			</tr>

			</table>

			<a href=write.php>Write</a>
      <br><br>
      <input type=button value="Logout"  onclick="location.href='logout.php'">




			</center>

	</body>



</html>
