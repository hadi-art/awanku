<?php
//------------------------------------------- STAFF 1 -------------------------------------------------------

	function staff1_getin($iduser,$hari,$bulantahun)
	{	
		
		$monthnow = date("Ym");
		$date = $bulantahun;
		$datenkcari = date('Ym', strtotime($date));
		
		if($monthnow==$datenkcari)
		{
			$tkc_punch="tkc_punch";
		}//if
		else
		{	
			$datenkcari= date('Ym', strtotime($date));
			$tkc_punch="tkc_punch_$datenkcari";
		}//else
		

		
		
		$hari=sprintf('%02d', $hari);	
		$datefull=$bulantahun."-".$hari;
		
		$q="select date_only from $tkc_punch where user_id='$iduser' and datelepas_adjustment like '%$datefull%' order by unixtime asc limit 1";
		list($timesahaja)=mysql_fetch_row(mysql_query($q));	
		
		if($timesahaja=="")
		{
				$paparan="-";	
		}
		else
		{		
				 if (new DateTime($timesahaja) > new DateTime("07:31:00"))
				{				
					$paparan="<font color='red'>$timesahaja</font>";				
				}//if lebih dr kul 730
				
				else
				{
					$paparan="<font color='green'>$timesahaja</font>";
				} 
				
				
				
				//$paparan=$timesahaja;
				
		}//else			
		
		return $paparan;	
	}//end staff1_getin
	
	
	
	
	//4.30pm
	function staff1_getout($iduser,$hari,$bulantahun)
	{
	
		
		$monthnow = date("Ym");
		$date = $bulantahun;
		$datenkcari = date('Ym', strtotime($date));
		
		if($monthnow==$datenkcari)
		{
			$tkc_punch="tkc_punch";
		}//if
		else
		{	
			$datenkcari= date('Ym', strtotime($date));
			$tkc_punch="tkc_punch_$datenkcari";
		}//else
		
		
		$hari=sprintf('%02d', $hari);
		
		$datefull=$bulantahun."-".$hari;
		
		
		$q="select date_only from $tkc_punch where user_id='$iduser' and datelepas_adjustment like '%$datefull%' and date_only > '15:30:00' order by unixtime desc limit 1";
		list($timesahaja)=mysql_fetch_row(mysql_query($q));
		
		if($timesahaja=="")
		{
			$paparan="-";	
		}
		
		else
		{
			
			if (new DateTime($timesahaja) < new DateTime("16:30:00")) 
			{				
					$paparan="<font color='red'>$timesahaja</font>";
					
			}//if lebih dr kul 8
			
			else
			{
					$paparan="<font color='green'>$timesahaja</font>";
			}// 
			
			//$paparan=$timesahaja;
		
		}//else
			
		
		return $paparan;
	
	}//end staff1_getout





	function staff1_lunch_in($iduser,$hari,$bulantahun)
	{	
		$hari=sprintf('%02d', $hari);	
		$datefull=$bulantahun."-".$hari;
		
		$q="select date_only from tkc_punch where user_id='$iduser' and datelepas_adjustment like '%$datefull%' order by unixtime asc limit 1";
		list($timesahaja)=mysql_fetch_row(mysql_query($q));	
		
		if($timesahaja=="")
		{
				$paparan="-";	
		}
		else
		{		
				/*if (new DateTime($timesahaja) > new DateTime("07:32:00"))
				{				
					$paparan="<font color='red'>$timesahaja</font>";				
				}//if lebih dr kul 730
				
				else
				{
					$paparan="<font color='green'>$timesahaja</font>";
				}// */
				
				$paparan=$timesahaja;
		}//else			
		
		return $paparan;	
	}//end staff1_lunch_in



	function staff1_lunch_out($iduser,$hari,$bulantahun)
	{	
		$hari=sprintf('%02d', $hari);	
		$datefull=$bulantahun."-".$hari;
		
		$q="select date_only from tkc_punch where user_id='$iduser' and datelepas_adjustment like '%$datefull%' order by unixtime asc limit 1";
		list($timesahaja)=mysql_fetch_row(mysql_query($q));	
		
		if($timesahaja=="")
		{
				$paparan="-";	
		}
		else
		{		
				/* if (new DateTime($timesahaja) > new DateTime("07:32:00"))
				{				
					$paparan="<font color='red'>$timesahaja</font>";				
				}//if lebih dr kul 730
				
				else
				{
					$paparan="<font color='green'>$timesahaja</font>";
				}// */
				
				$paparan=$timesahaja;
		}//else			
		
		return $paparan;	
	}//end staff1_lunch_out
	
//------------------------------------------- END STAFF 1 -------------------------------------------------------


//--------------------------------------------- STAFF 2 ---------------------------------------------------------

	function staff2_getin($iduser,$hari,$bulantahun)
	{	
		
		$monthnow = date("Ym");
		$date = $bulantahun;
		$datenkcari = date('Ym', strtotime($date));
		
		if($monthnow==$datenkcari)
		{
			$tkc_punch="tkc_punch";
		}//if
		else
		{	
			$datenkcari= date('Ym', strtotime($date));
			$tkc_punch="tkc_punch_$datenkcari";
		}//else
		
		
		$hari=sprintf('%02d', $hari);	
		$datefull=$bulantahun."-".$hari;
		
		$q="select date_only from $tkc_punch where user_id='$iduser' and datelepas_adjustment like '%$datefull%' order by unixtime asc limit 1";
		list($timesahaja)=mysql_fetch_row(mysql_query($q));	
		
		if($timesahaja=="")
		{
				$paparan="-";	
		}
		else
		{		
				if (new DateTime($timesahaja) > new DateTime("08:01:00"))
				{				
					$paparan="<font color='red'>$timesahaja</font>";				
				}//if lebih dr kul 730
				
				else
				{
					$paparan="<font color='green'>$timesahaja</font>";
				}// 
				
				//$paparan=$timesahaja;
		}//else			
		
		return $paparan;	
	}//end staff2_getin
	
	
	
	
	//5.00 pm
	function staff2_getout($iduser,$hari,$bulantahun)
	{
	
		
		$monthnow = date("Ym");
		$date = $bulantahun;
		$datenkcari = date('Ym', strtotime($date));
		
		if($monthnow==$datenkcari)
		{
			$tkc_punch="tkc_punch";
		}//if
		else
		{	
			$datenkcari= date('Ym', strtotime($date));
			$tkc_punch="tkc_punch_$datenkcari";
		}//else
		
		
		
		$hari=sprintf('%02d', $hari);
		
		$datefull=$bulantahun."-".$hari;
		
		//$q="select date_only from tkc_punch where user_id='$iduser' and datelepas_adjustment like '%$datefull%' and date_only > '16:00:00' order by unixtime desc limit 1";
		$q="select date_only from $tkc_punch where user_id='$iduser' and datelepas_adjustment like '%$datefull%' and date_only > '16:00:00' order by unixtime desc limit 1";
		list($timesahaja)=mysql_fetch_row(mysql_query($q));
		
		if($timesahaja=="")
		{
			$paparan="-";	
		}
		
		else
		{
			
			if (new DateTime($timesahaja) < new DateTime("17:00:00")) 
			{				
					$paparan="<font color='red'>$timesahaja</font>";
					
			}//if lebih dr kul 8
			
			else
			{
					$paparan="<font color='green'>$timesahaja</font>";
			}// 
			
			//$paparan=$timesahaja;
		
		}//else
			
		
		return $paparan;
	
	}//end staff2_getout





	function staff2_lunch_in($iduser,$hari,$bulantahun)
	{	
		$hari=sprintf('%02d', $hari);	
		$datefull=$bulantahun."-".$hari;
		
		$q="select date_only from tkc_punch where user_id='$iduser' and datelepas_adjustment like '%$datefull%' order by unixtime asc limit 1";
		list($timesahaja)=mysql_fetch_row(mysql_query($q));	
		
		if($timesahaja=="")
		{
				$paparan="-";	
		}
		else
		{		
				/*if (new DateTime($timesahaja) > new DateTime("14:02:00"))
				{				
					$paparan="<font color='red'>$timesahaja</font>";				
				}//if lebih dr kul 730
				
				else
				{
					$paparan="<font color='green'>$timesahaja</font>";
				}// */
				
				$paparan=$timesahaja;
		}//else			
		
		return $paparan;	
	}//end staff2_lunch_in



	function staff2_lunch_out($iduser,$hari,$bulantahun)
	{	
		$hari=sprintf('%02d', $hari);	
		$datefull=$bulantahun."-".$hari;
		
		$q="select date_only from tkc_punch where user_id='$iduser' and datelepas_adjustment like '%$datefull%' order by unixtime asc limit 1";
		list($timesahaja)=mysql_fetch_row(mysql_query($q));	
		
		if($timesahaja=="")
		{
				$paparan="-";	
		}
		else
		{		
				/*if (new DateTime($timesahaja) > new DateTime("13:00:00"))
				{				
					$paparan="<font color='red'>$timesahaja</font>";				
				}//if lebih dr kul 730
				
				else
				{
					$paparan="<font color='green'>$timesahaja</font>";
				}// */
				
				$paparan=$timesahaja;
		}//else			
		
		return $paparan;	
	}//end staff2_lunch_out



//---------------------------------------------END STAFF 2 ------------------------------------------------------


//--------------------------------------------- GURU 1 ------------------------------------------------------

function guru1_getin($iduser,$hari,$bulantahun)
	{	
		
		$monthnow = date("Ym");
		$date = $bulantahun;
		$datenkcari = date('Ym', strtotime($date));
		
		if($monthnow==$datenkcari)
		{
			$tkc_punch="tkc_punch";
		}//if
		else
		{	
			$datenkcari= date('Ym', strtotime($date));
			$tkc_punch="tkc_punch_$datenkcari";
		}//else
		
		
		$hari=sprintf('%02d', $hari);	
		$datefull=$bulantahun."-".$hari;
		
		$q="select date_only from $tkc_punch where user_id='$iduser' and datelepas_adjustment like '%$datefull%' order by unixtime asc limit 1";
		list($timesahaja)=mysql_fetch_row(mysql_query($q));
			
		if($hari==20){
		#echo $q;
		}	
		
		if($timesahaja=="")
		{
				$paparan="-";	
		}
		else
		{		
				if (new DateTime($timesahaja) > new DateTime("07:21:00"))
				{				
					$paparan="<font color='red'>$timesahaja</font>";				
				}//if lebih dr kul 730
				
				else
				{
					$paparan="<font color='green'>$timesahaja</font>";
				}// 
				
				//$paparan=$timesahaja;
		}//else			
		
		return $paparan;	
	}//end guru1_getin
	
	
	
	
	//2.40pm
	function guru1_getout($iduser,$hari,$bulantahun)
	{
	
		$monthnow = date("Ym");
		$date = $bulantahun;
		$datenkcari = date('Ym', strtotime($date));
		
		if($monthnow==$datenkcari)
		{
			$tkc_punch="tkc_punch";
		}//if
		else
		{	
			$datenkcari= date('Ym', strtotime($date));
			$tkc_punch="tkc_punch_$datenkcari";
		}//else
		
		
		
		$hari=sprintf('%02d', $hari);
		
		$datefull=$bulantahun."-".$hari;
		
		//$q="select date_only from tkc_punch where user_id='$iduser' and datelepas_adjustment like '%$datefull%' and date_only > '16:00:00' order by unixtime desc limit 1";
		$q="select date_only from $tkc_punch where user_id='$iduser' and datelepas_adjustment like '%$datefull%' and date_only > '13:40:00' order by unixtime desc limit 1";
		list($timesahaja)=mysql_fetch_row(mysql_query($q));
		
		if($timesahaja=="")
		{
			$paparan="-";	
		}
		
		else
		{
			
			if (new DateTime($timesahaja) < new DateTime("14:40:00")) 
			{				
					$paparan="<font color='red'>$timesahaja</font>";
					
			}//if lebih dr kul 8
			
			else
			{
					$paparan="<font color='green'>$timesahaja</font>";
			}// 
			
			//$paparan=$timesahaja;
		
		}//else
			
		
		return $paparan;
	
	}//end guru1_getout
//---------------------------------------------END GURU 1 ------------------------------------------------------





