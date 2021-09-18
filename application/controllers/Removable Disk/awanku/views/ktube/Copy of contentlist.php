<center>
<?php
#print_r($_SESSION);
//error_reporting(0);
function getfnama($uname){
#$conn=mysql_connect("10.46.5.199","tkc","rebel");
#$wn=mysql_select_db("tkc");

$q="SELECT fullname FROM tbl_userinfo WHERE username='$uname'";
		list($name)=mysql_fetch_row(mysql_query($q));
		
#$conn=mysql_connect("10.46.5.201","tkc","rebel");
#$wn=mysql_select_db("ktube");
		
//close($conn);
//mysql_close($conn);

return $name;

}

function getnama($id){
#$conn=mysql_connect("10.46.5.199","tkc","rebel");
#$wn=mysql_select_db("tkc");

$q="SELECT fullname FROM tbl_userinfo WHERE id='$id'";
		list($name)=mysql_fetch_row(mysql_query($q));
		
//close($conn);
//mysql_close($conn);

return $name;

}

function get_deletebutton($uploadid,$idcontent){
#$conn=mysql_connect("10.46.5.201","tkc","rebel");
//$wn=mysql_select_db("ktube");

$q="SELECT COUNT(*) FROM ktube_content WHERE id='$idcontent' AND upload_by='$uploadid'";
		list($int)=mysql_fetch_row(mysql_query($q));
		


return $int;

}

function get_editbutton($uploadid,$idcontent){
#$conn=mysql_connect("10.46.5.201","tkc","rebel");
//$wn=mysql_select_db("ktube");

$q="SELECT COUNT(*) FROM ktube_content WHERE id='$idcontent' AND upload_by='$uploadid'";
		list($int)=mysql_fetch_row(mysql_query($q));
		


return $int;

}

?>

<script type="text/javascript">
    var GB_ROOT_DIR = "<?php echo $base; ?>/include/greybox/";
</script>







<?php


if(isset($_POST["submit"])){
		$news = $_POST['news'];	
		$q="insert into ktube_content set title='$title'";
		$insert=mysql_query($q);	
}
	
if(isset($_GET['delete']))
{
$id=$_GET['delete'];

$q="update ktube_content set flag=0 where id='$id'";

mysql_query($q);





}//delete

?>


<?php
if(isset($_POST["edit"]))
{
$id = $_POST["id"];
$q="update ktube_content set title='$_POST[title]',flag='1' where id='$id'";
mysql_query($q);
//die();
?>
<script language="javascript"> 
opener.location.reload(true);
   self.close();
</script>


<?php
}//if isset


?>



<body>

<script type="text/javascript" src="<?php echo $base; ?>include/greybox/AJS.js"></script>
<script type="text/javascript" src="<?php echo $base; ?>include/greybox/AJS_fx.js"></script>
<script type="text/javascript" src="<?php echo $base; ?>include/greybox/gb_scripts.js"></script>
<link href="<?php echo $base; ?>include/greybox/gb_styles.css" rel="stylesheet" type="text/css" />
<br />

<?php
 
 
	$subjek = $_GET["subj"];
	
	$y="SELECT subject FROM ktube_subject WHERE subject_id = $subjek AND flag='1'";
	$s=mysql_query($y);
	$subjek=mysql_fetch_row($s);

	$qry="SELECT subject_id FROM ktube_subject WHERE subject_id = $_GET[subj] AND flag='1' ";
	$n=mysql_query($qry);
	$no=mysql_fetch_row($n);
	$tahap=$_SESSION["ktube"]["click"]["tahap"];
	
	
	$q="select description from tbl_param where param='leveltahapktube' and var=$tahap";
	list($namatahap)=mysql_fetch_row(mysql_query($q));
	
	$ibprofile=$_SESSION["ktube"]["click"]["ibprofile"];
	if($ibprofile==0){$namaibprofile="Semua";}
	else{
	$q="select profile from ktube_ibprofile where id=$ibprofile";
	list($namaibprofile)=mysql_fetch_row(mysql_query($q));
	}//else
	
	
	
 ?>
<div style="background:#666; width:75%; height:30px; color:#FFF"><u><h2><strong><?php echo strtoupper($namatahap).": ". $subjek[0].": ".$namaibprofile; ?></strong></h2></u></div>
<br />



 <div id="cat">

 <table border="0" cellpadding="5" width="75%">
  <tr>
    <td><center><a href="?cat=1&subj=<?php echo $no[0]."&page=0&tahap=SPM"; ?>"><img src ="<?php echo $base; ?>images/profile/i.png" width = "100%" height = "50%"/></a></center></td>
    <td><center><a href="?cat=2&subj=<?php echo $no[0]."&page=0&tahap=SPM"; ?>"><img src ="<?php echo $base; ?>images/profile/k.png" width = "100%" height = "50%"/></a></center></td>
    <td><center><a href="?cat=3&subj=<?php echo $no[0]."&page=0&tahap=SPM"; ?>"><img src ="<?php echo $base; ?>images/profile/t.png" width = "100%" height = "50%"/></a></center></td>
    <td><center><a href="?cat=4&subj=<?php echo $no[0]."&page=0&tahap=SPM"; ?>"><img src ="<?php echo $base; ?>images/profile/co.png" width = "100%" height = "50%" /></a></center></td>
    <td><center><a href="?cat=5&subj=<?php echo $no[0]."&page=0&tahap=SPM"; ?>"><img src ="<?php echo $base; ?>images/profile/p.png" width = "100%" height = "50%"/></a></center></td>
  </tr>

  <tr>
 	<td><center><a href="?cat=6&subj=<?php echo $no[0]."&page=0&tahap=SPM"; ?>"><img src ="<?php echo $base; ?>images/profile/o.png" width = "100%" height = "50%"/></a></center></td>
	<td><center><a href="?cat=7&subj=<?php echo $no[0]."&page=0&tahap=SPM"; ?>"><img src ="<?php echo $base; ?>images/profile/c.png" width = "100%" height = "50%"/></a></center></td>
    <td><center><a href="?cat=8&subj=<?php echo $no[0]."&page=0&tahap=SPM"; ?>"><img src ="<?php echo $base; ?>images/profile/rt.png" width = "100%" height = "50%"/></a></center></td>
    <td><center><a href="?cat=9&subj=<?php echo $no[0]."&page=0&tahap=SPM"; ?>"><img src ="<?php echo $base; ?>images/profile/b.png" width = "100%" height = "50%"/></a></center></td>
    <td><center><a href="?cat=10&subj=<?php echo $no[0]."&page=0&tahap=SPM"; ?>"><img src ="<?php echo $base; ?>images/profile/r.png" width = "100%" height = "50%"/></a></center></td>
  </tr>
 
</table>

 </div>

<br />
 
</center>