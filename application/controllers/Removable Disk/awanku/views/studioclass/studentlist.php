<style type="text/css">
html
{
	font-family:Arial;
	font-size:small;
}
</style>
  <?php

if(isset($_POST['edit']))
{ 
$stud=count($_POST["student"]);
//print_r($_POST);

for($b=0;$b<count($_POST["student"]);$b++){
	
	$studentid=$_POST["student"][$b];
	$q1="UPDATE tbl_userinfo set class_level='$_GET[class_level]',class_id='$_GET[class_id]' where id='$studentid'";
	mysql_query($q1);
	}

}
	?>

<div class="menu" style="width: 500px; position:relative; margin-top:2%; margin-left:auto; margin-right:auto; border:thin solid black 0px;">

 <form name="" method="post" action="" enctype="multipart/form-data">		

<input type="submit" name="edit" value="Insert to Selected Student >>"/>

<center>
<br /><br />
  <table border="1" cellpadding="2" cellspacing="0" id="tablektube">
    <thead>
      <tr> 
        <th style="padding: 5px;">Check</th>
        <th style="padding: 5px;">Name</th>
      </tr>
    </thead>
    <?php
$bil=0;
//$q="SELECT a.id,a.fullname,a.class_id FROM tbl_userinfo a, classlist_v2 b WHERE a.class_id=b.id AND a.level_id='2' AND b.level='$_GET[level]' ORDER BY a.class_id ASC";

$q="SELECT * FROM tbl_userinfo WHERE class_id='' and level_id='2'";

$r=mysql_query($q);
while($classroom=mysql_fetch_array($r)){
?>
    <tr> 
    <td align="center"><?php echo "<input type='checkbox' id='student' name='student[]' value='" . $classroom['id'] ."'>"; ?></td>
      <td style="padding: 5px;"><?php echo $classroom["fullname"]; ?>
      <?php $classroom["id"]; ?>
      </td>
     <?php
//}
?> 
    </tr>
    <?php
$bil++;
}
?>
  </table>
  </center>
  </form>
</div>
