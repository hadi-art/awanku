<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
session_start(); 

class Ktube_control extends CI_Controller {

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
		$this->load->view('ktube/menu',$data);
		#$this->load->view('ktube/home',$data);
		
		$this->load->view('template/footer',$data);
	}
	
	
	public function upload()
	{
		
		
		$site=site_url();
		$base=base_url();
		
		
		
		$data=array(
					'page' => "Home",
					'site' => site_url(),
					'base' => base_url(),
				
					);
		//$this->load->view('template/banner',$data);
		$this->load->view('ktube/upload',$data);
		//$this->load->view('ktube/home',$data);
		
		//$this->load->view('template/footer',$data);
	}
	
	public function contentlist()
	{
		
		
		$site=site_url();
		$base=base_url();
		//list($uname)=mysql_fetch_row(mysql_query("select username from tbl_user where username='uname'"));
		//echo "<pre>";
		//print_r($_SESSION);
		$_SESSION["ktube"]["click"]["tahap"]=$_GET["tahap"];
		$_SESSION["ktube"]["click"]["ibprofile"]=$_GET["ibprofile"];
		
		$data=array(
					'page' => "Home",
					'site' => site_url(),
					'base' => base_url()
					
					
					
					
					
					);
		//$this->load->view('template/banner',$data);
		$this->load->view('ktube/menu',$data);
		$this->load->view('ktube/contentlist',$data);
		//$this->load->view('ktube/home',$data);
		
		//$this->load->view('template/footer',$data);
	}
	
	public function allcontentlist()
	{
		
		
		$site=site_url();
		$base=base_url();
		//list($uname)=mysql_fetch_row(mysql_query("select username from tbl_user where username='uname'"));
		//echo "<pre>";
		//print_r($_SESSION);
		
		$data=array(
					'page' => "Home",
					'site' => site_url(),
					'base' => base_url()
					
					
					
					
					
					);
		//$this->load->view('template/banner',$data);
		$this->load->view('ktube/allcontentlist',$data);
		//$this->load->view('ktube/home',$data);
		
		//$this->load->view('template/footer',$data);
	}
	
	public function menu()
	{
		
		
		$site=site_url();
		$base=base_url();
		
		
		
		$data=array(
					'page' => "Home",
					'site' => site_url(),
					'base' => base_url()
					
					);
		//$this->load->view('template/banner',$data);
		$this->load->view('ktube/menu',$data);
		//$this->load->view('ktube/home',$data);
		$this->load->view('template/footer',$data);
	}
	
	
	public function video()
	{
		
		
		$site=site_url();
		$base=base_url();
		//list($uname)=mysql_fetch_row(mysql_query("select username from tbl_user where username='uname'"));
		//print_r($_SESSION);
		
		$data=array(
					'page' => "Home",
					'site' => site_url(),
					'base' => base_url()
					
					
					
					
					
					);
		//$this->load->view('template/banner',$data);
		$this->load->view('ktube/video',$data);
		//$this->load->view('ktube/home',$data);
		
		//$this->load->view('template/footer',$data);
	}
	
	
	public function open_file()
	{
		
		
		$site=site_url();
		$base=base_url();
		//list($uname)=mysql_fetch_row(mysql_query("select username from tbl_user where username='uname'"));
		//print_r($_SESSION);
		
		$data=array(
					'page' => "Home",
					'site' => site_url(),
					'base' => base_url()
					
					
					
					
					
					);
		//$this->load->view('template/banner',$data);
		$this->load->view('ktube/open_file',$data);
		//$this->load->view('ktube/home',$data);
		
		//$this->load->view('template/footer',$data);
	}
	
	
	
		public function add_file(){
	
		$base=base_url();
	
		$q2="SELECT id FROM tbl_content  ORDER BY id DESC LIMIT 1";
		list($lastid)=mysql_fetch_row(mysql_query($q2));
		if($lastid==""){$lastid=0;}

		$newid=$lastid+1;
	//die();
		$date = new DateTime();
		$datex =  $date->format('H:i:s d-m-Y');
		$selection = $_POST['type2'];
		$type=$_FILES["file"]["type"];
		//die();
			
			//$type=" how arde u";
			if (strpos($type,'video') !== false) {$type="video";}
			if (strpos($type,'octet-stream') !== false) {$type="video";}

			//echo $type;
			
			if($type=="application/pdf" && $selection != "Document"){die("Please select the correct file type");}
			
			
			if($type=="video" && $selection != "Video"){die("Please select the correct file type");}
			
			//die("yes dh masuk");

		if($selection == 'Video'){
			

       			if (isset($_FILES['file']['name']) && $_FILES['file']['name'] != '') 
				{
            	unset($config);
				//echo "masuk ke";
				$target_pathtemp = "subject/vid/";
				$target_path = "subject/vid/converted/";
			$target_pathdb = $target_path . $newid.".mp4";
			
				$name=$_FILES["file"]["name"];
				$name=$newid.".flv";
				$type=$_FILES["file"]["type"];
				$size=$_FILES["file"]["size"];
				$title=$_POST["title"];
			
				
          	  	$date = date("ymdhis");
           	 	$configVideo['upload_path'] = $target_pathtemp;
           		$configVideo['max_size'] = '1024000000';
            	$configVideo['allowed_types'] = 'flv|mp4|mov';
            	$configVideo['overwrite'] = FALSE;
            	$configVideo['remove_spaces'] = TRUE;
            	//$video_name = $newid.".mp4";
            	$configVideo['file_name'] = $name;
 
            	$this->load->library('upload', $configVideo);
           	 	$this->upload->initialize($configVideo);

				$levelcek = $_POST["level"];
				
					if($levelcek == "PMR")
				{
					 $level_id = 1;
				}
				elseif($levelcek == "SPM")
				{
					 $level_id = 2;
				}


            		
					if (!$this->upload->do_upload('file')) 
					{
                		echo $this->upload->display_errors();
           			 } 
					 else {
                		$videoDetails = $this->upload->data();
						echo $levelcek = $_POST["level"];
				

                		echo "Successfully Uploaded";
						
						$q="insert into tbl_content set title='$title', subj_id='$_POST[subjek]',profile_id='$_POST[idp]', level='$_POST[level]', level_id='$level_id', type2='$_POST[type2]', upload_by='$_POST[upload_by]',  name='$name', path='$target_pathdb', type='$type',  size ='$size', flag='1',time='$datex'";
				mysql_query($q);
					
					
					
					/*<!---------------------------------video converter---------------------------------------------------->*/
//ini_set('max_execution_time', 900);

//yang asal success
//$command='handbrakecli -i "C:\xampp\htdocs\e-broadcastDEV\include\diyplayer\video\\'.$newasal.'" -t 8 --angle 1 -c 1 -o "E:\xampp\htdocs\e-broadcastDEV\include\diyplayer\video\video_converted\\'.$newid.'"  -f mp4  -w 640 --loose-anamorphic  --modulus 2 -e x264 -q 20 --vfr -a 1 -E faac -6 dpl2 -R Auto -B 160 -D 0 --gain 0 --audio-fallback ffac3 --markers="C:\Users\Administrator\AppData\Local\Temp\ssss-8-chapters.csv" --x264-preset=veryfast  --x264-profile=main  --h264-level="4.0"  --verbose=1';	

//echo $command='handbrakecli -i "C:\xampp\htdocs\ktube\subject\vid\\'.$name.'" -t 3 --angle 1 -c 1 -o "C:\xampp\htdocs\ktube\subject\vid\converted\\'.$newid.".mp4".'"  -f mp4  -O  -w 480 --loose-anamorphic  --modulus 2 -e x264 -q 22 -r 25 --pfr -a 1 -E faac -6 dpl2 -R Auto -B 128 -D 0 --gain 0 --audio-fallback ffac3 --x264-profile=main  --h264-level="3.0"  --verbose=1';	

$command='handbrakecli -i "C:\xampp\htdocs\ktube\subject\vid\\'.$name.'" -t 3 --angle 1 -c 1 -o "C:\xampp\htdocs\ktube\subject\vid\converted\\'.$newid.".mp4".'"  -f mp4  -O  -w 480 --loose-anamorphic  --modulus 2 -e x264 -q 22 -r 25 --pfr -a 1 -E faac -6 dpl2 -R Auto -B 128 -D 0 --gain 0 --audio-fallback ffac3 --x264-profile=main  --h264-level="3.0"  --verbose=1';	



exec($command); 
//die();
/*<!--------------------------------video converter----------------------------------------------------->*/
            				}
							
				}
		}
			else
			{
			$target_path = "subject/doc/";
			if (strpos($_FILES['file']['type'],'application/vnd.openxmlformats-officedocument.wordprocessingml.document') !== false) {$ftype=".docx";}
			if (strpos($_FILES['file']['type'],'application/pdf') !== false) {$ftype=".pdf";}
			if (strpos($_FILES['file']['type'],'application/msword') !== false) {$ftype=".doc";}
			if (strpos($_FILES['file']['type'],'application/vnd.ms-powerpoint') !== false) {$ftype=".ppt";}
			if (strpos($_FILES['file']['type'],'application/vnd.openxmlformats-officedocument.presentationml.presentation') !== false) {$ftype=".pptx";}
			
			$target_pathdb = $target_path . $newid . $ftype;
			
			
			if (isset($_FILES['file']['name']) && $_FILES['file']['name'] != '') 
           // unset($config);
		   
				{
					$name=$_FILES['file']['name'];
					$size=$_FILES['file']['size'];
					$type=$_FILES['file']['type'];
					$tmp_name=$_FILES['file']['tmp_name'];
					$title=$_POST["title"];
					
					


					$h			=fopen($tmp_name, 'r');
					$content	=fread($h, filesize($tmp_name));
					$content1	=addslashes($content);
					fclose($h);
			
					
				
				}
					$target_pathx = "subject/doc/";
					$config['upload_path'] = $target_pathx;
					$config['allowed_types'] = 'pdf|doc|docx|ppt|pptx';
					$config['max_size']	= '1024000000';
					$config['overwrite'] = FALSE;
            		$config['remove_spaces'] = TRUE;
            		//$config = $newid;
            		$config['file_name'] = $newid;
					$this->load->library('upload', $config);
           	 		$this->upload->initialize($config);
					
					$levelcek = $_POST["level"];
					
				if($levelcek == "PMR")
				{
					 $level_id = 1;
				}
				elseif($levelcek == "SPM")
				{
					 $level_id = 2;
				}
					
					if (!$this->upload->do_upload('file')) 
					{
                		echo $this->upload->display_errors();
           			 } 
					 else {
                		$videoDetails = $this->upload->data();
                		echo "Successfully Uploaded";
						
						$q="insert into tbl_content set title='$title', subj_id='$_POST[subjek]',profile_id='$_POST[idp]', level='$_POST[level]', level_id='$level_id', type2='$_POST[type2]', upload_by='$_POST[upload_by]',  name='$name', path='$target_pathdb', type='$type',  size ='$size', flag='1', time='$datex'";
				mysql_query($q);
						
					
            				}
					
					
					
				
				
				
			} // else
	
//die();
        ?>
		<body onLoad="self.setTimeout('parent.parent.location.reload().GB_hide()', 60);">
		<?php
		
	
	}//function
	
	
	public function download()
	{
	
$file = $_GET['file'];
header ("Content-type: octet/stream");
header ("Content-disposition: attachment; filename=".$file.";");
header("Content-Length: ".filesize($file));
readfile($file);
exit;

	
		
	}
	
	public function pmr()
	{
		
		
		$site=site_url();
		$base=base_url();
		
		
		
		$data=array(
					'page' => "Home",
					'site' => site_url(),
					'base' => base_url(),
				
					);
		//$this->load->view('template/banner',$data);
		$this->load->view('ktube/pmr',$data);
		//$this->load->view('ktube/home',$data);
		//$this->load->view('template/footer',$data);
	}
	
	public function spm()
	{
		
		
		$site=site_url();
		$base=base_url();
		
		
		
		$data=array(
					'page' => "Home",
					'site' => site_url(),
					'base' => base_url(),
				
					);
		//$this->load->view('template/banner',$data);
		$this->load->view('ktube/spm',$data);
		//$this->load->view('ktube/home',$data);
		//$this->load->view('template/footer',$data);
	}
	
	public function edit()
	{
		
		
		$site=site_url();
		$base=base_url();
		
		
		
		$data=array(
					'page' => "Home",
					'site' => site_url(),
					'base' => base_url(),
				
					);
		//$this->load->view('template/banner',$data);
		$this->load->view('ktube/edit',$data);
		//$this->load->view('ktube/home',$data);
		//$this->load->view('template/footer',$data);
	}
	
	public function contentlist01()
	{
		
		
		$site=site_url();
		$base=base_url();
		
		
		
		$data=array(
					'page' => "Home",
					'site' => site_url(),
					'base' => base_url(),
				
					);
		//$this->load->view('template/banner',$data);
		$this->load->view('ktube/contentlist01',$data);
		//$this->load->view('ktube/home',$data);
		//$this->load->view('template/footer',$data);
	}
	
	public function menu1()
	{
		
		
		$site=site_url();
		$base=base_url();
		
		
		
		$data=array(
					'page' => "Home",
					'site' => site_url(),
					'base' => base_url()
					
					);
		//$this->load->view('template/banner',$data);
		$this->load->view('ktube/menu01',$data);
		//$this->load->view('ktube/home',$data);
		$this->load->view('template/footer',$data);
	}
	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */