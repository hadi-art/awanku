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

if(isset($_POST['edit']))
{ 
$stud=count($_POST["student"]);
//print_r($_POST);

for($b=0;$b<count($_POST["student"]);$b++)
{
	
	$studentid=$_POST["student"][$b];
	$q1="UPDATE tbl_userinfo set class_level='$_GET[class_level]',class_id='$_GET[class_id]' where id='$studentid'";
	mysql_query($q1);
	}

	#print_r($_SESSION);
	
	$_SESSION["log"]["update"]=1;
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

$q="SELECT * FROM tbl_userinfo WHERE class_level='$_GET[class_level]' and level_id='2'";


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
</div>