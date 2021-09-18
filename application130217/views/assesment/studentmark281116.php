



<style type="text/css">


html {
 font-family:tahoma;
}
#search {

}

#search
{
	
    border-radius: 25px;
    padding: 20px; 
	width: 100%;
    height: 10%; 
}

.search {
  background: #dce0dc;
  background-image: -webkit-linear-gradient(top, #dce0dc, #999999);
  background-image: -moz-linear-gradient(top, #dce0dc, #999999);
  background-image: -ms-linear-gradient(top, #dce0dc, #999999);
  background-image: -o-linear-gradient(top, #dce0dc, #999999);
  background-image: linear-gradient(to bottom, #dce0dc, #999999);
  -webkit-border-radius: 26;
  -moz-border-radius: 26;
  border-radius: 26px;
  font-family: Arial;
  color: #030303;
  font-size: 19px;
  padding: 1px 16px 4px 15px;
  text-decoration: none;
}

.search:hover {
  background: #dbdbdb;
  text-decoration: none;
}

</style>



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
		<td>Nama Pelajar</td>
		<td>:</td>
	  	<td><input type="text" name="nama" id="search" required></td>
</tr>

<tr>
		<td height="50">&nbsp;</td>	
		<td></td>								
		<td align="right"><input class="search" type="submit" name="submit" value="Submit" id="submit">
		</td>
</tr>
</table>

</form>

<?php if(isset($_GET['submit']))

{


		$nama = $_GET['nama'];
		
		$q="SELECT * FROM tbl_userinfo WHERE fullname LIKE '%$nama%' and level_id='2'";
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
			
		?>	
			
			<tr>
				<td align="center"><?php echo $bil; ?>.</td>
				<td><a href="?search=<?php echo $myrow['id']; ?>" id="category" style="text-decoration:none; color:#000000"><?php echo $myrow['fullname']; ?></a></td>
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




