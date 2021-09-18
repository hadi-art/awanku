<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
session_start(); 

class dailyreport_control extends CI_Controller {
 

	public function __construct(){
		parent::__construct();
		$this->load->database();
		#$this->load->model('awanku_model');
		$this->load->helper('html');
		$this->load->helper('url');
		date_default_timezone_set('Asia/Kuala_Lumpur');
		
	}
	
	public function index()
	{
		
		
		$site=site_url();
		$base=base_url();
		
		
		
		$data=array(
					'page' => "Home",
					'site' => site_url(),
					'base' => base_url()
					
					);
		#$this->load->view('template/banner',$data);
		$this->load->view('routine/menu2',$data);
		#$this->load->view('mmlib/home',$data);
		$this->load->view('routine/report',$data);
		
		#$this->load->view('routine/footer',$data);
	}
	
		public function add(){
	
	
		$base=base_url();
		$site=site_url();
		
		$data= array(
		'base' => $base,
		'site' => $site
		);
		
		$this->load->view('routine/menu2',$data);
		$this->load->view('routine/add',$data);
		
	}
	
		public function view(){
	
	
		$base=base_url();
		$site=site_url();
		
		$data= array(
		'base' => $base,
		'site' => $site
		);
		
		#$this->load->view('report/menu',$data);
		$this->load->view('routine/view',$data);
		
	}
	
			public function reporting(){
	
	
		$base=base_url();
		$site=site_url();
		
		$data= array(
		'base' => $base,
		'site' => $site
		);
		
		$this->load->view('routine/menu2',$data);
		$this->load->view('routine/report',$data);
		
	}
	
	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */