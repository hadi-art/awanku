<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
session_start();
class Assesment_control extends CI_Controller {

	 
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
		$level_id=$_SESSION["log"]["level_id"];
		
		if($username==""){
		echo "<div><br><br><br><br><br><br></div>";	
		echo "<div align='center'><h2>Your account are not allowed to view this page <a href='$base'>Re-Login</a>.</h2></div>";
		die();
		}
		if($level_id!=1){
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
		
		//$this->load->view('template/bannerkecik',$data);
		$this->load->view('assesment/menu',$data);
		$this->load->view('assesment/quizmenu',$data);
		$this->load->view('assesment/createquiz',$data);
		$this->load->view('template/footer',$data);
	}
	
	
		public function createquiz()
	{
		
		
		$site=site_url();
		$base=base_url();
		
		
		
		$data=array(
					'page' => "Main",
					'site' => site_url(),
					'base' => base_url()
					
					);

		
		$this->load->view('assesment/menu',$data);
		$this->load->view('assesment/quizmenu',$data);
		$this->load->view('assesment/createquiz',$data);
		$this->load->view('template/footer',$data);
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
		
		$this->load->view('assesment/form_showsubjek',$data);
		
	}
	
	
	
		public function addquiz()
	{
		
		
		$site=site_url();
		$base=base_url();
		
		
		
		$data=array(
					'page' => "Main",
					'site' => site_url(),
					'base' => base_url()
					
					);

		
		$this->load->view('assesment/menu',$data);
		$this->load->view('assesment/quizmenu',$data);
		$this->load->view('assesment/addquiz',$data);
		$this->load->view('template/footer',$data);
	}
	
	
	public function viewquiz()
	{
		
		
		$site=site_url();
		$base=base_url();
		
		
		
		$data=array(
					'page' => "Main",
					'site' => site_url(),
					'base' => base_url()
					
					);

		
		$this->load->view('assesment/menu',$data);
		$this->load->view('assesment/quizmenu',$data);
		$this->load->view('assesment/viewquiz',$data);
		$this->load->view('template/footer',$data);
	}
	
	
		public function viewquestion()
		{
	
	
		$base=base_url();
		$site=site_url();
		
		$data= array(
		'base' => $base,
		'site' => $site
		);

		$this->load->view('assesment/viewquestion',$data);
		
	}
	
	
		public function update()
		{
	
	
		$base=base_url();
		$site=site_url();
		
		$data= array(
		'base' => $base,
		'site' => $site
		);

		$this->load->view('assesment/update',$data);
		
	}
	
	
	public function updatekuiz()
		{
	
	
		$base=base_url();
		$site=site_url();
		
		$data= array(
		'base' => $base,
		'site' => $site
		);

		
		
		$this->load->view('assesment/menu',$data);
		$this->load->view('assesment/quizmenu',$data);
		$this->load->view('assesment/updatekuiz',$data);
		$this->load->view('template/footer',$data);
		
	}
	
	

		public function photo()
		{
	
	
		$base=base_url();
		$site=site_url();
		
		$data= array(
		'base' => $base,
		'site' => $site
		);

		$this->load->view('assesment/photo',$data);
		
	}
	
	public function search()
	{
		
		
		$site=site_url();
		$base=base_url();
		
		
		
		$data=array(
					'page' => "Main",
					'site' => site_url(),
					'base' => base_url()
					
					);

		
		$this->load->view('assesment/menu',$data);
		$this->load->view('assesment/quizmenu',$data);
		$this->load->view('assesment/search',$data);
		$this->load->view('template/footer',$data);
	}
	
		public function searchstudent()
	{
		
		
		$site=site_url();
		$base=base_url();
		
		
		
		$data=array(
					'page' => "Main",
					'site' => site_url(),
					'base' => base_url()
					
					);

		
		$this->load->view('assesment/menu',$data);
		$this->load->view('assesment/quizmenu',$data);
		$this->load->view('assesment/studentmark',$data);
		$this->load->view('template/footer',$data);
	}
	
	
	public function editquiz()
		{
	
	
		$base=base_url();
		$site=site_url();
		
		$data= array(
		'base' => $base,
		'site' => $site
		);

		$this->load->view('assesment/editquiz',$data);
		
	}
	
	
		public function updatetitle()
		{
	
	
		$base=base_url();
		$site=site_url();
		
		$data= array(
		'base' => $base,
		'site' => $site
		);

		$this->load->view('assesment/updatetitle',$data);
		
	}
	public function updatelevel()
		{
	
	
		$base=base_url();
		$site=site_url();
		
		$data= array(
		'base' => $base,
		'site' => $site
		);

		$this->load->view('assesment/updatelevel',$data);
		
	}

	public function form_class()
		{
	
	
		$base=base_url();
		$site=site_url();
		
		$data= array(
		'base' => $base,
		'site' => $site
		);

		$this->load->view('assesment/form_class',$data);
		
	}
	

	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */