<script type="text/javascript" language="javascript"> 

function goBack() 
{
 window.history.back()
}

window.onkeyup = function (e) 
{
 if (e.keyCode == 27) window.history.back();
}
</script>

<script>
function goForward() {
    window.history.forward();
}
</script>

<?php
#print_r($_SESSION);
?>

<style>
#cssmenu,
#cssmenu ul,
#cssmenu li,
#cssmenu a {
  border: none;
  line-height: 1;
  margin: 0;
  padding: 0;
  
}
#cssmenu {
  height: 50px;
  display: block;
  border: 1px solid;
  border-radius: 5px;
  width: auto;
  border-color: #080808;
  margin: -8px;
  padding: 0;
}
#cssmenu > ul {
  list-style: inside none;
  margin: -10px;
  padding: 0;
  
}
#cssmenu > ul > li {
  list-style: inside none;
  float: left;
  display: inline-block;
  position:inherit;
  margin: 0;
  padding: 0;
  width: auto;
  
}
#cssmenu.align-center > ul {
  text-align: center;
}
#cssmenu.align-center > ul > li {
  float: none;
  margin-left: -3px;
}
#cssmenu.align-center ul ul {
  text-align: left;
}
#cssmenu.align-center > ul > li:first-child > a {
  border-radius: 0;
}
#cssmenu > ul > li > a {
  outline: none;
  display: block;
  position: relative;
  text-align: center;
  text-decoration: none;
  text-shadow: 1px 1px 0 rgba(0, 0, 0, 0.4);
  font-weight: 700;
  font-size: 13px;
  font-family: Arial, Helvetica, sans-serif;
  border-right: 1px solid #080808;
  color: #ffffff;
  padding: 12px 20px;
}
#cssmenu > ul > li:first-child > a {
  border-radius: 5px 0 0 5px;
}
#cssmenu > ul > li > a:after {
  content: "";
  position: absolute;
  border-right: 1px solid;
  top: -1px;
  bottom: -1px;
  right: -2px;
  z-index: 99;
  border-color: #3c3c3c;
}
#cssmenu ul li.has-sub:hover > a:after {
  top: 0;
  bottom: 0;
}
#cssmenu > ul > li.has-sub > a:before {
  content: "";
  position: absolute;
  top: 18px;
  right: 5px;
  border: 5px solid transparent;
  border-top: 5px solid #ffffff;
}
#cssmenu > ul > li.has-sub:hover > a:before {
  top: 19px;
}
#cssmenu > ul > li.has-sub:hover > a {
  padding-bottom: 14px;
  z-index: 999;
  border-color: #3f3f3f;
}
#cssmenu ul li.has-sub:hover > ul,
#cssmenu ul li.has-sub:hover > div {
  display: block;
}
#cssmenu > ul > li.has-sub > a:hover,
#cssmenu > ul > li.has-sub:hover > a {
  background: #3f3f3f;
  border-color: #3f3f3f;
}
#cssmenu ul li > ul,
#cssmenu ul li > div {
  display:none;
  width: auto;
  position: absolute;
  top: 50px;
  background: #3f3f3f;
  border-radius: 0 0 5px 5px;
  z-index: 999;
  padding: 10px 0;
}
#cssmenu ul li > ul {
  width: auto;
}
#cssmenu ul ul ul {
  position: absolute;
}
#cssmenu ul ul li:hover > ul {
  left: 100%;
  top: -10px;
  border-radius: 5px;
}
#cssmenu ul li > ul li {
  display: block;
  list-style: inside none;
  position: relative;
  margin: 0;
  padding: 0;
}
#cssmenu ul li > ul li a {
  outline: none;
  display: block;
  position: relative;
  font: 10pt Arial, Helvetica, sans-serif;
  color: #ffffff;
  text-decoration: none;
  text-shadow: 1px 1px 0 rgba(0, 0, 0, 0.5);
  margin: 0;
  padding: 8px 20px;
}
#cssmenu,
#cssmenu ul ul > li:hover > a,
#cssmenu ul ul li a:hover {
  background: #3c3c3c;
  background: -moz-linear-gradient(top, #3c3c3c 0%, #222222 100%);
  background: -webkit-gradient(linear, left top, left bottom, color-stop(0%, #3c3c3c), color-stop(100%, #222222));
  background: -webkit-linear-gradient(top, #3c3c3c 0%, #222222 100%);
  background: -o-linear-gradient(top, #3c3c3c 0%, #222222 100%);
  background: -ms-linear-gradient(top, #3c3c3c 0%, #222222 100%);
  background: linear-gradient(top, #3c3c3c 0%, #222222 100%);
}
#cssmenu > ul > li > a:hover {
  background: #080808;
  color: #ffffff;
  text-align:left;
  
}
#cssmenu ul ul a:hover {
  color: #ffffff;
  text-align:left;
}
#cssmenu > ul > li.has-sub > a:hover:before {
  border-top: 5px solid #ffffff;
  text-align:left;
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
  text-align: center;
  padding: 5px 13px;
}
#tablektubekeywords tbody tr td.lalign {
  text-align: left;
}

</style>



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

<title>AWANKU</title>
<body style="background-color:#EBEBEB"> 
<center>
<div id='cssmenu'>
<ul>

	<li><a href="<?php echo $site."/awanku_control/"?>" style="height:34px;line-height:34px;width:120px;text-align:center;cursor:pointer;"><img src="<?php echo $base."include/menubar/"; ?>menubar_files/css3menu1/home.png"  width="40px" alt=""/></a> 
	
    <li class="has-sub"><a style="height:34px;line-height:34px;width:150px;text-align:center; width:120px;cursor:pointer;"><img src="<?php echo $base."include/menubar/"; ?>menubar_files/css3menu1/kipas.png" width="65px" alt=""/> </a>
      <ul>
        <li><a href="<?php echo $site."/awanku_control/category1"?>"  style="text-align:left; width:120px;">High Impact Education</a></li>
        <li><a href="<?php echo $site."/awanku_control/category2"?>"style="text-align:left; width:120px;">Integrated Services Facilities</a></li>
        <li><a href="<?php echo $site."/awanku_control/category3"?>"  style="text-align:left; width:120px;">Well Informed Society</a></li>
      </ul>
    </li>
    
<?php /*<?php
if($_SESSION["log"]["level_id"]=="1"){

?>
	<li class='active has-sub'><a href='#' style="height:24px; line-height:24px;"><span>Awanku</span></a>
      <ul>
         <li class='has-sub'><a href="<?php echo $site."/awanku_control/category1"?>" style="text-align:left;">High Impact Education</a></li>
         <li><a href="<?php echo $site."/awanku_control/category2"?>" style="text-align:left;">Integrated Services Facilities</a></li>
         <li><a href="<?php echo $site."/awanku_control/category3"?>" style="text-align:left;">Well Informed Society</a></li>
      </ul>
    </li>



	
<?php
}//if cikgu
?>
	
	
	
	<?php /*?><li class="topmenu"><a href="#" style="height:32px;line-height:32px;"><img src="<?php echo $base."include/menubar/"; ?>menubar_files/css3menu1/256subup.png" alt=""/>Upload</a></li><?php */?>
	  <li><a onClick="goBack()" style="height:34px;line-height:34px; text-align:center; width:120px;cursor:pointer;"><img src="<?php echo $base."include/menubar/"; ?>menubar_files/css3menu1/256base-redo.png" width="35px" height="35px"  alt="Undo"/>&nbsp 
      </a></li>
	
	<li><a onClick="goForward()" style="height:34px;line-height:34px; text-align:center; width:120px;cursor:pointer;"><img src="<?php echo $base."include/menubar/"; ?>menubar_files/css3menu1/256base-rundo.png" width="35px" height="35px" alt="Redo"/>&nbsp 
      </a></li>
         
    <li class='active has-sub'><a style="height:34px;line-height:34px; text-align:center; width:120px;cursor:pointer;"><img src="<?php echo $base."include/menubar/"; ?>menubar_files/css3menu1/service.png" width="35px" height="35px" alt=""/> <?php echo $_SESSION["log"]["fullname"]; ?></a> 
      <ul>
        <li><a href="<?php echo $site."/awanku_control/profail"?>" style="text-align:left; width:120px;">Profile</a></li>
        <li><a href="<?php echo $site."/main_control/logout"?>"  style="text-align:left; width:120px;">Logout</a></li>
      </ul>
    </li>
	
	<li><a href="<?php echo $site."/lessonplan_control";?>" style="height:34px;line-height:34px; text-align:center; width:137px;cursor:pointer;"><img src="<?php echo $base; ?>images/lessonplan.png" width="40px" alt=""/></a>
	</li>
	
	</li>
</ul>

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
<br /> 




<link rel="stylesheet" type="text/css" href="<?php echo $base; ?>include/menu_assets/styles.css" />
<div align="center">

<table border="0">
  <tr>
    <td>Sem 1:Week : </td>
    <td>
	<!-------------------------------------------------------------------------------------------------------------------------------->
	
<div id='cssmenu1' style=" width:100%;">
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
<?php //echo $class;?>
<li <?php if($klik1==$sem1['week']){ echo "class='active '";} ?>>
<a href='<?php echo $site."/lessonplan_control/teacher_plan/1/$sem1[week]/$subject/$class";?>' title="<?php echo $sem1["sem"]; ?>"><span><?php echo $menu_nama; ?></span></a>
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
	
<div id='cssmenu1' style=" width:100%;">
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
<a href='<?php echo $site."/lessonplan_control/teacher_plan/2/$sem1[week]/$subject/$class";?>' title="<?php echo $sem1["sem"]; ?>"><span><?php echo $menu_nama; ?></span></a>
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
<br />

</center></body>


