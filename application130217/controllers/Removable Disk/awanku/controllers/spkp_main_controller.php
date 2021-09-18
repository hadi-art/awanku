<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
session_start();
class Main_controller extends CI_Controller {

	public function __construct(){
	
		parent::__construct();
		$this->load->database();
		$this->load->helper('html');
		$this->load->helper('url');
		$this->load->helper('url');
		date_default_timezone_set('Asia/Kuala_Lumpur');
		$base=base_url();
}
	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function validate_login(){
	
	
		
		
		$site=site_url();
		$base=base_url();
		$data=array(
					'page' => "Login",
					'site' => site_url(),
					'base' => base_url()
					);
		
		//print_r($_POST);
		$idform = $_POST["uname"];
		$pwdform = $_POST["pswd"];
		
		$q="select id,level_id,userid,lastlogin from tbl_user where userid='$idform' and password='$pwdform'";
		list($id,$level_id,$userid,$lastlogin)=mysql_fetch_row(mysql_query($q));
		//die();
		if(!$id){
			die("salah id pengguna atau kata laluan..<a href='$base'>Kembali</a>");
			}
			
			date_default_timezone_set("Asia/Kuala_Lumpur");
			$datetime = date("Y-m-d h:i:sa");
			
		
		//echo $level;
		$_SESSION["log"]["id"]=$id;
		$_SESSION["log"]["level_id"]=$level_id;
		$_SESSION["log"]["uname"]=$userid;
		$_SESSION["log"]["base"]=$base;
		$_SESSION["log"]["site"]=$site;
		$_SESSION["log"]["datelogin"]=$datetime;
		
		$idx = $_SESSION["log"]["id"];
		$que = "SELECT lastlogin FROM tbl_user WHERE id = $idx";
		list($lastlogin) = mysql_fetch_row(mysql_query($que));
		
		$_SESSION["log"]["lastlogin"]=$lastlogin;
		
		$datelog = $_SESSION["log"]["datelogin"];
		
		$logintime = "UPDATE tbl_user SET lastlogin = '$datelog' WHERE id='$idx'";
		mysql_query($logintime);
		
		$wnn1=explode("//",$base);

/*--------------dns------------------------*/

$wnn2=explode("/",$wnn1[1]);

#print_r($wnn2);


$wnn3=explode(":",$wnn2[0]);

$dns=$wnn3[0];

#echo "<br>";

#echo $dns;
$_SESSION["log"]["dns"]=$dns;



/*----------------dns----------------------*/		
		
		
		if($level_id==1){//merujuk kepada user biasa guard
		header("Location: $site");
		die();
		}//
		if($level_id==2){//merujuk kepada superadmin 
		header("Location: $site/super_admin?page=home");	
		die();
		}//
		
		if($level_id==3){//merujuk management //fixed asset mgt 
		//list($namauser,$course,$id)=mysql_fetch_row(mysql_query("select name,course,id from student where id='$userid'"));
		header("Location: $site/fixed_asset_mgt/rumusan/semua?semua");	
		die();
		}//
		
		if($level_id==4){//merujuk management //rms management
		//list($namauser,$course,$id)=mysql_fetch_row(mysql_query("select name,course,id from student where id='$userid'"));
		header("Location: $site/rms_report/allcamcontrol?page=home");	
		die();
		}//
		
		if($level_id==9){//merujuk management //rms management
		//list($namauser,$course,$id)=mysql_fetch_row(mysql_query("select name,course,id from student where id='$userid'"));
		header("Location: $site");	
		die();
		}//
		
		
		
		
		
		//$this->load->view('template/banner');
		//$this->load->view('login',$data);
		//$this->load->view('template/footer');
	
	
	
	}//function 
	
	public function logout()
	{
		
		$site=site_url();
		$base=base_url();
		
		
		
		
		
		session_destroy();
		header("Location: $site");
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */