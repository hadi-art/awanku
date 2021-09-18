<?php
$class=$_GET["q"];

echo $class;
$r = mysql_query("SELECT * FROM tbl_userinfo WHERE class_id=$class");
$data = mysql_fetch_assoc($r);
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

 <table border="1" cellpadding="2" cellspacing="0" id="tablektube">
    <tr> 
		<th style="padding: 5px;">Seq</th>
      <th style="padding: 5px;">Student Name</th>
	  <th style="padding: 5px;">Class</th>
    </tr>
    <tr> 
	<?php
while($data=mysql_fetch_array($r))
{
?>
	<td align="center" style="border-right: thin solid black; border-right: thin solid black; border-bottom: thin solid black; padding:4px;" class="lefttd"><input type="checkbox" name="id[]" value="<?php echo $data["id"]; ?>"  <?php echo $disabled." ".$disabledx." ".$disabledy; ?>/><?php #echo $bil; ?></td>

      <td align="center"><?php echo $data["fullname"]; ?></td>
	  <td align="center"><?php echo getnama($data["class_id"],"name","classlist_v2","id"); ?></td>
    </tr>
<?php }?>
  </table>