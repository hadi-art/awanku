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
$class=$_GET["cid"];
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
/*
#tablektubekeywords thead tr th.headerSortUp span {
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

@charset "UTF-8";
/* Base Styles */
#cssmenu > ul,
#cssmenu > ul li,
#cssmenu > ul ul {
  list-style: none;
  margin: 0;
  padding: 0;
  
}
#cssmenu > ul {
  margin:-8px;
  position: relative;
  z-index: 597;
    

  
}
#cssmenu > ul li {
  float: left;
  min-height: 1px;
  line-height: 1.3em;
  vertical-align: middle;
    

}
#cssmenu > ul li.hover,
#cssmenu > ul li:hover {
  position: relative;
  z-index: 599;
  cursor:pointer;
    

}
#cssmenu > ul ul {
  visibility: hidden;
  position: absolute;
  top: 100%;
  left: 0;
  z-index: 598;
  width: 100%;
    

}
#cssmenu > ul ul li {
  float:left;
    

}
#cssmenu > ul ul ul {
  top: 1px;
  left: 99%;
    

}
#cssmenu > ul li:hover > ul {
  visibility: visible;
}
/* Align last drop down RTL */
#cssmenu > ul > li.last ul ul {
  left: auto !important;
  right: 99%;
}
#cssmenu > ul > li.last ul {
  left: auto;
  right: 0;
}
#cssmenu > ul > li.last {
  text-align: right;
}
/* Theme Styles */
#cssmenu > ul {
  font-family: Calibri, Tahoma, Arial, sans-serif;
  border: 1px solid;
  border-radius: 5px;
  font-size: 14px;
  color:#FFFFFF;
  background:#333333;
  width: auto;
}
#cssmenu > ul:before {
  content: '';
  display: block;
    

}
#cssmenu > ul:after {
  content: '';
  display: table;
  clear: both;
   

}
#cssmenu > ul li a {
  display: inline-block;
  padding: 10px 22px;
  
}
#cssmenu > ul > li.active,
#cssmenu > ul > li.active:hover {
  background-color:#000000;
   

}
#cssmenu > ul > li > a:link,
#cssmenu > ul > li > a:active,
#cssmenu > ul > li > a:visited {
  color:#FFFFFF;

}
#cssmenu > ul > li > a:hover {
    color:#FFFFFF;

}
#cssmenu > ul ul ul {
  top: 0;
}
#cssmenu > ul li li {

  background-color:#333333;
  text-align:left;
  text-decoration: none;
  font-size: 13px;
  color:#FFFFFF;
  font-family: Arial, Helvetica, sans-serif;

}
#cssmenu > ul > li.hover,
#cssmenu > ul > li:hover {
  background-color:#999999;
  color:#FFFFFF;
}
#cssmenu > ul a:link,
#cssmenu > ul a:visited {
  color:#FFFFFF;
  text-decoration: none;
}
#cssmenu > ul a:hover {
   color:#000000;
   
}
#cssmenu > ul a:active {
  color:#000000;

}
#cssmenu > ul ul {
  -webkit-box-shadow: 0 0px 2px 1px rgba(0, 0, 0, 0.15);
  -moz-box-shadow: 0 0px 2px 1px rgba(0, 0, 0, 0.15);
  box-shadow: 0 0px 2px 1px rgba(0, 0, 0, 0.15);
  width:auto;
}
</style>


<title>AWANKU</title>
<body style="background-color:#EBEBEB"> 
<center>
<div id='cssmenu'>
<ul>
			
				<li><a href="<?php echo $site."/awanku_control/"?>" style="height:34px;line-height:34px;width:70px;text-align:center;cursor:pointer;"><img src="<?php echo $base."include/menubar/"; ?>menubar_files/css3menu1/home.png"  width="40px" alt=""/></a> 
	
  <li class="has-sub"><a style="height:34px;line-height:34px;width:150px;text-align:center; width:100px;cursor:pointer;"><img src="<?php echo $base."include/menubar/"; ?>menubar_files/css3menu1/kipas.png" width="65px" alt=""/> </a>
      <ul>
        <li><a href="<?php echo $site."/awanku_control/category1"?>"  style="text-align:left; width:100px;">High Impact Education</a></li>
        <li><a href="<?php echo $site."/awanku_control/category2"?>"style="text-align:left; width:100px;">Integrated Services Facilities</a></li>
        <li><a href="<?php echo $site."/awanku_control/category3"?>"  style="text-align:left; width:100px;">Well Informed Society</a></li>
      </ul>
    </li>
		<li><a href="<?php echo $site."/lessonplan_control/studentquiz/?cid=$class";?>" style="height:34px;line-height:34px;width:100px;text-align:center;cursor:pointer;"><img src="<?php echo $base; ?>images/1assess.png"  width="40px" alt=""/></a>
 <?php /*   
<?php
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
	
	  <li><a onClick="goBack()" style="height:34px;line-height:34px; text-align:center; width:50px;cursor:pointer;"><img src="<?php echo $base."include/menubar/"; ?>menubar_files/css3menu1/256base-redo.png" width="35px" height="35px"  alt="Undo"/>&nbsp 
      </a></li>
	
	<li><a onClick="goForward()" style="height:34px;line-height:34px; text-align:center; width:50px;cursor:pointer;"><img src="<?php echo $base."include/menubar/"; ?>menubar_files/css3menu1/256base-rundo.png" width="35px" height="35px" alt="Redo"/>&nbsp 
      </a></li>
         
    <li class='has-sub'><a style="height:34px;line-height:34px; text-align:center; width:300px;cursor:pointer;"><img src="<?php echo $base."include/menubar/"; ?>menubar_files/css3menu1/service.png" width="35px" height="35px" alt=""/> <?php echo $_SESSION["log"]["fullname"]; ?></a> 
      <ul>
        <li><a href="<?php echo $site."/awanku_control/profail"?>" style="text-align:left; width:300px;">Profile</a></li>
        <li><a href="<?php echo $site."/main_control/logout"?>"  style="text-align:left; width:300px;">Logout</a></li>
      </ul>
    </li>
</ul>

</div>




<?php
if(isset($subject)){
?>


<?php 

echo getnama($subject,"subject","ktube_subject","subject_id");

?>




<br>
<br><br>



<?php
}//if isset dh tekan subjek
?>


</center></body>


