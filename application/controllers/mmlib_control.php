<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
session_start(); 

class Mmlib_control extends CI_Controller {
 

	public function __construct()
	{
		parent::__construct();
		//$this->load->model('main_model');
		$this->load->database();
		$this->load->helper('url');
		$this->load->library('pagination');
		$site=site_url();
		$base=base_url();
		
		#$q="SELECT description FROM tbl_param WHERE var='server'";
		#list($server)=mysql_fetch_row(mysql_query($q));
		
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
		$this->load->view('mmlib/menu',$data);
		#$this->load->view('mmlib/home',$data);
		$this->load->view('mmlib/welcome',$data);
		
		$this->load->view('template/footer',$data);
	}
		
	public function contentlist()
	{
		
		
		$site=site_url();
		$base=base_url();
		
		
		//?subj=$data[id]&ibprofile=0&page=0&tahap=1
		
		$subj=$this->uri->segment(3);
		$ibprofile=$this->uri->segment(4);
		$tahap=$this->uri->segment(5);
		$form=$this->uri->segment(6);
		$startpage=$this->uri->segment(7);

		if($startpage==""){$startpage=0;}
		
	
		$_SESSION["ktube"]["click"]["tahap"]=$tahap;
		$_SESSION["ktube"]["click"]["ibprofile"]=$ibprofile;
		$_SESSION["ktube"]["click"]["form"]=$form;
		
		$data=array(
					'page' => "Home",
					'site' => site_url(),
					'base' => base_url(),
					'subj' => $subj,
					'ibprofile' => $ibprofile,
					'tahap' => $tahap,
					'form' => $form,
					
					'startpage' => $startpage
					);
		//$this->load->view('template/banner',$data);
		$this->load->view('mmlib/menu2',$data);
		$this->load->view('mmlib/contentlist',$data);
		$this->load->view('template/footer',$data);
	}
	
	
	
		public function mmlib_video()
	{
		$site=site_url();
		$base=base_url();
		
		$subj=$this->uri->segment(3);
		$ibprofile=$this->uri->segment(4);
		$tahap=$this->uri->segment(5);
		$startpage=$this->uri->segment(6);
		
		
		if($startpage==""){$startpage=0;}

		$_SESSION["ktube"]["click"]["tahap"]=$tahap;
		$_SESSION["ktube"]["click"]["ibprofile"]=$ibprofile;

		
		$data=array(
					'page' => "Content List",
					'site' => site_url(),
					'base' => base_url(),
					'subj' => $subj,
					'ibprofile' => $ibprofile,
					'tahap' => $tahap,
					
			
					'startpage' => $startpage
					);
					
		$this->load->view('mmlib/menu3',$data);			
		$this->load->view('mmlib/ktube_video',$data);
	}
	
	
		public function steam()
	{
		
		
		$site=site_url();
		$base=base_url();
		
		
		//?subj=$data[id]&ibprofile=0&page=0&tahap=1
		
		$subj=$this->uri->segment(3);
		$ibprofile=$this->uri->segment(4);
		$tahap=$this->uri->segment(5);
		$startpage=$this->uri->segment(6);
		

		if($startpage==""){$startpage=0;}
		
		
		$data=array(
					'page' => "Content List",
					'site' => site_url(),
					'base' => base_url(),
					'subj' => $subj,
					'ibprofile' => $ibprofile,
					'tahap' => $tahap,
					
					'startpage' => $startpage
					);
		
		$this->load->view('mmlib/menu2',$data);
		$this->load->view('mmlib/steam',$data);

	}
	
		public function search()
	{
				
		$site=site_url();
		$base=base_url();
		
		
		//?subj=$data[id]&ibprofile=0&page=0&tahap=1
		
		$subj=$this->uri->segment(3);
		$ibprofile=$this->uri->segment(4);
		$tahap=$this->uri->segment(5);
		$startpage=$this->uri->segment(6);
		

		if($startpage==""){$startpage=0;}
		
		//$config['base_url'] = 'http://example.com/index.php/test/page/';
		//$config['total_rows'] = 200;
		//$config['per_page'] = 20; 
		
		//$this->pagination->initialize($config); 
		
		//echo $this->pagination->create_links();
		
		//list($uname)=mysql_fetch_row(mysql_query("select username from tbl_user where username='uname'"));
		//echo "<pre>";
		//print_r($_SESSION);
		$_SESSION["ktube"]["click"]["tahap"]=$tahap;
		$_SESSION["ktube"]["click"]["ibprofile"]=$ibprofile;
		
		
		$data=array(
					'page' => "Content List",
					'site' => site_url(),
					'base' => base_url(),
					'subj' => $subj,
					'ibprofile' => $ibprofile,
					'tahap' => $tahap,
					
					'startpage' => $startpage
					);
		//$this->load->view('template/banner',$data);
		$this->load->view('mmlib/menu2',$data);
		$this->load->view('mmlib/search',$data);
		//$this->load->view('ktube/home',$data);
		
	}
	
			/*public function teacherfile()
	{
		
		
		$site=site_url();
		$base=base_url();
		
		
		//?subj=$data[id]&ibprofile=0&page=0&tahap=1
		
		$subj=$this->uri->segment(3);
		$ibprofile=$this->uri->segment(4);
		$tahap=$this->uri->segment(5);
		$startpage=$this->uri->segment(6);
		

		if($startpage==""){$startpage=0;}
		
		
		$data=array(
					'page' => "Content List",
					'site' => site_url(),
					'base' => base_url(),
					'subj' => $subj,
					'ibprofile' => $ibprofile,
					'tahap' => $tahap,
					
					'startpage' => $startpage
					);
		
		$this->load->view('mmlib/menu2',$data);
		$this->load->view('mmlib/teacherfile',$data);

	}*/
	public function teacherfile()
	{
		$site=site_url();
		$base=base_url();
		$data=array(
					'page' => "My Document",
					'site' => site_url(),
					'base' => base_url()					
					);
		#$this->load->view('template/banner',$data);
		$this->load->view('mmlib/menu2',$data);
		$this->load->view('mmlib/teacherfile',$data);
		#$this->load->view('template/footer',$data);
	}

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */