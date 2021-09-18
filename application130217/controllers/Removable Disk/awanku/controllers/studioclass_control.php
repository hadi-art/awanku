<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
session_start();
class Studioclass_control extends CI_Controller {
	
	public function __construct(){
		parent::__construct();
		$this->load->database();
		#$this->load->model('awanku_model');
		$this->load->helper('html');
		$this->load->helper('url');
		date_default_timezone_set('Asia/Kuala_Lumpur');
		
		
		
			error_reporting(0);
		#print_r($_SESSION);
		$base=base_url();
		$username=$_SESSION["log"]["username"];
		$leveluser=$_SESSION["log"]["level_id"];
		
		if($username==""){
		echo "<div><br><br><br><br><br><br></div>";	
		echo "<div align='center'><h2>Your account are not allowed to view this page <a href='$base'>Re-Login</a>.</h2></div>";
		die();
		}
		
		
	}
	
	
	public function index(){
		$base=base_url();
		$site=site_url();
		$this->load->model('classlist');
		
		
		$data["base"]=$base;
		$data["site"]=$site;
		//$data["menu"] = $this->menu->ListMenu();
		$data["classroom"] = $this->classlist->ListRoom();
		
		//$this->load->view('template/banner',$data);
		$this->load->view('studioclass/menu',$data);
		$this->load->view('studioclass/studioclassroom',$data);
		$this->load->view('template/footer',$data);
	}
	
	public function camclass(){
	
	
		$base=base_url();
		$site=site_url();
		
		$data= array(
		'base' => $base,
		'site' => $site
		);
		//$this->load->model('classlist');
		//$data["cam"] = $this->classlist->ClassInfo($_GET["cid"]);
		//$data["attendance"] = $this->classlist->ClassAttendance($_GET["cid"]);
		//$this->load->view('camclass',$data);
		
		//$this->load->model('classlist');
		//$data["cam"] = $this->classlist->ClassInfo($_GET["cid"]);
		//$data["attendance"] = $this->classlist->ClassAttendance($_GET["cid"]);
		$this->load->view('studioclass/studioclasscam',$data);
		
	}
	
	public function viewattendance(){
		$base=base_url();
		$site=site_url();
		
		$data= array(
		'base' => $base,
		'site' => $site
		);
		
		//$this->load->view('fnb/banner',$data);
		$this->load->view('studioclass/viewattendance',$data);
	}
	public function viewattendance_ajax(){
		$base=base_url();
		$site=site_url();
		//$cid=$_GET["cid"];
		
		$data= array(
		'base' => $base,
		'site' => $site
		//'cid' => $cid
		);
		
		//$this->load->view('studioclassroom/banner',$data);
		$this->load->view('studioclass/viewattendance_ajax',$data);
	}
		public function class_camera(){
		$base=base_url();
		$site=site_url();
		//$cid=$_GET["cid"];
		
		$data= array(
		'base' => $base,
		'site' => $site
		//'cid' => $cid
		);
		
		//$this->load->view('studioclassroom/banner',$data);
		$this->load->view('studioclass/class_camera',$data);
	}
	
	public function attendant_manual(){
		$base=base_url();
		$site=site_url();
		
		$data= array(
		'base' => $base,
		'site' => $site
		);
		
		//$this->load->view('fnb/banner',$data);
		$this->load->view('studioclassroom/attendant_manual',$data);
	}
	
	public function pre_attendance(){
		$base=base_url();
		$site=site_url();
		
		$data= array(
		'base' => $base,
		'site' => $site
		);
		
		//$this->load->view('fnb/banner',$data);
		$this->load->view('studioclassroom/pre_attendance',$data);
	}
	
	public function laporan(){
		$base=base_url();
		$site=site_url();
		
		$data= array(
		'base' => $base,
		'site' => $site
		);
		
		//$this->load->view('fnb/banner',$data);
		$this->load->view('studioclass/laporan',$data);
	}
	
	public function edit(){
		$base=base_url();
		$site=site_url();
		
		$data= array(
		'base' => $base,
		'site' => $site
		);
		
		//$this->load->view('fnb/banner',$data);
		$this->load->view('studioclass/edit',$data);
	}
	
	public function class_edit(){
		$base=base_url();
		$site=site_url();
		
		$data= array(
		'base' => $base,
		'site' => $site
		);
		
		$this->load->view('studioclass/menu',$data);
		$this->load->view('studioclass/class',$data);
	}
	
		public function student_list(){
		$base=base_url();
		$site=site_url();
		
		$data= array(
		'base' => $base,
		'site' => $site
		);
		
		//$this->load->view('fnb/banner',$data);
		$this->load->view('studioclass/studentlist',$data);
	}
	
		public function manage()
	{
		$site=site_url();
		$base=base_url();
		$id=$this->uri->segment(3);
		$data=array(
					'page' => "My Document",
					'site' => site_url(),
					'base' => base_url(),
					'id' => $id		
					);
		#$this->load->view('template/banner',$data);
		//$this->load->view('ktube/menu',$data);
		$this->load->view('studioclass/manage',$data);
		//$this->load->view('template/footer',$data);
	}
}

?>