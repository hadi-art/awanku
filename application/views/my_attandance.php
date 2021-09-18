<?php

		include "attn_function.php";

		$q44="SELECT sUserName FROM tb_user WHERE sUserID='900001'";
		list($level)=mysql_fetch_row(mysql_query($q44));
		$level;
		

		$datenak = date("Y-m");
//print_r($_SESSION);	
		$noic= $_SESSION["log"]["noic"];

		$qx="select sUserName,sGroup,sUserID from tb_user where sEmail='$noic'";
		list($namauser,$group_id,$idn)=mysql_fetch_row(mysql_query($qx));	


			if ($group_id == 'S01')
			{
				$in = "staff1_getin";
				$lunch_out = "staff1_lunch_out";	
				$lunch_in = "staff1_lunch_in";
				$out = "staff1_getout";
			}
			
			else if ($group_id == 'S02')
			{
				$in = "staff2_getin";
				$lunch_out = "staff2_lunch_out";	
				$lunch_in = "staff2_lunch_in";
				$out = "staff2_getout";	
			}
			
			else if ($group_id == 'G01')
			{
				$in = "guru1_getin";
				$lunch_out = "";	
				$lunch_in = "";
				$out = "guru1_getout";	
			}
			
			else if ($group_id == 'G02')
			{
				$in = "guru2_getin";
				$lunch_out = "";	
				$lunch_in = "";
				$out = "guru2_getout";	
			}
			
			else if ($group_id == 'G03')
			{
				$in = "guru3_getin";
				$lunch_out = "";	
				$lunch_in = "";
				$out = "guru3_getout";	
			}
			
			
			else if ($group_id == 'TTT')
			{
				$in = "TTT_getin";
				$lunch_out = "";	
				$lunch_in = "";
				$out = "TTT_getout";	
			}

?>


<div align="center">


		

            <br>
            <br>
            
            <table width="600" border="1" cellpadding="1" cellspacing="0" bgcolor="#FFFFCC">
             
              <tr>
                <td colspan="5">Name : <?php echo $namauser; ?></td>
                <td>&nbsp;</td>
                <td colspan="5">User ID : <?php echo $idn; ?></td>
              </tr>
              
              <tr>
                <td colspan="5">&nbsp;</td>
                <td>&nbsp;</td>
                <td colspan="5">Group : <?php echo $group_id; ?></td>
              </tr>
              
              <tr>
                <td colspan="5">&nbsp;</td>
                <td>&nbsp;</td>
                <td colspan="5">Month=<?php 
                    $datenak; 
                    $yrdata= strtotime($datenak);
                    echo date('F Y', $yrdata);
                
                 ?></td>
             </tr>
             
              <tr class="okk">
                <td align="center">Day</td>
                <td align="center">IN</td>
                <td align="center">OUT</td>
                <td align="center">IN</td>
                <td align="center">OUT</td>
                
                <td>&nbsp;</td>
                <td align="center">Day</td>
                <td align="center">IN</td>
                <td align="center">OUT</td>
                <td align="center">IN</td>
                <td align="center">OUT</td>
              </tr>
              <?php
              $outayat=15;
              for($a=0;$a<15;$a++){  
              
              $inayat=$a+1;
              $outayat++;
			  
			  $ddayyyin=sprintf('%02d', $inayat);
			  $tarikhlengkapin=$datenak."-".$ddayyyin;			  
			  $hariapadongin=get_day($tarikhlengkapin);
			  
			  
			  $ddayyyout=sprintf('%02d', $outayat);
			  $tarikhlengkapout=$datenak."-".$ddayyyout;			  
			  $hariapadongout=get_day($tarikhlengkapout);
			  
			  
			  
			  
			  
              ?>
  
  
              <tr>
                <td><?php echo $inayat." ($hariapadongin)"; ?></td>
                <td><?php echo $in($idn,$inayat,$datenak); ?></td>
                <td>-</td>
                <td>-</td>
				<td><?php echo $out($idn,$inayat,$datenak); ?></td>
				<td>&nbsp;</td>
                <td><?php echo $outayat." ($hariapadongout)"; ?></td>
				<td><?php echo $in($idn,$outayat,$datenak); ?></td>
                <td>-</td>
                <td>-</td>
				<td><?php echo $out($idn,$outayat,$datenak); ?></td>
			  </tr>
			  
			  
			  <?php
				}//for
			  
			  ?>
			  
			  <tr>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
				<td>31 <?php echo "(".get_day("$datenak-31").")"; ?></td>
				<td><?php echo $in($idn,31,$datenak); ?></td>
                <td>-</td>
                <td>-</td>
                <td><?php echo $out($idn,31,$datenak); ?></td>
          </tr>
        </table>
        <br />
                 
        
        </div>