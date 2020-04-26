<?php session_start();
?>
<form action="comment_update.php" method ="post">
    <input type ="hidden" name="bno" value="<?=$id?>">
    <input type="hidden" name="no" value="<?=$no?>">
    <table>
    <tbody>
        <tr>
            <th scope="row"><label for="cold">ID</label></th>
            <td><input type="text" name="cold" id="cold" value="<?=$_SESSION['id']?>" readonly></td>
        </tr>

        <tr>
            <th scope="row"><label for="coContent">Description</label></th>
            <td><textarea name="coContent" id="coContent"></textarea></td>
        </tr>
    </tbody>
    </table>
    <div class="btnSet">
        <Input type="submit" value="Comment">
        </div>
</form>
