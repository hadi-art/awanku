<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
session_start();
class fixed_asset_mgt extends CI_Controller {

	public function __construct(){
	
		parent::__construct();
		$this->load->database();
		$this->load->helper('html');
		$this->load->helper('url');
		$this->load->library("pagination");
		date_default_timezone_set('Asia/Kuala_Lumpur');
		$base=base_url();
		
		/*error_reporting(0);
		if($_SESSION["log"]["level_id"]==3 || $_SESSION["log"]["level_id"]==9){
		//echo "ss";
		}
		else{
		die("Not authorize..<a href='$base'>Kembali</a>");
		}*/
		
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
		$this->load->view('spkp/fam/template/banner',$data);
		//$this->load->view('spkp/fam/menu',$data);
		/*$this->load->view('spkp/fam/index.php',$data);*/
		//$this->load->view('spkp/fam/cat_inventory',$data);
		$this->load->view('spkp/fam/template/footer',$data);
	}
	
	public function category()
	{
		$site=site_url();
		$base=base_url();
		
		$data=array(
					'site' => site_url(),
					'base' => base_url()
					);
		#$this->load->view('welcome_message');
		$this->load->view('spkp/fam/template/banner',$data);
		//$this->load->view('spkp/fam/menu',$data);
		$this->load->view('spkp/fam/category.php',$data);
		
		$this->load->view('spkp/fam/template/footer',$data);
	}
	
	
	public function senaraiaset()
	{
		$site=site_url();
		$base=base_url();
		
$q="SELECT count(*) FROM fam_inventory WHERE flag=1";
list($total_row)=mysql_fetch_row(mysql_query($q));

$config['base_url'] = $site."/fixed_asset_mgt/senaraiaset";
$config['total_rows'] = $total_row;
$bilperpage=$config['per_page'] = 15; 

$this->pagination->initialize($config); 

$page=$this->pagination->create_links();

$startpage=$this->uri->segment(3);

if($startpage==""){$startpage=0;}


		
		$data=array(
					'site' => site_url(),
					'base' => base_url(),
					'page' => $page,
					'startpage' => $startpage,
					'bilperpage' => $bilperpage
					
					);
		#$this->load->view('welcome_message');
		$this->load->view('spkp/fam/template/banner',$data);
		//$this->load->view('spkp/fam/menu',$data);
		$this->load->view('spkp/fam/cat_inventory.php',$data);
		
		$this->load->view('spkp/fam/template/footer',$data);
	}
	
	public function cat_add()
	{
		$site=site_url();
		$base=base_url();
		$data=array(
					'site' => site_url(),
					'base' => base_url()
					);
		#$this->load->view('welcome_message');
		//$this->load->view('spkp/fam/template/banner',$data);
		$this->load->view('spkp/fam/cat_add.php',$data);
		//$this->load->view('spkp/fam/menu',$data);
		//$this->load->view('spkp/fam/template/footer',$data);
	}
	
	public function cat_delete()
	{
		$site=site_url();
		$base=base_url();
		$id=$this->uri->segment(3);
		$data=array(
					'site' => site_url(),
					'base' => base_url(),
					'id'   => $id
					);
		#$this->load->view('welcome_message');
		
		$this->load->view('spkp/fam/cat_delete.php',$data);
		//$this->load->view('spkp/fam/menu',$data);
		//$this->load->view('spkp/fam/template/footer',$data);
	}
	
	public function cat_edit()
	{
		$site=site_url();
		$base=base_url();
		$id=$this->uri->segment(3);
		$data=array(
					'site' => site_url(),
					'base' => base_url(),
					'id'   => $id
					);
		#$this->load->view('welcome_message');
		
		$this->load->view('spkp/fam/cat_edit.php',$data);
		//$this->load->view('spkp/fam/menu',$data);
		//$this->load->view('spkp/fam/template/footer',$data);
	}
	
	public function sub_cat_add()
	{
		$site=site_url();
		$base=base_url();
		$catid=$this->uri->segment(3);
		$data=array(
					'site' => site_url(),
					'base' => base_url(),
					'catid'   => $catid
					);
		#$this->load->view('welcome_message');
		//$this->load->view('spkp/fam/template/banner',$data);
		$this->load->view('spkp/fam/sub_cat_add.php',$data);
		//$this->load->view('spkp/fam/menu',$data);
		//$this->load->view('spkp/fam/template/footer',$data);
	}
	
	public function sub_cat_delete()
	{
		$site=site_url();
		$base=base_url();
		$id=$this->uri->segment(3);
		$data=array(
					'site' => site_url(),
					'base' => base_url(),
					'id'   => $id
					);
		#$this->load->view('welcome_message');
		
		$this->load->view('spkp/fam/sub_cat_delete.php',$data);
		//$this->load->view('spkp/fam/menu',$data);
		//$this->load->view('spkp/fam/template/footer',$data);
	}
	
	public function sub_cat_edit()
	{
		$site=site_url();
		$base=base_url();
		$id=$this->uri->segment(3);
		$data=array(
					'site' => site_url(),
					'base' => base_url(),
					'id'   => $id
					);
		#$this->load->view('welcome_message');
		
		$this->load->view('spkp/fam/sub_cat_edit.php',$data);
		//$this->load->view('spkp/fam/menu',$data);
		//$this->load->view('spkp/fam/template/footer',$data);
	}
	
	public function cat_supplier_add()
	{
		$site=site_url();
		$base=base_url();
		$catid=$this->uri->segment(3);
		$data=array(
					'site' => site_url(),
					'base' => base_url(),
					'catid'   => $catid
					);
		#$this->load->view('welcome_message');
		//$this->load->view('spkp/fam/template/banner',$data);
		$this->load->view('spkp/fam/cat_supplier_add.php',$data);
		//$this->load->view('spkp/fam/menu',$data);
		//$this->load->view('spkp/fam/template/footer',$data);
	}
	public function cat_supplier_edit()
	{
		$site=site_url();
		$base=base_url();
		$id=$this->uri->segment(3);
		$data=array(
					'site' => site_url(),
					'base' => base_url(),
					'id'   => $id
					);
		#$this->load->view('welcome_message');
		
		$this->load->view('spkp/fam/cat_supplier_edit.php',$data);
		//$this->load->view('spkp/fam/menu',$data);
		//$this->load->view('spkp/fam/template/footer',$data);
	}
	
	public function cat_supplier_delete()
	{
		$site=site_url();
		$base=base_url();
		$id=$this->uri->segment(3);
		$data=array(
					'site' => site_url(),
					'base' => base_url(),
					'id'   => $id
					);
		#$this->load->view('welcome_message');
		
		$this->load->view('spkp/fam/cat_supplier_delete.php',$data);
		//$this->load->view('spkp/fam/menu',$data);
		//$this->load->view('spkp/fam/template/footer',$data);
	}
	
	public function cat_location_add()
	{
		$site=site_url();
		$base=base_url();
		$catid=$this->uri->segment(3);
		$data=array(
					'site' => site_url(),
					'base' => base_url(),
					'catid'   => $catid
					);
		#$this->load->view('welcome_message');
		//$this->load->view('spkp/fam/template/banner',$data);
		$this->load->view('spkp/fam/cat_location_add.php',$data);
		//$this->load->view('spkp/fam/menu',$data);
		//$this->load->view('spkp/fam/template/footer',$data);
	}
	
	public function cat_location_edit()
	{
		$site=site_url();
		$base=base_url();
		$id=$this->uri->segment(3);
		$data=array(
					'site' => site_url(),
					'base' => base_url(),
					'id'   => $id
					);
		#$this->load->view('welcome_message');
		
		$this->load->view('spkp/fam/cat_location_edit.php',$data);
		//$this->load->view('spkp/fam/menu',$data);
		//$this->load->view('spkp/fam/template/footer',$data);
	}
	
	public function cat_location_delete()
	{
		$site=site_url();
		$base=base_url();
		$id=$this->uri->segment(3);
		$data=array(
					'site' => site_url(),
					'base' => base_url(),
					'id'   => $id
					);
		#$this->load->view('welcome_message');
		
		$this->load->view('spkp/fam/cat_location_delete.php',$data);
		//$this->load->view('spkp/fam/menu',$data);
		//$this->load->view('spkp/fam/template/footer',$data);
	}

	public function cat_inventory_add()
	{
		$site=site_url();
		$base=base_url();
		$catid=$this->uri->segment(3);
		$data=array(
					'site' => site_url(),
					'base' => base_url(),
					'catid'   => $catid
					);
		#$this->load->view('welcome_message');
		//$this->load->view('spkp/fam/template/banner',$data);
		$this->load->view('spkp/fam/cat_inventory_add.php',$data);
		//$this->load->view('spkp/fam/menu',$data);
		//$this->load->view('spkp/fam/template/footer',$data);
	}
	
	public function cat_inventory_edit()
	{
		$site=site_url();
		$base=base_url();
		$id=$this->uri->segment(3);
		$data=array(
					'site' => site_url(),
					'base' => base_url(),
					'id'   => $id
					);
		#$this->load->view('welcome_message');
		$this->load->view('spkp/fam/template/banner_popup.php',$data);
		$this->load->view('spkp/fam/cat_inventory_edit.php',$data);
		//$this->load->view('spkp/fam/menu',$data);
		//$this->load->view('spkp/fam/template/footer',$data);
	}
	
	public function cat_inventory_delete()
	{
		$site=site_url();
		$base=base_url();
		$id=$this->uri->segment(3);
		$data=array(
					'site' => site_url(),
					'base' => base_url(),
					'id'   => $id
					);
		#$this->load->view('welcome_message');
		
		$this->load->view('spkp/fam/cat_inventory_delete.php',$data);
		//$this->load->view('spkp/fam/menu',$data);
		//$this->load->view('spkp/fam/template/footer',$data);
	}
	
	public function asset_list()
	{
		$site=site_url();
		$base=base_url();
		$data=array(
					'site' => site_url(),
					'base' => base_url()
					);
		#$this->load->view('welcome_message');
		$this->load->view('spkp/fam/template/banner',$data);
		//$this->load->view('spkp/fam/menu',$data);
		$this->load->view('spkp/fam/asset_list.php',$data);
		
		$this->load->view('spkp/fam/template/footer',$data);
	}
	
	public function reg_asset()
	{
		$site=site_url();
		$base=base_url();
		$data=array(
					'site' => site_url(),
					'base' => base_url()
					);
		#$this->load->view('welcome_message');
		$this->load->view('spkp/fam/template/banner',$data);
		//$this->load->view('spkp/fam/menu',$data);
		$this->load->view('spkp/fam/reg_asset.php',$data);
		
		$this->load->view('spkp/fam/template/footer',$data);
	}
	public function summary()
	{
		$site=site_url();
		$base=base_url();
		$data=array(
					'site' => site_url(),
					'base' => base_url()
					);
		#$this->load->view('welcome_message');
		$this->load->view('spkp/fam/template/banner',$data);
		//$this->load->view('spkp/fam/menu',$data);
		$this->load->view('spkp/fam/summary.php',$data);
		//
		$this->load->view('spkp/fam/template/footer',$data);
	}
	
	public function asset_edit()
	{
		$site=site_url();
		$base=base_url();
		$id=$this->uri->segment(3);
		$data=array(
					'site' => site_url(),
					'base' => base_url(),
					'id'   => $id
					);
		#$this->load->view('welcome_message');
		
		$this->load->view('spkp/fam/asset_edit.php',$data);
		//$this->load->view('spkp/fam/menu',$data);
		//$this->load->view('spkp/fam/template/footer',$data);
	}
	
	public function asset_delete()
	{
		$site=site_url();
		$base=base_url();
		$id=$this->uri->segment(3);
		$data=array(
					'site' => site_url(),
					'base' => base_url(),
					'id'   => $id
					);
		#$this->load->view('welcome_message');
		
		$this->load->view('spkp/fam/asset_delete.php',$data);
		//$this->load->view('spkp/fam/menu',$data);
		//$this->load->view('spkp/fam/template/footer',$data);
	}
	
	
	public function check_serial()
	{
		$site=site_url();
		$base=base_url();
		$data=array(
					'site' => site_url(),
					'base' => base_url()
					);
		#$this->load->view('welcome_message');
		//$this->load->view('spkp/fam/template/banner',$data);
		$this->load->view('spkp/fam/check_serial.php',$data);
		//$this->load->view('spkp/fam/menu',$data);
		//$this->load->view('spkp/fam/template/footer',$data);
	}
	
	
	public function rumusan()
	{
		$site=site_url();
		$base=base_url();
		$group=$this->uri->segment(3);
		$id=$this->uri->segment(4);
		$data=array(
					'site' => site_url(),
					'base' => base_url(),
					'group' => $group,
					'id' => $id
					);
		#$this->load->view('welcome_message');
		$this->load->view('spkp/fam/template/banner',$data);
		//$this->load->view('spkp/fam/menu',$data);
		$this->load->view('spkp/fam/rumusan.php',$data);
		
		$this->load->view('spkp/fam/template/footer',$data);
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
		$this->load->view('spkp/fam/template/banner',$data);
		//$this->load->view('spkp/fam/menu',$data);
		$this->load->view('spkp/fam/profail.php',$data);
		
		$this->load->view('spkp/fam/template/footer',$data);
	}
	
	public function rumusangraph()
	{
		$site=site_url();
		$base=base_url();
		$data=array(
					'site' => site_url(),
					'base' => base_url()
					);
					
		
		#$this->load->view('welcome_message');
		$this->load->view('spkp/fam/template/banner',$data);
		//$this->load->view('spkp/fam/menu',$data);
		$this->load->view('spkp/fam/rumusangraph.php',$data);
		
		$this->load->view('spkp/fam/template/footer',$data);
	}
	
	public function graphuptime()
	{
		$site=site_url();
		$base=base_url();
		$cat=$this->uri->segment(3);
		$data=array(
					'site' => site_url(),
					'base' => base_url(),
					'cat' => $cat
					);
					
		
		#$this->load->view('welcome_message');
		//$this->load->view('spkp/fam/template/banner',$data);
		//$this->load->view('spkp/fam/menu',$data);
		$this->load->view('spkp/fam/graphuptime.php',$data);
		
		//$this->load->view('spkp/fam/template/footer',$data);
	}
	public function graphuptimeall()
	{
		$site=site_url();
		$base=base_url();
		//$cat=$this->uri->segment(3);
		$data=array(
					'site' => site_url(),
					'base' => base_url()
					
					);
					
		
		#$this->load->view('welcome_message');
		//$this->load->view('spkp/fam/template/banner',$data);
		//$this->load->view('spkp/fam/menu',$data);
		$this->load->view('spkp/fam/graphuptimeall.php',$data);
		
		//$this->load->view('spkp/fam/template/footer',$data);
	}
	
	public function print_excell()
	{
		$site=site_url();
		$base=base_url();
		$searching=$this->uri->segment(3);
		$cond=$this->uri->segment(4);
		$data=array(
					'site' => site_url(),
					'base' => base_url(),
					'searching' => $searching,
					'cond' => $cond
					);
		#$this->load->view('welcome_message');
		//$this->load->view('spkp/fam/template/banner',$data);
		//$this->load->view('spkp/fam/menu',$data);
		$this->load->view('spkp/fam/print_excell.php',$data);
		
		//$this->load->view('spkp/fam/template/footer',$data);
	}
	
	public function scheduling()
	{
		$site=site_url();
		$base=base_url();
		//$searching=$this->uri->segment(3);
		//$cond=$this->uri->segment(4);
		$data=array(
					'site' => site_url(),
					'base' => base_url()
					);
		$this->load->view('spkp/fam/template/banner',$data);
		//$this->load->view('spkp/fam/menu',$data);
		$this->load->view('spkp/fam/scheduling.php',$data);
		
		$this->load->view('spkp/fam/template/footer',$data);
	}
	
	public function sch_update()
	{
		$site=site_url();
		$base=base_url();
		//$searching=$this->uri->segment(3);
		//$cond=$this->uri->segment(4);
		$data=array(
					'site' => site_url(),
					'base' => base_url()
					);
		
		$this->load->view('spkp/fam/sch_update',$data);
		
		
	}
	
	public function laporan()
	{
		$site=site_url();
		$base=base_url();
		$data=array(
					'site' => site_url(),
					'base' => base_url()
					);
					
		
		#$this->load->view('welcome_message');
		$this->load->view('spkp/fam/template/banner',$data);
		//$this->load->view('spkp/fam/menu',$data);
		$this->load->view('spkp/fam/laporan.php',$data);
		
		$this->load->view('spkp/fam/template/footer',$data);
	}
	
	public function print_laporan()
	{
		$site=site_url();
		$base=base_url();
		$data=array(
					'site' => site_url(),
					'base' => base_url()
					);
					
		
		#$this->load->view('welcome_message');
		#$this->load->view('spkp/fam/template/banner',$data);
		#$this->load->view('spkp/fam/menu',$data);
		$this->load->view('spkp/fam/print_laporan.php',$data);
		
		#$this->load->view('spkp/fam/template/footer',$data);
	}
	
		public function erp()
	{
		$site=site_url();
		$base=base_url();
		$data=array(
					'site' => site_url(),
					'base' => base_url()
					);
					
		
		#$this->load->view('welcome_message');
		$this->load->view('spkp/fam/template/banner',$data);
		#$this->load->view('spkp/fam/menu',$data);
		$this->load->view('spkp/fam/erp.php',$data);
		
		#$this->load->view('spkp/fam/template/footer',$data);
	}
	
	public function batch()
	{
		$site=site_url();
		$base=base_url();
		$data=array(
					'site' => site_url(),
					'base' => base_url()
					);
					
		
		#$this->load->view('welcome_message');
		#$this->load->view('spkp/fam/template/banner',$data);
		#$this->load->view('spkp/fam/menu',$data);
		$this->load->view('spkp/fam/batch.php',$data);
		
		#$this->load->view('spkp/fam/template/footer',$data);
	}
	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */