<?php
 session_start();
?>
<html>
 <head><title>White board</title>
 </head>
 <body topmargin=0 leftmargin=0 text="#464646">
 <center>

 <br>
 <form action="write_ok.php" enctype="multipart/form-data" method=post>
 <table width=580 border=0 cellpadding=2 cellspacing=1 bgcolor="#777777">
  <tr>
  <td height=20 align=center bgcolor="#999999">
  <font color=white><B>Write</B></font>


  </td>
  </tr>
  <tr>
  <td bgcolor=white>&nbsp;
  <table>
  <tr>
   <td width=160 align=left>Writer</td>
   <td align=left><input type=text name="name" value="<?=$_SESSION['id']?>" size=20 maxlength=10 readonly>
   </td>
  </tr>
  <tr>
   <td width=160 align=left>E-mail</td>
   <td align=left><input type=test name="email" value="<?=$_SESSION['email']?>" maxlength=25 readonly>
   </td>
  </tr>
  
  <tr>
   <td width=160 align=left>Title</td>
   <td align=left>
    <input type=text name="title" size=60 maxlength=35>
   </td>
  </tr>
  <tr>
   <td width=160 align=left></td>
   <td align=left><TEXTAREA name="comment" cols=65 rows=15></TEXTAREA>
  </td>
  </tr>

  <tr>
   <td align=160 align=left>File</td>
   <td align=left>
   <input type=file name="upfile">
   </td>
  </tr>

  <tr>
   <td colspan=10 align=center>
    <input type=submit value="Write">
   &nbsp;&nbsp;
   <input type=reset value="reset">
   &nbsp;&nbsp;
   <input type=button value="back" onclick="history.back()">
  </td>
  </tr>
  </table>
  </form>
  </center>
 </body>
</html>
