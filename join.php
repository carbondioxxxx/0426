
<script>
 function chid(){

  document.getElementById("chk_id2").value=0;
  var id=document.getElementById("chk_id1").value;

  if(id==""){
  alert("No blank!");
  }
  else {
  ifrm1.location.href="join_chk.php?userid="+id; }
 }

</script>

<html>
 <head>
 <title>Join</title>
 </head>

 <body>
 <center>
 <form action=join_ok.php method=post name=frmjoin>
 <table cellpadding=2 cellspacing=2>
 <tr>
  <td colspan=2 align=center><b>Join</td></b>
 </tr>
 <tr>
  <td align=center>ID</td>
  <td><input type=text name=joinid maxlength=15 id="chk_id1">&nbsp;&nbsp;
   <input type=button value="check" onclick=chid()></td>
   <input type=hidden id="chk_id2" name=chk_id2 value="0">
 </tr>
 <tr>
  <td align=center>PW</td>
  <td><input type=password name=joinpw maxlength=20></td>
 </tr>
 <tr>
  <td align=center>Repress PW</td>
  <td><input type=password name=joinpw2 maxlength=20></td>
 </tr>
 <tr>
  <td align=center>E-Mail</td>
  <td><input type=text name=joinemail maxlength=30></td>
 </tr>
 <tr> <td colspan=2 align=center><input type=submit value="Join">&nbsp;&nbsp;
  <input type=reset value="Reset">&nbsp;&nbsp;
  <input type=button value="Cancel" onclick="history.back();">
 </td>
 </tr>
 </table>
 </form>
  <iframe src="" id="ifrm1" scrolling=no frameborder=no width=0 height=0 name="ifrm1"></iframe>
 </body>
 
</html>
