<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
session_start();
class Awanku_control extends CI_Controller {

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
		$this->load->view('awanku/menu',$data);
		$this->load->view('awanku/cat_utama',$data);
		$this->load->view('template/footer',$data);
		}
	
	public function category1(){
	$base=base_url();
	$site=site_url();
		
		$data= array(
		'base' => $base,
		'site' => $site
		);
		
		$this->load->view('awanku/menu',$data);
		$this->load->view('awanku/category1',$data);
		$this->load->view('template/footer',$data);
		
	}
	
	public function category2(){
	$base=base_url();
	$site=site_url();
		
		$data= array(
		'base' => $base,
		'site' => $site
		);
		
		$this->load->view('awanku/menu',$data);
		$this->load->view('awanku/category2',$data);
		$this->load->view('template/footer',$data);
		
	}
	
	public function category3(){
	//print_r($_SESSION);
	//echo "logout";
		$base=base_url();
		$site=site_url();
		
		$data= array(
		'base' => $base,
		'site' => $site
		);
		
		$this->load->view('awanku/menu',$data);
		$this->load->view('awanku/category3',$data);
		$this->load->view('template/footer',$data);
	}
	
	public function profail(){
	//print_r($_SESSION);
	//echo "logout";
		$base=base_url();
		$site=site_url();
		
		$data= array(
		'base' => $base,
		'site' => $site
		);
		
		$this->load->view('awanku/menu',$data);
		$this->load->view('awanku/profilepic',$data);
		$this->load->view('template/footer',$data);
	}
	
		public function profail_student(){
	//print_r($_SESSION);
	//echo "logout";
		$base=base_url();
		$site=site_url();
		
		$data= array(
		'base' => $base,
		'site' => $site
		);
		
		$this->load->view('awanku/menu',$data);
		$this->load->view('awanku/profail_student',$data);
		$this->load->view('template/footer',$data);
	}
	
		public function menu_student(){
	$base=base_url();
	$site=site_url();
		
		$data= array(
		'base' => $base,
		'site' => $site
		);
		
		$this->load->view('awanku/menu_student',$data);
		//$this->load->view('awanku/category1',$data);
		//$this->load->view('template/footer',$data);
		
	}
	
		public function quiz(){
	//print_r($_SESSION);
	//echo "logout";
		$base=base_url();
		$site=site_url();
		
		$data= array(
		'base' => $base,
		'site' => $site
		);
		
		$this->load->view('awanku/menu',$data);
		$this->load->view('awanku/quizes',$data);
		$this->load->view('template/footer',$data);
	}
	
	public function forgot(){
		$base=base_url();
		$site=site_url();
		
		$data= array(
		'base' => $base,
		'site' => $site
		);
		
		//$this->load->view('awanku/menu',$data);
		$this->load->view('reset',$data);
		//$this->load->view('template/footer',$data);
	}
	
	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */