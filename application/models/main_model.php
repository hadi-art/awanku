<?php
class Main_model extends CI_Model {
	
	public function CheckRecord($username,$password){
		$q = mysql_query("select id,username,password,level_id from tbl_userinfo where username='$username' and password='$password'");
		$s = mysql_num_rows($q);
		if($s > 0){
			list($id,$username,$password,$level_id) = mysql_fetch_row($q);
			
						
			$q44="SELECT description FROM tbl_param WHERE param='level_id' AND var='$level_id'";
			list($level)=mysql_fetch_row(mysql_query($q44));
			
			//$sid = $this->session->userdata("session_id");
			//$this->UpdateSession($username,$sid);
			//$this->UpdateLastActivity($username);
			//$this->SetUserData($id,$username,$sid);
			
			$q2="SELECT fullname,email,notel,nohp,class_id,noic FROM tbl_userinfo WHERE id='$id'";
			list($fullname,$email,$notel,$hp,$class_id,$noic)=mysql_fetch_row(mysql_query($q2));
			$_SESSION["log"]["userid"]=$id;
			$_SESSION["log"]["username"]=$username;
			$_SESSION["log"]["fullname"]=$fullname;
			$_SESSION["log"]["level_id"]=$level_id;
			$_SESSION["log"]["level"]=$level;
			$_SESSION["log"]["email"]=$email;
			$_SESSION["log"]["notel"]=$notel;
			$_SESSION["log"]["hp"]=$hp;
			$_SESSION["log"]["class_id"]=$class_id;
			$_SESSION["log"]["noic"]=$noic;
			
			#print_r($_SESSION);


			/* logs */ 
			$date = new DateTime();
				$datex =  $date->format('H:i:s');
				$tarikh= $date->format('d-m-Y');

				$q="insert into logs set userId='$id', timein='$datex',tarikh='$tarikh', level_id='$level_id',classId='$class_id'";
				mysql_query($q);
						
						/* end logs */ 
				
			redirect('awanku_control', 'refresh');
				
		}
		else{
			$this->load->view('login');
			die("record not exist");
		}
	}
	
	
	
	
}
?>