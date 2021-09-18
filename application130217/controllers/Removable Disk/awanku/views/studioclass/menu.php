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



<?php
#print_r($_SESSION);
?>

<style>
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
  background-image: url('http://i.imgur.com/RkA9MBo.png');*/
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




	
	<title>AWANKU</title>
	<center>
	<body style="background-color:#EBEBEB"> 
	<div id='cssmenu'>
<ul>
		<li><a href="<?php echo $site."/awanku_control/"?>" style="height:34px;line-height:34px;width:100px;text-align:center;cursor:pointer;"><img src="<?php echo $base."include/menubar/"; ?>menubar_files/css3menu1/home.png"  width="40px" alt=""/></a> 
	
    <li class="has-sub"><a style="height:34px;line-height:34px;width:150px;text-align:center; width:100px;cursor:pointer;"><img src="<?php echo $base."include/menubar/"; ?>menubar_files/css3menu1/kipas.png" width="65px" alt=""/> </a>
      <ul>
        <li><a href="<?php echo $site."/awanku_control/category1"?>"  style="text-align:left; width:120px;">High Impact Education</a></li>
        <li><a href="<?php echo $site."/awanku_control/category2"?>"style="text-align:left; width:120px;">Integrated Services Facilities</a></li>
        <li><a href="<?php echo $site."/awanku_control/category3"?>"  style="text-align:left; width:120px;">Well Informed Society</a></li>
      </ul>
    </li>
	
		
    <li><a onClick="goBack()" style="height:34px;line-height:34px; text-align:center; width:50px;cursor:pointer;"><img src="<?php echo $base."include/menubar/"; ?>menubar_files/css3menu1/256base-redo.png" width="35px" height="35px"  alt="Undo"/>&nbsp 
      </a></li>
	
	<li><a onClick="goForward()" style="height:34px;line-height:34px; text-align:center; width:50px;cursor:pointer;"><img src="<?php echo $base."include/menubar/"; ?>menubar_files/css3menu1/256base-rundo.png" width="35px" height="35px" alt="Redo"/>&nbsp 
      </a></li>
         
    <li class='has-sub'><a style="height:34px;line-height:34px; text-align:center; width:250px;cursor:pointer;"><img src="<?php echo $base."include/menubar/"; ?>menubar_files/css3menu1/service.png" width="35px" height="35px" alt=""/> <?php echo $_SESSION["log"]["fullname"]; ?></a> 
      <ul>
        <li><a href="<?php echo $site."/awanku_control/profail"?>" style="text-align:left; width:250px;">Profile</a></li>
        <li><a href="<?php echo $site."/main_control/logout"?>"  style="text-align:left; width:250px;">Logout</a></li>
      </ul>
    </li>
	
	<li><a href="<?php echo $site."/studioclass_control";?>" style="height:34px;line-height:34px; text-align:center; width:137px;cursor:pointer;"><img src="<?php echo $base; ?>images/1studioclass.png" alt=""width="40px"/></a></li>
</ul>
<!-- End css3menu.com BODY section -->


  <?php /*?><tr>
    <td>&nbsp;</td>
    <td align="right"><strong style=" color:#6600FF;">Welcome:<?php echo $_SESSION["log"]["fullname"]; ?></strong></td>
    <td>&nbsp;</td>
  </tr><?php */?>
</table>
</div>





<?php
if(isset($subj)){

//$subj=$_GET["subj"];

$link="$site/mmlib_control/contentlist/$subj/$ibprofile/$tahap";

//?subj=$data[id]&ibprofile=0&page=0&tahap=1

?>

<div id="cat" align="center">
<?php
$dimension=" width = '95%' height = '40%'";
?>
 <table border="0" cellpadding="5" width="75%">
  <tr>
    <td><center><a href="<?php echo "$site/mmlib_control/contentlist/$subj/1/$tahap"; ?>"><img src ="<?php echo $base; ?>images/profile/i.png" <?php echo $dimension; ?>/></a></center></td>
    <td><center><a href="<?php echo "$site/mmlib_control/contentlist/$subj/2/$tahap"; ?>"><img src ="<?php echo $base; ?>images/profile/k.png" <?php echo $dimension; ?>/></a></center></td>
    <td><center><a href="<?php echo "$site/mmlib_control/contentlist/$subj/3/$tahap"; ?>"><img src ="<?php echo $base; ?>images/profile/t.png" <?php echo $dimension; ?>/></a></center></td>
    <td><center><a href="<?php echo "$site/mmlib_control/contentlist/$subj/4/$tahap"; ?>"><img src ="<?php echo $base; ?>images/profile/co.png" <?php echo $dimension; ?> /></a></center></td>
    <td><center><a href="<?php echo "$site/mmlib_control/contentlist/$subj/5/$tahap"; ?>"><img src ="<?php echo $base; ?>images/profile/p.png" <?php echo $dimension; ?>/></a></center></td>
  </tr>

  <tr>
 	<td><center><a href="<?php echo "$site/mmlib_control/contentlist/$subj/6/$tahap"; ?>"><img src ="<?php echo $base; ?>images/profile/o.png" <?php echo $dimension; ?>/></a></center></td>
	<td><center><a href="<?php echo "$site/mmlib_control/contentlist/$subj/7/$tahap"; ?>"><img src ="<?php echo $base; ?>images/profile/c.png" <?php echo $dimension; ?>/></a></center></td>
    <td><center><a href="<?php echo "$site/mmlib_control/contentlist/$subj/8/$tahap"; ?>"><img src ="<?php echo $base; ?>images/profile/rt.png" <?php echo $dimension; ?>/></a></center></td>
    <td><center><a href="<?php echo "$site/mmlib_control/contentlist/$subj/9/$tahap"; ?>"><img src ="<?php echo $base; ?>images/profile/b.png" <?php echo $dimension; ?>/></a></center></td>
    <td><center><a href="<?php echo "$site/mmlib_control/contentlist/$subj/10/$tahap"; ?>"><img src ="<?php echo $base; ?>images/profile/r.png" <?php echo $dimension; ?>/></a></center></td>
  </tr>
 
</table>

 </div>

<?php
}//if isset dh tekan subjek
?>

<center>


