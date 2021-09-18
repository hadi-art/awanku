<?php
$form=$_GET["form"];
$subj=$_GET["subject"];
?>
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
$subj=$_GET["subject"];
$stud=count($_POST["student"]);
//print_r($_POST);

for($b=0;$b<count($_POST["student"]);$b++)
{
	$g=$_GET["group"];
	$studentid=$_POST["student"][$b];
	
		if ($subj == "7" || $subj == "6" || $subj == "19"){

	$q1="UPDATE classlist_set set sc_id='$g' where id='$studentid' and class_level='$_GET[form]'";
	mysql_query($q1);
	}
	
		if ($subj == "14" || $subj == "16" || $subj == "12"|| $subj == "18"){
	
	$q1="UPDATE classlist_set set language_id='$g' where id='$studentid' and class_level='$_GET[form]'";
	mysql_query($q1);

	}
	
		if ($subj == "20"){
	
	$q1="UPDATE classlist_set set addmath_id='$g' where id='$studentid' and class_level='$_GET[form]'";
	mysql_query($q1);

	}
		
		if ($subj == "8"){
	
	$q1="UPDATE classlist_set set math_id='$g' where id='$studentid' and class_level='$_GET[form]'";
	mysql_query($q1);

	}
	
		if ($subj == "10"){
	
	$q1="UPDATE classlist_set set english_id='$g' where id='$studentid' and class_level='$_GET[form]'";
	mysql_query($q1);

	}
	
	if ($subj == "4" || $subj == "37"){
	
	$q1="UPDATE classlist_set set kem_id='$g' where id='$studentid' and class_level='$_GET[form]'";
	mysql_query($q1);

	}
	
} // for

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
<div class="menu" style="width: 100%; position:relative; margin-top:2%; margin-left:auto; margin-right:auto; border:thin solid black 0px;">

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
//$q="SELECT a.id,a.fullname,a.class_id FROM tbl_userinfo a, classlist_v2 b WHERE a.class_id=b.id AND a.level_id='2' AND b.level='$_GET[level]' ORDER BY a.class_id ASC";

/* --------------------------------------------  sains  -------------------------------------------------*/

if ($subj == "7" || $subj == "6" || $subj == "19"){
	
	$bil=0;

$q="SELECT * FROM classlist_set WHERE class_level='$form' AND sc_id = '' ORDER BY fullname ASC";

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

}//if

/* --------------------------------------------  international language  -------------------------------------------------*/

if ($subj == "14" || $subj == "16" || $subj == "12"|| $subj == "18"){
	
	$bil=0;

$q="SELECT * FROM classlist_set WHERE class_level='$form' AND language_id = '' ORDER BY fullname ASC";

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

}//if

/* --------------------------------------------  addmath  -------------------------------------------------*/

if ($subj == "20"){
	
	$bil=0;

$q="SELECT * FROM classlist_set WHERE class_level='$form' AND addmath_id = ''";

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

}//if

/* --------------------------------------------  math  -------------------------------------------------*/

if ($subj == "8"){
	
	$bil=0;

$q="SELECT * FROM classlist_set WHERE class_level='$form' AND math_id = '' ORDER BY fullname ASC";

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

}//if

/* --------------------------------------------  english  -------------------------------------------------*/

if ($subj == "10"){
	
	$bil=0;

$q="SELECT * FROM classlist_set WHERE class_level='$form' AND english_id = '' ORDER BY fullname ASC";

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

}//if

/* --------------------------------------------  kemahiran  -------------------------------------------------*/

if ($subj == "4" || $subj == "37"){
	
	$bil=0;

$q="SELECT * FROM classlist_set WHERE class_level='$form' AND kem_id = '' ORDER BY fullname ASC";

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

}//if

?>
  </table>
  </center>
  <br><br>
  <input type="submit" name="edit" value="Insert to Selected Student >>"/>
  </form>
</div>
</div>