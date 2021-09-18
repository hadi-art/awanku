<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
session_start();
class parentsclub_control extends CI_Controller {
	
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
		$this->load->view('parentsclub/menu',$data);
		$this->load->view('parentsclub/event',$data);
		$this->load->view('template/footer',$data);
	}
	



}

?>