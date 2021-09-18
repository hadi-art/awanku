<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
session_start();

class Main_control extends CI_Controller 
{

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
	 public function __construct()
	 {
	
		parent::__construct();
		$this->load->database();
		$this->load->model('main_model');
		$this->load->helper('html');
		$this->load->helper('url');
		date_default_timezone_set('Asia/Kuala_Lumpur');
		$base=base_url();
				
	}
	 
	 
	public function index()
	{
		$base=base_url();
		//echo "<br>";
		//die();
		$site=site_url();
		
		$data= array(
		'base' => $base,
		'site' => $site
		);
		
		$this->load->view('login',$data);
	}
	
	
	public function validate_login()
	{
		$base=base_url();
		$site=site_url();
		
		#echo $_POST["password"];
		
		$this->main_model->CheckRecord($_POST["username"],$_POST["password"]);
		
		
		
		$data= array(
		'base' => $base,
		'site' => $site
		);
		
		#$this->load->view('login',$data);
	}
	
	public function logout()
	{
		$base=base_url();
		$site=site_url();
		
		//echo $_POST["password"];
		
		//$this->main_model->CheckRecord($_POST["username"],$_POST["password"]);
		//session_destroy();
		//header("Location: $base");
		
		session_destroy();
		header("Location: $site");
		
		
		#$this->load->view('login',$data);
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