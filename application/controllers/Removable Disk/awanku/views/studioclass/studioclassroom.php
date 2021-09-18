<style type="text/css">
html
{
	font-family:Arial;
	font-size:small;
}
</style>

<?php
function getnama($dataygnak,$table,$condtionfield1,$varcondition){
$q="select $dataygnak from $table where $condtionfield1='$varcondition'";
list($retrun)=mysql_fetch_row(mysql_query($q));

return $retrun;
}//func


?>

<?php
function get_editbutton($idcontent){


$q="SELECT * FROM classlist_v2 WHERE guru_id='$idcontent'";
		list($int)=mysql_fetch_row(mysql_query($q));
		


return $int;

}

?>


  
<div class="menu" align="center" style="width: 760px; position:relative; margin-top:2%; margin-left:auto; margin-right:auto; border:thin solid black 0px;"> 
  <table border="1" cellpadding="2" cellspacing="0" id="tablektube">
    <thead>
      <tr> 
        <th style="padding: 5px;">Bil</th>
        <th style="padding: 5px;">Class</th>
        <th style="padding: 5px;">Classroom Teacher</th>
        <th style="padding: 5px;">Action</th>
      </tr>
    </thead>
    <?php
$bil=0;
$q="select * from classlist_v2 where flag='1'";
$r=mysql_query($q);
while($classroom=mysql_fetch_array($r)){
?>
    <tr> 
      <td style="padding: 5px;"><?php echo $bil+1; ?></td>
      <td style="padding: 5px;"><?php echo $classroom["name"]; ?></td>
      <td style="padding: 5px;"><?php echo getnama("fullname","tbl_userinfo","id",$classroom["guru_id"]); ?></td>
      <td style="padding: 5px;"><a href="<?php echo base_url('index.php/studioclass_control/camclass/?cid='.$classroom["id"].''); ?>" title="<?php echo $classroom["name"]; ?>" target="_blank"><img src ="<?php echo $base; ?>/images/view.png" width = "30" height = "30"/></a> 
        <?php /*?>
        <a href="<?php echo base_url('index.php/studioclass_control/laporan'); ?>" title="<?php echo $classroom["name"]; ?> Report Attendance" rel="gb_page_center[300, 200]" target="_blank"><img src ="<?php echo $base; ?>/images/print.png" width = "30" height = "30"/></a>
        <?php */?>
        
        <?php /*
$edit=get_editbutton($_SESSION["log"]["userid"],$data["id"]);
if($edit==1){
*/
?>

<a href="<?php echo $site;?>/studioclass_control/class_edit?id=<?php echo $classroom["id"]; ?>&level=<?php echo $classroom["level"];?>" title="Edit Title"><img src ="<?php echo $base; ?>/images/edit2.png" width = "25" height = "25"/></a></td>
		   
<?php
//}
?> 
      </td>
    </tr>
    <?php
$bil++;
}
?>
  </table>
</div>
