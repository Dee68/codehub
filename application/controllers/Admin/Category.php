<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Category extends Admin_Controller {
	function __construct()
	{
		parent::__construct();
		if (!($this->session->userdata('logged_in')&& $this->session->userdata('role_id') >= 2)) {
		redirect('admin/error','refresh');

	 }
	}

	public function index()
	{
			$data['username'] = $this->session->userdata('username');
			$this->load->model('category_model');
			$this->load->model('user_model');
			$data['count'] = $this->category_model->getcount();
      $data['single'] = $this->user_model->getsingle($this->session->userdata('user_id'));
			$data['title'] = 'CMS Category';
			$data['categories'] = $this->category_model->getall();
		$this->template->layout('admin','default','category/index',$data);
	}

	public function add()
	{
		$data['username'] = $this->session->userdata('username');
		$data['title'] = 'CMS Category';
		$this->load->model('category_model');
		$this->load->model('activity_model');
		$this->load->model('user_model');
		$data['single'] = $this->user_model->getsingle($this->session->userdata('user_id'));
		$this->form_validation->set_rules('name','Category Name','trim|required|callback_alpha_space');
		if ($this->form_validation->run() == FALSE) {
			//show errors and remain on page
			$this->template->layout('admin','default','category/add',$data);
		}else {
			//get data from field and insert into database
			$data = ['name'=>$this->input->post('name')];
			$this->category_model->save($data);
			$field = ['resource_id'=>  $this->db->insert_id(),'type'=>'category','action'=>'added','message'=>'A new category('.$data["name"].') was created '];
                $this->activity_model->save($field);
                $this->session->set_flashdata('success','Category successfully added');
								redirect('admin/category','refresh');
		}

	}

 public function delete($id)
 {
	  $data['title'] = 'CMS Category | Delete';
	  $this->load->model('category_model');
		$this->load->model('activity_model');
		$test['name'] = $this->category_model->getsingle($id)->name;
		$result = $this->category_model->delete($id);
		if($result){
			$field = ['resource_id'=>  $this->db->insert_id(),'type'=>'category','action'=>'deleted','message'=>'A  category('.$test["name"].') was deleted '];
                $this->activity_model->save($field);
                //$this->session->set_flashdata('info','Category succesfully deleted');
			redirect('admin/category','refresh');
		}
 }

	public function edit($id)
	{
		$data['username'] = $this->session->userdata('username');
		$data['title'] = 'CMS Category | Edit';
		 $this->load->model('category_model');
		 $this->load->model('activity_model');
		 $this->load->model('user_model');
     $data['single'] = $this->user_model->getsingle($this->session->userdata('user_id'));
		 $data['item'] = $this->category_model->getsingle($id);
		 $this->form_validation->set_rules('name','Category Name','trim|required|callback_alpha_space');
 		if ($this->form_validation->run() == FALSE) {
 			//show errors and remain on page
 			$this->template->layout('admin','default','category/edit',$data);
 		}else {
 			//get data from field and insert into database
 			$data = ['name'=>$this->input->post('name')];
 			$this->category_model->update($id,$data);
			$field = ['resource_id'=>  $this->db->insert_id(),'type'=>'category','action'=>'updated','message'=>'A new category('.$data["name"].') was updated '];
                $this->activity_model->save($field);
								redirect('admin/category','refresh');
 		}

	}
	//call back function
	public function alpha_space($input)
	{
		if (!preg_match("/^([a-z ])+$/i",$input)) {
			$this->form_validation->set_message('alpha_space','The %s must contain only alphabets and spaces обязательно поле');
			return FALSE;
		}
		 return TRUE;

	}
}
