<?php
if(isset($_GET['delete']))
{
$id=$_GET['delete'];

$q="update elearning_title set flag='0'  where title_id='$id'";

mysql_query($q);
$r="update elearning_question set flag='0'  where title_id='$id'";

mysql_query($r);
} //delete
?>

<script type="text/javascript">
 	var GB_ROOT_DIR = "<?php echo $base; ?>/include/greybox/";
</script>

<script language="javascript"> 
opener.location.reload(true);
   self.close();
</script>

<script type="text/javascript" src="<?php echo $base; ?>include/greybox/AJS.js"></script>
<script type="text/javascript" src="<?php echo $base; ?>include/greybox/AJS_fx.js"></script>
<script type="text/javascript" src="<?php echo $base; ?>include/greybox/gb_scripts.js"></script>
<link href="<?php echo $base; ?>include/greybox/gb_styles.css" rel="stylesheet" type="text/css" />


<style type="text/css">


html {
 font-family:tahoma;
}


body,td,th {
	font-size: medium;
}
</style>

<?php
	function getsubject($id)
	{
	
	
	
	$q="SELECT subject FROM ktube_subject WHERE subject_id='$id'";
	list($name)=mysql_fetch_row(mysql_query($q));
			
	
	return $name;
	
	}

?>

<div id="content" style="background:#FFFFFF;width:70%;margin-left:10px;height:auto; float:left;margin-top:10px; margin-bottom:2%; border-radius: 20px; ">

<?php 
$subject = $_GET['id'];
 
  	$search=$_POST["search"];

$query="SELECT * FROM elearning_title WHERE title LIKE '%$search%' and flag=1";
	$q=mysql_query($query);
	
?>
 	<h3><center><?php echo $subject; ?> QUESTION LIST FOR <?php echo $search ;?></center></h3>

 <style type="text/css">
	body{ 
		font-family:Tahoma, Geneva, sans-serif;
		font-size:18px;
	}
	.content{
		width:900px;
		margin:0 auto;
	}
	#searchid
	{
		width:500px;
		border:solid 1px #000;
		padding:10px;
		font-size:14px;
	}
	#result
	{
		position:absolute;
		width:500px;
		padding:10px;
		display:none;
		margin-top:-1px;
		border-top:0px;
		overflow:hidden;
		border:1px #CCC solid;
		background-color: white;
	}
	.show
	{
		padding:10px; 
		border-bottom:1px #999 dashed;
		font-size:15px; 
		height:50px;
	}
	.show:hover
	{
		background:#4c66a4;
		color:#FFF;
		cursor:pointer;
	}
</style>

<table width="96%" height="32" style="width:80%; float:center">
<form method="post" action="">
	<tr>
		<td align="center"><input type="text" width="100%" class="search" id="searchid" name="search" placeholder="Search for content" />
<?php /*?>		<td width="96" align="left"><input class="btn" type="submit" name="submitsearch" value="Search" id="submit">
<?php */?>		
		</td>
	</tr>
	</form>
	
</table>
<br />
<table border ="0" width="92%" style="background-color:#FFFFFF; border-collapse:collapse; table-layout:fixed" align="center">
    <tr style="background:#CCFFCC">
   		<th width="5%" >Bil</th>
      	<th width="51%" align="center">Title</th>
    	<th width="16%" align="center">Subject</th>
		<th width="10%" align="center">Level</th>
		<th width="18%" align="center">Action</th>
		
	</tr>
	  
	<?php
	$count=1;
	while($row=mysql_fetch_array($q))
	{
	?> 
	
	<form method="post">
    <tr>
		<td align="center"><input name="id"  type="hidden" value="bil"> <?php echo $count; ?></td>
    	
		<td align="center"><?php echo $row['title']; ?></td>
		
		<td align="center"><?php echo getsubject($row['subject']); ?></td>
		
		<td align="center"><?php echo $row['level']; 
		
	
			

		
		?></center></td>
			
		
		
	<td width="18%" align="center">
		
		
		<?php if ( $_SESSION["log"]["userid"] == $row['upload_by'])
		{
		?>
			<a href="<?php echo base_url('index.php/assesment_control/updatekuiz?cid='.$row["title_id"].'&level=PT3'); ?>"><img src ="<?php echo $base; ?>/images/edit2.png" width = "30" height = "30"/></a>
			
			<a onClick="return confirm('Pasti Untuk Padam?')" href="<?php echo $site; ?>/assesment_control/viewquiz?id=<?php echo $row['level']; ?>&delete=<?php echo $row["title_id"]; ?>"><img src ="<?php echo $base; ?>/images/delete.png" width = "30" height = "30"/></a>
		
		<?php
		}
		?>		
		
		<a href="<?php echo base_url('index.php/assesment_control/viewquestion/?cid='.$row["title_id"].''); ?>" title="<?php echo $row["title"]; ?>" rel="gb_page_center[800, 550]" target="_blank"><img src ="<?php echo $base; ?>/images/view.png" width = "30" height = "30"/></a>
		

		</td>
		
		
		
	</tr>
	</form>
	<?php
	
	$count++;}
	?>
   
  </table>
 <br /><br />

</div>