//--------------------------------------------- GURU 2 ------------------------------------------------------

function guru2_getin($iduser,$hari,$bulantahun)
	{	
		
		$monthnow = date("Ym");
		$date = $bulantahun;
		$datenkcari = date('Ym', strtotime($date));
		
		if($monthnow==$datenkcari)
		{
			$tkc_punch="tkc_punch";
		}//if
		else
		{	
			$datenkcari= date('Ym', strtotime($date));
			$tkc_punch="tkc_punch_$datenkcari";
		}//else
		
		
		$hari=sprintf('%02d', $hari);	
		$datefull=$bulantahun."-".$hari;
		
		$q="select date_only from $tkc_punch where user_id='$iduser' and datelepas_adjustment like '%$datefull%' order by unixtime asc limit 1";
		list($timesahaja)=mysql_fetch_row(mysql_query($q));	
		
		if($timesahaja=="")
		{
				$paparan="-";	
		}
		else
		{		
				 if (new DateTime($timesahaja) > new DateTime("08:01:00"))
				{				
					$paparan="<font color='red'>$timesahaja</font>";				
				}//if lebih dr kul 730
				
				else
				{
					$paparan="<font color='green'>$timesahaja</font>";
				}// 
				
				//$paparan=$timesahaja;
		}//else			
		
		return $paparan;	
	}//end guru2_getin
	
	
	
	
	//(Mon-Wed 8.00am-4.50pm) (Thu 8.00am-2.40pm) (Fri Female-8.00am-12.30pm) (Fri Male-8.00am-2.15pm)
	function guru2_getout($iduser,$hari,$bulantahun)
	{
	
		$monthnow = date("Ym");
		$date = $bulantahun;
		$datenkcari = date('Ym', strtotime($date));
		
		if($monthnow==$datenkcari)
		{
			$tkc_punch="tkc_punch";
		}//if
		else
		{	
			$datenkcari= date('Ym', strtotime($date));
			$tkc_punch="tkc_punch_$datenkcari";
		}//else
		
		
		
		$hari=sprintf('%02d', $hari);
		
		$datefull=$bulantahun."-".$hari;
		
		//$q="select date_only from tkc_punch where user_id='$iduser' and datelepas_adjustment like '%$datefull%' and date_only > '16:00:00' order by unixtime desc limit 1";
		$q="select date_only from $tkc_punch where user_id='$iduser' and datelepas_adjustment like '%$datefull%' and date_only > '13:15:00' order by unixtime desc limit 1";
		list($timesahaja)=mysql_fetch_row(mysql_query($q));
		
		if($timesahaja=="")
		{
			$paparan="-";	
		}
		
		else
		{
			
			 
			 
			$hariapadong=date('D', strtotime($datefull));
			
			
			if($hariapadong=="Mon" || $hariapadong=="Tue" || $hariapadong=="Wed"){
				
							if (new DateTime($timesahaja) < new DateTime("16:50:00"))
							{				
								$paparan="<font color='red'>$timesahaja</font>";				
							}//if lebih dr kul 730
				
				
				
				}//if($hariapadong=="Mon" || $hariapadong=="Tue" || $hariapadong=="Wed")
			 else
				{
					$paparan="<font color='green'>$timesahaja</font>";
				}// 
			
			 
			 
			 
			if($hariapadong=="Thu"){
				
							if (new DateTime($timesahaja) < new DateTime("14:40:00"))
							{				
								$paparan="<font color='red'>$timesahaja</font>";				
							}//if lebih dr kul 730
				
				
				
				}//if($hariapadong=="Mon" || $hariapadong=="Tue" || $hariapadong=="Wed")
			 else
				{
					$paparan="<font color='green'>$timesahaja</font>";
				}// 
				
				
			if($hariapadong=="Fri"){
				
							if (new DateTime($timesahaja) < new DateTime("14:15:00"))
							{				
								$paparan="<font color='red'>$timesahaja</font>";				
							}//if lebih dr kul 730
				
				
				
				}//if($hariapadong=="Mon" || $hariapadong=="Tue" || $hariapadong=="Wed")
				
			 else
				{
					$paparan="<font color='green'>$timesahaja</font>";
				}// 
				
				//$paparan=$timesahaja;
		
		}//else
			
		
		return $paparan;
	
	}//end guru2_getout
//---------------------------------------------END GURU 2 ------------------------------------------------------







//--------------------------------------------- GURU 3 ------------------------------------------------------

function guru3_getin($iduser,$hari,$bulantahun)
	{	
		$monthnow = date("Ym");
		$date = $bulantahun;
		$datenkcari = date('Ym', strtotime($date));
		
		if($monthnow==$datenkcari)
		{
			$tkc_punch="tkc_punch";
		}//if
		else
		{	
			$datenkcari= date('Ym', strtotime($date));
			$tkc_punch="tkc_punch_$datenkcari";
		}//else
		
		
		
		$hari=sprintf('%02d', $hari);	
		$datefull=$bulantahun."-".$hari;
		
		$q="select date_only from $tkc_punch where user_id='$iduser' and datelepas_adjustment like '%$datefull%' order by unixtime asc limit 1";
		list($timesahaja)=mysql_fetch_row(mysql_query($q));	
		
		if($timesahaja=="")
		{
				$paparan="-";	
		}
		else
		{		
				 if (new DateTime($timesahaja) > new DateTime("08:01:00"))
				{				
					$paparan="<font color='red'>$timesahaja</font>";				
				}//if lebih dr kul 730
				
				else
				{
					$paparan="<font color='green'>$timesahaja</font>";
				}// 
				
				//$paparan=$timesahaja;
		}//else			
		
		return $paparan;	
	}//end guru3_getin
	
	
	
	
	//wanita ib
	function guru3_getout($iduser,$hari,$bulantahun)
	{
	
		
		$monthnow = date("Ym");
		$date = $bulantahun;
		$datenkcari = date('Ym', strtotime($date));
		
		if($monthnow==$datenkcari)
		{
			$tkc_punch="tkc_punch";
		}//if
		else
		{	
			$datenkcari= date('Ym', strtotime($date));
			$tkc_punch="tkc_punch_$datenkcari";
		}//else
		
		
		
		$hari=sprintf('%02d', $hari);
		
		$datefull=$bulantahun."-".$hari;
		
		//$q="select date_only from tkc_punch where user_id='$iduser' and datelepas_adjustment like '%$datefull%' and date_only > '16:00:00' order by unixtime desc limit 1";
		$q="select date_only from $tkc_punch where user_id='$iduser' and datelepas_adjustment like '%$datefull%' and date_only > '11:30:00' order by unixtime desc limit 1";
		list($timesahaja)=mysql_fetch_row(mysql_query($q));
		
		if($timesahaja=="")
		{
			$paparan="-";	
		}
		
		else
		{
						 
			 
			$hariapadong=date('D', strtotime($datefull));
			
			
			if($hariapadong=="Mon" || $hariapadong=="Tue" || $hariapadong=="Wed"){
				
							if (new DateTime($timesahaja) < new DateTime("16:50:00"))
							{				
								$paparan="<font color='red'>$timesahaja</font>";				
							}//if lebih dr kul 730
				
				
				
				}//if($hariapadong=="Mon" || $hariapadong=="Tue" || $hariapadong=="Wed")
			 else
				{
					$paparan="<font color='green'>$timesahaja</font>";
				}// 
			
			 
			 
			 
			if($hariapadong=="Thu"){
				
							if (new DateTime($timesahaja) < new DateTime("14:40:00"))
							{				
								$paparan="<font color='red'>$timesahaja</font>";				
							}//if lebih dr kul 730
				
				
				
				}//if($hariapadong=="Mon" || $hariapadong=="Tue" || $hariapadong=="Wed")
			 else
				{
					$paparan="<font color='green'>$timesahaja</font>";
				}// 
				
				
			if($hariapadong=="Fri"){
				
							if (new DateTime($timesahaja) < new DateTime("12:30:00"))
							{				
								$paparan="<font color='red'>$timesahaja</font>";				
							}//if lebih dr kul 730
				
				
				
				}//if($hariapadong=="Mon" || $hariapadong=="Tue" || $hariapadong=="Wed")
				
			 else
				{
					$paparan="<font color='green'>$timesahaja</font>";
				}// 
				
				//$paparan=$timesahaja;
		
		
		}//else
			
		
		return $paparan;
	
	}//end guru3_getout
//---------------------------------------------END GURU 3 ------------------------------------------------------


	function get_day($date){
		
		$hariapadong=date('D', strtotime($date));
		return "<font color='blue'>".$hariapadong."</font>";
		
		
		}//
	function get_day_saja($date){
		
		$hariapadong=date('D', strtotime($date));
		return $hariapadong;
		
		}//
		
		
		
		
		
		function ellipse($str,$n_chars,$crop_str=' [...]')
		{
			$buff=strip_tags($str);
			
			if(strlen($buff) > $n_chars)
			{
				$buff=substr($buff,0,$n_chars).$crop_str;
				
				
			}
			return $buff;
		}//function ellipse($str,$n_chars,$crop_str=' [...]')





	function status_harianstaff1($userid)
	{
		$hariini=date("Y-m-d");
		$q="select date_only from tkc_punch where user_id='$userid' and datelepas_adjustment like '%$hariini%' order by unixtime asc limit 1";
		list($masadatang)=mysql_fetch_row(mysql_query($q));
		
		$q="select date_only from tkc_punch where user_id='$userid' and datelepas_adjustment like '%$hariini%' and date_only > '16:30:00' order by unixtime desc limit 1";
		list($masabalik)=mysql_fetch_row(mysql_query($q));
		
		
		if($masadatang==""){
			$var="";
			
			
			}// jika x dtg lagi
			
		else{
			
			//$var="";
			if (new DateTime($masadatang) > new DateTime("07:31:00")){
				$var="class='active_lambatdatang '";				
				}//if (new DateTime($masadatang) < new DateTime("08:30:00"))
			else{
				
				$var="class='active_awaldatang '";
				}
			
			//$var="class='active2 '";		
			
			}//else	
			
		if($masabalik!=""){
			$var="";
			
			
			}// jika x dtg lagi		
			
			
		return $var;			
		
		}//function status_harian($userid)

		
		
		
	function status_harianstaff2($userid){
		$hariini=date("Y-m-d");
		$q="select date_only from tkc_punch where user_id='$userid' and datelepas_adjustment like '%$hariini%' order by unixtime asc limit 1";
		list($masadatang)=mysql_fetch_row(mysql_query($q));
		
		$q="select date_only from tkc_punch where user_id='$userid' and datelepas_adjustment like '%$hariini%' and date_only > '16:00:00' order by unixtime desc limit 1";
		list($masabalik)=mysql_fetch_row(mysql_query($q));
		
		
		if($masadatang==""){
			$var="";
			
			
			}// jika x dtg lagi
			
		else{
			
			//$var="";
			if (new DateTime($masadatang) > new DateTime("08:01:00")){
				$var="class='active_lambatdatang '";				
				}//if (new DateTime($masadatang) < new DateTime("08:30:00"))
			else{
				
				$var="class='active_awaldatang '";
				}
			
			//$var="class='active2 '";
			
			
			
			}//else	
			
		if($masabalik!=""){
			$var="";
			
			
			}// jika x dtg lagi		
			
			
		return $var;						
		
		}//function status_harian($userid)
		
		
		
		
		
		
		function status_harianguru1($userid){
		$hariini=date("Y-m-d");
		$q="select date_only from tkc_punch where user_id='$userid' and datelepas_adjustment like '%$hariini%' order by unixtime asc limit 1";
		list($masadatang)=mysql_fetch_row(mysql_query($q));
		
		$q="select date_only from tkc_punch where user_id='$userid' and datelepas_adjustment like '%$hariini%' and date_only > '14:10:00' order by unixtime desc limit 1";
		list($masabalik)=mysql_fetch_row(mysql_query($q));
		
		
		if($masadatang==""){
			$var="";
			
			
			}// jika x dtg lagi
			
		else{
			
			//$var="";
			if (new DateTime($masadatang) > new DateTime("07:21:00")){
				$var="class='active_lambatdatang '";				
				}//if (new DateTime($masadatang) < new DateTime("08:30:00"))
			else{
				
				$var="class='active_awaldatang '";
				}
			
			//$var="class='active2 '";
			
	
			
			}//else	
			
			
		if($masabalik!=""){
			$var="";
			
			
			}// jika x dtg lagi
		
			
			return $var;					
		
		}//function status_harian($userid)
		
		
		
		function status_harianguru2($userid){
		$hariini=date("Y-m-d");
		$q="select date_only from tkc_punch where user_id='$userid' and datelepas_adjustment like '%$hariini%' order by unixtime asc limit 1";
		list($masadatang)=mysql_fetch_row(mysql_query($q));
		
		$q="select date_only from tkc_punch where user_id='$userid' and datelepas_adjustment like '%$hariini%' and date_only > '13:30:00' order by unixtime desc limit 1";
		list($masabalik)=mysql_fetch_row(mysql_query($q));
		
		
		if($masadatang==""){
			$var="";
			
			
			}// jika x dtg lagi
			
		else{
			
			//$var="";
			if (new DateTime($masadatang) > new DateTime("08:01:00")){
				$var="class='active_lambatdatang '";				
				}//if (new DateTime($masadatang) < new DateTime("08:30:00"))
			else{
				
				$var="class='active_awaldatang '";
				}
			
			//$var="class='active2 '";
			
			
			
			}//else	
			
		if($masabalik!=""){
			$var="";
			
			
			}// jika x dtg lagi
		
			
			return $var;						
		
		}//function status_harian($userid)
		
		
		function status_hariankontraktor($userid)
		{
		$hariini=date("Y-m-d");
		$q="select date_only from tkc_punch where user_id='$userid' and datelepas_adjustment like '%$hariini%' order by unixtime asc limit 1";
		list($masadatang)=mysql_fetch_row(mysql_query($q));
		
		$q="select date_only from tkc_punch where user_id='$userid' and datelepas_adjustment like '%$hariini%' order by unixtime desc limit 1";
		list($masabalik)=mysql_fetch_row(mysql_query($q));
		
		
		if($masadatang==""){
			$var="";
			return $var;
			
			}// jika x dtg lagi
			
		else{
			
			//$var="";
			if (new DateTime($masadatang) > new DateTime("07:01:00")){
				$var="class='active_lambatdatang '";				
				}//if (new DateTime($masadatang) < new DateTime("08:30:00"))
			else{
				
				$var="class='active_awaldatang '";
				}
			
			//$var="class='active2 '";
			return $var;
			
			
			}//else						
		
		}//function status_harian($userid)





//-------------------------------------------  kontraktor -------------------------------------------------------

	function kontraktor_getin($iduser,$hari,$bulantahun)
	{	
		$monthnow = date("Ym");
		$date = $bulantahun;
		$datenkcari = date('Ym', strtotime($date));
		
		if($monthnow==$datenkcari)
		{
			$tkc_punch="tkc_punch";
		}//if
		else
		{	
			$datenkcari= date('Ym', strtotime($date));
			$tkc_punch="tkc_punch_$datenkcari";
		}//else
		
		
		$hari=sprintf('%02d', $hari);	
		$datefull=$bulantahun."-".$hari;
		
		$q="select date_only from $tkc_punch where user_id='$iduser' and datelepas_adjustment like '%$datefull%' order by unixtime asc limit 1";
		list($timesahaja)=mysql_fetch_row(mysql_query($q));	
		
		if($timesahaja=="")
		{
				$paparan="-";	
		}
		else
		{		
				 if (new DateTime($timesahaja) > new DateTime("07:01:00"))
				{				
					$paparan="<font color='red'>$timesahaja</font>";				
				}//if lebih dr kul 730
				
				else
				{
					$paparan="<font color='green'>$timesahaja</font>";
				} 
				
				
				
				//$paparan=$timesahaja;
				
		}//else			
		
		return $paparan;	
	}//end kontraktor_getin
	
	
	function kontraktor_getout($iduser,$hari,$bulantahun)
	{
	
		
		$monthnow = date("Ym");
		$date = $bulantahun;
		$datenkcari = date('Ym', strtotime($date));
		
		if($monthnow==$datenkcari)
		{
			$tkc_punch="tkc_punch";
		}//if
		else
		{	
			$datenkcari= date('Ym', strtotime($date));
			$tkc_punch="tkc_punch_$datenkcari";
		}//else
		
		
		$hari=sprintf('%02d', $hari);
		
		$datefull=$bulantahun."-".$hari;
		
		//$q="select date_only from tkc_punch where user_id='$iduser' and datelepas_adjustment like '%$datefull%' and date_only > '16:00:00' order by unixtime desc limit 1";
		$q="select date_only from $tkc_punch where user_id='$iduser' and datelepas_adjustment like '%$datefull%' order by unixtime desc limit 1";
		list($timesahaja)=mysql_fetch_row(mysql_query($q));
		
		if($timesahaja=="")
		{
			$paparan="-";	
		}
		
		else
		{
			
			if (new DateTime($timesahaja) < new DateTime("16:00:00")) 
			{				
					$paparan="<font color='red'>$timesahaja</font>";
					
			}//if lebih dr kul 8
			
			else
			{
					$paparan="<font color='green'>$timesahaja</font>";
			}// 
			
			//$paparan=$timesahaja;
		
		}//else
			
		
		return $paparan;
	
	}//end staff1_getout



//-------------------------------------------  pengawal -------------------------------------------------------

	function pengawal_getin($iduser,$hari,$bulantahun)
	{	
		$monthnow = date("Ym");
		$date = $bulantahun;
		$datenkcari = date('Ym', strtotime($date));
		
		if($monthnow==$datenkcari)
		{
			$tkc_punch="tkc_punch";
		}//if
		else
		{	
			$datenkcari= date('Ym', strtotime($date));
			$tkc_punch="tkc_punch_$datenkcari";
		}//else
		
		
		$hari=sprintf('%02d', $hari);	
		$datefull=$bulantahun."-".$hari;
		
		$q="select date_only from $tkc_punch where user_id='$iduser' and datelepas_adjustment like '%$datefull%' order by unixtime asc limit 1";
		list($timesahaja)=mysql_fetch_row(mysql_query($q));	
		
		if($timesahaja=="")
		{
				$paparan="-";	
		}
		else
		{		
				 if (new DateTime($timesahaja) > new DateTime("07:01:00") && new DateTime($timesahaja) < new DateTime("18:00:00") )
				{				
					$paparan="<font color='red'>$timesahaja</font>";				
				}
				
				else
				{
					$paparan="<font color='green'>$timesahaja</font>";
				} 
				
				
				
				//$paparan=$timesahaja;
				
		}//else			
		
		return $paparan;	
	}//end kontraktor_getin
	
	
	function pengawal_getout($iduser,$hari,$bulantahun)
	{
	
		
		$monthnow = date("Ym");
		$date = $bulantahun;
		$datenkcari = date('Ym', strtotime($date));
		
		if($monthnow==$datenkcari)
		{
			$tkc_punch="tkc_punch";
		}//if
		else
		{	
			$datenkcari= date('Ym', strtotime($date));
			$tkc_punch="tkc_punch_$datenkcari";
		}//else
		
		
		$hari=sprintf('%02d', $hari);
		
		$datefull=$bulantahun."-".$hari;
		
		//$q="select date_only from tkc_punch where user_id='$iduser' and datelepas_adjustment like '%$datefull%' and date_only > '16:00:00' order by unixtime desc limit 1";
		$q="select date_only from $tkc_punch where user_id='$iduser' and datelepas_adjustment like '%$datefull%' order by unixtime desc limit 1";
		list($timesahaja)=mysql_fetch_row(mysql_query($q));
		
		if($timesahaja=="")
		{
			$paparan="-";	
		}
		
		else
		{
			
			if (new DateTime($timesahaja) < new DateTime("19:00:00") || new DateTime($timesahaja) < new DateTime("06:00:00")) 
			{				
					$paparan="<font color='red'>$timesahaja</font>";
					
			}//if lebih dr kul 8
			
			else
			{
					$paparan="<font color='green'>$timesahaja</font>";
			}// 
			
			//$paparan=$timesahaja;
		
		}//else
			
		
		return $paparan;
	
	}//end staff1_getout


?>


