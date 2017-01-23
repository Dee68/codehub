<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends Admin_Controller {

  function __construct()
  {
		parent::__construct();
	if (!$this->session->userdata('logged_in')) {
		redirect('admin/user/login','refresh');
	}
  }
	public function index()
	{
	 $this->load->model('activity_model');
   $this->load->model('user_model');
    $data['count'] = $this->activity_model->getcount();
	 //*** enable pagination ****
	 $this->load->library('pagination');
	 $config['base_url'] = "http://localhost/cms.dev/admin/dashboard/index";
	 $config['total_rows'] = $this->activity_model->getcount();
	 $config['per_page'] = 7;
	 $config['num_links'] = 3;
	 $config['use_page_numbers'] = TRUE;

	 //using bootstrap class to beautify page links
	 $config['full_tag_open'] = '<ul class="pagination">';
   $config['full_tag_close'] = '</ul>';
   $config['prev_link'] = '&laquo;';
   $config['prev_tag_open'] = '<li>';
   $config['prev_tag_close'] = '</li>';
   $config['next_tag_open'] = '<li>';
   $config['next_tag_close'] = '</li>';
   $config['cur_tag_open'] = '<li class="active"><a href="#">';
   $config['cur_tag_close'] = '</a></li>';
   $config['num_tag_open'] = '<li>';
   $config['num_tag_close'] = '</li>';
   $config['next_link'] = '&raquo;';
  //initialize the above config
	 $this->pagination->initialize($config);
	 //set the offset with param $page
	 if($this->uri->segment(4)){
   $page = ($this->uri->segment(4)) ;
         }
        else{
    $page = 1;
      }
	 if ($this->session->userdata('logged_in')) {
	 	$data['username'] = $this->session->userdata('username');
    $data['single'] = $this->user_model->getsingle($this->session->userdata('user_id'));
	 }
	 $data['activities'] = $this->activity_model->getpaginated($config['per_page'],$page);
   $data['title'] = 'CMS ADMINISTRATION';
		$this->template->layout('admin','default','dashboard',$data);

	}


}
