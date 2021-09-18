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
?>
<style>
#tablektubekeywords.table { border-collapse: collapse; border-spacing: 0; }
#tablektubekeywords.img { border: 0; max-width: 100%; }

h1 { 
  font-family: 'Amarante', Tahoma, sans-serif;
  font-weight: bold;
  font-size: 2.2em;
  line-height: 1.7em;
  margin-bottom: 10px;
  text-align: center;
}


/** page structure **/
#tablektube {
  display: block;
  width: 100%;
  background: #fff;
  margin: 0 auto;
  padding: 10px 15px;
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

#tablektubekeywords thead tr th.headerSortUp span {
  background-image: url('http://i.imgur.com/SP99ZPJ.png');
}
#tablektubekeywords thead tr th.headerSortDown span {
  background-image: url('http://i.imgur.com/RkA9MBo.png');
}


#tablektubekeywords tbody tr { 
  color: #555;
}
#tablektubekeywords tbody tr td {
  text-align: left;
  padding: 5px 13px;
}
#tablektubekeywords tbody tr td.lalign {
  text-align: left;
}
</style>


<link rel="stylesheet" type="text/css" href="<?php echo $base; ?>include/menu_assets/styles.css" />


<div align="center">
<table border="0">
  <tr>
    <td>
<!------------------------------------------------logo-----------------------------------------------------------------	-->
	
	<?php 
	
	$data=array(
					'page' => "AWANKU",
					'site' => site_url(),
					'base' => base_url()
					
					);
	$this->load->view('template/bannerkecik',$data); 
	
	?>
	
<!------------------------------------------------end logo-----------------------------------------------------------------	-->	</td>
    <td>
	
	
<!------------------------------------------------menu bar-----------------------------------------------------------------	-->	
	
		<!-- Start css3menu.com HEAD section -->
	<link rel="stylesheet" href="<?php echo $base."include/menubar/"; ?>menubar_files/css3menu1/style.css" type="text/css" /><style type="text/css">._css3m{display:none}</style>
	<!-- End css3menu.com HEAD section -->
<body style="background-color:#EBEBEB">
<!-- Start css3menu.com BODY section -->
<ul id="css3menu1" class="topmenu">
<input type="checkbox" id="css3menu-switcher" class="switchbox"><label onclick="" class="switch" for="css3menu-switcher"></label>	
	<li class="topfirst"><a href="<?php echo $site."/lessonplanner_control/plannerlesson_subject";?>" style="height:32px;line-height:32px;"><img src="<?php echo $base; ?>images/lessonplanner.png" width="32" height="32" alt=""/>L.Planner</a></li>
	
	<li class="topmenu"><a style="height:32px;line-height:32px;"><img src="<?php echo $base."include/menubar/"; ?>menubar_files/css3menu1/home.png" alt=""/>Awanku</a>
		<ul>
		<li><a href="<?php echo $site."/awanku_control/category1"?>">High Impact Education</a></li>
		<li><a href="<?php echo $site."/awanku_control/category2"?>">Integrated Services Facilities</a></li>
		<li><a href="<?php echo $site."/awanku_control/category3"?>">Well Informed Society</a></li>
		</ul>
	
	
	</li>
	
	<li class="topmenu">
	<a style="height:32px;line-height:32px;"><span>Subjek</span></a>

	<ul>
	<?php #$linkurl1="&semua=semua&page=0&tahap=spm"; ?>
	
	
	<?php
	$q="SELECT * FROM ktube_subject WHERE spm='1' or pmr='1'";
	$r=mysql_query($q);
	while($data=mysql_fetch_array($r)){
	?>
	<li>
	<a href="<?php echo $site."/lessonplanner_control/teacher_planner/1/1/$data[id]";?>"><?php echo $data["subject"]; ?></a>
	<?php /*?><a href="<?php echo $site."/lessonplanner_control/teacher_planner?sem=1&week=1&subject_id=1";?>"><?php echo $data["subject"]; ?></a><?php */?>
	</li>
	<?php
	}//while
	?>
	</ul></li>
	
	
	
	<?php /*?><li class="topmenu"><a href="#" style="height:32px;line-height:32px;"><img src="<?php echo $base."include/menubar/"; ?>menubar_files/css3menu1/256subup.png" alt=""/>Upload</a></li><?php */?>
	
	<li class="topmenu"><a onclick="goBack()" style="height:32px;line-height:32px;"><img src="<?php echo $base."include/menubar/"; ?>menubar_files/css3menu1/256base-redo.png" alt="Undo"/>&nbsp</a></li>
	
	<li class="topmenu"><a onclick="goForward()" style="height:32px;line-height:32px;"><img src="<?php echo $base."include/menubar/"; ?>menubar_files/css3menu1/256base-rundo.png" alt="Redo"/>&nbsp</a></li>
	
	<li class="toplast"><a href="#" style="height:32px;line-height:32px;"><img src="<?php echo $base."include/menubar/"; ?>menubar_files/css3menu1/service.png" alt=""/><?php echo $_SESSION["log"]["fullname"]; ?></a>
		<ul>
		<li><a href="<?php echo $site."/main_control/logout"?>">Logout</a></li>
		</ul>
	</li>
