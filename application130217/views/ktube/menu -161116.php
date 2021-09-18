<html>
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
ul {
 list-style-type: none;
    margin: 0;
    padding: 0;
    overflow: hidden;
    background-color: #333;
}

li {
    float: left;
}

li a {
    display: inline-block;
    color: white;
    text-align: center;
    padding: 14px 50px;
    text-decoration: none;
}

li a:hover:not(.active) {
    background-color: #ddd;
}

li a.active {
    color: white;
    background-color: #4CAF50;
}
li a, .dropbtn {
    display: inline-block;
    color: white;
    text-align: center;
    padding: 14px 50px;
    text-decoration: none;
}

li a:hover, .dropdown:hover .dropbtn {
    background-color: red;
}

li.dropdown {
    display: inline-block;
}

.dropdown-content {
    display: none;
    position: absolute;
    background-color: #f9f9f9;
    min-width: 160px;
    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
}

.dropdown-content a {
    color: black;
    padding: 12px 50px;
    text-decoration: none;
    display: block;
    text-align: left;
}

.dropdown-content a:hover {background-color: #f1f1f1}

.dropdown:hover .dropdown-content {
    display: block;
}

<!------------------------------------------- STRUKTUR TABLE ------------------------------------->

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
}
*/

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
</head>

<title>AWANKU</title>
<center>

<body style="background-color:#EBEBEB"> 
<ul>
  <li><a href="<?php echo $site."/awanku_control/"?>">HOME</a></li>
  
  <li class="dropdown">
 <a href="#" class="dropbtn">CONTENT</a>
    <div class="dropdown-content">
      <a href="<?php echo $site."/ktube_control/contentlist/0/0/0"?>">ALL CONTENT</a>
      <a href="<?php echo base_url('index.php/ktube_control/sourceview')?>">CONTENT SUMMARY</a>
</div>
</li>

    <li class="dropdown">
 <a href="#" class="dropbtn">PT3</a>
    <div class="dropdown-content">
      <a href="#">BAHASA</a>
      <a href="#">Link 2</a>
      <a href="#">Link 3</a>
</div>
</li>

    <li class="dropdown">
 <a href="#" class="dropbtn">SPM</a>
         <?php #$linkurl1="&semua=semua&page=0&tahap=spm"; ?>
        <?php
	$q="SELECT * FROM ktube_subject WHERE spm='1'";
	$r=mysql_query($q);
	while($data=mysql_fetch_array($r)){
	?>
    
    <div class="dropdown-content">
      <a href="<?php echo $site."/ktube_control/contentlist/$data[id]/0/2"?>" style="text-align:left; width:100px;"><?php echo $data["subject"]; ?></a> 
	  <?php
	}//while
	?>
</div>
</li>

  <li class="dropdown">
 <a href="#" class="dropbtn">IB</a>
    <div class="dropdown-content">
      <a href="#">Link 1</a>
      <a href="#">Link 2</a>
      <a href="#">Link 3</a>
</div>
</li>


</ul>

</body>

</html>

