<?php
class Cafe extends CI_Model {
	public function ListOrderByRef($ref){
		$q = mysql_query("select * from fnborder where refseries='$ref'");
		while($s = mysql_fetch_array($q)){
			$data["id"][] = $s["id"];
		}
		return $data;
	}
	
	public function TotalOrder(){
		$q = mysql_query("select refseries from fnborder where status='0' group by refseries");
		$data["totalorder"] = mysql_num_rows($q);
		
		return $data;
	}
	
	public function OrderByDate($d_required){
		$q = mysql_query("select * from fnborder where d_required like '%$d_required%' group by refseries");
		$data["totalbydate"] = mysql_num_rows($q);
		
		while ($senarai = mysql_fetch_array($q)){
			$data["uid"] = $senarai["uid"];
			$data["refseries"][] = $senarai["refseries"];
			$data["time_req"][] = $senarai["time_req"];
			$data["status"][] = $senarai["status"];
			$data["venue"][] = $senarai["venue"];
			
		$q2="select name,colorcode from fnb_status where status_id='".$senarai["status"]."'";
		list($data["namestatus"][],$data["colorcode"][])=mysql_fetch_row(mysql_query($q2));
		
		$q3 = mysql_query("select fullname from tbl_userinfo where ref_idv='".$data["uid"]."'");
		list($data["fullname"][]) = mysql_fetch_row($q3);
		}
		return $data;
	}
	
	public function Order($refseries){
		$q4 = mysql_query("SELECT * FROM fnborder WHERE refseries='$refseries'");
		while ($listitem = mysql_fetch_array($q4)){
			$data["uid"] = $listitem["uid"];
			$data["perkara"][] = $listitem["perkara"];
			$data["venue"][] = $listitem["venue"];
			$data["remarks"][] = $listitem["remarks"];
			$data["d_order"][] = $listitem["d_order"];
			$data["d_required"][] = $listitem["d_required"];
			$data["time_req"][] = $listitem["time_req"];
			$data["qty"][] = $listitem["qty"];
			$data["status_order"] = $listitem["status"];
			
			$q="select name,harga from fnbsublist where id='".$listitem["fnbid"]."'";
			list($data["name"][],$data["harga"][])=mysql_fetch_row(mysql_query($q));
			
			$q5 = mysql_query("select fullname,email,notel,nohp from tbl_userinfo where ref_idv='".$data["uid"]."'");
			list($data["fullname"][],$data["email"][],$data["notel"][],$data["nohp"][]) = mysql_fetch_row($q5);
		}
		
		$q3="select name,colorcode from fnb_status where status_id='".$data["status_order"]."'";
		list($data["namestatus"],$data["colorcode"])=mysql_fetch_row(mysql_query($q3));
		
		$data["status"]=array("nama"=>$data["namestatus"],"colorcode"=>$data["colorcode"]);
		
		return $data;
	}
	
	public function UpdateStatusOrder($refseries,$statusorder){
		mysql_query("update fnborder set status='$statusorder' where refseries='$refseries'");
	}
	
	
}
?>