</ul>
<!-- End css3menu.com BODY section -->


<!------------------------------------------------end menu bar-----------------------------------------------------------------	-->	</td>
	
	<td>
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src="<?php echo $base; ?>images/lessonplanner.png" alt="K tube" width="100" height="60"/></td>
  </tr>
  <?php /*?><tr>
    <td>&nbsp;</td>
    <td align="right"><strong style=" color:#6600FF;">Welcome:<?php echo $_SESSION["log"]["fullname"]; ?></strong></td>
    <td>&nbsp;</td>
  </tr><?php */?>
</table>
</div>




<?php
if(isset($subject)){
?>

<center>

<div style="background:#666; width:75%; height:30px; color:#FFF"><u><h2><strong>
<?php 

echo getnama($subject,"subject","ktube_subject","subject_id");

?>
<!--yg bawah ni utk view semua spm atau semua pmr content-->
<?php #echo $site."/ktube_control/contentlist?subj=0&ibprofile=0&page=0&tahap=2"?>
<?php #echo $site."/ktube_control/contentlist?subj=0&ibprofile=0&page=0&tahap=1"?>
</strong></h2></u></div>




<div align="center">

<table border="0">
  <tr>
    <td>Sem 1:Week : </td>
    <td>
	<!-------------------------------------------------------------------------------------------------------------------------------->
	
<div id='cssmenu' style=" width:100%;">
<ul>
<?php

//$group=$_GET["sem"];
$group=$sem;
$q4=mysql_query("select * from ilearn_week where flag =1 and sem=1");

while($sem1=mysql_fetch_array($q4)){

if($group=="1"){
$klik1=$week;
}
else{$klik1="";}


#$menu_nama=ellipse($sem1["nama"],12,$crop_str='...');
$menu_nama=sprintf('%02d',$sem1["week"]);
#sprintf('%08d', 1234567);
?>

<li <?php if($klik1==$sem1['week']){ echo "class='active '";} ?>>
<a href='<?php echo $site."/lessonplanner_control/teacher_planner/1/$sem1[week]/$subject";?>' title="<?php echo $sem1["sem"]; ?>"><span><?php echo $menu_nama; ?></span></a>
</li>

<?php
}//while
?>	
</ul>
</div>
	
	
	
<!-------------------------------------------------------------------------------------------------------------------------------->	
	
		
	</td>
  </tr>
  <tr>
    <td>Sem 2:Week :</td>
    <td>
	
		<!--------------------------------------------------------sem 2------------------------------------------------------------------------>
	
<div id='cssmenu' style=" width:100%;">
<ul>
<?php

$group=$sem;
$q4=mysql_query("select * from ilearn_week where flag =1 and sem=2");

while($sem1=mysql_fetch_array($q4)){

if($group=="2"){
$klik1=$week;
}
else{$klik1="";}


#$menu_nama=ellipse($sem1["nama"],12,$crop_str='...');
$menu_nama=$sem1["week"];
?>

<li <?php if($klik1==$sem1['week']){ echo "class='active '";} ?>>
<a href='<?php echo $site."/lessonplanner_control/teacher_planner/2/$sem1[week]/$subject";?>' title="<?php echo $sem1["sem"]; ?>"><span><?php echo $menu_nama; ?></span></a>
</li>

<?php
}//while
?>	
</ul>
</div>
	
	
	
<!-------------------------------------------------------------------------------------------------------------------------------->	
	
	</td>
  </tr>
</table>


<?php
}//if isset dh tekan subjek
?>
</div>




