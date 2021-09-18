<style type="text/css">

body,td,th {
	font-family: Arial, Helvetica, sans-serif;
}

* {
  margin: 0px;
  padding: 0px;
}
 
body {
  background: #e5e5e7;
}
 
nav {
  font-family: Helvetica, Arial, "Lucida Grande", sans-serif;
  line-height: 1.5;
  margin: 50px auto; /*for display only*/
  width: 200px;
  -webkit-box-shadow: 2px 2px 5px rgba(0,0,0,0.2);
     -moz-box-shadow: 2px 2px 5px rgba(0,0,0,0.2);
          box-shadow: 2px 2px 5px rgba(0,0,0,0.2);
}
 
.menu-item {
  background: #fff;
  width: 200px; 
}

/*Menu Header Styles*/
.menu-item h4 {
  color: #fff;
  font-size: 15px;
  font-weight: 500;
  padding: 7px 12px;
  background: #a90329;
}

.menu-item h4 a {
  color: white;
  display: block;
  text-decoration: none;
  width: 200px;
}

/*Menu Header Styles*/
.menu-item h4 {
  border-bottom: 1px solid rgba(0,0,0,0.3);
  border-top: 1px solid rgba(255,255,255,0.2);
  color: #fff;
  font-size: 15px;
  font-weight: 500;
  padding: 7px 12px;
  
  /*Gradient*/
  background: #a90329; /* Old browsers */
  background: -moz-linear-gradient(top, #a90329 0%, #8f0222 44%, #6d0019 100%); /* FF3.6+ */
  background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,#a90329), color-stop(44%,#8f0222), color-stop(100%,#6d0019)); /* Chrome,Safari4+ */
  background: -webkit-linear-gradient(top, #a90329 0%,#8f0222 44%,#6d0019 100%); /* Chrome10+,Safari5.1+ */
  background: -o-linear-gradient(top, #a90329 0%,#8f0222 44%,#6d0019 100%); /* Opera 11.10+ */
  background: -ms-linear-gradient(top, #a90329 0%,#8f0222 44%,#6d0019 100%); /* IE10+ */
  background: linear-gradient(top, #a90329 0%,#8f0222 44%,#6d0019 100%); /* W3C */
  filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#a90329', endColorstr='#6d0019',GradientType=0 ); /* IE6-9 */
}

.menu-item h4:hover {  
  background: #cc002c; /* Old browsers */
  background: -moz-linear-gradient(top,  #cc002c 0%, #6d0019 100%); /* FF3.6+ */
  background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,#cc002c), color-stop(100%,#6d0019)); /* Chrome,Safari4+ */
  background: -webkit-linear-gradient(top,  #cc002c 0%,#6d0019 100%); /* Chrome10+,Safari5.1+ */
  background: -o-linear-gradient(top,  #cc002c 0%,#6d0019 100%); /* Opera 11.10+ */
  background: -ms-linear-gradient(top,  #cc002c 0%,#6d0019 100%); /* IE10+ */
  background: linear-gradient(top,  #cc002c 0%,#6d0019 100%); /* W3C */
  filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#cc002c', endColorstr='#6d0019',GradientType=0 ); /* IE6-9 */
}




/*ul Styles*/
.menu-item ul {
  background: #fff;
  font-size: 13px;
  line-height: 30px;
  list-style-type: none;
  overflow: hidden;
  padding: 0px;
}
 
.menu-item ul a {
  margin-left: 20px;
  text-decoration: none;
  color: #333333;
  display: block;
  width: 200px;
}
 
/*li Styles*/
.menu-item li {
  border-bottom: 1px solid #eee;
}
 
.menu-item li:hover {
  background: #eee;
}

/*ul Styles*/
.menu-item ul {
  background: #fff;
  font-size: 13px;
  line-height: 30px;
  height: 0px; /*Collapses the menu*/
  list-style-type: none;
  overflow: hidden;
  padding: 0px;
}


/*ul Styles*/
.menu-item ul {
  background: #fff;
  font-size: 13px;
  line-height: 30px;
  height: 0px;
  list-style-type: none;
  overflow: hidden;
  padding: 0px;
  
  /*Animation*/
  -webkit-transition: height 1s ease;
     -moz-transition: height 1s ease;
       -o-transition: height 1s ease;
      -ms-transition: height 1s ease;
          transition: height 1s ease;
}


.menu-item:hover ul {
  height: auto;
}
/**** SECOND LEVEL MENU ****/
/* We make the position to absolute for flyout menu and hidden the ul until the user hover the parent li item */
.menu-item ul li ul{
    position:absolute;
    display:none;
}

/* When user has hovered the li item, we show the ul list by applying display:block, note: 150px is the individual menu width.  */
.menu-item ul li:hover ul{
    left:28%;
    top:27%;
	width:10%;
    display:block;
}

/* we apply different background color to 2nd level menu items*/
.menu-item ul li ul li{
    background-color:#FFFFFF;

}

/* We change the background color for the level 2 submenu when hovering the menu */
.menu-item ul li:hover ul li:hover{
    background-color:#CCCCCC;
}

/* We style the color of level 2 links */
.menu-item ul li ul li a{
    color:#454444;

    display:inline-block;
    width:100%;
}

</style>

<div align="center" style="width:100%; background-color:#000066; height:6%; margin-top:2%">
	
	<h1 style="color:#FFFFFF">International Language</h1>

</div>

<div id="maindiv" align="center" style="width:100%; background-color:#FFFFFF; height:100%; margin-top:1%">

<div id="category" style="float:left; margin-top:2%; margin-left:1%; width:1%" >

<nav>

    <div class="menu-item">
      <h4><a href="#">Mandarin</a></h4>
      <ul>
          <li><a href="?sub_id=12&form_id=1">Form 1</a></li>
          <li><a href="?sub_id=12&form_id=2">Form 2</a></li>
          <li><a href="?sub_id=12&form_id=3">Form 3</a></li>
          <li><a href="?sub_id=12&form_id=4">Form 4</a></li>
          <li><a href="?sub_id=12&form_id=5">Form 5</a></li>
      </ul>
    </div>
      
    <div class="menu-item">
      <h4><a href="#">Japanese</a></h4>
      <ul>
          <li><a href="?sub_id=14&form_id=1">Form 1</a></li>
          <li><a href="?sub_id=14&form_id=2">Form 2</a></li>
          <li><a href="?sub_id=14&form_id=3">Form 3</a></li>
          <li><a href="?sub_id=14&form_id=4">Form 4</a></li>
          <li><a href="?sub_id=14&form_id=5">Form 5</a></li>
      </ul>
    </div>
      
    <div class="menu-item">
      <h4><a href="#">Arabic</a></h4>
      <ul>
          <li><a href="?sub_id=16&form_id=1">Form 1</a></li>
          <li><a href="?sub_id=16&form_id=2">Form 2</a></li>
          <li><a href="?sub_id=16&form_id=3">Form 3</a></li>
          <li><a href="?sub_id=16&form_id=4">Form 4</a></li>
          <li><a href="?sub_id=16&form_id=5">Form 5</a></li>
      </ul>
    </div>
	
	
	<div class="menu-item">
      <h4><a href="#">French</a></h4>
      <ul>
          <li><a href="?sub_id=18&form_id=1">Form 1</a></li>
          <li><a href="?sub_id=18&form_id=2">Form 2</a></li>
          <li><a href="?sub_id=18&form_id=3">Form 3</a></li>
          <li><a href="?sub_id=18&form_id=4">Form 4</a></li>
          <li><a href="?sub_id=18&form_id=5">Form 5</a></li>
      </ul>
    </div>	
	
</nav>


</div>
<br /><br />
<?php 
if($_GET["sub_id"]=='0' && $_GET["form_id"]=='0'){
	
	echo "<b>Development On Progress <br><br> sorry for inconvenience</b>";
	
	
}

else {
$q="SELECT * FROM ktube_subject WHERE id=$_GET[sub_id]";
$r=mysql_query($q);
while($c=mysql_fetch_array($r)){

$name=$c["subject"];
?>
<center><b> 
<?php
echo $name; ?> From <?php echo $_GET["form_id"];
}
?> </b></center>

<div id="cctv" style="float:right; width:80%; height:auto; background-color:#FFFFCC; margin-top:5%; margin-right:2%">

	    <div class="bottominfo" style="clear:both;">
		<div class="bottominfoleft" style="float:left;padding: 5px; border-width: 1px;  border-color: #000000; width:47%;">
	<iframe src="student_list?sub_id=<?php echo $_GET['sub_id'];?>&form_id=<?php echo $_GET['form_id'];?>" width="100%" height="700px" frameborder="0" scrolling="auto"></iframe>
		</div> 
        
		<div class="bottominfoblank" style="float:left;padding: 5px;"></div>
		<div class="bottominforight" style="float:right;padding: 5px; border-width: 1px;  border-color: #000000; width:47%;">
		
        	<iframe src="senaraipelajar?sub_id=<?php echo $_GET['sub_id'];?>&form_id=<?php echo $_GET['form_id'];?>" width="100%" height="700px" frameborder="0" scrolling="auto"></iframe>
		</div>
	</div>



<?php }?>

<br />
<br />
</div>






</div>