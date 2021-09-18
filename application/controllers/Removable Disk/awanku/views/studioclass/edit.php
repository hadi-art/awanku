<style type="text/css">
html
{
	font-family:Arial;
	font-size:small;
}
</style>
 
 <?php
if(isset($_GET['delete']))
{
$id=$_GET['delete'];

$q="UPDATE tbl_userinfo SET class_level='',class_id='' WHERE id='$id' and class_id='$_GET[id]'";

mysql_query($q);

//echo "<meta http-equiv='refresh' content='1; url=http://192.168.1.20/awanku/index.php/studioclass_control/edit?class_id=$_GET[class_id]'>";

}

?>

 <?php
if(isset($_POST['edit']))
{
echo $_GET['id'];
$q="UPDATE tbl_userinfo SET class_level='',class_id='' WHERE class_id='$_GET[id]'";

mysql_query($q);

echo "<script>alert('Updated Profile');</script>";

}

?>


<div class="menu" style="width: 500px; position:relative; margin-top:2%; margin-left:auto; margin-right:auto; border:thin solid black 0px;">
 
 <form name="" method="post" action="" enctype="multipart/form-data">		

 <input type="submit" name="edit" value="Remove All Student">
 <br /><br />

  <table border="1" cellpadding="2" cellspacing="0" id="tablektube">
    <thead>
      <tr> 
       <th style="padding: 5px;">Bil</th>
        <th style="padding: 5px;">Name</th>
        <th>Action</th>     
 </tr>
    </thead>
    <?php
$bil=0;
$q="SELECT * FROM tbl_userinfo WHERE level_id='2' AND class_id='$_GET[id]'";
$r=mysql_query($q);
while($classroom=mysql_fetch_array($r)){

?>
    <tr> 
      <td style="padding: 5px;"><?php echo $bil+1; ?></td>
      <td style="padding: 5px;"><?php echo $classroom["fullname"]; ?>
      <?php $classroom['id'];?>
      </td>
      <td align="center"> <a onClick="return confirm('Pasti Untuk Padam?')"  href="<?php echo $site;?>/studioclass_control/edit?id=<?php echo $classroom["class_id"]; ?>&delete=<?php echo $classroom["id"]; ?>"><img src ="<?php echo $base; ?>/images/delete.png" width = "30" height = "30"/></a></td>
      
      
      <?php
//}
?> 

    </tr>
    <?php
$bil++;
}
?>
  </table>
  </form>
</div>
