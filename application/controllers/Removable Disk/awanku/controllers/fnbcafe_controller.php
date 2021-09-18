<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
session_start();
class Fnbcafe_controller extends CI_Controller {


	public function __construct(){
	
		parent::__construct();
		$this->load->database();
		$this->load->helper('html');
		$this->load->helper('url');
		$this->load->helper('url');
		date_default_timezone_set('Asia/Kuala_Lumpur');
		$base=base_url();
		
		if(!$_SESSION["log"]["userid"]){die("sila <a href='$base'>login</a>");}
		
		
	}
	
	public function index(){
		//
		//echo "hahs";
		$base=base_url();
		//echo "<br>";
		//die();
		$site=site_url();
		
		$data= array(
		'base' => $base,
		'site' => $site
		);
		
		//$this->load->view('fnb/cafe/banner',$data);
		$this->load->view('fnb/cafe/menu',$data);
		$this->load->view('fnb/cafe/menuutama2',$data);
		$this->load->view('fnb/cafe/listfood',$data);
		//$this->load->view('fnb/cafe/main',$data);
		
		
	}
	
	public function stats(){
		//
		//$this->load->model('cafe');
		//$data["totalorder"] = $this->cafe->TotalOrder();
		//$data["today"] = $this->cafe->OrderByDate(date("d/m/Y"));
		$data["base"] = base_url();
		$data["site"] = site_url();
		$this->load->view('fnb/cafe/menu',$data);
		$this->load->view('fnb/cafe/menuutama',$data);
		$this->load->view('fnb/cafe/stats',$data);
		
		
	}
	
	public function detailsorder(){
		//
		$this->load->model('cafe');
		$data["totalorder"] = $this->cafe->TotalOrder();
		$data["today"] = $this->cafe->OrderByDate(date("d/m/Y"));
		$data["base"] = base_url();
		$data["site"] = site_url();
		$this->load->view('fnb/cafe/menu',$data);
		$this->load->view('fnb/cafe/detailorder',$data);
		
		
	}
	
	public function listfood(){
		//
		
		
		$data["base"] = base_url();
		$data["site"] = site_url();
		$this->load->view('fnb/cafe/menu',$data);
		$this->load->view('fnb/cafe/menuutama2',$data);
		$this->load->view('fnb/cafe/listfood',$data);
		
		
	}
	
	public function editlist(){
		//
		
		
		$data["base"] = base_url();
		$data["site"] = site_url();
		$cat=$this->uri->segment(3);
		$data["cat"]=$cat;
		
		$this->load->view('fnb/cafe/bannerpopup',$data);
		$this->load->view('fnb/cafe/editlist',$data);
		
		
	}
	
	public function editsublist(){
		//
		
		
		$data["base"] = base_url();
		$data["site"] = site_url();
		$cat=$this->uri->segment(3);
		$list=$this->uri->segment(4);
		$data["cat"]=$cat;
		$data["list"]=$list;
		
		
		$this->load->view('fnb/cafe/bannerpopup',$data);
		$this->load->view('fnb/cafe/editsublist',$data);
		
		
	}
	
	public function viewimage(){
		//
		
		
		$data["base"] = base_url();
		$data["site"] = site_url();
		$id=$this->uri->segment(3);
		
		$data["id"]=$id;
		
		
		//$this->load->view('fnb/cafe/bannerpopup',$data);
		$this->load->view('fnb/cafe/viewimage',$data);
		
		
	}
	
	public function additem(){
		//
		
		$base=base_url();
		//echo "<br>";
		//die();
		$site=site_url();
		
		$data= array(
		'base' => $base,
		'site' => $site
		);
		
		//$this->load->view('fnb/banner',$data);
		$this->load->view('fnb/cafe/additem',$data);
	}

public function delete(){
		//
		
		
		$data["base"] = base_url();
		$data["site"] = site_url();
		//$this->load->view('fnb/cafe/menu',$data);
		//$this->load->view('fnb/cafe/menuutama2',$data);
		$this->load->view('fnb/cafe/delete',$data);
		
		
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */