

<style type="text/css">
html
{
	font-family:Arial;
	font-size:small;
}
</style>
 <style type="text/css">

.TFtable
{
	width:60%; 
	border-collapse:collapse; 
}

.TFtable td
{ 
	padding:7px; border:#000000 1px solid;
}

table.one
{
border-style:ridge;
border-color:#98bf21;
} 

.container { border:2px solid #ccc; width:300px; height: 100px; overflow-y: scroll; }

body,td,th {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 12px;
}

/** page structure **/
#tablektube {
  display: block;
  width: 90%;
  background: #fff;
  margin: 0 auto;
  padding: 10px 17px;
  -webkit-box-shadow: 2px 2px 3px -1px rgba(0,0,0,0.35);
}

##tablektubekeywords {
  margin: 0 auto;
  font-size: 1.2em;
  margin-bottom: 15px;
}


#tablektubekeywords thead {
  cursor: pointer;
  background: #c9dff0;
}
#tablektubekeywords thead tr th { 
  font-weight: bold;
  padding: 5px 4px;
  
}
#tablektubekeywords thead tr th span { 
  
  background-repeat: no-repeat;
  background-position: 100% 100%;
}

#tablektubekeywords thead tr th.headerSortUp, #keywords thead tr th.headerSortDown {
  background: #acc8dd;
}

/*#tablektubekeywords thead tr th.headerSortUp span {
  background-image: url('http://i.imgur.com/SP99ZPJ.png');
}
#tablektubekeywords thead tr th.headerSortDown span {
  background-image: url('http://i.imgur.com/RkA9MBo.png');
}*/


#tablektubekeywords tbody tr { 
  color: #555;
}
#tablektubekeywords tbody tr td {
  text-align: center;
  padding: 5px 13px;
}
#tablektubekeywords tbody tr td.lalign {
  text-align: left;
}
</style>
 <?php
if(isset($_GET['delete']))
{
	$id=$_GET['delete'];
	
	$q="UPDATE tbl_userinfo SET class_level='',class_id='' WHERE id='$id' and class_id='$_GET[id]'";
	
	mysql_query($q);

	?>
		<script>
		window.parent.location.reload();
		</script>
	
	<?php

//echo "<meta http-equiv='refresh' content='1; url=http://192.168.1.20/awanku/index.php/studioclass_control/edit?class_id=$_GET[class_id]'>";

}

?>

 <?php
if(isset($_POST['edit']))
{
	$_GET['id'];
	$q="UPDATE tbl_userinfo SET class_level='',class_id='' WHERE class_id='$_GET[id]'";
	
	mysql_query($q);
	
	echo "<script>alert('Remove All Student');</script>";

	?>
		<script>
		window.parent.location.reload();
		</script>
	
	<?php
}

?>

<div id="tablektube">
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
      <td align="center"> <a onClick="return confirm('Delete Student')"  href="<?php echo $site;?>/studioclass_control/edit?id=<?php echo $classroom["class_id"]; ?>&delete=<?php echo $classroom["id"]; ?>"><img src ="<?php echo $base; ?>/images/delete.png" width = "30" height = "30"/></a></td>
      
      
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
</div>