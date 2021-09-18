
<link rel="stylesheet" href="<?php echo $base."include/menuvanigate/"; ?>layout.css" type="text/css" media="screen">
<link rel="stylesheet" href="<?php echo $base."include/menuvanigate/"; ?>menu.css" type="text/css" media="screen">

<div class="container">

<?php
    $q="SELECT * FROM class_set group by sub_name";
    $title=mysql_query($q);
   
   
    
    while ($row = mysql_fetch_array($title)) {
        
        $sub = $row["subject_id"];
        
        $q="SELECT * FROM class_set WHERE subject_id='$row[subject_id]'";
        $name=mysql_query($q);
        
    ?>
<ul id="nav">
<li><a href="#"><?php echo $row["sub_name"];?></a>

<div class="subs">
<div class="col">
<ul><?php while ($b = mysql_fetch_array($name)) {  ?>
<li><a href="?form=<?php echo $b["form"];?>&subject=<?php echo $b["subject_id"];?>&group=<?php echo $b["set_id"];?>">FORM <?php echo $b["form"]; echo ' - '; echo $b["group_set"];?></a></li>
<?php } ?></ul>
</div>
</div>
</li>
</ul>

<?php } ?>
</div>
<br><br>


<?php
    if($_GET["group"]=='0'){
        
        
    }
    
    else {
        $q="SELECT * FROM ktube_subject WHERE subject_id='$_GET[subject]'";
        $r=mysql_query($q);
        while($c=mysql_fetch_array($r)){
            
            $subject_name=$c["subject"];
            
            $q="SELECT group_set FROM class_set WHERE set_id='$_GET[group]'";
            list($set)=mysql_fetch_row(mysql_query($q));
    ?>
<br /><br /><br /><br />
<div style="background-color:#0CC; height:20px;"><center><b><?php echo $subject_name; ?> From <?php echo $_GET["form"]; ?> - <?php echo $set; }?> </b></center></div>
<div id="cctv" style="width:80%; height:auto; background-color:#FFFFCC; margin-top:2%; margin-right:2%">

<div class="bottominfo" style="clear:both;">
<div class="bottominfoleft" style="float:left;padding: 5px; border-width: 1px;  border-color: #000000; width:47%;">

<iframe src="student_list?form=<?php echo $_GET['form'];?>&subject=<?php echo $_GET['subject'];?>&group=<?php echo $_GET["group"];?>" width="100%" height="700px" frameborder="0" scrolling="auto"></iframe>
</div>

<div class="bottominforight" style="float:right;padding: 5px; border-width: 1px;  border-color: #000000; width:47%;">
<iframe src="senaraipelajar?form=<?php echo $_GET['form'];?>&subject=<?php echo $_GET['subject'];?>&group=<?php echo $_GET["group"];?>" width="100%" height="700px" frameborder="0" scrolling="auto"></iframe>
</div>
</div>

</div>

<?php
    } //else
    ?>

<br /><br />
</div>

