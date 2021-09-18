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

<style>
#tablektubekeywords.table { border-collapse: collapse; border-spacing: 0; }
#tablektubekeywords.img { border: 0; max-width: 100%; }

h1 { 
  font-family: 'Amarante', Tahoma, sans-serif;
  font-weight: bold;
  font-size: 3.6em;
  line-height: 1.7em;
  margin-bottom: 10px;
  text-align: center;
}
#cssmenu,
#cssmenu ul,
#cssmenu li,
#cssmenu a {
  border: none;
  line-height: 1;
  margin: 0px;
  padding: 0px;
}
#cssmenu {
  height: 50px;
  display: block;
  border: 1px solid;
  border-radius: 5px;
  width: auto;
  border-color: #080808;
  margin: -8px;
  padding: 0px;
}
#cssmenu > ul {
  list-style: inside none;
  margin: 0;
  padding: 0;
}
#cssmenu > ul > li {
  list-style: inside none;
  float: left;
  display: inline-block;
  position: relative;
  margin: 0;
  padding: 0;
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
  right: 6px;
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
  display: none;
  width: auto;
  position: absolute;
  top: 50px;
  background: #3f3f3f;
  border-radius: 0 0 5px 5px;
  z-index: 999;
  padding: 10px 0;
}
#cssmenu ul li > ul {
  width: 200px;
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




<title>AWANKU</title><center>
<body style="background-color:#EBEBEB"> 
<div id='cssmenu'>
<ul>
		
		<li><a href="<?php echo $site."/awanku_control/"?>" style="height:24px;line-height:24px;"><img src="<?php echo $base."include/menubar/"; ?>menubar_files/css3menu1/home.png" alt=""/></a>
		
		<li class="has-sub"><a style="height:24px;line-height:24px;">Awanku</a>
		<ul>
		<li><a href="<?php echo $site."/awanku_control/category1"?>" style="text-align:left;">High Impact Education</a></li>
		<li><a href="<?php echo $site."/awanku_control/category2"?>" style="text-align:left;">Integrated Services Facilities</a></li>
		<li><a href="<?php echo $site."/awanku_control/category3"?>" style="text-align:left;">Well Informed Society</a></li>
		</ul>
	
	</li>


	<li><a onClick="goBack()" style="height:24px;line-height:24px; cursor:pointer;"><img src="<?php echo $base."include/menubar/"; ?>menubar_files/css3menu1/256base-redo.png" width="32px" height="32px"  alt="Undo"/>&nbsp </a></li>
	
	<li><a onClick="goForward()" style="height:24px;line-height:24px; cursor:pointer;"><img src="<?php echo $base."include/menubar/"; ?>menubar_files/css3menu1/256base-rundo.png" width="32px" height="32px" alt="Redo"/>&nbsp </a></li>
	
    
         <li class='has-sub'><a href='#' style="text-align:left; height:24px; line-height:24px;"><span>SPM</span></a>
            <ul>
	<?php #$linkurl1="&semua=semua&page=0&tahap=spm"; ?>
	
	
	<?php
	$q="SELECT * FROM ktube_subject WHERE spm='1'";
	$r=mysql_query($q);
	while($data=mysql_fetch_array($r)){
	?>
	<li><a href="<?php echo $site."/mmlib_control/contentlist/$data[id]/0/2"?>" style="text-align:left;"><?php echo $data["subject"]; ?></a>
	
	<!--tahap =2 adalah spm-->
	<!--ibprofile=0 adalah semua ib-->
			<!-----sub sub menu----------------------------------------------------------------------------->
			<?php /*?><ul>
			<?php
			$q2="SELECT * FROM ktube_ibprofile WHERE flag='1'";
			$r2=mysql_query($q2);
			while($dataib=mysql_fetch_array($r2)){
			?>
			<li><a href="<?php echo $site."/ktube_control/contentlist?subj=$data[id]&ibprofile=$dataib[id]&page=0&tahap=2"?>"><?php echo $dataib["profile"]; ?></a></li>
			<?php
			}//while
			?>
			</ul><?php */?>
			<!-----sub sub menu----------------------------------------------------------------------------->
	</li>
	<?php
	}//while
	?>
	</ul></li>
         
         <li class='active has-sub'><a href='#' style="height:24px; line-height:24px;"><span>PT3</span></a>
         <ul>
	<?php
	$q="SELECT * FROM ktube_subject WHERE pmr='1'";
	$r=mysql_query($q);
	while($data=mysql_fetch_array($r)){
	?>
	<li><a href="<?php echo $site."/mmlib_control/contentlist/$data[id]/0/1"?>" style="text-align:left;"><?php echo $data["subject"]; ?></a>
	<!--tahap =1 adalah pmr-->
	<!--ibprofile=0 adalah semua ib-->
	<!-----sub sub menu----------------------------------------------------------------------------->
			<?php /*?><ul>
			<?php
			$q2="SELECT * FROM ktube_ibprofile WHERE flag='1'";
			$r2=mysql_query($q2);
			while($dataib=mysql_fetch_array($r2)){
			?>
			<li><a href="<?php echo $site."/ktube_control/contentlist?subj=$data[id]&ibprofile=$dataib[id]&page=0&tahap=1"?>"><?php echo $dataib["profile"]; ?></a></li>
			<?php
			}//while
			?>
			</ul><?php */?>
			<!-----sub sub menu----------------------------------------------------------------------------->
	</li>
	<?php
	}//while
	?>
	</ul></li>
	
	
	
		
		<li class="has-sub"><a style="height:24px;line-height:24px;"><img src="<?php echo $base."include/menubar/"; ?>menubar_files/css3menu1/service.png" width="32px" height="32px"  alt=""/><?php echo $_SESSION["log"]["fullname"]; ?></a>
		<ul>
		<li><a href="<?php echo $site."/main_control/logout"?>" style="text-align:left;" >Logout</a></li>
		</ul>
	</li>
	
	
	<li><a href="<?php echo $site."/mmlib_control";?>" style="height:24px;line-height:24px;"><img src="<?php echo $base; ?>images/mmlib.png"width="34px" height="34px" alt=""/></a></li>
</ul>
</div>


<br>
<br>


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




