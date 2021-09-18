

<style>
.vidio{
	float:left;
	height:50%;
	width:60%;
}



.comment{
	float:right;
	width:40%;
	height:100%;
} 


html {
 font-family:tahoma;
}


</style>

<script type="text/javascript">
 	var GB_ROOT_DIR = "<?php echo $base; ?>/include/greybox/";
</script>




<script>
$(function(){
  $('#keywords').tablesorter(); 
});
</script>









<?php

function get_deletebtn($uploadid,$idcontent){


$q=mysql_query("delete user_id, video_id FROM ktube_comment WHERE user_id='$uploadid' AND video_id='$idcontent'");

}

?>

<?php
#print_r($_SESSION);
	function getnama($id,$var1,$table,$fk)
	{
	
	
	#$data["upload_by"],"fullname","tbl_userinfo","id"
	$q="SELECT $var1 FROM $table WHERE $fk='$id'";
			list($name)=mysql_fetch_row(mysql_query($q));
			
	//close($conn);
	//mysql_close($conn);
	
	return $name;
	
	}

	
	
	function get_deletebutton($uploadid,$idcontent)
	{


		$q="SELECT COUNT(*) FROM ktube_content WHERE id='$idcontent' AND upload_by='$uploadid'";
		list($int)=mysql_fetch_row(mysql_query($q));
		
		return $int;
	}



	function get_editbutton($uploadid,$idcontent)
	{


		$q="SELECT COUNT(*) FROM ktube_comment WHERE user_comment='$idcontent' AND video_id='$uploadid'";
		list($int)=mysql_fetch_row(mysql_query($q));
		
		return $int;

	}
	
 
 
	//$subjek = $_GET["subj"];
	
	$y="SELECT subject FROM ktube_subject WHERE subject_id = '$subj' AND flag='1'";
	$s=mysql_query($y);
	$subjek=mysql_fetch_row($s);

	$qry="SELECT subject_id FROM ktube_subject WHERE subject_id = '$subj' AND flag='1' ";
	$n=mysql_query($qry);
	$no=mysql_fetch_row($n);
	$tahap=$_SESSION["ktube"]["click"]["tahap"];
	
	
	$q="select description from tbl_param where param='leveltahapktube' and var=$tahap";
	list($namatahap)=mysql_fetch_row(mysql_query($q));
	
	$ibprofile=$_SESSION["ktube"]["click"]["ibprofile"];
	if($ibprofile==0){$namaibprofile="All Profile";}
	else{
	$q="select profile from ktube_ibprofile where id=$ibprofile";
	list($namaibprofile)=mysql_fetch_row(mysql_query($q));
	}//else
	
 ?>
 

<?php

	function getid($name)
	{
	$q="SELECT id FROM tbl_userinfo WHERE username='$name'";
	list($id)=mysql_fetch_row(mysql_query($q));

	return $id;
	
	}
?>
	
<?php

	function fullname($name)
	{
	$q="SELECT fullname FROM tbl_userinfo WHERE username='$name'";
	list($nm)=mysql_fetch_row(mysql_query($q));

	return $nm;
	
	}


function atten($studid)
{
	$q="SELECT fullname FROM tbl_userinfo WHERE id='$studid'";
		list($name)= mysql_fetch_row(mysql_query($q));
		$r=mysql_query($name);
return $name;

}

?>	
	
	
<?php
$datetime = date("Y-m-d h:i:sa");
$cid=$_GET["cid"];
?>

<?php

//list($path)=mysql_fetch_row(mysql_query("SELECT path FROM ktube_content WHERE id =$cid "));

//echo $path;

    
    $q=mysql_query("update ktube_content set view_count = view_count + 1 WHERE id='$cid'");
    //echo $data["path"];
    
    
//echo "SELECT a.*,b.ip as server_path FROM ktube_content a,ktube_server b WHERE a.id ='$cid' and a.server_id=b.id";
	$pat=mysql_query("SELECT a.*,b.ip as server_path FROM ktube_content a,ktube_server b WHERE a.id ='$cid' and a.server_id=b.id");
	$data = mysql_fetch_array($pat);
	
	
	#echo $data["server_path"]."----".$base;
	

	


 
?>


<?php 

if(isset($_POST['submitcomment']))		
{
	$cid=$_GET["cid"];
	$user_id = getid($_POST["upload_by"]);
 	$comm=$_POST["comments"];
	//$name=$_POST["upload_by"];


		$insert=mysql_query("insert into ktube_comment set user_comment='$comm', username='$_POST[upload_by]', date='$datetime', user_id=$user_id, video_id='$cid' ")or die(mysql_error());
	
	header ('Location: ' . $_SERVER['REQUEST_URI']);
    exit();
	
	
}

?>


<?php 
if(isset($_GET['like']))
{ 
	$user_id = getid($_SESSION["log"]["username"]);
	$cid=$_GET["cid"];
  	$q=mysql_query("insert into ktube_like (user, content_id)
						select {$user_id}, {$cid}
						from ktube_content
						where exists (
									select id
									from ktube_content
									where id={$cid})
						and not exists (
									select id 
									from ktube_like
									where user = {$user_id}
									and content_id ={$cid})
						LIMIT 1
					");
}
?>

<?php
						
			function countlike($cid)
			{
			$q="SELECT COUNT(content_id) FROM ktube_like WHERE content_id='$cid'";
			list($name)= mysql_fetch_row(mysql_query($q));
			$r=mysql_query($name);
			return $name;

			}
?>

<?php
if(isset ($_GET['delete']))
{ 
	$cid=$_GET["cid"];
	$userid=$_GET["userid"];
	$comid=$_GET["comid"];
	
	$q = mysql_query (" delete from ktube_comment where id='$comid' and video_id='$cid' and user_id='$userid'");


}
?>



<div style="background:#666; width:80%; height:30px; color:#FFF">

</div>
<br />

<div id="container" style="width:80%; background-color::#FFFFFF" >

<div align="center" style="width:100%; background-color:#FFFFFF">
<br />
<br />
<h2><?php echo $data["title"];?><br /></h2>

	<video width="70%" controls>
      <source src="<?php echo $base."$data[path]";?>" type="video/mp4"   >
	  
    </video> 
<br />
	<center>





	

<?php

		$cid=$_GET["cid"];
		$uid=getid($_SESSION["log"]["username"]);
	
		$q="SELECT COUNT(*) FROM ktube_like WHERE content_id='$cid' AND USER='$uid'";
		list($name)= mysql_fetch_row(mysql_query($q));
		$r=mysql_query($name);
	
	
	
		if($name==1)
		{
		 ?>
		 
		<table style="font-size:small;" width="70%" height="72">
		
		<tr> 

			<td width="24%">Video rating :  <?php echo $data["view_count"]; ?> Views</td>
					 <?php
		 
		 	$cid=$_GET["cid"]; 
		 	$q = mysql_query("SELECT view_count FROM ktube_content where id= '$cid'");
			$data = mysql_fetch_array($q);
		?>
		
		
			
			<td align="right" width="31%">
			<?php 
				if(countlike($cid) == 0)
		 			echo 0;
					
					else 
						echo countlike($cid);
		?>		
		 people like <img src ="<?php echo $base; ?>/images/love.png" width = "15" height = "15" />		 </td>
		 

		</tr>
		 
	  </table>
		 <br />
		 <br />
		 
		 
	 	<?php
		}
		else
		{ ?>
		
		<table style="font-size:small; text-decoration:none"  width="70%" height="72">
		
		<tr>
			
			<td colspan="3" align="right" valign="bottom">Like <a href="?cid=<?php echo $cid  ?>&like=<?php echo $cid  ?>"><img src ="<?php echo $base; ?>	/images/like.png" width = "30" height = "30" /> </a></td>
		</tr>
			
		<tr>
			<td width="24%">Video rating : <?php echo $data["view_count"]; ?> Views</td>
			<?php
		 
		 	$cid=$_GET["cid"]; 
		 	$q = mysql_query("SELECT view_count FROM ktube_content where id= '$cid'");
			$data = mysql_fetch_array($q);
		?>
		 
		<td align="right" width="31%">
			<?php 
				if(countlike($cid) == 0)
		 			echo 0;
					
					else 
						echo countlike($cid);
			?>		
		 people like <img src ="<?php echo $base; ?>/images/love.png" width = "15" height = "15" /> </td>
		
		</tr>
		</table>
		 <br />
		 <br />
		<?php 
		}
?>
	

	
	</table>
	</center>

</div>


<div id="video" style="width:56%; float:left; background-color:#FFFFFF; margin-top:1%">

<table height="113" style="width:80%">
<form action="" method="post">
	<tr>
		<td>Comments :</td>
	</tr>
	<tr>
		<td width="257" height="56" valign="top"><textarea style="width:100%;" name="comments" id="comments" required></textarea>
		<input name="upload_by" type="hidden" value="<?php echo $_SESSION["log"]["username"]; ?>"></td>
	</tr>
	
	<tr>
		<td align="right"><input class="button" type="submit" name="submitcomment" value="Send" id="submit"></td>
	</tr>
	</form>
</table>


<br />
<table height="96"  style="border-collapse:collapse; width:80%; ">
	<tr>
		<td colspan="2"><h3>All Comments :</h3></td> 
	</tr>

<?php
		$cid=$_GET["cid"]; 
		$q="SELECT * FROM ktube_comment where video_id='$cid' ORDER BY id DESC ";
		$r=mysql_query($q);
		
		while ($myrow = mysql_fetch_assoc($r))
		{
		
?>		
		
				<tr>
					<td width="64%" height="28" style="color:#0066CC; font-size:medium"><b> <?php echo fullname($myrow['username']); ?></b> </td>
					<td width="36%" align="right" style="font-size:smaller"> <?php echo $myrow['date']; ?> </td>
				</tr>
	
				<tr>
					<td height="30%"><?php echo $myrow['user_comment']; ?> <p>&nbsp;</p></td>
				
				<td align="right" valign="top" style="font-size:small;">
				
				
					<?php
						{
						
						
						$userid = getid($_SESSION["log"]["username"]);
						$comid = $myrow['id']; 
						$cid=$_GET["cid"];
						
						if ($userid == $myrow['user_id'])
						{
					?>
					
					
					<a style="color:#0066FF" onClick="return confirm('Pasti Untuk Padam?')" href="?delete&cid=<?php echo $cid ?>&userid=<?php echo $userid ?>&comid=<?php echo $comid ?>">Delete comment</a>
					
					
					<?php
						
					
						} //if
						
						
						}
					?>
				  </td>
				</tr>




<?php
		} //while
?>
</table>
		 
</div> 


<div class="comment" style="width:43%; height:auto; background-color:#FFFFFF; height:auto; margin-top:1%">
<br />
<br />




<table height="32" style="width:80%">
<form action="" method="post">

	<tr>
		<td width="174" height="26" align="right"><input type="text" name="search" id="search" required></td>
		
		<td width="54" align="left"><input type="submit" name="submitsearch" value="Search" id="submit"></td>
	</tr>
	</form>
</table>
<?php 

if(isset($_POST['submitsearch']))		
{
	$cid=$_GET["cid"];
	
 	$search=$_POST["search"];
	
	if(strlen($search)<=3)
	echo "Search term too short";
	
	else {
	echo "You searched for <b>$search</b> <hr size='1'>";
		
	
	$search_exploded = explode (" ", $search);
 
	$x = "";
	$construct = "";  
    
	foreach($search_exploded as $search_each)
	{
		$x++;
		if($x==1)
		$construct .="title LIKE '%$search_each%'";
		else
		$construct .="AND title LIKE '%$search_each%'";
    
	}
  
	$constructs ="SELECT * FROM ktube_content WHERE $construct and type2='Video' and flag = '1'";
	$run = mysql_query($constructs);
    
	$foundnum = mysql_num_rows($run);
    
	if ($foundnum==0)
	echo "Sorry, there are no matching result for <b>$search</b>.</br>";
	else
	{  
		
	$getquery = mysql_query("SELECT * FROM ktube_content WHERE $construct and type2='Video' and flag = '1'");
?>
<table >
	<tr>
		<th><?php echo $foundnum ?> results found !	</th>
	</tr>
<?php  
	while($runrows = mysql_fetch_assoc($getquery))
	{
	$title = $runrows ['title'];
?>	
	<tr>
		<td>
	<a href="<?php echo base_url('index.php/ktube_control/ktube_video/0/0/0/?cid='.$runrows["id"].'')?>"><div style="color:#3366FF; text-decoration:underline"><?php echo $title ?></div></a>
		</td>
	</tr>
<?php

	}
	?> 
	</table>
<?php
	}
}
}

?>




<br />



<table width="80%" cellpadding="5%" cellspacing="5%">
	<tr>
		<td height="27" colspan="2" align="center" style="background-color:#F00000 ; color:#FFFFFF;"><b>Most Liked Videos</b></td>
		
	</tr>

		<?php

		$l = mysql_query ("SELECT content_id, COUNT(content_id) as count FROM ktube_like GROUP BY content_id ORDER BY COUNT(content_id)DESC LIMIT 5");
		while($content = mysql_fetch_array($l))
		{
				
		
			$q = mysql_query("SELECT a.*,b.ip as server_path FROM ktube_content a,ktube_server b WHERE a.flag=1 and a.server_id=b.id ");
			while($data = mysql_fetch_array($q))
			{
				if ($content["content_id"] == $data["id"])
				{
?>
			
			
			<tr>
			<td width="120" class="video" align="left">

			
			
			
			<a href=" <?php echo base_url('index.php/ktube_control/ktube_video/0/0/0/?cid='.$data["id"].'')?>" title="<?php echo $data["title"]; ?>"> 
			
			
			<?php /*?><?php 
			$user_agent = getenv("HTTP_USER_AGENT"); 
			if(strpos($user_agent, "iPad") !== FALSE) 
			{
				$os = "Ipad"; 
				$autoplay="autoplay";
				?>
				<video src="<?php echo $base."$data[path]";?>"
             
              		preload="metadata" 
			  		autoplay
             		height="auto" width="100%">
      			</video>
				
				
			<?php	
			}//if
		
		else {
			$os = "bknipad";
			$autoplay="";
			?>
			
			<video width="80%" height="30%"  controls=""  >
			
 					 <source src="<?php echo $base."$data[path]";?>" type="video/mp4"  >
					 <source src="<?php echo $base."$data[path]";?>.ogg" type="video/ogg">
			</video></a>
			<?php
			}//else ?>
			<?php */?>
			
			
			<img src ="<?php echo $base."$data[thumbnail_img]"; ?>"  width="180" height="120"/></a>

		
			
			</td>
			
			<td width="168"><a href="<?php echo base_url('index.php/ktube_control/ktube_video/0/0/0/?cid='.$data["id"].'')?>"><?php echo $data["title"]; ?></a>
			  <p style="font-size:smaller; color:#8B8386">by&nbsp;<a style="text-decoration:none" href="<?php echo base_url('index.php/ktube_control/teacherfile/?teacherid='.$data["upload_by"].'')?>"><?php echo atten($data["upload_by"]); ?></a><br /> <img src ="<?php echo $base; ?>/images/love.png" width = "10" height = "10" /> &nbsp;<?php echo $content["count"]; ?> Likes,&nbsp;<?php echo $data["view_count"]; ?> Views</p>
	  </td>
			</tr>
			<?php
			}}
			}
			?>
</table>

<br />
<br />

</div>




</div>
