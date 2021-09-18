<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
session_start();
class securecampus_control extends CI_Controller {
	
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
		
		
		$site=site_url();
		$base=base_url();
		
		
		
		$data=array(
					'page' => "AWANKU",
					'site' => site_url(),
					'base' => base_url(),
					
					);
		#$this->load->view('template/banner',$data);
		$this->load->view('securecampus/menu',$data);
		
		$this->load->view('securecampus/category',$data);
		
		//$this->load->view('ktube/welcome',$data);
		#$this->load->view('ktube/home',$data);
		
		$this->load->view('template/footer',$data);
	}
	}