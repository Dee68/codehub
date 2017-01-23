<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Page extends Public_Controller {


	public function index()
	{

		$this->load->model('page_model');
		$this->load->model('category_model');
		$data['categories'] = $this->category_model->getall();
		$data['count'] = $this->category_model->getcount();
    //$data['pages'] = $this->page_model->getpage_menu();
    //$data['featureds'] = $this->page_model->featured();
		$data['title'] = 'My Web Site';
		$this->template->layout('public','default','index',$data);
	}
	//shows pages in menu link
	public function show($slug)
	{
		$this->load->model('page_model');
		$this->load->model('category_model');
		$data['categories'] = $this->category_model->getall();
		$data['count'] = $this->category_model->getcount();
    $data['username'] = $this->session->userdata('username');
		$data['title'] = 'CMS Home | '.$slug;
		  $data['page'] = $this->page_model->getby_slug($slug);
			$this->template->layout('public','default','show',$data);
	}
	//=== register a user ==
	public function register()
	{
		$this->load->model('role_model');
		$this->load->model('user_model');
		$this->load->model('activity_model');
		$this->load->library('bcrypt');//enables hashing of password
		//check validity of fields
		$this->form_validation->set_rules('name','Name','trim|required');
		$this->form_validation->set_rules('email','Email','trim|required|valid_email');
		$this->form_validation->set_rules('role','Role','required|greater_than[0]');
		$this->form_validation->set_rules('password','Password','trim|required');
		$this->form_validation->set_rules('password2','Password2','required|matches[password]');
		if ($this->form_validation->run() == FALSE) {
			//display form with errors
			$options = [];
			$options[0] = 'select role';
			$opt_list = $this->role_model->getsingle(1);
			$options[1] = $opt_list->role_name;
			$data['options'] = $options;
			$data['title'] = ' CMS | Registration';
			$this->template->layout('public','registration','registration',$data);
		}else {
			//retriev form data and insert into database table
			$data = [
				'username'=>$this->input->post('name'),
				'useremail'=>$this->input->post('email'),
				'role_id'=>$this->input->post('role'),
				'password'=>$this->bcrypt->hash_password($this->input->post('password'))
			];
			 $result = $this->user_model->save($data);

									if ($result == 1) {
										$field = ['resource_id'=>  $this->db->insert_id(),'type'=>'user','action'=>'added','message'=>'A new user('.$data["username"].') was created '];
						 									$this->activity_model->save($field);
										$this->session->set_flashdata('success','you have successfully registered');
										redirect('admin/login','refresh');
									}else {
										$this->session->set_flashdata('error','something went wrong');
										redirect('register','refresh');
									}

		}


	}
}
