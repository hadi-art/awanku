<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
session_start(); 

class Ktube_control extends CI_Controller {


	public function __construct()
	{
		parent::__construct();
		//$this->load->model('main_model');
		$this->load->database();
		$this->load->helper('url');
		$this->load->library('upload');
		$this->load->library('pagination');

		//to use custom mysqli
        $this->load->model('main_model');
		$site=site_url();
		$base=base_url();
		date_default_timezone_set ( 'Asia/Kuala_Lumpur' );
		
		#$q="SELECT description FROM tbl_param WHERE var='server'";
		#list($server)=mysql_fetch_row(mysql_query($q));
		
		#error_reporting(0);
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
		$this->load->view('ktube/menu',$data);
		$this->load->view('ktube/welcome',$data);
		#$this->load->view('ktube/home',$data);
		
		$this->load->view('template/footer',$data);
	}
	
		public function userprofile()
	{
		$site=site_url();
		$base=base_url();
		$data=array(
					'page' => "My Document",
					'site' => site_url(),
					'base' => base_url()					
					);
		$this->load->view('ktube/userprofile.php',$data);
	}
	
		public function edit()
	{
		$site=site_url();
		$base=base_url();
		$id=$this->uri->segment(3);
		$data=array(
					'page' => "My Document",
					'site' => site_url(),
					'base' => base_url(),
					'id' => $id		
					);
		#$this->load->view('template/banner',$data);
		//$this->load->view('ktube/menu',$data);
		$this->load->view('ktube/edit',$data);
		//$this->load->view('template/footer',$data);
	}
	
	public function ktube_video()
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
					
