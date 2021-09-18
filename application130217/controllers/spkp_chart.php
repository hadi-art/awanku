<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Chart extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('data');
    }  
    
    public function index()
    {
        $this->load->view('chart');
    }
    
    public function data()
    {
        
        $data = $this->data->get_data();
        
        $category = array();
        $category['name'] = 'Category';
        
        $series1 = array();
        $series1['name'] = 'status';
        


        
        foreach ($data as $row)
        {
            $category['data'][] = $row->status;

        }
        
        $result = array();
        array_push($result,$category);
        array_push($result,$series1);

        
        print json_encode($result, JSON_NUMERIC_CHECK);
    }
    
}

/* End of file chart.php */
/* Location: ./application/controllers/chart.php */