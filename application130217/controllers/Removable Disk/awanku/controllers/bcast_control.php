<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
session_start(); 

class Bcast_control extends CI_Controller {

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
		//$this->load->model('main_model');
		$this->load->database();
		$this->load->helper('url');
		$this->load->library('upload');
		$site=site_url();
		$base=base_url();
		
		#if(isset($_GET["ip"])){$_SESSION["log"]["level_id"]=1;}
		
		if(!$_SESSION){
		
		//echo "<a href='$site/temp_control'>Please Loginxx</a>";
		#header("Location: http://192.168.1.20/bcast/index.php/temp_control");
		#die();
		}
		
		
	} 
	
	public function index()
	{
		
		
		$site=site_url();
		$base=base_url();
		
		
		
		$data=array(
					'page' => "Main",
					'site' => site_url(),
					'base' => base_url()
					
					);
		$this->load->view('awanku/menu',$data);
		$this->load->view('bcast/template/banner2',$data);
		$this->load->view('bcast/template/menu',$data);
		$this->load->view('bcast/lower/lower',$data);
		//$this->load->helper(array('form', 'url'));
		$this->load->view('bcast/template/footer',$data);
	}
	

	
	
	
	public function testupload()
	{
		
		
		$site=site_url();
		$base=base_url();
		list($timestamp)=mysql_fetch_row(mysql_query("SELECT a.ref2 FROM bcast_param a WHERE a.param_name='primevideosource'"));
		
		//$wnn=explode(":",$timestamp);
		//print_r($wnn);
		//$ref=$wnn[0].":".$wnn[1];
		
		
		
		
		$data=array(
					'page' => "testupload",
					'site' => site_url(),
					'base' => base_url()
					
					);
		//$this->load->view('template/banner2',$data);
		//$this->load->view('template/menu',$data);
		$this->load->view('testupload',$data);
		//$this->load->view('template/footer',$data);
	} 
	
	public function upload_frame(){
	$base=base_url();
	$site=site_url();
	
		$data=array(
					'page' => "upload_frame",
					'site' => site_url(),
					'base' => base_url()
					
					);
	//print_r($_FILES);
	//print_r($_POST);
	$this->load->view('template/upload_frame',$data);
	
	}//function
	
	public function add_video(){
	$base=base_url();
	$site=site_url();
	
		$data=array(
					'page' => "testupload",
					'site' => site_url(),
					'base' => base_url()
					
					);
	//print_r($_FILES);
	//print_r($_POST);
	$this->load->view('prime/add_video',$data);
	
	}//function
	
	public function viewads_apps()
	{
		
		
		$site=site_url();
		$base=base_url();
		
		
		list($timestamp)=mysql_fetch_row(mysql_query("SELECT a.ref2 FROM bcast_param a WHERE a.param_name='primevideosource'"));
		
		//$wnn=explode(":",$timestamp);
		//print_r($wnn);
		//$ref=$wnn[0].":".$wnn[1];
		
		mysql_query("update bcast_param a set a.ref1='$timestamp' WHERE a.param_name='primevideosource'");
		
		
		$data=array(
					'page' => "Main",
					'site' => site_url(),
					'base' => base_url(),
					'ip' =>$ip
					
					);
		//$this->load->view('template/banner2',$data);
		//$this->load->view('template/menu',$data);
		$this->load->view('viewads_apps',$data);
		//$this->load->view('template/footer',$data);
	} 
	
	
	public function viewads()
	{
		//echo "<pre>";
		//echo $_SERVER['REMOTE_ADDR'];
		//echo $_SERVER['REMOTE_ADDR'];
		//echo $_SERVER['HTTP_USER_AGENT'];
		//print_r($_SERVER);
		//$exec = exec("hostname"); //the "hostname" is a valid command in both windows and linux
		//$hostname = trim($exec);
		//echo gethostbyname(trim($hostname));
		$ip=$this->uri->segment(3);
		$_SESSION["logs"]["ip"]=$ip;
		$site=site_url();
		$base=base_url();
		list($primewidth)=mysql_fetch_row(mysql_query("select value from bcast_param where param_name='primewidth'"));
		list($primeheight)=mysql_fetch_row(mysql_query("select value from bcast_param where param_name='primeheight'"));
		list($color_marqueelower)=mysql_fetch_row(mysql_query("select value from bcast_param where param_name='color_marqueelower'"));
		list($color_marqueeright)=mysql_fetch_row(mysql_query("select value from bcast_param where param_name='color_marqueeright'"));
		list($color_prime)=mysql_fetch_row(mysql_query("select value from bcast_param where param_name='color_prime'"));
		
		list($player)=mysql_fetch_row(mysql_query("select value from bcast_param where param_name='primevideosource'"));
		
		$data=array(
					'page' => "Main",
					'site' => site_url(),
					'base' => base_url(),
					'primewidth' => $primewidth,
					'primeheight' => $primeheight,
					'color_marqueelower' => $color_marqueelower,
					'color_marqueeright' => $color_marqueeright,
					'color_prime' => $color_prime,
					'player' => $player,
					'ip' =>$ip
					);
		$this->load->view('bcast/template/banner',$data);
		$this->load->view('bcast/lower/mainl',$data);
		$this->load->view('bcast/right/mainr',$data);
		
		//if function utk load video
		$this->load->view('bcast/prime/primesource',$data);
		
		
		$this->load->view('bcast/template/footer',$data);
	}//view ads
	
	
	public function loadprimesource()
	{
		
		
		$site=site_url();
		$base=base_url();
		list($player)=mysql_fetch_row(mysql_query("select value from bcast_param where param_name='primevideosource'"));
		
		
		$data=array(
					'page' => "Main",
					'site' => site_url(),
					'base' => base_url(),
					'player' => $player
					
					);
		//$this->load->view('template/banner',$data);
		//$this->load->view('template/menu',$data);
		$this->load->view('bcast/prime/loadprimesource',$data);
	   //$this->load->view('template/footer',$data);
	}
	public function checkflagsources()
	{
		
		
		$site=site_url();
		$base=base_url();
		list($timestamp_berubah)=mysql_fetch_row(mysql_query("SELECT a.ref2 FROM bcast_param a WHERE a.param_name='primevideosource'"));
		
		
		$data=array(
					'page' => "Main",
					'site' => site_url(),
					'base' => base_url(),
					'timestamp_berubah' => $timestamp_berubah
					);
		//$this->load->view('template/banner',$data);
		//$this->load->view('template/menu',$data);
		$this->load->view('bcast/prime/checkflagsources',$data);
	   //$this->load->view('template/footer',$data);
	}
	
	public function news()
	{
		
		
		$site=site_url();
		$base=base_url();
		
		
		
		$data=array(
					'page' => "Main",
					'site' => site_url(),
					'base' => base_url()
					
					);
		$this->load->view('awanku/menu',$data);
		$this->load->view('bcast/template/banner2',$data);
		$this->load->view('bcast/template/menu',$data);
		$this->load->view('bcast/right/news1',$data);
		//$this->load->view('template/footer',$data);
	}
	
		public function news2()
	{
		
		
		$site=site_url();
		$base=base_url();
		
		
		
		$data=array(
					'page' => "Main",
					'site' => site_url(),
					'base' => base_url()
					
					);
		$this->load->view('template/banner2',$data);
		$this->load->view('template/menu2',$data);
		$this->load->view('right/news2',$data);
		//$this->load->view('template/footer',$data);
	}
	
	public function videolist()
	{
		
		
		$site=site_url();
		$base=base_url();
		
		
		
		$data=array(
					'page' => "Main",
					'site' => site_url(),
					'base' => base_url()
					
					);
		$this->load->view('awanku/menu',$data);
		$this->load->view('bcast/template/banner2',$data);
		$this->load->view('bcast/template/menu',$data);
		$this->load->view('bcast/prime/videolist',$data);
		//$this->load->view('prime/videolist',$data);
		$this->load->view('bcast/template/footer',$data);
	}
	
	public function videolist2()
	{
		
		
		$site=site_url();
		$base=base_url();
		
		
		
		$data=array(
					'page' => "Main",
					'site' => site_url(),
					'base' => base_url()
					
					);
		$this->load->view('template/banner2',$data);
		$this->load->view('template/menu2',$data);
		$this->load->view('prime/videolist2',$data);
		$this->load->view('template/footer',$data);
	}
	
	public function videolistswap()
	{
		
		
		$site=site_url();
		$base=base_url();
		
		
		
		$data=array(
					'page' => "Main",
					'site' => site_url(),
					'base' => base_url()
					
					);
		//$this->load->view('template/banner2',$data);
		//$this->load->view('template/menu',$data);
		$this->load->view('bcast/prime/videolistswap',$data);
		//$this->load->view('template/footer',$data);
	}

	
		
	public function primev2()
	{
		
		
		$site=site_url();
		$base=base_url();
		
		
		
		$data=array(
					'page' => "Main",
					'site' => site_url(),
					'base' => base_url()
					
					);
		//$this->load->view('template/banner',$data);
		$this->load->view('template/menu',$data);
		$this->load->view('prime/primev2',$data);
		$this->load->view('template/footer',$data);
	}
	
	public function edit()
	{
		
		
		$site=site_url();
		$base=base_url();
		
		
		
		$data=array(
					'page' => "Main",
					'site' => site_url(),
					'base' => base_url()
					
					);
					$this->load->view('bcast/lower/edit',$data);
		//$this->load->view('template/banner',$data);
		//$this->load->view('template/menu',$data);
		//$this->load->view('lower/edit',$data);
	   //$this->load->view('template/footer',$data);
	}
	
		public function edit1()
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
		$this->load->view('bcast/right/edit1',$data);
	//	$this->load->view('template/footer',$data);
	}
	
	public function primary()
	{
		
		
		$site=site_url();
		$base=base_url();
		
		
		
		$data=array(
					'page' => "Main",
					'site' => site_url(),
					'base' => base_url()
					
					);
		$this->load->view('template/banner2',$data);
		$this->load->view('template/menu',$data);
		$this->load->view('prime/primary',$data);
		$this->load->view('template/footer',$data);
	}
	
		
	public function upload()
	{
		
		
		$site=site_url();
		$base=base_url();
		
		
		
		$data=array(
					'page' => "Main",
					'site' => site_url(),
					'base' => base_url()
					
					);
	//	$this->load->view('template/banner2',$data);
		//$this->load->view('template/menu',$data);
		$this->load->view('prime/uploadvid',$data);
		//$this->load->view('template/footer',$data);
	}
	
	public function view()
	{
		
		
		$site=site_url();
		$base=base_url();
		
		
		
		$data=array(
					'page' => "Main",
					'site' => site_url(),
					'base' => base_url()
					
					);
		$this->load->view('template/banner',$data);
		$this->load->view('template/menu',$data);
		$this->load->view('view',$data);
		$this->load->view('template/footer',$data);
	}
	
	public function lower()
	{
		
		
		$site=site_url();
		$base=base_url();
		
		
		
		$data=array(
					'page' => "Main",
					'site' => site_url(),
					'base' => base_url()
					
					);
		//$this->load->view('lower/lower',$data);
		$this->load->view('awanku/menu',$data);
		$this->load->view('bcast/template/banner2',$data);
		$this->load->view('bcast/template/menu',$data);
		$this->load->view('bcast/lower/lower',$data);
		//$this->load->view('template/footer',$data);
		
		
		
		
	}
	
		public function lower2()
	{
		
		
		$site=site_url();
		$base=base_url();
		
		
		
		$data=array(
					'page' => "Main",
					'site' => site_url(),
					'base' => base_url()
					
					);
		$this->load->view('template/banner2',$data);
		$this->load->view('template/menu2',$data);
		$this->load->view('lower/lower2',$data);
		//$this->load->view('template/footer',$data);
	}
	
	public function lowercontent()
	{
		
		
		$site=site_url();
		$base=base_url();
		list($primewidth)=mysql_fetch_row(mysql_query("select value from bcast_param where param_name='primewidth'"));
		list($primeheight)=mysql_fetch_row(mysql_query("select value from bcast_param where param_name='primeheight'"));
		list($color_marqueelower)=mysql_fetch_row(mysql_query("select value from bcast_param where param_name='color_marqueelower'"));
		list($color_marqueeright)=mysql_fetch_row(mysql_query("select value from bcast_param where param_name='color_marqueeright'"));
		list($color_prime)=mysql_fetch_row(mysql_query("select value from bcast_param where param_name='color_prime'"));
		
		
		
		$data=array(
					'page' => "Main",
					'site' => site_url(),
					'base' => base_url(),
					'primewidth' => $primewidth,
					'primeheight' => $primeheight,
					'color_marqueelower' => $color_marqueelower,
					'color_marqueeright' => $color_marqueeright,
					'color_prime' => $color_prime
					);
		//$this->load->view('template/banner',$data);
		//$this->load->view('template/menu',$data);
		$this->load->view('bcast/lower/lowercontent',$data);
		//$this->load->view('template/footer',$data);
	}
	
	
	public function rightcontent()
	{
		
		
		$site=site_url();
		$base=base_url();
		list($primewidth)=mysql_fetch_row(mysql_query("select value from bcast_param where param_name='primewidth'"));
		list($primeheight)=mysql_fetch_row(mysql_query("select value from bcast_param where param_name='primeheight'"));
		list($color_marqueelower)=mysql_fetch_row(mysql_query("select value from bcast_param where param_name='color_marqueelower'"));
		list($color_marqueeright)=mysql_fetch_row(mysql_query("select value from bcast_param where param_name='color_marqueeright'"));
		list($color_prime)=mysql_fetch_row(mysql_query("select value from bcast_param where param_name='color_prime'"));
		
		
		
		$data=array(
					'page' => "Main",
					'site' => site_url(),
					'base' => base_url(),
					'primewidth' => $primewidth,
					'primeheight' => $primeheight,
					'color_marqueelower' => $color_marqueelower,
					'color_marqueeright' => $color_marqueeright,
					'color_prime' => $color_prime
					);
		//$this->load->view('template/banner',$data);
		//$this->load->view('template/menu',$data);
		$this->load->view('bcast/right/rightcontent',$data);
		//$this->load->view('template/footer',$data);
	}
	
	public function mainmenu()
	{
		
		
		$site=site_url();
		$base=base_url();
		list($primewidth)=mysql_fetch_row(mysql_query("select value from bcast_param where param_name='primewidth'"));
		list($primeheight)=mysql_fetch_row(mysql_query("select value from bcast_param where param_name='primeheight'"));
		list($color_marqueelower)=mysql_fetch_row(mysql_query("select value from bcast_param where param_name='color_marqueelower'"));
		list($color_marqueeright)=mysql_fetch_row(mysql_query("select value from bcast_param where param_name='color_marqueeright'"));
		list($color_prime)=mysql_fetch_row(mysql_query("select value from bcast_param where param_name='color_prime'"));
		
		
		
		$data=array(
					'page' => "Main",
					'site' => site_url(),
					'base' => base_url(),
					'primewidth' => $primewidth,
					'primeheight' => $primeheight,
					'color_marqueelower' => $color_marqueelower,
					'color_marqueeright' => $color_marqueeright,
					'color_prime' => $color_prime
					);
		$this->load->view('template/banner2',$data);
		//$this->load->view('template/menu',$data);
		$this->load->view('mainmenu',$data);
		$this->load->view('template/footer',$data);
	}
	
	
	
	public function logout()
	{
		
		$site=site_url();
		$base=base_url();
		
		session_destroy();
		header("Location: $site");
	}
	
	// ------  player -------
	
	public function test()
	{
		
		
		$site=site_url();
		$base=base_url();
		
		
		
		$data=array(
					'page' => "Main",
					'site' => site_url(),
					'base' => base_url()
					
					);
		//$this->load->view('template/banner2',$data);
		//$this->load->view('template/menu',$data);
		$this->load->view('newflv/test2',$data);
		//$this->load->view('template/footer',$data);
	}
	
	public function addyoutube()
	{
		
		
		$site=site_url();
		$base=base_url();
		
		
		
		$data=array(
					'page' => "Main",
					'site' => site_url(),
					'base' => base_url()
					
					);
	//	$this->load->view('template/banner2',$data);
		//$this->load->view('template/menu',$data);
		$this->load->view('bcast/prime/addyoutube',$data);
		//$this->load->view('template/footer',$data);
	}
	
	public function ktubeswap()
	{
		
		
		$site=site_url();
		$base=base_url();
		
		
		
		$data=array(
					'page' => "Main",
					'site' => site_url(),
					'base' => base_url()
					
					);
		//$this->load->view('template/banner2',$data);
		//$this->load->view('template/menu',$data);
		$this->load->view('prime/ktubeswap',$data);
		//$this->load->view('template/footer',$data);
	}
	
	
	// ----------- progressbar ----------------------------
	
		public function bar()
	{
		
		
		$site=site_url();
		$base=base_url();
		
		
		
		$data=array(
					'page' => "Main",
					'site' => site_url(),
					'base' => base_url()
					
					);
		//$this->load->view('template/banner2',$data);
		//$this->load->view('template/menu',$data);
		$this->load->view('progressbar/bar',$data);
		//$this->load->view('template/footer',$data);
	}
	
		public function notice()
	{
		
		
		$site=site_url();
		$base=base_url();
		
		
		
		$data=array(
					'page' => "Main",
					'site' => site_url(),
					'base' => base_url()
					
					);
		//$this->load->view('template/banner2',$data);
		//$this->load->view('template/menu',$data);
		$this->load->view('notice',$data);
		//$this->load->view('template/footer',$data);
	}
	
	public function notice_add()
	{
		
		
		$site=site_url();
		$base=base_url();
		
		
		
		$data=array(
					'page' => "Main",
					'site' => site_url(),
					'base' => base_url()
					
					);
		//$this->load->view('template/banner2',$data);
		//$this->load->view('template/menu',$data);
		$this->load->view('notice_add',$data);
		//$this->load->view('template/footer',$data);
	}
	
	public function updateCB()
	{
		
		
		$site=site_url();
		$base=base_url();
		
		
		
		$data=array(
					'page' => "Main",
					'site' => site_url(),
					'base' => base_url()
					
					);
		//$this->load->view('template/banner2',$data);
		//$this->load->view('template/menu',$data);
		$this->load->view('prime/updateCheckbox',$data);
		//$this->load->view('template/footer',$data);
	}
	
	public function CB()
	{
		
		
		$site=site_url();
		$base=base_url();
		
		
		
		$data=array(
					'page' => "Main",
					'site' => site_url(),
					'base' => base_url()
					
					);
		//$this->load->view('template/banner2',$data);
		//$this->load->view('template/menu',$data);
		$this->load->view('prime/updateCB',$data);
		//$this->load->view('template/footer',$data);
	}
	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */