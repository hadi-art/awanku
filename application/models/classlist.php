<?php
class Classlist extends CI_Model {
	public function ListRoom(){
		$q = mysql_query("select * from classlist order by id");
		while($s = mysql_fetch_array($q)){
			$data["id"][] = $s["id"];
			$data["Blok"][] = $s["Blok"];
			$data["Aras"][] = $s["Aras"];
			$data["JenisBilik"][] = $s["JenisBilik"];
			$data["NamaBilik"][] = $s["NamaBilik"];
			$data["NamaGuru"][] = $s["NamaGuru"];
			$data["Subjek"][] = $s["Subjek"];
		}
		return $data;
	}
	
	public function ClassInfo($id){
		$q = mysql_query("select * from classlist where id='$id'");
		while($s = mysql_fetch_array($q)){
			$data["id"] = $s["id"];
			$data["Blok"] = $s["Blok"];
			$data["Aras"] = $s["Aras"];
			$data["JenisBilik"] = $s["JenisBilik"];
			$data["NamaBilik"] = $s["NamaBilik"];
			$data["NamaGuru"] = $s["NamaGuru"];
			$data["Subjek"] = $s["Subjek"];
			$data["cam1"] = $s["cam1"];
			$data["cam2"] = $s["cam2"];
		}
		return $data;
	}
	
	public function ClassAttendance(){
		$q = mysql_query("select * from location order by Name asc");
		while($s = mysql_fetch_array($q)){
			$data["Name"][] = $s["Name"];
			$data["IC_No"][] = $s["IC_No"];
		}
		return $data;
	}
}
?>