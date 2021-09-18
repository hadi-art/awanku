<script>

function showP_subjek(str)
{
if (str=="")
  {
  document.getElementById("showsubjek").innerHTML="";
  return;
  }
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    document.getElementById("showsubjek").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","<?php echo $site."/assesment_control/form_class"; ?>?q="+str,true);
xmlhttp.send();
}

</script>



<?php
function getname($uname)
{
	$q="SELECT fullname FROM tbl_userinfo WHERE id='$uname'";
		list($name)= mysql_fetch_row(mysql_query($q));
		$r=mysql_query($name);
return $name;

}


function getclass($id)
{


$q="SELECT name FROM classlist_v2 WHERE id='$id'";
		list($name)=mysql_fetch_row(mysql_query($q));
		

return $name;

}



	function gettitle($id)
	{
	
	
	
	$q="SELECT title FROM elearning_title WHERE title_id='$id'";
	list($name)=mysql_fetch_row(mysql_query($q));
			
	
	return $name;
	
	}

?>


<div id="content" align="center" style="background:#FFFFFF;width:65%;margin-left:10px;height:auto; float:left;margin-top:10px; border-radius: 20px; ">
<br />
<br />
<form name="report" >
<table width="65%" height="127">
<tr>
		<td>Form</td>
		<td>:</td>
		<td>
        <select name="form" id="form" onchange="showP_subjek(this.value)" required>
          <option value="22">-</option>
		  
		  <?php 
		  echo $q="SELECT * FROM classlist_v2 ";
		  $r=mysql_query($q);
		  
		  while($dataprofile=mysql_fetch_array($r)){ 
		  #$level = $dataprofile["level"];
		 $class_id = $dataprofile["id"];
		  ?>
          <option value="<?php echo $dataprofile["level"];?>"><?php echo $dataprofile["name"];?></option>
		  <?php
		  }//while
		  ?>
          </select>
        </td>
            
	  <td>Subject</td>
		<td>:</td>
	  	<td>
	  		<div id="showsubjek">
		<select style="width:145px;font-family:calibri;font-weight:bold;color:blue" onchange="submit()" name="subjek" id="subjek" required>
		  <option value="" selected="selected" style="color: black;">-</option>
		</select>
      		</div>
			</td>
</tr>

<tr>
		<td height="50">&nbsp;</td>	
		<td></td>
		<td align="right">&nbsp;</td>
		<td align="right">&nbsp;</td>
		<td align="right">&nbsp;</td>								
		<td align="right"><input class="search" type="submit" name="submit" value="Submit" id="submit">
		</td>
</tr>
</table>

</form>

<?php if(isset($_GET['submit']))

{


		$nama = $_GET['nama'];
		
		#$q="SELECT * FROM tbl_userinfo WHERE fullname LIKE '%$nama%' and level_id='2'";
		$q="SELECT * FROM tbl_userinfo WHERE class_id='$class_id'";
		$r=mysql_query($q);
		$bil=1;
?>

<table width="90%" border="0" align="center" cellpadding="3%" cellspacing="5%" style="background-color:#FFFFFF; width:80%; border-collapse:collapse;">
	<tr>
		<th bgcolor="#33CCCC">Bil.</th>
		<th bgcolor="#33CCCC" align="center">List of Student</th>
		
	</tr>
<?php		
		while ($myrow = mysql_fetch_assoc($r))
		{
			echo $class_id;
		?>	
			
			<tr>
				<td align="center"><?php echo $bil; ?>.</td>
				<td><a href="?search=<?php echo $class_id; ?>" id="category" style="text-decoration:none; color:#000000"><?php echo $myrow['fullname']; ?></a></td>
			</tr>
			
		
<?php	
	$bil++;		
		}
	
 ?>
 
 
 	
</table>
<br />
<br />

<?php } ?>

<?php
if(isset($_GET['search']))
{ 

	$studentid=$_GET['search'];

	$title_id = $_GET['cid'];

	?>
<table width="67%">

<tr>
	<td width="35%"><b>Nama Pelajar</b></td>
	<td width="2%"><b>:</b></td>
	<td width="63%"><b><?php echo getname($studentid);?></b></td>	
</tr>
</table>
<br />

<?php

		$q="SELECT * FROM elearning_history WHERE user_id ='$studentid'";
		$r=mysql_query($q);
		$count=1;
		?>
<table border="0" cellpadding="5%" style="background-color:#FFFFFF; width:70%; border-collapse:collapse">
	<tr>
		<th bgcolor="#FFFF99" width="73%" height="30" align="center">Quiz Title</th>
		<th bgcolor="#FFFF99" width="27%" height="30" align="center">Total Mark</th>
	</tr>
<?php				
		while ($row = mysql_fetch_assoc($r))
		{		
?>
    <tr>
		<td align="center"><?php echo gettitle($row['title_id']); ?></td>
	
	
		<td align="center"><?php echo $row['score']; ?></td>
	
	</tr>

	
	<?php
	
	}
}
	?>
	
	
	</table>
	 <br />
	  <br />	




