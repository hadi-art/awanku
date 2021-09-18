<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
session_start();

class My_attandance extends CI_Controller 
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
		//$this->load->database();
		mysql_connect("10.46.5.200","tkc","rebel");
		mysql_select_db("biostartkc");
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
		
		$this->load->view('my_attandance',$data);
	
	
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
		
					$date = new DateTime();
				$datex =  $date->format('H:i:s');
				$tarikh= $date->format('d-m-Y');

				$userid=$_SESSION["log"]["userid"];
				$leveluser=$_SESSION["log"]["level_id"];
				$class_id=$_SESSION["log"]["class_id"];

			
				$q="insert into logs set userId='$userid', timeout='$datex',tarikh='$tarikh', level_id='$leveluser', classId='$class_id', flag='2'";
				mysql_query($q); 

		
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
	
		public function find(){
		$base=base_url();
		$site=site_url();
		
		$data= array(
		'base' => $base,
		'site' => $site
		);
		
		//$this->load->view('awanku/menu',$data);
		$this->load->view('search',$data);
		//$this->load->view('template/footer',$data);
	}
	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */