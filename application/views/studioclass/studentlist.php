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
	$q1="UPDATE tbl_userinfo set class_level='$_GET[level]',class_id='$_GET[id]' where id='$studentid'";
	mysql_query($q1);
	$q3="UPDATE classlist_set set class_level='$_GET[level]',class_id='$_GET[id]' where stud_id='$studentid'";
	mysql_query($q3);
	
		$ccid = $_GET["id"];
		
			$rn = "SELECT * FROM class_set WHERE class_id='$_GET[id]'";
			$r=mysql_query($rn);
			
			while($rrn=mysql_fetch_array($r)){
			
				$sub_id = $rrn["subject_id"];
				$set = $rrn["set_id"];
				$clas = $rrn["class_id"];

			if ($ccid ==$clas){
					
					if($sub_id == '10'){

							$sub1="UPDATE classlist_set set english_id='$set' where stud_id='$studentid'";	
							mysql_query($sub1);				
							}
							
					if($sub_id == '8'){

							$sub2 = "UPDATE classlist_set set math_id='$set' where stud_id='$studentid'";	
							mysql_query($sub2);					
							}
							
					if($sub_id == '37' || $sub_id == '4'){

							$sub3 = "UPDATE classlist_set set kem_id='$set' where stud_id='$studentid'";	
							mysql_query($sub3);					
							}
					
					if($sub_id == '12' || $sub_id == '16' || $sub_id == '18' || $sub_id == '14'){

							$sub4 = "UPDATE classlist_set set language_id='$set' where stud_id='$studentid'";	
							mysql_query($sub4);					
							}
					
					if($sub_id == '20'){

							$sub5 = "UPDATE classlist_set set addmath_id='$set' where stud_id='$studentid'";	
							mysql_query($sub5);					
							}
							
					if($sub_id == '6'){

							$sub6 = "UPDATE classlist_set set bio_id='$set' where stud_id='$studentid'";	
							mysql_query($sub6);					
							}
							
					if($sub_id == '7'){

							$sub7 = "UPDATE classlist_set set chem_id='$set' where stud_id='$studentid'";	
							mysql_query($sub7);					
							}
					
					if($sub_id == '19'){

							$sub8 = "UPDATE classlist_set set fiz_id='$set' where stud_id='$studentid'";	
							mysql_query($sub8);					
							}
							
							
							
							
				}
			}
//die();
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
 $_GET['level'];
$q="SELECT * FROM tbl_userinfo WHERE class_level='$_GET[level]' AND class_id='' AND level_id='2' ORDER BY fullname ASC";

$r=mysql_query($q);
while($classroom=mysql_fetch_array($r)){
?>
    <tr> 
    <td align="center"><?php echo "<input type='checkbox' id='student' name='student[]' value='" . $classroom['id'] ."'>"; ?></td>
      <td style="padding: 5px;"><?php echo $classroom["fullname"]; ?>
      <?php $classroom["id"];?>
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
  </center><br />
<input type="submit" name="edit" value="Insert to Selected Student >>"/>
  </form>
</div>
</div>