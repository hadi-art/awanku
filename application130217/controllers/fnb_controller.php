<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
session_start();
class Fnb_controller extends CI_Controller {


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
		
		$base=base_url();
		//echo "<br>";
		//die();
		$site=site_url();
		$imageref="11x.jpg";
		$data= array(
		'base' => $base,
		'site' => $site,
		'imageref' => $imageref
		);
		
		//$this->load->view('fnb/banner',$data);
		$this->load->view('fnb/menu',$data);
		$this->load->view('fnb/menuutama',$data);
		$this->load->view('fnb/main',$data);
	}
	
	public function outorder(){
		//
		
		$base=base_url();
		//echo "<br>";
		//die();
		$site=site_url();
		unset($_SESSION["order"]);
		//die();
		header("Location: $site/main");
	
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
		$this->load->view('fnb/additem',$data);
	}
	
	public function empty_cart(){
		//
		
		$base=base_url();
		$site=site_url();
		
		$data= array(
		'base' => $base,
		'site' => $site
		);
		unset($_SESSION["order"]);
		header("Location: $site/fnb_controller/");
		
		
	}
	
	
	public function updatecartitem(){
		//
		
		$base=base_url();
		$site=site_url();
		
		$data= array(
		'base' => $base,
		'site' => $site
		);
		
		$this->load->view('fnb/updateitem',$data);
		
		
	}
	
	public function submitcart(){
		//
		
		$base=base_url();
		$site=site_url();
		
		$data= array(
		'base' => $base,
		'site' => $site
		);
		
		$this->load->view('fnb/submitcart',$data);
		
		
	}
	
	public function detailorder(){
	
	$base=base_url();
	$site=site_url();
		
		$data= array(
		'base' => $base,
		'site' => $site
		);
	
	$this->load->view('fnb/detailorder',$data);
	}
	
	public function stats(){
		$this->load->model('cafe');
		$data["totalorder"] = $this->cafe->TotalOrder();
		$data["today"] = $this->cafe->OrderByDate(date("d/m/Y"));
		$this->load->view('fnb/cafe/stats',$data);
	}
	
	public function orderlist(){
		$this->load->model('cafe');
		$data["listorder"] = $this->cafe->OrderByDate($_GET["do"]);
		
		$data["base"] = base_url();
		$data["site"] = site_url();
		$this->load->view('fnb/cafe/menu',$data);
		$this->load->view('fnb/cafe/menuutama',$data);
		$this->load->view('fnb/cafe/orderlist',$data);
	}
	
	public function order(){
		$this->load->model('cafe');
		if(isset($_GET["update"])){
			$this->cafe->UpdateStatusOrder($_GET["refseries"],$_GET["status_order"]);
		}
		$data["item"] = $this->cafe->Order($_GET["refseries"]);
		
		$data["base"] = base_url();
		$data["site"] = site_url();
		$this->load->view('fnb/cafe/menu',$data);
		$this->load->view('fnb/cafe/detailorder',$data);
	}
	
	public function maincafe(){
	
	
	$site=site_url();
		$imageref="11.jpg";
		$data= array(
		'base' => $base,
		'site' => $site,
		'imageref' => $imageref
		);
		
		$this->load->view('fnb/banner',$data);
		//$this->load->view('fnb/main',$data);
		//$this->load->model('cafe');
		//$data["totalorder"] = $this->cafe->TotalOrder();
		//$data["today"] = $this->cafe->OrderByDate(date("d/m/Y"));
		//$this->load->view('fnb/cafe/stats',$data);
		$this->load->view('fnb/cafe/main',$data);
	}
	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */