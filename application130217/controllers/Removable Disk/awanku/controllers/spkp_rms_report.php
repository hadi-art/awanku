<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
session_start();
class Rms_report extends CI_Controller {

	public function __construct(){
	
		parent::__construct();
		$this->load->database();
		$this->load->model('rms_model');
		$this->load->helper('html');
		$this->load->helper('url');
		$this->load->library('pagination');
		date_default_timezone_set('Asia/Kuala_Lumpur');
		$base=base_url();
		
		
		if($_SESSION["log"]["level_id"]==4 || $_SESSION["log"]["level_id"]==9){
		//echo "ss";
		}
		else{
		die("Not authorize..<a href='$base'>Kembali</a>");
		}
		
}
	
	public function index()
	{
		$site=site_url();
		$base=base_url();
		$data=array(
					'site' => site_url(),
					'base' => base_url()
					);
		#$this->load->view('welcome_message');
		$this->load->view('rms/template/banner',$data);
		$this->load->view('rms/menu',$data);
		$this->load->view('rms/rumusan',$data);
		$this->load->view('rms/template/footer',$data);
	}
	
	
	public function rumusan()
	{
		$site=site_url();
		$base=base_url();
		$data=array(
					'site' => site_url(),
					'base' => base_url()
					);
		#$this->load->view('welcome_message');
		$this->load->view('rms/template/banner',$data);
		$this->load->view('rms/menu',$data);
		$this->load->view('rms/rumusan',$data);
		$this->load->view('rms/template/footer',$data);
	}
	
	public function rumusan_ajax()
	{
		$site=site_url();
		$base=base_url();
		$data=array(
					'site' => site_url(),
					'base' => base_url()
					);
		#$this->load->view('welcome_message');
		$this->load->view('rms/template/banner',$data);
		$this->load->view('rms/menu',$data);
		$this->load->view('rms/rumusan_ajax',$data);
		$this->load->view('rms/template/footer',$data);
	}
	
	public function rumusanv2()
	{
		$site=site_url();
		$base=base_url();
		$data=array(
					'site' => site_url(),
					'base' => base_url()
					);
		#$this->load->view('welcome_message');
		$this->load->view('rms/template/banner',$data);
		$this->load->view('rms/menu',$data);
		$this->load->view('rms/rumusanv2.php',$data);
		$this->load->view('rms/template/footer',$data);
	}
	
	public function view_pg1()
	{
		$site=site_url();
		$base=base_url();
		$data=array(
					'site' => site_url(),
					'base' => base_url()
					);
		//$this->load->view('rms/template/banner',$data);
		//$this->load->view('rms/menu',$data);
		$this->load->view('rms/view_pg1.php',$data);
		//$this->load->view('rms/template/footer',$data);
	}
	public function view_pg2()
	{
		$site=site_url();
		$base=base_url();
		$data=array(
					'site' => site_url(),
					'base' => base_url()
					);
		$this->load->view('rms/view_pg2.php',$data);
	}
	
	public function view_pgout1()
	{
		$site=site_url();
		$base=base_url();
		$data=array(
					'site' => site_url(),
					'base' => base_url()
					);
		$this->load->view('rms/view_pgout1.php',$data);
	}
	
	public function view_pgout2()
	{
		$site=site_url();
		$base=base_url();
		$data=array(
					'site' => site_url(),
					'base' => base_url()
					);
		$this->load->view('rms/view_pgout2.php',$data);
	}
	
	
	
	public function viewscreenshot()
	{
		$site=site_url();
		$base=base_url();
		$id=$this->uri->segment(3);
		$field=$this->uri->segment(4);
		$data=array(
					'site' => site_url(),
					'base' => base_url(),
					'field' => $field,
					'id'	=>$id
					);
		//$this->load->view('rms/template/banner',$data);
		//$this->load->view('rms/menu',$data);
		$this->load->view('rms/viewscreenshot',$data);
		//$this->load->view('rms/template/footer',$data);
	}
	public function viewscreenshotfull()
	{
		$site=site_url();
		$base=base_url();
		$id=$this->uri->segment(3);
		$field=$this->uri->segment(4);
		$data=array(
					'site' => site_url(),
					'base' => base_url(),
					'field' => $field,
					'id'	=>$id
					);
		//$this->load->view('rms/template/banner',$data);
		//$this->load->view('rms/menu',$data);
		$this->load->view('rms/viewscreenshot',$data);
		//$this->load->view('rms/template/footer',$data);
	}
	
	public function allcamcontrol()
	{
		$site=site_url();
		$base=base_url();	
		
		$data=array(
					'site' => site_url(),
					'base' => base_url()
					);
		$this->load->view('rms/template/banner',$data);
		$this->load->view('rms/menu',$data);
		$this->load->view('rms/allcamcontrol',$data);
		$this->load->view('rms/template/footer',$data);
	}
	
	public function allcamview()
	{
		$site=site_url();
		$base=base_url();
		$data=array(
					'site' => site_url(),
					'base' => base_url()
					);
		//$this->load->view('rms/template/banner',$data);
		//$this->load->view('rms/menu',$data);
		$this->load->view('rms/allcam',$data);
		//$this->load->view('rms/template/footer',$data);
	}
	
	public function cam()
	{
		$site=site_url();
		$base=base_url();
		$data=array(
					'site' => site_url(),
					'base' => base_url()
					);
		//$this->load->view('rms/template/banner',$data);
		//$this->load->view('rms/menu',$data);
		$this->load->view('rms/cam.php',$data);
		//$this->load->view('rms/template/footer',$data);
	}
	
	public function pop()
	{
		$site=site_url();
		$base=base_url();
		$data=array(
					'site' => site_url(),
					'base' => base_url()
					);
		//$this->load->view('rms/template/banner',$data);
		//$this->load->view('rms/menu',$data);
		$this->load->view('rms/pop.php',$data);
		//$this->load->view('rms/template/footer',$data);
	}
	
	public function viewuserdetail()
	{
		$site=site_url();
		$base=base_url();
		$data=array(
					'site' => site_url(),
					'base' => base_url()
					);
		//$this->load->view('rms/template/bannerpopup',$data);
		//$this->load->view('rms/menu',$data);
		$this->load->view('rms/viewuserdetail.php',$data);
		//$this->load->view('rms/template/footer',$data);
	}
	
	public function viewgroupuser()
	{
		$site=site_url();
		$base=base_url();
		$crew=$this->uri->segment(3);
		$shift=$this->uri->segment(4);
		
		$data=array(
					'site' => site_url(),
					'base' => base_url(),
					'crew' => $crew,
					'shift'	=>$shift
					);
		//$this->load->view('rms/template/banner',$data);
		//$this->load->view('rms/menu',$data);
		$this->load->view('rms/viewgroupuser.php',$data);
		//$this->load->view('rms/template/footer',$data);
	}
	
	/*--------------------------------------------newww---------------------------------------------------------*/
	public function sp_record_form()
	{
		$site=site_url();
		$base=base_url();
		
		
		$data=array(
					'site' => site_url(),
					'base' => base_url()
					);
		$this->load->view('rms/template/banner',$data);
		$this->load->view('rms/menu',$data);
		$this->load->view('rms/sp_record_form',$data);
		$this->load->view('rms/template/footer',$data);
	}
	
	
	
	public function sp_record_content()
	{
		$site=site_url();
		$base=base_url();
		
		
		$start=$this->uri->segment(3);
		$end=$this->uri->segment(4);
		
		#die();
		
		
		if(isset($_POST["submit"])){
			$start=$_POST["start"];
			$end=$_POST["end"];
			$start=$this->rms_model->newtarikhformat($start);
			$end=$this->rms_model->newtarikhformat($end);
		//echo $start;
		//echo "masukkkk";
			
			//echo "asasasas";
		}//isset
		
		
		
		
		
		
		
		//echo $start;
		#$start="201310031417";
#$end="201310031418";

		$estart=$start."0000";
		$eend=$end."0000";
		$page=1;
		//echo "<br>";
		//echo $start;

	
		$q="SELECT count(*) FROM snapshot_ref WHERE frame_id >='$estart' AND frame_id <='$eend'";
		list($totallframe)=mysql_fetch_row(mysql_query($q));
		
		
		
		$config['uri_segment'] = 5;//segment berapa yg view total page semua
		$config['num_links'] = 5;//berapa banyak sekali link
		$config['base_url'] = $site."/rms_report/sp_record_content/$start/$end";
		$config['total_rows'] = $totallframe;
		$perpage=$config['per_page'] = 12; 
		
		
		$startpg=$this->uri->segment(5);
		if($startpg==""){$startpg=0;}
		
		$this->pagination->initialize($config); 
		
		$page=$this->pagination->create_links();
		
		
		$data=array(
					'site' => site_url(),
					'base' => base_url(),
					'page' =>$page,
					'estart' => $estart,
					'eend'	=>$eend,
					'startpg' =>$startpg,
					'perpage' => $perpage
					);
		$this->load->view('rms/template/banner',$data);
		$this->load->view('rms/menu',$data);
		$this->load->view('rms/sp_record_content',$data);
		$this->load->view('rms/template/footer',$data);
	}
	
	public function sp_zoom_img()
	{
		$site=site_url();
		$base=base_url();
		$imagename=$this->uri->segment(3);
		$path=$this->uri->segment(4);
		
		$data=array(
					'site' => site_url(),
					'base' => base_url(),
					'imagename'=> $imagename,
					'path' => $path
					);
		//$this->load->view('rms/template/banner',$data);
		//$this->load->view('rms/menu',$data);
		$this->load->view('rms/sp_zoom_img',$data);
		//$this->load->view('rms/template/footer',$data);
	}
	
	public function profail()
	{
		$site=site_url();
		$base=base_url();
		$data=array(
					'site' => site_url(),
					'base' => base_url()
					);
		#$this->load->view('welcome_message');
		$this->load->view('rms/template/banner',$data);
		$this->load->view('rms/profail.php',$data);
		$this->load->view('rms/menu',$data);
		$this->load->view('rms/template/footer',$data);
	}
	
	
	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */