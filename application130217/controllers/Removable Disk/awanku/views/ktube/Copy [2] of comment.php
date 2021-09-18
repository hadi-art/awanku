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
</style>




<script>
$(function(){
  $('#keywords').tablesorter(); 
});
</script>





<?php
#print_r($_SESSION);
	function getnama($id,$var1,$table,$fk){
	
	
	#$data["upload_by"],"fullname","tbl_userinfo","id"
	$q="SELECT $var1 FROM $table WHERE $fk='$id'";
			list($name)=mysql_fetch_row(mysql_query($q));
			
	//close($conn);
	//mysql_close($conn);
	
	return $name;
	
	}

	
	
function get_deletebutton($uploadid,$idcontent){


$q="SELECT COUNT(*) FROM ktube_content WHERE id='$idcontent' AND upload_by='$uploadid'";
		list($int)=mysql_fetch_row(mysql_query($q));
		


return $int;

}

function get_editbutton($uploadid,$idcontent){


$q="SELECT COUNT(*) FROM ktube_content WHERE id='$idcontent' AND upload_by='$uploadid'";
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
 

<div style="background:#666; width:75%; height:30px; color:#FFF"><u><h2><strong>

<?php 
$namataha_B=strtoupper($namatahap);
echo "<a href='$site/ktube_control/contentlist/0/0/$tahap'><font color='yellow'>$namataha_B</font></a>".": ". $subjek[0].": ".$namaibprofile; 

?>
<!--yg bawah ni utk view semua spm atau semua pmr content-->
<?php #echo $site."/ktube_control/contentlist?subj=0&ibprofile=0&page=0&tahap=2"?>
<?php #echo $site."/ktube_control/contentlist?subj=0&ibprofile=0&page=0&tahap=1"?>
</strong></h2></u></div>
<br />

<?php
//print_r($_GET);


//ib
if($ibprofile==0){$cond_ib="and profile_id<>0";}
else{$cond_ib="and profile_id=$ibprofile";}

//subj
if($subj==0){$cond_subj="and subj_id<>0";}
else{$cond_subj="and subj_id=$subj";}

//subj
if($tahap==0){$cond_tahap="and level_id<>0";}
else{$cond_tahap="and level_id=$tahap";}





//<!-----------------------------------pagination------------------------------------------------->
		$qtotal="SELECT count(*) FROM ktube_content WHERE flag=1 $cond_ib $cond_subj $cond_tahap";
		
		list($totalquery)=mysql_fetch_row(mysql_query($qtotal));
		$config['base_url'] = "$site/ktube_control/contentlist/$subj/$ibprofile/$tahap/";
		$config['total_rows'] = $totalquery;
		$config['uri_segment'] = 6;
		//kena add niiiiiiii
		$bilperpage=$config['per_page'] = 10; 
		//subj=$data[id]&ibprofile=0&page=0&tahap=1
		$this->pagination->initialize($config); 
		
		echo $link=$this->pagination->create_links();
		//<!-----------------------------------pagination------------------------------------------------->



$q="SELECT * FROM ktube_content WHERE flag=1 $cond_ib $cond_subj $cond_tahap limit $startpage,$bilperpage";
$r=mysql_query($q);
$bil=$startpage;
		
		
?>

<?php
#print_r($_SESSION);
	function getid($name)
	{
	
	

	$q="SELECT id FROM tbl_userinfo WHERE username='$name'";
	list($id)=mysql_fetch_row(mysql_query($q));

	return $id;
	
}?>
	
	
<?php
$datetime = date("Y-m-d h:i:sa");
$id=$_GET["cid"];

?>

<?php

//list($path)=mysql_fetch_row(mysql_query("SELECT path FROM ktube_content WHERE id =$id "));

//echo $path;
$pat=mysql_query("SELECT path FROM ktube_content WHERE id =$id ");
$data = mysql_fetch_array($pat);

$q=mysql_query("update ktube_content set view_count = view_count + 1 WHERE id='$id'");
//echo $data["path"];
?>
<script type="text/javascript">
 	var GB_ROOT_DIR = "<?php echo $base; ?>/include/greybox/";
</script>


<?php 
if(isset($_POST['submit']))
{
	$id=$_GET["cid"];
 
	$comm=$_POST["comments"];
	//$name=$_POST["upload_by"];
	
	if (empty($comm))
	{
			echo "<script> alert('Please enter your title/news!');</script>" ;
	}
	
	else 
	{
		$insert=mysql_query("insert into ktube_comment set user_comment='$comm', username='$_POST[upload_by]', date='$datetime', video_id='$id' ")or die(mysql_error());
	
			
		if($insert)
		{
			echo "<script type='text/javascript'>";
			echo "alert('New news is added !!')";
			echo "</script>";
			//echo "<meta http-equiv='refresh' content='0; url=verticalnews.php'>";
		}
	}
	
	
}
?>





<div id="container" style="width:70%; background-color:#CCFFFF">

<div id="video" style="width:56%; float:left">

	<video width="100%" height="60%" controls>
      <source src="<?php echo $base."$data[path]";?>" type="video/mp4"  >
	  
    </video> 
<br />
	<center>

		
<?php if(isset($_GET['like']))
{ 
	$user_id = getid($_SESSION["log"]["username"]);
	$id=$_GET["cid"];
  	$q=mysql_query("insert into ktube_like (user, content_id)
						select {$user_id}, {$id}
						from ktube_content
						where exists (
									select id
									from ktube_content
									where id={$id})
						and not exists (
									select id 
									from ktube_like
									where user = {$user_id}
									and content_id ={$id})
						LIMIT 1
					");
}
?>

<?php
						
			function countlike($id)
			{
			$q="SELECT COUNT(content_id) FROM ktube_like WHERE content_id='$id'";
			list($name)= mysql_fetch_row(mysql_query($q));
			$r=mysql_query($name);
			return $name;

			}
?>	

<?php

		$pid=$_GET["cid"];
		$uid=getid($_SESSION["log"]["username"]);
	
		$q="SELECT COUNT(*) FROM ktube_like WHERE content_id='$pid' AND USER='$uid'";
		list($name)= mysql_fetch_row(mysql_query($q));
		$r=mysql_query($name);
	
	
	
		if($name==1)
		{
		 ?>
		 
		<table width="100%" height="72">
		
		<tr> 

			<td width="75%">Video rating :</td>
			<td align="right" width="25%">
			<?php 
				if(countlike($id) == 0)
		 			echo 0;
					
					else 
						echo countlike($id);
		?>		
		 people like <img src ="<?php echo $base; ?>/images/love.png" width = "15" height = "15" /> </td>
		
		</tr>
		 
		 
		 
		 
	 	<?php
		}
		else
		{ ?>
		
		<table width="100%" height="72">
		
		<tr>
			<td></td>
			<td width="25%" align="right" valign="bottom">Like<a href="?cid=<?php echo $id  ?>&like=<?php echo $id  ?>"><img src ="<?php echo $base; ?>	/images/heart.jpg" width = "40" height = "40" /> </a></td>
		</tr>
			
		<tr>
			<td>Video rating :</td>
			<td align="right" width="25%">
			<?php 
				if(countlike($id) == 0)
		 			echo 0;
					
					else 
						echo countlike($id);
			?>		
		 people like <img src ="<?php echo $base; ?>/images/love.png" width = "15" height = "15" /> </td>
		
		</tr>
		</table>
		<?php 
		}
?>
	

	
	</table>
	</center>

</div> 






<div class="comment" style="width:40%; height:auto; margin-top:7%; ">
<form action="" method="post">
Comments :
<br />
<br />
<table height="143">

	
	<tr>
		<td width="257" height="101" valign="top"><textarea style="width:100%; height:80px" name="comments" id="comments"> </textarea>
		<input name="upload_by" type="hidden" value="<?php echo $_SESSION["log"]["username"]; ?>"></td>
	</tr>
	
	<tr>
		<td align="right"><input class="button" type="submit" name="submit" value="Send" id="submit"></td>
	</tr>
</table>
</form>
<br />
<h3 align="left">All Comments :</h3> 
<br />
<table height="96"  style="border-collapse:collapse; width:80%; ">

<?php
		$id=$_GET["cid"]; 
		$q="SELECT * FROM ktube_comment where video_id='$id' ORDER BY id DESC ";
		$r=mysql_query($q);
		
		while ($myrow = mysql_fetch_assoc($r))
		{
		
?>		
		
				<tr>
					<td height="28" style="color:#0066CC; font-size:large"><b> <?php echo $myrow['username']; ?></b> </td>
					<td align="right" style="font-size:smaller"> <?php echo $myrow['date']; ?> </td>
				</tr>
	
				<tr>
					<td colspan="2" height="30%"><?php echo $myrow['user_comment']; ?> <p>&nbsp;</p></td>
				</tr>




<?php

} //while
?>
</table>
</div>
</div>
