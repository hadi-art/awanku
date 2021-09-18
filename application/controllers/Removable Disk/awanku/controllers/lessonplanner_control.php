<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
session_start();
class Lessonplanner_control extends CI_Controller {

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
		if($leveluser!=1){
		echo "<div><br><br><br><br><br><br></div>";	
		echo "<div align='center'><h2>Your dont have the permissions to view this page</h2></div>";
		die();
		}
		
				
	}
	 	 
	public function index()
	{
		$base=base_url();
		$site=site_url();
		
		$data= array(
		'base' => $base,
		'site' => $site
		);
		
		//$this->load->view('template/banner',$data);
		$this->load->view('lessonplanner/menu',$data);
		$this->load->view('template/footer',$data);
	}
	
	public function teacher_planner()
	{
		$base=base_url();
		$site=site_url();
		$sem=$this->uri->segment(3);
		$week=$this->uri->segment(4);
		$subject=$this->uri->segment(5);
		
		$data= array(
		'base' => $base,
		'site' => $site,
		'sem' => $sem,
		'week' => $week,
		'subject' => $subject
		);
		
		$this->load->view('template/greybox',$data);
		$this->load->view('lessonplanner/menu',$data);
		$this->load->view('lessonplanner/teacher_planner',$data);
		$this->load->view('template/footer',$data);
	}
	
	public function plannerlesson_subject()
	{	$base=base_url();
		$site=site_url();
		//$class=$_GET["cid"];

		
		$data= array(
		'base' => $base,
		'site' => $site,
		//'class' => $class
		);
		
		$this->load->view('lessonplanner/menu2',$data);
		$this->load->view('lessonplanner/lessonPlannerSubject',$data);
		$this->load->view('template/footer',$data);
			
	}
	
	public function teacher_edit()
	{
		
		
		$site=site_url();
		$base=base_url();
		
		
		
		$data=array(
					'page' => "Main",
					'site' => site_url(),
					'base' => base_url()
					
					);
		//$this->load->view('template/banner',$data);
		//$this->load->view('template/menu',$data);
		$this->load->view('lessonplanner/teacher_edit',$data);
	//	$this->load->view('template/footer',$data);
	}
	public function view_subject()
	{
		
		
		$site=site_url();
		$base=base_url();
		
		
		
		$data=array(
					'page' => "Main",
					'site' => site_url(),
					'base' => base_url()
					
					);
					
					echo "ddsds";
		//$this->load->view('template/banner',$data);
		//$this->load->view('template/menu',$data);
		//$this->load->view('lessonplanner/teacher_edit',$data);
	//	$this->load->view('template/footer',$data);
	}
	public function add_plan()
	{
		
		
		$site=site_url();
		$base=base_url();
		$id=$this->uri->segment(3);
		$sem=$this->uri->segment(4);
		$week=$this->uri->segment(5);
		$subject=$this->uri->segment(6);
		$action=$this->uri->segment(7);
		
		
			
		
		
		$data=array(
					'page' => "Main",
					'site' => site_url(),
					'base' => base_url(),
					'id' => $id,
					'action' => $action,
					'sem' => $sem,
					'week' => $week,
					'subject' => $subject				
					);
		$this->load->view('lessonplanner/menu',$data);
		$this->load->view('lessonplanner/addlessonplanner',$data);
		$this->load->view('template/footer',$data);
	}
	
	public function edit_plan()
	{
		
		
		$site=site_url();
		$base=base_url();
		$id=$this->uri->segment(3);
		$sem=$this->uri->segment(4);
		$week=$this->uri->segment(5);
		$subject=$this->uri->segment(6);
		$action=$this->uri->segment(7);
		
		
			
		
		
		$data=array(
					'page' => "Main",
					'site' => site_url(),
					'base' => base_url(),
					'id' => $id,
					'action' => $action,
					'sem' => $sem,
					'week' => $week,
					'subject' => $subject				
					);
		$this->load->view('lessonplanner/menu',$data);
		$this->load->view('lessonplanner/editlessonplanner',$data);
		//$this->load->view('template/footer',$data);
	}
	
	
		public function viewquestion()
		{
	
	
		$base=base_url();
		$site=site_url();
		
		$data= array(
		'base' => $base,
		'site' => $site
		);

		$this->load->view('lessonplanner/viewquestion',$data);
		
	}
		public function viewstudentanswer()
		{
	
	
		$base=base_url();
		$site=site_url();
		
		$data= array(
		'base' => $base,
		'site' => $site
		);

		$this->load->view('lessonplanner/viewstudentanswer',$data);
		
	}
	public function studentmark()
	{
		
		
		$site=site_url();
		$base=base_url();
		
		
		
		$data=array(
					'page' => "Main",
					'site' => site_url(),
					'base' => base_url()
					
					);
		//$this->load->view('template/banner',$data);
		//$this->load->view('template/menu',$data);
		$this->load->view('lessonplanner/studentmark',$data);
	//	$this->load->view('template/footer',$data);
	}
	public function student_answer()
	{
		
		
		$site=site_url();
		$base=base_url();
		
		
		
		$data=array(
					'page' => "Main",
					'site' => site_url(),
					'base' => base_url()
					
					);
		$this->load->view('template/greybox',$data);
		$this->load->view('lessonplanner/menu',$data);
		$this->load->view('lessonplanner/student_answer',$data);
		$this->load->view('template/footer',$data);
	}
	public function details()
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
		$this->load->view('lessonplanner/details',$data);
		//$this->load->view('template/footer',$data);
	}
	
	
	
		public function lessonplannerpdf()
		{
	
	
		$base=base_url();
		$site=site_url();
		
		$data= array(
		'base' => $base,
		'site' => $site
		);
		
		$this->load->view('lessonplanner/lessonplannerpdf',$data);
		
		}
	
	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */