<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
session_start();
class Report_control extends CI_Controller {
	
	public function __construct(){
		parent::__construct();
		$this->load->database();
		#$this->load->model('awanku_model');
		$this->load->helper('html');
		$this->load->helper('url');
		date_default_timezone_set('Asia/Kuala_Lumpur');
		
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
		$this->load->view('report/menu',$data);
		$this->load->view('report/reportdata',$data);
		$this->load->view('template/footer',$data);
	}
	
	public function classroom(){
	
	
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
		$this->load->view('report/menu',$data);
		$this->load->view('report/classroom',$data);
		
	}
	
		public function student(){
	
	
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
		$this->load->view('report/menu',$data);
		$this->load->view('report/student',$data);
		
	}
	

	
		
		public function classroomresult()
		{
	
	
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
		
		$this->load->view('report/classroomresult',$data);
		
		}
		
		
		public function studentresult()
		{
	
	
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
		
		$this->load->view('report/studentresult',$data);
		
		}
		
			public function register(){
	//print_r($_SESSION);
	//echo "logout";
		$base=base_url();
		$site=site_url();
		
		$data= array(
		'base' => $base,
		'site' => $site
		);
		
		$this->load->view('report/menu',$data);
		$this->load->view('report/register',$data);
		$this->load->view('template/footer',$data);
	}
	
		public function form_showclass()
	{
		$site=site_url();
		$base=base_url();
		$data=array(
					'page' => "Upload",
					'site' => site_url(),
					'base' => base_url()				
					);
		#$this->load->view('template/banner',$data);
		
		$this->load->view('report/form_showclass',$data);
		
	}
	
	
	public function teacher()
	{
	
	
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
		$this->load->view('report/menu',$data);
		$this->load->view('report/teacher',$data);
		
	}
	
	public function activitylist()
	{
		$site=site_url();
		$base=base_url();
		$data=array(
					//'page' => "Upload",
					'site' => site_url(),
					'base' => base_url()				
					);
		#$this->load->view('template/banner',$data);
		$this->load->view('report/menu',$data);
		$this->load->view('report/activitylist',$data);
		}
		
		public function newactivity()
	{
		$site=site_url();
		$base=base_url();
		$data=array(
					//'page' => "Upload",
					'site' => site_url(),
					'base' => base_url()				
					);
		#$this->load->view('template/banner',$data);
		$this->load->view('report/menu',$data);
		$this->load->view('report/newactivity',$data);
		}
		
		public function form_showsubjek()
	   {
		$site=site_url();
		$base=base_url();
		$data=array(
					'page' => "Upload",
					'site' => site_url(),
					'base' => base_url()				
					);
		#$this->load->view('template/banner',$data);
		
		$this->load->view('report/form_showclass',$data);
		
	    }
	
			public function activitydetails()
	{
		$site=site_url();
		$base=base_url();
		$data=array(
					//'page' => "Upload",
					'site' => site_url(),
					'base' => base_url()				
					);
		#$this->load->view('template/banner',$data);
		$this->load->view('report/menu',$data);
		$this->load->view('report/d_activity',$data);
		}
		
					public function studentlist()
	{
		$site=site_url();
		$base=base_url();
		$data=array(
					//'page' => "Upload",
					'site' => site_url(),
					'base' => base_url()				
					);
		#$this->load->view('template/banner',$data);
		//$this->load->view('report/menu',$data);
		$this->load->view('report/studentlist',$data);
		}
		
					public function selectedstudent()
	{
		$site=site_url();
		$base=base_url();
		$data=array(
					//'page' => "Upload",
					'site' => site_url(),
					'base' => base_url()				
					);
		#$this->load->view('template/banner',$data);
		//$this->load->view('report/menu',$data);
		$this->load->view('report/selectedstudent',$data);
		}
		
						public function refresh()
	{
		$site=site_url();
		$base=base_url();
		$data=array(
					//'page' => "Upload",
					'site' => site_url(),
					'base' => base_url()				
					);
		#$this->load->view('template/banner',$data);
		//$this->load->view('report/menu',$data);
		$this->load->view('report/refresh',$data);
		}


						public function show_class()
	{
		$site=site_url();
		$base=base_url();
		$data=array(
					//'page' => "Upload",
					'site' => site_url(),
					'base' => base_url()				
					);
		#$this->load->view('template/banner',$data);
		//$this->load->view('report/menu',$data);
		$this->load->view('report/show_class',$data);
		}

public function register_class()
	{
		$site=site_url();
		$base=base_url();
		$data=array(
					//'page' => "Upload",
					'site' => site_url(),
					'base' => base_url()				
					);
		#$this->load->view('template/banner',$data);
		$this->load->view('report/menu',$data);
		$this->load->view('report/reg_classroom',$data);
		}

public function student_list()
	{
		$site=site_url();
		$base=base_url();
		$data=array(
					//'page' => "Upload",
					'site' => site_url(),
					'base' => base_url()				
					);
		#$this->load->view('template/banner',$data);
		$this->load->view('report/menu',$data);
		$this->load->view('report/senaraipelajar',$data);
		}


	public function studentRecord()
	{
	//print_r($_SESSION);
	//echo "logout";
		$base=base_url();
		$site=site_url();
		
		$data= array(
		'base' => $base,
		'site' => $site
		);
		
		$this->load->view('report/menu',$data);
		$this->load->view('report/studentRecord',$data);
		$this->load->view('template/footer',$data);
	}

		public function showClass()
	{
		$site=site_url();
		$base=base_url();
		$id=$this->uri->segment(3);
		$data=array(
					//'page' => "My Document",
					'site' => site_url(),
					'base' => base_url(),
					'id' => $id		
					);
		#$this->load->view('template/banner',$data);
		//$this->load->view('ktube/menu',$data);
		$this->load->view('report/showClass',$data);
		//$this->load->view('template/footer',$data);
	}

}

?>