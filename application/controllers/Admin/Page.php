<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Page extends Admin_Controller {
	function __construct()
  {
 	 parent::__construct();
 	 if (!($this->session->userdata('logged_in')&& $this->session->userdata('role_id') >= 1)) {
 	 redirect('admin/user/login');
 	}
  }

	public function index()
	{
		$this->load->model('page_model');
		$this->load->model('user_model');
		$data['count'] = $this->page_model->getcount();
		$data['single'] = $this->user_model->getsingle($this->session->userdata('user_id'));
			$data['username'] = $this->session->userdata('username');
			$data['title'] = 'CMS Page';
			$data['pages'] = $this->page_model->getall();
		$this->template->layout('admin','default','page/index',$data);
	}

	public function add()
	{
		$data['username'] = $this->session->userdata('username');
		$data['title'] = 'CMS Page';
		$this->load->model('page_model');
    $this->load->model('category_model');
		$this->load->model('activity_model');
		$this->load->model('user_model');
		$data['single'] = $this->user_model->getsingle($this->session->userdata('user_id'));
		$this->form_validation->set_rules('title','Page Title','trim|required|callback_alpha_space');
    $this->form_validation->set_rules('category','Category','required|greater_than[0]');
    $this->form_validation->set_rules('body','Body','trim|required');
    $this->form_validation->set_rules('is_published','Published','required');
    $this->form_validation->set_rules('is_published','Published','required');
    $this->form_validation->set_rules('is_feartured','Featured','required');
    $this->form_validation->set_rules('grade','Order','required');
		if ($this->form_validation->run() == FALSE) {
			//show errors and remain on page
      $options = [];
      $options[0] = 'select category';
      $opt_list = $this->category_model->getall();
      foreach ($opt_list as $option) {
        $options[$option->id] = $option->name;
      }
      $data['options'] = $options;
			$this->template->layout('admin','default','page/add',$data);
		}else {

      $slug = strtolower(str_replace('','_',$this->input->post('title')));
      	//get data from field and insert into database
			$data = ['title'=>$this->input->post('title'),
             'slug'=>$slug,
             'is_published'=>$this->input->post('is_published'),
             'category_id'=>$this->input->post('category'),
             'user_id'=>  $this->session->userdata('user_id'),
             'is_featured'=>$this->input->post('is_featured'),
             'body'=>$this->input->post('body'),
             'in_menu'=>$this->input->post('in_menu'),
             'grade'=>$this->input->post('grade')];
			$this->page_model->save($data);
			$field = ['resource_id'=>  $this->db->insert_id(),'type'=>'page','action'=>'added','message'=>'A new page('.$data["title"].') was created '];
                $this->activity_model->save($field);
								$this->session->set_flashdata('success','Page successfully created');
								redirect('admin/page','refresh');
		}

	}

 public function delete($id)
 {
	 $data['title'] = 'CMS Category | Delete';
	 	$data['username'] = $this->session->userdata('username');
	  $this->load->model('page_model');
		$this->load->model('activity_model');
		$test['name'] = $this->page_model->getsingle($id)->title;
		$result = $this->page_model->delete($id);
		if($result){
			$field = ['resource_id'=>  $this->db->insert_id(),'type'=>'page','action'=>'deleted','message'=>'A  page('.$test["name"].') was deleted '];
                $this->activity_model->save($field);
			redirect('admin/page','refresh');
		}
 }

	public function edit($id)
	{

		$data['title'] = 'CMS Page | Edit';
		 $this->load->model('category_model');
     $this->load->model('page_model');
		 $this->load->model('activity_model');
		 $this->load->model('user_model');
     $data['single'] = $this->user_model->getsingle($this->session->userdata('user_id'));
		 $data['item'] = $this->page_model->getsingle($id);
		 $data['username'] = getusername($this->page_model->getsingle($id)->user_id);
     $this->form_validation->set_rules('title','Page Title','trim|required|callback_alpha_space');
     $this->form_validation->set_rules('category','Category','required|greater_than[0]');
     $this->form_validation->set_rules('body','Body','trim|required');
     $this->form_validation->set_rules('is_published','Published','required');
     $this->form_validation->set_rules('in_menu','Menu','required');
     $this->form_validation->set_rules('is_featured','Featured','required');
     $this->form_validation->set_rules('grade','Order','required');
 		if ($this->form_validation->run() == FALSE) {
 			//show errors and remain on page
      //show errors and remain on page
      $options = [];
      $options[0] = 'select category';
      $opt_list = $this->category_model->getall();
      foreach ($opt_list as $option) {
        $options[$option->id] = $option->name;
      }
      $data['options'] = $options;
 			$this->template->layout('admin','default','page/edit',$data);
 		}else {
      $slug = strtolower(str_replace('','_',$this->input->post('title')));
        //get data from field and insert into database
      $data = ['title'=>$this->input->post('title'),
             'slug'=>$slug,
             'is_published'=>$this->input->post('is_published'),
             'category_id'=>$this->input->post('category'),
             'user_id'=>$this->page_model->getsingle($id)->user_id,
             'is_featured'=>$this->input->post('is_featured'),
             'body'=>$this->input->post('body'),
             'in_menu'=>$this->input->post('in_menu'),
             'grade'=>$this->input->post('grade')];
      $this->page_model->update($id,$data);
      $field = ['resource_id'=>  $this->db->insert_id(),'type'=>'page','action'=>'updated','message'=>'The page('.$data["title"].') was updated '];
                $this->activity_model->save($field);
                redirect('admin/page','refresh');
 		}

	}
  //register user to system

	//call back function
	public function alpha_space($input)
	{
		if (!preg_match("/^([a-z ])+$/i",$input)) {
			$this->form_validation->set_message('alpha_space','The %s must contain only alphabets and spaces');
			return FALSE;
		}
		 return TRUE;

	}

}