		$this->load->view('ktube/menu',$data);			
		$this->load->view('ktube/ktube_video',$data);
	}
	
	
		public function search()
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
		$_SESSION["ktube"]["click"]["form"]=$form;
		
		
		$data=array(
					'page' => "Content List",
					'site' => site_url(),
					'base' => base_url(),
					'subj' => $subj,
					'ibprofile' => $ibprofile,
					'tahap' => $tahap,
					'form' => $form,
					
					'startpage' => $startpage
					);
		//$this->load->view('template/banner',$data);
		$this->load->view('ktube/menu2',$data);
		$this->load->view('ktube/search',$data);
		//$this->load->view('ktube/home',$data);
		
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
		$_SESSION["ktube"]["click"]["form"]=$form;
		
		
		$data=array(
					'page' => "Content List",
					'site' => site_url(),
					'base' => base_url(),
					'subj' => $subj,
					'ibprofile' => $ibprofile,
					'tahap' => $tahap,
					'form' => $form,
					
					'startpage' => $startpage
					);
		//$this->load->view('template/banner',$data);
		$this->load->view('ktube/menu2',$data);
		$this->load->view('ktube/contentlist',$data);
		//$this->load->view('ktube/home',$data);
		
		//$this->load->view('template/footer',$data);
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
		
		$this->load->view('ktube/menu2',$data);
		$this->load->view('ktube/steam',$data);

	}
	
	
	
	
	public function mydocument()
	{
		$site=site_url();
		$base=base_url();
		$data=array(
					'page' => "My Document",
					'site' => site_url(),
					'base' => base_url()					
					);
		#$this->load->view('template/banner',$data);
		$this->load->view('ktube/menu2',$data);
		$this->load->view('ktube/mydocument',$data);
		$this->load->view('template/footer',$data);
	}
	
	
	
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
		$this->load->view('ktube/menu2',$data);
		$this->load->view('ktube/teacherfile',$data);
		$this->load->view('template/footer',$data);
	}
	public function upload()
	{
		$site=site_url();
		$base=base_url();
		$data=array(
					'page' => "Upload",
					'site' => site_url(),
					'base' => base_url()					
					);
		#$this->load->view('template/banner',$data);
		$this->load->view('ktube/menu2',$data);
		$this->load->view('ktube/upload',$data);
		#$this->load->view('template/footer',$data);
	}
	
	
	
	
	
	
	
	public function form_showsubjek()
	{
		$site=site_url();
		$base=base_url();
		$data=array(
					'page' => "Upload",
					'site' => site_url(),
					'base' => base_url()				
					);
		#$this->load->view('template/banner',$data);
		
		$this->load->view('ktube/form_showsubjek',$data);
		
	}
	
	public function add_file(){
	
		$base=base_url();
		$data=array(
					'page' => "Upload",
					'site' => site_url(),
					'base' => base_url(),
					'redirect' => "mydocument"						
					);
					
		$userid=$_SESSION["log"]["userid"];
	
		$q2="SELECT id FROM ktube_content ORDER BY id DESC LIMIT 1";
		list($lastid)=mysql_fetch_row(mysql_query($q2));
		if($lastid==""){$lastid=0;}
		
		
		
		echo $newid=$lastid+1;
		
		$q2="SELECT var FROM tbl_param WHERE param='station'";
		list($station)=mysql_fetch_row(mysql_query($q2));
		
		
		$newid=$station.sprintf('%05d',$userid)."C".sprintf('%07d',$newid);
		//print_r($_SESSION);
	//die();
echo "<pre>";
        #print_r($_FILES);
echo "</pre>";
	//die();
	
	
		$date = new DateTime();
		$datex =  $date->format('H:i:s d-m-Y');
		#$datex=date("Y-m-d H:i:s");
		//die();
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

		if($selection == 'Video')
		{
			

       			if (isset($_FILES['file']['name']) && $_FILES['file']['name'] != '') 
				{
            	unset($config);
				//echo "masuk ke";
				//die();
				$target_pathtemp = "subject/vid/";
				$target_path = "subject/vid/converted/";
				$target_pathdb = $target_path . $newid.".mp4";
				
				
				
				$ffmpeg = "C:\\ffmpeg\\bin\\ffmpeg";
				$videoFile = $_FILES["file"]["tmp_name"];
				$imageFile = $target_path . $newid.".jpg";
				$size = "120x90";
				$getFromSecond = 5;
								
                   // die();
				
				$name=$_FILES["file"]["name"];
				$nameasal=$_FILES["file"]["name"];
				$name=$newid.".flv";
				$type=$_FILES["file"]["type"];
				$size=$_FILES["file"]["size"];
				$title=$_POST["title"];
				//print_r($_FILES);
				//die();
				
          	  	$date = date("ymdhis");
           	 	$configVideo['upload_path'] = $target_pathtemp;
           		$configVideo['max_size'] = '1024000000';
            	$configVideo['allowed_types'] = 'flv|mp4|mov|wmv|avi';
            	$configVideo['overwrite'] = TRUE;
            	$configVideo['remove_spaces'] = TRUE;
            	//$video_name = $newid.".mp4";
            	$configVideo['file_name'] = $name;
 
            	$this->load->library('upload', $configVideo);
           	 	$this->upload->initialize($configVideo);

				$form = $_POST["level"];
				

				if( $form == 'F1' or $form == 'F2' or $form == 'F3' )
				{
					$levelcek = "PT3";
					$level_id = 1;
				}
				
				else if( $form == 'F4' or $form == 'F5' )
				{
					$levelcek = "SPM";
					$level_id = 2;
				}
			
				else
				{
					$levelcek = "DIPLOMA";
					$level_id = 4;
				}


            		
					if (!$this->upload->do_upload('file')) 
					{
                		 $this->upload->display_errors();
                        echo "File Rejected";
           			 } 
					 else {
                		$videoDetails = $this->upload->data();
						//echo $levelcek = $_POST["level"];
				

                		
						
						$q="insert into ktube_content set title='$title', subj_id='$_POST[subjek]',profile_id='$_POST[idp]', level='$levelcek', level_id='$level_id', type2='$_POST[type2]',upload_by='$_POST[upload_by]',  name='$nameasal', path='$target_pathdb', type='$type',  size ='$size', flag='1',time='$datex', thumbnail_img = '$imageFile',source_id='$_POST[source]', server_id='1', form='$form'";
				#mysqli_query($q);

                         $insert_query = $this->main_model->mysqli_custom_insert($q);

				        //sent query to mysqli custom connector

					
					
					
/*<!---------------------------------video converter---------------------------------------------------->*/

#Library/WebServer/Documents/awanku/subject/vid
 $command='/usr/local/bin/HandbrakeCLI -i "/Library/WebServer/Documents/awanku/subject/vid/'.$name.'" -t 3 --angle 1 -c 1 -o "/Library/WebServer/Documents/awanku/subject/vid/converted/'.$newid.".mp4".'"  -f mp4  -O  -w 480 --loose-anamorphic  --modulus 2 -e x264 -q 22 -r 25 --pfr -a 1 -E faac -6 dpl2 -R Auto -B 128 -D 0 --gain 0 --audio-fallback ffac3 --x264-profile=main  --h264-level="3.0"  --verbose=1';

#exec($command); 
#shell_exec($command);

$last_line = system($command, $retval);

// Printing additional info
echo '
</pre>
<hr />Last line of the output: ' . $last_line . '
<hr />Return value: ' . $retval;

echo "Successfully Uploaded";

#die();
/*<!--------------------------------video converter----------------------------------------------------->*/

                         $cmdthumb = "/usr/local/bin/ffmpeg -itsoffset -1 -i /Library/webserver/Documents/awanku/subject/vid/converted/$newid.mp4 -ss 5 -vframes 1 -filter:v scale='280:-1' /Library/webserver/Documents/awanku/subject/vid/converted/$newid.jpg";
                         
                         
                         
                         if (!shell_exec($cmdthumb))
                         {
                             
                             echo "Thumbnail Created!";
                         }
                         else
                         {
                             echo "Error Creating Thumbnail!"; 
                         }
                         
                         
                         
                         
/*---------------------------------------delete temp file-------------------------------------------------------------------*/


$pathdir="C:\\xampp\htdocs\awanku\\subject\\vid\\$name";

//die();

$commanddelete="DEL /F /S /Q /A \"$pathdir\"";
exec($commanddelete); 



$this->load->view('ktube/redirect_page',$data);

/*---------------------------------------delete temp file-------------------------------------------------------------------*/






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
			//application/vnd.openxmlformats-officedocument.wordprocessingml.document
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
					//print_r($_FILES);
					
					$this->load->library('upload', $config);
           	 		$this->upload->initialize($config);
					
					$form = $_POST["level"];
				

					if( $form == 'F1' or $form == 'F2' or $form == 'F3' )
					{
						$level = "PT3";
						$level_id = 1;
					}
					
					else if( $form == 'F4' or $form == 'F5' )
					{
						$level = "SPM";
						$level_id = 2;
					}
				
					else
					{
						$level = "DIPLOMA";
						$level_id = 4;
					}

					
					if (!$this->upload->do_upload('file')) 
					{
                		$this->upload->display_errors();
           			 } 
					 else 
					 {
                		$videoDetails = $this->upload->data();
                		echo "Successfully Uploaded";
						
						$q="insert into ktube_content set title='$title', subj_id='$_POST[subjek]',profile_id='$_POST[idp]', level='$level', level_id='$level_id', type2='$_POST[type2]', upload_by='$_POST[upload_by]',  name='$name', path='$target_pathdb', type='$ftype',  size ='$size', flag='1', time='$datex',source_id='$_POST[source]',server_id='1', form='$form'";
				mysql_query($q);
			
						
					$this->load->view('ktube/redirect_page',$data);
					
				
            				}
				
			} // else
	header( "refresh:0.00001;url=$site/ktube_control/mydocument" );

	}//function  
	
	
	
	public function delete_content()
	{
		$site=site_url();
		$base=base_url();
		$id=$this->uri->segment(3);
		$data=array(
					'page' => "My Document",
					'site' => site_url(),
					'base' => base_url(),
					'id' => $id		
					);
		#$this->load->view('template/banner',$data);
		//$this->load->view('ktube/menu',$data);
		$this->load->view('ktube/delete_content',$data);
		//$this->load->view('template/footer',$data);
	}
	

	
		public function open_document()
	{
		$site=site_url();
		$base=base_url();
		$id=$this->uri->segment(3);
		$data=array(
					'page' => "My Document",
					'site' => site_url(),
					'base' => base_url(),
					'id' => $id		
					);
		#$this->load->view('template/banner',$data);
		//$this->load->view('ktube/menu',$data);
		$this->load->view('ktube/open_document',$data);
		//$this->load->view('template/footer',$data);
	}
	public function open_video()
	{
		$site=site_url();
		$base=base_url();
		$id=$this->uri->segment(3);
		$data=array(
					'page' => "My Document",
					'site' => site_url(),
					'base' => base_url(),
					'id' => $id		
					);
		#echo "asass";
		#$this->load->view('template/banner',$data);
		//$this->load->view('ktube/menu',$data);
		$this->load->view('ktube/open_video',$data);
		//$this->load->view('template/footer',$data);
	}
	
	public function progress()
	{
		$site=site_url();
		$base=base_url();
		$id=$this->uri->segment(3);
		$data=array(
					'page' => "My Document",
					'site' => site_url(),
					'base' => base_url(),
					'id' => $id		
					);
		#$this->load->view('template/banner',$data);
		//$this->load->view('ktube/menu',$data);
		$this->load->view('ktube/progress',$data);
		//$this->load->view('template/footer',$data);
	}
	
	public function sourceview()
	{
		$site=site_url();
		$base=base_url();
		$id=$this->uri->segment(3);
		$data=array(
					'page' => "My Document",
					'site' => site_url(),
					'base' => base_url(),
					'id' => $id		
					);
		#$this->load->view('template/banner',$data);
		$this->load->view('ktube/menu2',$data);
		$this->load->view('ktube/graphsource',$data);
		//$this->load->view('template/footer',$data);
	}
	
		public function graph()
	{
		$site=site_url();
		$base=base_url();
		$id=$this->uri->segment(3);
		$data=array(
					'page' => "My Document",
					'site' => site_url(),
					'base' => base_url(),
					'id' => $id		
					);
		#$this->load->view('template/banner',$data);
		//$this->load->view('ktube/menu',$data);
		$this->load->view('ktube/graph',$data);
		//$this->load->view('template/footer',$data);
	}
	
		public function details()
	{
		$site=site_url();
		$base=base_url();
		$id=$this->uri->segment(3);
		$data=array(
					'page' => "My Document",
					'site' => site_url(),
					'base' => base_url(),
					'id' => $id		
					);
		#$this->load->view('template/banner',$data);
		//$this->load->view('ktube/menu',$data);
		$this->load->view('ktube/details',$data);
		//$this->load->view('template/footer',$data);
	}
	
	
	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
