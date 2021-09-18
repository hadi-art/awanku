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
 #$id=$_GET['id'];

if(isset($_GET['delete']))
{
	$id=$_GET['delete'];
	$subj=$_GET["subject"];

		if ($subj == "7" || $subj == "6" || $subj == "19"){

	$q1="UPDATE classlist_set set sc_id='' where id='$id'";
	mysql_query($q1);
	}
	
		if ($subj == "14" || $subj == "16" || $subj == "12"|| $subj == "18"){
	
	$q1="UPDATE classlist_set set language_id='' where id='$id'";
	mysql_query($q1);

	}
	
		if ($subj == "20"){
	
	$q1="UPDATE classlist_set set addmath_id='' where id='$id'";
	mysql_query($q1);

	}
		
		if ($subj == "8"){
	
	$q1="UPDATE classlist_set set math_id='' where id='$id'";
	mysql_query($q1);

	}
	
		if ($subj == "10"){
	
	$q1="UPDATE classlist_set set english_id='' where id='$id'";
	mysql_query($q1);

	}
	
	if ($subj == "4" || $subj == "37"){
	
	$q1="UPDATE classlist_set set kem_id='' where id='$id'";
	mysql_query($q1);

	}
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
	$subj=$_GET["subject"];

		if ($subj == "7" || $subj == "6" || $subj == "19"){

	$q1="UPDATE classlist_set set sc_id='' where class_level='$_GET[form]'";
	mysql_query($q1);
	}
	
		if ($subj == "14" || $subj == "16" || $subj == "12"|| $subj == "18"){
	
	$q1="UPDATE classlist_set set language_id='' where class_level='$_GET[form]'";
	mysql_query($q1);

	}
	
		if ($subj == "20"){
	
	$q1="UPDATE classlist_set set addmath_id='' where class_level='$_GET[form]'";
	mysql_query($q1);

	}
		
		if ($subj == "8"){
	
	$q1="UPDATE classlist_set set math_id='' where class_level='$_GET[form]'";
	mysql_query($q1);

	}
	
		if ($subj == "10"){
	
	$q1="UPDATE classlist_set set english_id='' where class_level='$_GET[form]'";
	mysql_query($q1);

	}
	
	if ($subj == "4" || $subj == "37"){
	
	$q1="UPDATE classlist_set set kem_id='' where class_level='$_GET[form]'";
	mysql_query($q1);

	}
		
	echo "<script>alert('Remove All Student');</script>";

	?>
		<script>
		window.parent.location.reload();
		</script>
	
	<?php
}

	$form=$_GET['form'];

?>

<div id="tablektube">
<div class="menu" style="width: 100%; position:relative; margin-top:2%; margin-left:auto; margin-right:auto; border:thin solid black 0px;">
 
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
	 //$sub=$_GET['subject'];
$subj = $_GET["subject"];
$g = $_GET["group"];
/* ------------------------ sains id ------------------------------------------ */

if ($subj == "7" || $subj == "6" || $subj == "19"){

$bil=0;
	
$q="SELECT * FROM classlist_set WHERE class_level='$form' AND sc_id = '$g'";
$r=mysql_query($q);
while($classroom=mysql_fetch_array($r)){
?>
    <tr> 
      <td style="padding: 5px;"><?php echo $bil+1; ?></td>
      <td style="padding: 5px;"><?php echo $classroom["fullname"]; ?>
      <?php $classroom['id'];?>
      </td>

<td align="center"> <a onClick="return confirm('Delete Student')"  href="<?php echo $site;?>/report_control/senaraipelajar?delete=<?php echo $classroom["id"]; ?>&subject=<?php echo $_GET['subject'];?>&form=<?php echo $_GET['form'];?>"><img src ="<?php echo $base; ?>/images/delete.png" width = "30" height = "30"/></a></td>
      
      <?php
//}
?> 

    </tr>
    <?php
$bil++;
	}
}//if

/* -------------------------------- langauge ID ----------------------------*/

if ($subj == "14" || $subj == "16" || $subj == "12"|| $subj == "18"){

$bil=0;
	
$q="SELECT * FROM classlist_set WHERE class_level='$form' AND language_id = '$g'";
$r=mysql_query($q);
while($classroom=mysql_fetch_array($r)){
?>
    <tr> 
      <td style="padding: 5px;"><?php echo $bil+1; ?></td>
      <td style="padding: 5px;"><?php echo $classroom["fullname"]; ?>
      <?php $classroom['id'];?>
      </td>

<td align="center"> <a onClick="return confirm('Delete Student')"  href="<?php echo $site;?>/report_control/senaraipelajar?delete=<?php echo $classroom["id"]; ?>&subject=<?php echo $_GET['subject'];?>&form=<?php echo $_GET['form'];?>"><img src ="<?php echo $base; ?>/images/delete.png" width = "30" height = "30"/></a></td>
      
      <?php
//}
?> 

    </tr>
    <?php
$bil++;
}

}//if

/* ------------------------------------------ addmath ----------------------------------------*/

if ($subj == "20"){

$bil=0;
	
$q="SELECT * FROM classlist_set WHERE class_level='$form' AND addmath_id = '$g'";
$r=mysql_query($q);
while($classroom=mysql_fetch_array($r)){
?>
    <tr> 
      <td style="padding: 5px;"><?php echo $bil+1; ?></td>
      <td style="padding: 5px;"><?php echo $classroom["fullname"]; ?>
      <?php $classroom['id'];?>
      </td>

<td align="center"> <a onClick="return confirm('Delete Student')"  href="<?php echo $site;?>/report_control/senaraipelajar?delete=<?php echo $classroom["id"]; ?>&subject=<?php echo $_GET['subject'];?>&form=<?php echo $_GET['form'];?>"><img src ="<?php echo $base; ?>/images/delete.png" width = "30" height = "30"/></a></td>
      
      <?php
//}
?> 

    </tr>
    <?php
$bil++;
}

}//if

/* ------------------------------------------ math ----------------------------------------*/

if ($subj == "8"){

$bil=0;
	
$q="SELECT * FROM classlist_set WHERE class_level='$form' AND math_id = '$g'";
$r=mysql_query($q);
while($classroom=mysql_fetch_array($r)){
?>
    <tr> 
      <td style="padding: 5px;"><?php echo $bil+1; ?></td>
      <td style="padding: 5px;"><?php echo $classroom["fullname"]; ?>
      <?php $classroom['id'];?>
      </td>

<td align="center"> <a onClick="return confirm('Delete Student')"  href="<?php echo $site;?>/report_control/senaraipelajar?delete=<?php echo $classroom["id"]; ?>&subject=<?php echo $_GET['subject'];?>&form=<?php echo $_GET['form'];?>"><img src ="<?php echo $base; ?>/images/delete.png" width = "30" height = "30"/></a></td>
      
      <?php
//}
?> 

    </tr>
    <?php
$bil++;
}

}//if

/* ------------------------------------------ english ----------------------------------------*/

if ($subj == "10"){

$bil=0;
	
$q="SELECT * FROM classlist_set WHERE class_level='$form' AND english_id = '$g'";
$r=mysql_query($q);
while($classroom=mysql_fetch_array($r)){
?>
    <tr> 
      <td style="padding: 5px;"><?php echo $bil+1; ?></td>
      <td style="padding: 5px;"><?php echo $classroom["fullname"]; ?>
      <?php $classroom['id'];?>
      </td>

<td align="center"> <a onClick="return confirm('Delete Student')"  href="<?php echo $site;?>/report_control/senaraipelajar?delete=<?php echo $classroom["id"]; ?>&subject=<?php echo $_GET['subject'];?>&form=<?php echo $_GET['form'];?>"><img src ="<?php echo $base; ?>/images/delete.png" width = "30" height = "30"/></a></td>
      
      <?php
//}
?> 

    </tr>
    <?php
$bil++;
}

}//if

/* ------------------------------------------ kemahiran ----------------------------------------*/

if ($subj == "4" || $subj == "37"){

$bil=0;
	
$q="SELECT * FROM classlist_set WHERE class_level='$form' AND kem_id = '$g'";
$r=mysql_query($q);
while($classroom=mysql_fetch_array($r)){
?>
    <tr> 
      <td style="padding: 5px;"><?php echo $bil+1; ?></td>
      <td style="padding: 5px;"><?php echo $classroom["fullname"]; ?>
      <?php $classroom['id'];?>
      </td>

<td align="center"> <a onClick="return confirm('Delete Student')"  href="<?php echo $site;?>/report_control/senaraipelajar?delete=<?php echo $classroom["id"]; ?>&subject=<?php echo $_GET['subject'];?>&form=<?php echo $_GET['form'];?>"><img src ="<?php echo $base; ?>/images/delete.png" width = "30" height = "30"/></a></td>
      
      <?php
//}
?> 

    </tr>
    <?php
$bil++;
}

}//if

?>
  </table>
  <br>
  <input type="submit" name="edit" value="Remove All Student">
  </form>
</div>
</div>