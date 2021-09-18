<title>AWANKU</title>

<br>
<br>
<br>
<style>
#tablektube {
  display: block;
  width: 90%;
  background: #fff;
  margin: 0 auto;
  padding: 10px 17px;
  -webkit-box-shadow: 2px 2px 3px -1px rgba(0,0,0,0.35);
}


</style>

<?php
$r = mysql_query("Select * from classlist_v2 where flag= '1'");
$row = mysql_fetch_assoc($r);
#print_r($_SESSION);
	function getnama($id,$var1,$table,$fk){
	
	
	#$s["upload_by"],"fullname","tbl_userinfo","id"
	$r="SELECT $var1 FROM $table WHERE $fk='$id'";
			list($name)=mysql_fetch_row(mysql_query($r));
			
	//close($conn);
	//mysql_close($conn);
	
	return $name;
	
	}

?>

<center>
Classroom at TKC
</center><br>

<div class="menu" align="center" style="width: 760px; position:relative; margin-top:2%; margin-left:auto; margin-right:auto; border:thin solid black 0px;"> 

  <table border="1" cellpadding="2" cellspacing="0" id="tablektube">
<thead>
<tr>
  <th style="padding: 1px;">Bil</th>
  <th style="padding: 3px;">Class</th>

</tr>
</thead>
<?php
$bil=0;
$q="select * from classlist_v2 where flag='1'";
$r=mysql_query($q);
while($classroom=mysql_fetch_array($r)){
?>
<tr>
  <td style="padding: 1px;" align="center"><?php echo $bil+1; ?></td>
  <td style="padding: 3px;" align="center"><a href="<?php echo base_url('index.php/report_control/student_list?class_id='.$classroom["id"].''); ?>"><?php echo $classroom["name"]; ?></a></td>
</tr>
<?php
$bil++;
}
?>
</table>
</div>

